const ftp = require('basic-ftp');
const fs = require('fs');

async function downloadHeader() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    await client.access({
      host:     'ftp.cluster129.hosting.ovh.net',
      user:     'bionovf',
      password: 'ADMbiono123',
      secure:   false
    });

    console.log('Downloading remote header.php...');
    await client.downloadTo('header-remote.php', '/www/wp-content/themes/bionova-site/header.php');
    console.log('Downloaded!');

  } catch (err) {
    console.error(err);
  }

  client.close();
}

downloadHeader();
