const fs = require('fs');
const path = require('path');

function processPhpFile(filePath) {
  let content = fs.readFileSync(filePath, 'utf8');
  let original = content;

  // 1. Remove all <script type="text/babel" ...> tags
  // The regex finds lines with text/babel and removes them
  content = content.replace(/<script type="text\/babel" src="[^"]+"><\/script>\n?/g, '');
  content = content.replace(/<script type="text\/babel" src='[^']+'><\/script>\n?/g, '');
  
  // Also remove the "<!-- 1. Data -->" type comments if we want, but it's fine to leave or remove.
  content = content.replace(/<!-- \d+\. [^-]+ -->\n?/g, '');
  content = content.replace(/<!-- Home Sections -->\n?/g, '');

  // 2. Inject the bundle.min.js right before <?php get_footer(); ?>
  if (original.includes('type="text/babel"')) {
    const bundleScript = '<script defer src="<?php echo get_template_directory_uri(); ?>/dist/bundle.min.js?v=<?php echo $v; ?>"></script>\n';
    content = content.replace(/<\?php get_footer\(\); \?>/, bundleScript + '<?php get_footer(); ?>');
  }

  if (content !== original) {
    fs.writeFileSync(filePath, content, 'utf8');
    console.log(`Updated: ${filePath}`);
  }
}

// Remove babel.min.js from header.php
function processHeader(filePath) {
  let content = fs.readFileSync(filePath, 'utf8');
  let original = content;
  content = content.replace(/<script src="https:\/\/unpkg\.com\/@babel\/standalone\/babel\.min\.js"><\/script>\n?/g, '');
  
  if (content !== original) {
    fs.writeFileSync(filePath, content, 'utf8');
    console.log(`Removed Babel from: ${filePath}`);
  }
}

function traverse(dir) {
  const files = fs.readdirSync(dir);
  for (const file of files) {
    const fullPath = path.join(dir, file);
    if (file === 'header.php') {
        processHeader(fullPath);
    } else if (file.endsWith('.php') && fs.statSync(fullPath).isFile()) {
      processPhpFile(fullPath);
    }
  }
}

traverse(__dirname);
console.log('Cleanup finished!');
