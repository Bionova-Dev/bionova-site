const ftp = require('basic-ftp');
const fs = require('fs');

async function checkRoot() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    await client.access({
      host: 'ftp.cluster129.hosting.ovh.net',
      user: 'bionovf',
      password: 'ADMbiono123',
      secure: false
    });

    // 1. Check root .htaccess
    console.log('=== Contenu de /www/ ===');
    const rootFiles = await client.list('/www');
    for (const f of rootFiles) {
      if (f.name === '.htaccess' || f.name === 'index.php' || f.name === 'wp-config.php') {
        console.log(`  ${f.name} (${f.size} bytes)`);
      }
    }

    // 2. Download root .htaccess to check it
    const tmpFile = __dirname + '/tmp_root_htaccess.txt';
    await client.downloadTo(tmpFile, '/www/.htaccess');
    const content = fs.readFileSync(tmpFile, 'utf8');
    console.log('\n=== Root .htaccess ===');
    console.log(content);
    fs.unlinkSync(tmpFile);

  } catch (err) {
    console.error('Erreur:', err.message);
  }

  client.close();
}

checkRoot();
