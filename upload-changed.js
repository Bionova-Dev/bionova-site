const ftp = require('basic-ftp');
const fs  = require('fs');
const path = require('path');

// Fichiers modifiés dans cette session
const MODIFIED_FILES = [
  'header.php',
  'js/organisms/HeroCarousel.js',
  'css/design-tokens.css',
  'style.css',
  'css/responsive.css'
];




async function uploadChanged() {
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

    const base = '/www/wp-content/themes/bionova-site';
    const distDir = base + '/dist';

    // 1. Supprimer les anciens bundles sur le serveur
    console.log('Nettoyage anciens bundles...');
    try {
      const remoteList = await client.list(distDir);
      for (const f of remoteList) {
        if (f.name.startsWith('bundle.v') && f.name.endsWith('.js')) {
          await client.remove(distDir + '/' + f.name);
          console.log('  Supprimé : ' + f.name);
        }
      }
    } catch (e) {
      console.log('  (Pas de dist distant ou déjà vide)');
    }

    // 2. Upload le nouveau bundle
    const localDistFiles = fs.readdirSync(path.join(__dirname, 'dist'));
    for (const f of localDistFiles) {
      if (f.startsWith('bundle.v') && f.endsWith('.js')) {
        await client.uploadFrom(path.join(__dirname, 'dist', f), distDir + '/' + f);
        console.log('  Bundle uploadé : ' + f);
      }
    }

    // 3. Upload les fichiers modifiés
    console.log('Upload fichiers modifiés...');
    for (const file of MODIFIED_FILES) {
      const localPath  = path.join(__dirname, file);
      const remotePath = base + '/' + file.replace(/\\/g, '/');
      const remoteDir  = remotePath.substring(0, remotePath.lastIndexOf('/'));

      await client.ensureDir(remoteDir);
      await client.uploadFrom(localPath, remotePath);
      console.log('  Uploadé : ' + file);
    }

    console.log('\nTerminé ! Tous les fichiers sont en ligne.');
  } catch (err) {
    console.error('Erreur FTP :', err.message);
  }

  client.close();
}

uploadChanged();
