const ftp = require("basic-ftp")
const fs = require('fs');
const path = require('path');

const MODIFIED_FILES = [
  'inc/professional-account.php',
  'woocommerce-custom.css',
  'bionova-admin/js/form.js'
];

async function uploadChanged() {
    const client = new ftp.Client();
    client.ftp.verbose = true;
    try {
        await client.access({
            host: 'bionova.tn',
            user: 'bionova_ftp_user',
            password: 'SuperSecretPassword123!',
            secure: false
        });
        
        console.log('Upload fichiers modifiés...');
        for (const file of MODIFIED_FILES) {
            const localPath = path.join(__dirname, file);
            const remotePath = `/public_html/wp-content/themes/bionova-theme/${file}`;
            
            if (fs.existsSync(localPath)) {
                await client.uploadFrom(localPath, remotePath);
                console.log(`  Uploadé : ${file}`);
            } else {
                console.log(`  Ignoré (introuvable en local) : ${file}`);
            }
        }
        
        console.log('\nTerminé ! Tous les fichiers sont en ligne.');
    }
    catch(err) {
        console.log(err)
    }
    client.close();
}

uploadChanged();
