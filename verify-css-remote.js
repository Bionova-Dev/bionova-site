const ftp = require('basic-ftp');
const fs = require('fs');

async function downloadCSS() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    await client.access({
      host:     'ftp.cluster129.hosting.ovh.net',
      user:     'bionovf',
      password: 'ADMbiono123',
      secure:   false
    });

    console.log('Downloading remote css/design-tokens.css...');
    await client.downloadTo('design-tokens-remote.css', '/www/wp-content/themes/bionova-site/css/design-tokens.css');
    console.log('Downloaded!');

  } catch (err) {
    console.error(err);
  }

  client.close();
}

downloadCSS();
