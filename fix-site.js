const ftp = require("basic-ftp");
const fs = require("fs");

async function fix() {
    const client = new ftp.Client();
    client.ftp.verbose = false;
    try {
        await client.access({
            host: "ftp.cluster129.hosting.ovh.net",
            user: "bionovf",
            password: "ADMbiono123",
            secure: false
        });
        
        console.log("Connected to FTP server.");

        const wpIndex = `<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
`;
        fs.writeFileSync("temp_index.php", wpIndex);

        const wpHtaccess = `# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
`;
        fs.writeFileSync("temp_htaccess.txt", wpHtaccess);

        console.log("Uploading fixed index.php and .htaccess...");
        await client.uploadFrom("temp_index.php", "/www/index.php");
        await client.uploadFrom("temp_htaccess.txt", "/www/.htaccess");
        
        // Let's try to find the theme directory
        const themes = await client.list("/www/wp-content/themes");
        console.log("Available themes:");
        for(let t of themes) {
            console.log(t.name);
        }

    } catch(err) {
        console.error("Fix failed:", err);
    }
    client.close();
}
fix();
