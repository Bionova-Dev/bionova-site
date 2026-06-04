const fs = require('fs');
const path = require('path');
const esbuild = require('esbuild');

const filesToBundle = [
    'js/data/wc-config.js',
    'js/data/products.js',
    'js/data/articles.js',
    'js/data/categories.js',
    'js/icons/icons.js',
    'js/atoms/Accordion.js',
    'js/atoms/InteractiveViewer.js',
    'js/molecules/ProductCard.js',
    'js/molecules/CategoryBar.js',
    'js/organisms/HeroCarousel.js',
    'js/organisms/home/HomeStats.js',
    'js/organisms/home/HomeCategories.js',
    'js/organisms/home/HomeBestSellers.js',
    'js/organisms/home/HomePacks.js',
    'js/organisms/home/HomeTestimonials.js',
    'js/organisms/home/HomeExpertise.js',
    'js/organisms/home/HomeBlog.js',
    'js/organisms/home/HomeContact.js',
    'js/pages/HomePage.js',
    'js/pages/ProductsPage.js',
    'js/pages/ProductDetailPage.js',
    'js/pages/BlogPage.js',
    'js/pages/ArticlePage.js',
    'js/pages/AboutPage.js',
    'js/pages/ContactPage.js',
    'js/AppRouter.js',
    'js/app.js'
];

async function build() {
    let concatenatedCode = '';
    
    // Add a wrapper or just concatenate. Since they are global, we just concatenate.
    // However, some might use `const` and if we re-declare them, it's fine as long as they are in the same block.
    // Actually, just concatenating them as they were loaded via <script> tags.
    for (const file of filesToBundle) {
        const filePath = path.join(__dirname, file);
        if (fs.existsSync(filePath)) {
            const content = fs.readFileSync(filePath, 'utf8');
            concatenatedCode += `\n/* --- ${file} --- */\n` + content;
        } else {
            console.error(`Missing file: ${file}`);
        }
    }

    const distDir = path.join(__dirname, 'dist');
    if (!fs.existsSync(distDir)) {
        fs.mkdirSync(distDir);
    }

    // Clean up any old bundle.v*.js files in dist/
    const files = fs.readdirSync(distDir);
    for (const file of files) {
        if (file.startsWith('bundle.v') && file.endsWith('.js')) {
            fs.unlinkSync(path.join(distDir, file));
            console.log(`Deleted old bundle: ${file}`);
        }
    }

    // Save temporary concatenated file
    const tempFile = path.join(distDir, 'temp-bundle.jsx');
    fs.writeFileSync(tempFile, concatenatedCode);

    // Generate unique timestamp for cache busting
    const timestamp = Math.floor(Date.now() / 1000);
    const bundleName = `bundle.v${timestamp}.js`;
    const outfile = path.join(distDir, bundleName);

    try {
        console.log('Compiling with esbuild...');
        await esbuild.build({
            entryPoints: [tempFile],
            bundle: false, // We already concatenated
            outfile: outfile,
            minify: true,
            loader: { '.jsx': 'jsx' },
            target: ['es2015'] // Ensure compatibility
        });
        console.log(`Build successful! -> dist/${bundleName}`);
        
        // Clean up temp file
        fs.unlinkSync(tempFile);
    } catch (err) {
        console.error('Build failed:', err);
    }
}

build();
