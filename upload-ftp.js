const ftp = require("basic-ftp");
const path = require("path");

async function uploadFiles() {
    const client = new ftp.Client();
    client.ftp.verbose = true;
    try {
        console.log("Connecting to FTP...");
        await client.access({
            host: "ftp.cluster129.hosting.ovh.net",
            user: "bionovf",
            password: "ADMbiono123",
            secure: false
        });
        
        const remotePath = "/www/wp-content/themes/bionova-site";
        console.log("Navigating to remote path: " + remotePath);
        
        await client.ensureDir(remotePath);
        
        // Custom directory tree upload avoiding ignored folders
        const ignoreList = ['node_modules', '.git', '.vscode', '.agent', 'assets', 'src', 'design-system'];
        
        client.trackProgress(info => {
            console.log(`File: ${info.name} (${info.bytesOverall} bytes)`);
        });

        // We can use uploadFromDir, but we want to ignore some files.
        // The easiest way is to use basic-ftp's uploadFromDir, but we must manually delete old .pngs too.
        // Actually, let's just upload everything not ignored.
        const fs = require('fs');
        
        async function uploadDir(localDir, remoteDir) {
            await client.ensureDir(remoteDir);
            const items = fs.readdirSync(localDir);
            for (const item of items) {
                if (ignoreList.includes(item)) continue;
                
                const localPath = path.join(localDir, item);
                const remoteItemPath = remoteDir + '/' + item;
                
                if (fs.statSync(localPath).isDirectory()) {
                    await uploadDir(localPath, remoteItemPath);
                } else {
                    await client.uploadFrom(localPath, remoteItemPath);
                }
            }
        }
        
        console.log("Cleaning up old bundles on remote server...");
        try {
            const remoteDistPath = remotePath + '/dist';
            const distList = await client.list(remoteDistPath);
            for (const file of distList) {
                if (file.name.startsWith('bundle.v') && file.name.endsWith('.js')) {
                    await client.remove(remoteDistPath + '/' + file.name);
                    console.log(`Deleted remote old bundle: ${remoteDistPath}/${file.name}`);
                }
            }
        } catch (err) {
            console.log("No remote dist folder to clean or error cleaning: " + err.message);
        }

        console.log("Starting upload...");
        await uploadDir(__dirname, remotePath);
        
        console.log("Upload completed! Now deleting old .png files from remote assets...");
        
        // Optional: Try to delete the heavy PNG files from the remote server so they don't take up space
        const assetFolders = ['assets/products', 'assets/hero', 'assets/blog', 'assets/brand'];
        for (const folder of assetFolders) {
            const remoteFolder = remotePath + '/' + folder;
            try {
                const list = await client.list(remoteFolder);
                for (const file of list) {
                    if (file.name.endsWith('.png') || file.name.endsWith('.jpg')) {
                        await client.remove(remoteFolder + '/' + file.name);
                        console.log(`Deleted remote file: ${remoteFolder}/${file.name}`);
                    }
                }
            } catch (err) {
                console.log(`Could not clear old files in ${remoteFolder}`);
            }
        }

    } catch (err) {
        console.error(err);
    }
    client.close();
}

uploadFiles();
