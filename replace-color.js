const fs = require('fs');
const path = require('path');

const targetDir = __dirname;
const searchRegex = /#e4002b/gi;
const replacement = '#e4002b';

const extWhitelist = ['.php', '.css', '.js', '.html', '.md'];
const excludeDirs = ['node_modules', '.git', '.github', '.gemini', 'bionova-admin/node_modules'];

function walk(dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(function (file) {
        if (excludeDirs.includes(file)) return;
        const fullPath = path.join(dir, file);
        const stat = fs.statSync(fullPath);
        if (stat && stat.isDirectory()) {
            results = results.concat(walk(fullPath));
        } else {
            if (extWhitelist.includes(path.extname(fullPath))) {
                results.push(fullPath);
            }
        }
    });
    return results;
}

const allFiles = walk(targetDir);
let changedCount = 0;

allFiles.forEach(file => {
    const content = fs.readFileSync(file, 'utf8');
    if (searchRegex.test(content)) {
        const newContent = content.replace(searchRegex, replacement);
        fs.writeFileSync(file, newContent, 'utf8');
        console.log(`Updated: ${file}`);
        changedCount++;
    }
});

console.log(`Total files updated: ${changedCount}`);
