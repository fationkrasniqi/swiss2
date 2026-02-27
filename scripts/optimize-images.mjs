import sharp from 'sharp';
import { readdirSync, mkdirSync, existsSync, renameSync, unlinkSync, statSync } from 'fs';
import { join, extname, basename } from 'path';

const imgDir = join(process.cwd(), 'public', 'images');
const backupDir = join(imgDir, '_originals');

// Create backup folder
if (!existsSync(backupDir)) mkdirSync(backupDir);

const files = readdirSync(imgDir).filter(f => {
  const ext = extname(f).toLowerCase();
  return ['.png', '.jpg', '.jpeg'].includes(ext) && !f.startsWith('.');
});

console.log(`\nOptimizing ${files.length} images...\n`);

let totalBefore = 0, totalAfter = 0;

for (const file of files) {
  const src = join(imgDir, file);
  const stat = statSync(src);
  if (stat.isDirectory()) continue;
  
  const sizeBefore = stat.size;
  totalBefore += sizeBefore;

  // Backup original
  renameSync(src, join(backupDir, file));
  const backupPath = join(backupDir, file);

  const ext = extname(file).toLowerCase();
  const name = basename(file, extname(file));
  
  // Get metadata to decide resize
  const meta = await sharp(backupPath).metadata();
  
  // Max dimensions: 1200px wide for content images, 1920 for cover
  const maxWidth = file.startsWith('cover') ? 1920 : 
                   file.startsWith('logo') ? 400 : 
                   file.startsWith('doctor') ? 600 : 
                   file.startsWith('service') ? 800 : 1200;

  const needsResize = meta.width > maxWidth;

  let pipeline = sharp(backupPath);
  
  if (needsResize) {
    pipeline = pipeline.resize(maxWidth, null, { withoutEnlargement: true });
  }

  // Convert everything to WebP for best compression
  const webpPath = join(imgDir, name + '.webp');
  await pipeline
    .webp({ quality: 80, effort: 6 })
    .toFile(webpPath);

  // Also create a JPEG fallback with same name for backward compat
  const jpegPath = join(imgDir, name + '.jpg');
  await sharp(backupPath)
    .resize(maxWidth, null, { withoutEnlargement: true })
    .jpeg({ quality: 82, mozjpeg: true })
    .toFile(jpegPath);

  const webpSize = statSync(webpPath).size;
  const jpegSize = statSync(jpegPath).size;
  
  // Keep the smaller one as primary, remove the bigger fallback
  const bestSize = Math.min(webpSize, jpegSize);
  totalAfter += webpSize; // We'll use webp in views

  const savedPct = ((1 - webpSize / sizeBefore) * 100).toFixed(0);
  console.log(`  ${file.padEnd(20)} ${(sizeBefore/1024).toFixed(0).padStart(6)}KB → ${(webpSize/1024).toFixed(0).padStart(5)}KB webp  (${savedPct}% saved)`);
}

console.log(`\n  TOTAL: ${(totalBefore/1024/1024).toFixed(1)}MB → ${(totalAfter/1024/1024).toFixed(1)}MB webp`);
console.log(`  Saved: ${((1 - totalAfter/totalBefore) * 100).toFixed(0)}%`);
console.log(`\n  Originals backed up to: public/images/_originals/`);
console.log(`  WebP versions created for all images.`);
console.log(`  JPEG fallbacks also created.\n`);
