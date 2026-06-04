const ftp = require("basic-ftp");
const path = require("path");
const fs = require("fs");

async function upload() {
    const client = new ftp.Client();
    client.ftp.verbose = true;
    try {
        await client.access({
            host: "ftp.cluster129.hosting.ovh.net",
            user: "bionovf",
            password: "ADMbiono123",
            secure: false
        });
        
        console.log("Connected to FTP server.");

        // Define the target folder on the FTP server
        const remoteDir = "/www/wp-content/themes/bionova-site";
        
        // Ensure remote dir exists and go to it
        await client.ensureDir(remoteDir);
        await client.cd(remoteDir);

        // Folders and files to ignore
        const ignoreList = [
            ".git",
            ".agent",
            "node_modules",
            "ui-ux-pro-max-skill",
            "temp_pre_restore_backup",
            "upload-ftp.js",
            "package.json",
            "package-lock.json",
            "deploy_tmp",
            "design-system"
        ];

        // Custom function to upload directory recursively while ignoring specific paths
        async function uploadDir(localPath, remotePath) {
            const items = fs.readdirSync(localPath);
            for (const item of items) {
                if (ignoreList.includes(item)) continue;
                
                const localItemPath = path.join(localPath, item);
                const remoteItemPath = remotePath === "/" ? `/${item}` : `${remotePath}/${item}`;
                
                const stat = fs.statSync(localItemPath);
                if (stat.isDirectory()) {
                    await client.ensureDir(remoteItemPath);
                    await uploadDir(localItemPath, remoteItemPath);
                } else {
                    console.log(`Uploading: ${localItemPath} -> ${remoteItemPath}`);
                    await client.uploadFrom(localItemPath, remoteItemPath);
                }
            }
        }

        console.log("Starting upload...");
        await uploadDir(__dirname, remoteDir);
        console.log("Upload completed successfully!");

    }
    catch(err) {
        console.error("Upload failed:", err);
    }
    client.close();
}

upload();
