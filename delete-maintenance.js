const ftp = require('basic-ftp');

async function deleteMaintenance() {
  const client = new ftp.Client();
  client.ftp.verbose = false;

  try {
    console.log('Connexion FTP...');
    await client.access({
      host:     'ftp.cluster129.hosting.ovh.net',
      user:     'bionovf',
      password: 'ADMbiono123',
      secure:   false
    });

    console.log('Tentative de suppression de /www/.maintenance...');
    await client.remove('/www/.maintenance');
    console.log('Fichier supprimé avec succès !');

  } catch (err) {
    console.error('Erreur FTP :', err.message);
  }

  client.close();
}

deleteMaintenance();
