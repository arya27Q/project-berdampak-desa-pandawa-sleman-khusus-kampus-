# 🚀 Setup Deployment & CI/CD: Pandawa Kencana

Sebagai DevOps Engineer, dokumen ini memuat strategi *deployment*, manajemen *environment*, dan *pipeline* otomatisasi untuk rilis aplikasi dengan konsep aman dan *Zero Downtime*.

## 1. Environment Strategy
- **Staging (`staging.pandawakencana.id`)**: Cabang `develop`. Lingkungan tiruan produksi untuk QA & E2E Testing (Playwright). Menggunakan basis data terpisah (bersih, tersanitasi).
- **Production (`pandawakencana.id`)**: Cabang `main`. *Source of Truth*.
- **Secret Management**: Tidak ada file `.env` di dalam repositori. Semua *secrets* (DB_PASSWORD, APP_KEY) disimpan secara eksklusif di Github Secrets (untuk CI) dan Secret Manager server (Docker Swarm/K8s/Laravel Forge).

## 2. Dockerfile (Optimasi Multi-stage & Keamanan Non-Root)
File `Dockerfile` berikut dikonfigurasi khusus untuk PHP 8.3 & Nginx dengan *image* seminimal mungkin (Alpine).

```dockerfile
# Stage 1: Build Assets (Vite)
FROM node:20-alpine as frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Build PHP Dependencies
FROM composer:2.7 as vendor
WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --prefer-dist

# Stage 3: Production Image
FROM php:8.3-fpm-alpine
WORKDIR /var/www/html

# Install ekstensi esensial (PDO MySQL)
RUN docker-php-ext-install pdo_mysql

# Copy code dari stage sebelumnya
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY --from=frontend /app/public/build/ /var/www/html/public/build/
COPY . /var/www/html/

# Setup ownership ke non-root user (www-data) demi keamanan
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
USER www-data

EXPOSE 9000
CMD ["php-fpm"]
```

## 3. Pipeline Stages (GitHub Actions CI/CD)
Buat file di `.github/workflows/deploy.yml`. *Pipeline* ini akan mem-validasi kode dan melakukan *deploy* otomatis ke server via SSH/Docker.

```yaml
name: CI/CD Pipeline

on:
  push:
    branches: [ "main" ]

jobs:
  lint-and-test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'
      - name: Install Composer Dependencies
        run: composer install --prefer-dist --no-progress --no-suggest
      
      - name: Setup Node
        uses: actions/setup-node@v4
        with:
          node-version: '20'
      - name: Install NPM Dependencies
        run: npm ci
        
      # Stage: Lint & Build Frontend
      - name: Build Vite
        run: npm run build

      # Stage: Test Backend
      - name: Copy .env
        run: cp .env.example .env
      - name: Generate Key
        run: php artisan key:generate
      - name: Run Pest/PHPUnit
        run: php artisan test

  deploy:
    needs: lint-and-test
    runs-on: ubuntu-latest
    steps:
      - name: Deploy to Server via SSH
        uses: appleboy/ssh-action@v1.0.0
        with:
          host: ${{ secrets.SERVER_HOST }}
          username: ${{ secrets.SERVER_USER }}
          key: ${{ secrets.SERVER_SSH_KEY }}
          script: |
            cd /var/www/pandawa
            git pull origin main
            composer install --no-dev --optimize-autoloader
            npm ci && npm run build
            php artisan migrate --force
            php artisan config:cache
            php artisan route:cache
            php artisan view:cache
```

## 4. Rollback Plan (Zero-Downtime)
Jika terjadi kegagalan sistem (*Crash / Error 500*) pasca-deploy:
1. **Automated Check:** Jika *pipeline deploy* mendeteksi `php artisan migrate` gagal, skrip harus otomatis melakukan `git checkout HEAD^` dan merestart layanan.
2. **Manual Rollback:** Jika lolos CI namun bug muncul di UI, DevOps cukup menjalankan perintah `git reset --hard HEAD~1` pada server dan memanggil kembali `php artisan config:cache` & `npm run build`.
3. **Database Backup:** Server wajib dikonfigurasi untuk melakukan rotasi *backup SQL* setiap 12 jam (sebelum rilis dilakukan). Jika migrasi merusak data tabel, *rollback database* dilakukan dari skrip *dump* terakhir.
