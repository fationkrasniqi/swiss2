import imagemin from 'imagemin';
import imageminWebp from 'imagemin-webp';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const originalsDir = path.join(__dirname, 'public', 'images', '_originals');
const outputDir = path.join(__dirname, 'public', 'images');

(async () => {
  await imagemin([`${originalsDir}/*.{jpg,jpeg,png}`], {
    destination: outputDir,
    plugins: [
      imageminWebp({quality: 80})
    ]
  });
  console.log('WebP conversion complete!');
})();
