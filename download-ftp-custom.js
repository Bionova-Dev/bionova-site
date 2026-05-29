const ftp = require("basic-ftp");
const fs = require("fs");
const path = require("path");

async function downloadFile() {
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
        
        const remoteFilePath = "/www/wp-content/themes/bionova-site/js/pages/ProductDetailPage.js";
        const localFilePath = path.join(__dirname, "js", "pages", "ProductDetailPage.js.downloaded");
        
        console.log("Downloading " + remoteFilePath + " to " + localFilePath + "...");
        await client.downloadTo(localFilePath, remoteFilePath);
        console.log("Download completed successfully!");
    } catch (err) {
        console.error("Error downloading file:", err);
    }
    client.close();
}

downloadFile();
