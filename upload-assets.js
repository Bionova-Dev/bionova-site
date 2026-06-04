const ftp = require("basic-ftp");
const path = require("path");

async function uploadAssets() {
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
        
        const remotePath = "/www/wp-content/themes/bionova-site/assets/hero";
        console.log("Navigating to remote path: " + remotePath);
        
        await client.ensureDir(remotePath);
        
        client.trackProgress(info => {
            console.log(`File: ${info.name} (${info.bytesOverall} bytes)`);
        });

        console.log("Starting upload for assets/hero...");
        await client.uploadFromDir(path.join(__dirname, "assets/hero"), remotePath);
        
        console.log("Upload completed!");
    } catch (err) {
        console.error(err);
    }
    client.close();
}

uploadAssets();
