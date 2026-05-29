const ftp = require("basic-ftp");
const fs = require("fs");

async function updateHtaccess() {
    const client = new ftp.Client();
    try {
        console.log("Connecting to FTP...");
        await client.access({
            host: "ftp.cluster129.hosting.ovh.net",
            user: "bionovf",
            password: "ADMbiono123",
            secure: false
        });
        
        console.log("Navigating to /public_html");
        await client.cd("/public_html");
        
        console.log("Downloading .htaccess...");
        let content = "";
        try {
            await client.downloadTo("remote-htaccess.txt", ".htaccess");
            content = fs.readFileSync("remote-htaccess.txt", "utf8");
        } catch (e) {
            console.log("No existing .htaccess found or error downloading it.", e);
        }
        
        if (!content.includes("BIONOVA - Règles de mise en cache")) {
            console.log("Adding caching rules...");
            const rules = `
# ==============================================================================
# BIONOVA - Règles de mise en cache globales
# ==============================================================================
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
    ExpiresByType application/font-woff2 "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
<IfModule mod_headers.c>
    <FilesMatch "\\.(css|js)$">
        Header set Cache-Control "public, max-age=2592000"
    </FilesMatch>
    <FilesMatch "\\.(webp|jpe?g|png|gif|svg|woff2?|ttf)$">
        Header set Cache-Control "public, max-age=31536000, immutable"
    </FilesMatch>
</IfModule>
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain text/html text/xml text/css application/javascript image/svg+xml
</IfModule>
# ==============================================================================
`;
            content = rules + "\n" + content;
            fs.writeFileSync("remote-htaccess.txt", content);
            
            console.log("Uploading modified .htaccess...");
            await client.uploadFrom("remote-htaccess.txt", ".htaccess");
            console.log("Done!");
        } else {
            console.log("Rules already exist in the root .htaccess.");
        }
        
    } catch (err) {
        console.error(err);
    }
    client.close();
}

updateHtaccess();
