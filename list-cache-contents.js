const ftp = require('basic-ftp');

async function listCacheContents() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    await client.access({
      host:     'ftp.cluster129.hosting.ovh.net',
      user:     'bionovf',
      password: 'ADMbiono123',
      secure:   false
    });

    console.log('Listing /www/wp-content/cache...');
    const list = await client.list('/www/wp-content/cache');
    list.forEach(f => console.log(f.type === 2 ? 'DIR ' : 'FILE', f.name));

  } catch (err) {
    console.error(err);
  }

  client.close();
}

listCacheContents();
