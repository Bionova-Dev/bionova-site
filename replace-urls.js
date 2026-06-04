const fs = require('fs');
const path = require('path');

function processFile(filePath) {
  let content = fs.readFileSync(filePath, 'utf8');
  let original = content;

  // 1. Replace hardcoded uploads URLs with THEME_URI + assets path in JS
  if (filePath.endsWith('.js')) {
    content = content.replace(/"https:\/\/bionova\.tn\/wp-content\/uploads\/2026\/04\/([^"]+)\.png"/g, 'THEME_URI + "/assets/products/$1.webp"');
    content = content.replace(/"https:\/\/bionova\.tn\/wp-content\/uploads\/2026\/04\/([^"]+)\.jpg"/g, 'THEME_URI + "/assets/products/$1.webp"');
  }

  // 2. Replace hardcoded uploads URLs with get_template_directory_uri() in PHP
  if (filePath.endsWith('.php')) {
    content = content.replace(/"https:\/\/bionova\.tn\/wp-content\/uploads\/2026\/04\/([^"]+)\.png"/g, '"<?php echo get_template_directory_uri(); ?>/assets/products/$1.webp"');
    content = content.replace(/"https:\/\/bionova\.tn\/wp-content\/uploads\/2026\/04\/([^"]+)\.jpg"/g, '"<?php echo get_template_directory_uri(); ?>/assets/products/$1.webp"');
  }

  // 3. General replacement of .png to .webp for local theme references
  // We only replace .png if it's part of our assets
  content = content.replace(/\/assets\/(products|hero|blog|brand)\/([^"']+)\.png/g, '/assets/$1/$2.webp');
  
  // 4. In woocommerce.php, there are direct mappings like 'nmn.png'
  if (filePath.endsWith('woocommerce.php')) {
    content = content.replace(/\.png'/g, ".webp'");
  }

  if (content !== original) {
    fs.writeFileSync(filePath, content, 'utf8');
    console.log(`Updated: ${filePath}`);
  }
}

function traverse(dir) {
  const files = fs.readdirSync(dir);
  for (const file of files) {
    const fullPath = path.join(dir, file);
    if (fs.statSync(fullPath).isDirectory()) {
      if (['node_modules', '.git', '.vscode', '.agent', 'assets'].includes(file)) continue;
      traverse(fullPath);
    } else if (file.endsWith('.js') || file.endsWith('.php')) {
      processFile(fullPath);
    }
  }
}

traverse(__dirname);
console.log('Replacement finished!');
