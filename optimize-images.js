const fs = require('fs');
const path = require('path');
const sharp = require('sharp');

const directories = [
  'assets/products',
  'assets/hero',
  'assets/blog',
  'assets/brand'
];

async function optimizeImages() {
  for (const dir of directories) {
    const fullPath = path.join(__dirname, dir);
    if (!fs.existsSync(fullPath)) continue;

    const files = fs.readdirSync(fullPath);
    for (const file of files) {
      if (file.endsWith('.png') || file.endsWith('.jpg') || file.endsWith('.jpeg')) {
        const inputPath = path.join(fullPath, file);
        const outputName = file.replace(/\.(png|jpg|jpeg)$/, '.webp');
        const outputPath = path.join(fullPath, outputName);

        try {
          const metadata = await sharp(inputPath).metadata();
          let pipeline = sharp(inputPath);
          
          // Resize if width > 1200px to save more space for web
          if (metadata.width > 1200) {
            pipeline = pipeline.resize(1200, null, { withoutEnlargement: true });
          }

          await pipeline
            .webp({ quality: 80 })
            .toFile(outputPath);
          
          console.log(`Optimized: ${file} -> ${outputName}`);
          
          // Remove old file
          fs.unlinkSync(inputPath);
          console.log(`Deleted: ${file}`);
        } catch (error) {
          console.error(`Error processing ${file}:`, error);
        }
      }
    }
  }
}

optimizeImages().then(() => console.log('All images optimized successfully!'));
