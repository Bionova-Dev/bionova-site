const ftp = require('basic-ftp');

async function listCache() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    await client.access({
      host:     'ftp.cluster129.hosting.ovh.net',
      user:     'bionovf',
      password: 'ADMbiono123',
      secure:   false
    });

    console.log('Listing /www/wp-content...');
    const list = await client.list('/www/wp-content');
    list.forEach(f => console.log(f.type === 2 ? 'DIR ' : 'FILE', f.name));

  } catch (err) {
    console.error(err);
  }

  client.close();
}

listCache();
