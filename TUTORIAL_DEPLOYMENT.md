# 🚀 Tutorial Deployment Website SMPN 12 Gresik

## 📋 Daftar Isi
1. [Testing di Localhost](#testing-di-localhost)
2. [Deployment ke Server Online](#deployment-ke-server-online)
3. [Konfigurasi Domain](#konfigurasi-domain)
4. [Troubleshooting](#troubleshooting)

---

## 🏠 Testing di Localhost

### Prasyarat
Pastikan sudah terinstall:
- **PHP 8.1+** 
- **Composer**
- **MySQL** (opsional untuk development)
- **Git** (untuk clone repository)

### Langkah 1: Persiapan Environment

```bash
# 1. Clone atau download project
git clone <repository-url> smpn12-gresik-website
# atau extract file zip ke folder smpn12-gresik-website

# 2. Masuk ke direktori project
cd smpn12-gresik-website

# 3. Install dependencies PHP
composer install

# 4. Copy file environment
cp .env.example .env
```

### Langkah 2: Konfigurasi Environment

Edit file `.env`:

```env
APP_NAME="SMPN 12 Gresik"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database (opsional untuk development)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smpn12_gresik
DB_USERNAME=root
DB_PASSWORD=

# Mail Configuration (untuk form kontak)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

### Langkah 3: Generate Application Key

```bash
php artisan key:generate
```

### Langkah 4: Jalankan Development Server

```bash
# Jalankan server Laravel
php artisan serve

# Atau dengan custom host dan port
php artisan serve --host=0.0.0.0 --port=8000
```

### Langkah 5: Akses Website

Buka browser dan akses:
- **URL**: `http://localhost:8000`
- **Homepage**: Akan menampilkan halaman beranda dengan design modern
- **Navigation**: Test semua menu navigasi

### ✅ Checklist Testing Localhost

- [ ] Homepage loading dengan benar
- [ ] Logo sekolah tampil
- [ ] Navigation menu berfungsi
- [ ] Responsive design di mobile
- [ ] Animasi berjalan smooth
- [ ] Tidak ada error di console browser

---

## 🌐 Deployment ke Server Online

### Pilihan 1: Shared Hosting (cPanel)

#### Langkah 1: Persiapan Files

```bash
# 1. Buat file zip untuk upload
zip -r smpn12-gresik-website.zip smpn12-gresik-website/

# 2. Atau gunakan Git untuk clone langsung di server
```

#### Langkah 2: Upload ke Hosting

1. **Login ke cPanel**
2. **Buka File Manager**
3. **Upload file zip ke public_html**
4. **Extract file zip**
5. **Pindahkan isi folder smpn12-gresik-website ke public_html**

#### Langkah 3: Install Dependencies

```bash
# Via SSH atau Terminal di cPanel
cd public_html
composer install --optimize-autoloader --no-dev
```

#### Langkah 4: Konfigurasi Environment

```bash
# Copy dan edit .env
cp .env.example .env
nano .env
```

Edit sesuai server hosting:

```env
APP_NAME="SMPN 12 Gresik"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

#### Langkah 5: Generate Key dan Cache

```bash
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### Langkah 6: Set Permissions

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Pilihan 2: VPS/Cloud Server (Ubuntu)

#### Langkah 1: Setup Server

```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install PHP 8.1
sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mysql \
php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml \
php8.1-bcmath php8.1-fpm -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Nginx
sudo apt install nginx -y

# Install MySQL
sudo apt install mysql-server -y
```

#### Langkah 2: Clone Project

```bash
# Clone ke direktori web
cd /var/www
sudo git clone <repository-url> smpn12-gresik-website
sudo chown -R www-data:www-data smpn12-gresik-website
cd smpn12-gresik-website
```

#### Langkah 3: Install Dependencies

```bash
composer install --optimize-autoloader --no-dev
```

#### Langkah 4: Konfigurasi Nginx

Buat file konfigurasi:

```bash
sudo nano /etc/nginx/sites-available/smpn12-gresik
```

Isi dengan:

```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/smpn12-gresik-website/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

#### Langkah 5: Aktifkan Site

```bash
sudo ln -s /etc/nginx/sites-available/smpn12-gresik /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

#### Langkah 6: Setup Database

```bash
sudo mysql
```

```sql
CREATE DATABASE smpn12_gresik;
CREATE USER 'smpn12_user'@'localhost' IDENTIFIED BY 'strong_password';
GRANT ALL PRIVILEGES ON smpn12_gresik.* TO 'smpn12_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### Langkah 7: Konfigurasi Laravel

```bash
cp .env.example .env
nano .env
```

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smpn12_gresik
DB_USERNAME=smpn12_user
DB_PASSWORD=strong_password
```

```bash
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### Langkah 8: Set Permissions

```bash
sudo chown -R www-data:www-data /var/www/smpn12-gresik-website
sudo chmod -R 755 /var/www/smpn12-gresik-website
sudo chmod -R 775 /var/www/smpn12-gresik-website/storage
sudo chmod -R 775 /var/www/smpn12-gresik-website/bootstrap/cache
```

### Pilihan 3: Platform Cloud (Heroku, DigitalOcean App Platform)

#### Heroku Deployment

1. **Install Heroku CLI**
2. **Login ke Heroku**

```bash
heroku login
```

3. **Buat aplikasi Heroku**

```bash
heroku create smpn12-gresik-website
```

4. **Tambahkan Procfile**

```bash
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile
```

5. **Deploy**

```bash
git add .
git commit -m "Deploy to Heroku"
git push heroku main
```

6. **Set environment variables**

```bash
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
```

---

## 🌍 Konfigurasi Domain

### Menghubungkan Domain ke Hosting

1. **Login ke Domain Provider**
2. **Ubah Nameservers** ke hosting provider
3. **Atau set A Record** ke IP server

### SSL Certificate

#### Untuk cPanel Hosting:
- Gunakan Let's Encrypt melalui cPanel
- Atau SSL gratis dari hosting provider

#### Untuk VPS:
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx -y

# Generate SSL
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Auto renewal
sudo crontab -e
# Tambahkan: 0 12 * * * /usr/bin/certbot renew --quiet
```

---

## 🔧 Troubleshooting

### Error 500 - Internal Server Error

**Penyebab & Solusi:**

1. **File permissions salah**
```bash
chmod -R 755 storage bootstrap/cache
```

2. **APP_KEY tidak di-generate**
```bash
php artisan key:generate
```

3. **Cache error**
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Error 404 - Page Not Found

**Penyebab & Solusi:**

1. **URL Rewrite tidak aktif**
   - Pastikan mod_rewrite aktif di Apache
   - Atau konfigurasi Nginx sudah benar

2. **Document root salah**
   - Pastikan pointing ke folder `public/`

### Database Connection Error

**Penyebab & Solusi:**

1. **Kredensial database salah**
   - Cek username, password, database name di `.env`

2. **Database server tidak running**
```bash
sudo systemctl start mysql
```

### Permission Denied

**Solusi:**
```bash
sudo chown -R www-data:www-data /path/to/project
sudo chmod -R 755 /path/to/project
sudo chmod -R 775 storage bootstrap/cache
```

### Composer Install Error

**Solusi:**
```bash
# Update Composer
composer self-update

# Install dengan memory limit
php -d memory_limit=-1 /usr/local/bin/composer install
```

---

## 📞 Support & Maintenance

### Backup Regular

```bash
# Backup files
tar -czf backup-$(date +%Y%m%d).tar.gz /var/www/smpn12-gresik-website

# Backup database
mysqldump -u username -p database_name > backup-$(date +%Y%m%d).sql
```

### Update Laravel

```bash
# Update dependencies
composer update

# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Monitoring

- **Log files**: `storage/logs/laravel.log`
- **Server logs**: `/var/log/nginx/error.log`
- **Performance**: Gunakan tools seperti GTmetrix, PageSpeed Insights

---

## ✅ Checklist Deployment

### Pre-deployment:
- [ ] Testing di localhost berhasil
- [ ] Environment variables sudah dikonfigurasi
- [ ] Database sudah disiapkan
- [ ] Domain sudah pointing ke server

### Post-deployment:
- [ ] Website dapat diakses via domain
- [ ] SSL certificate aktif (HTTPS)
- [ ] Semua halaman loading dengan benar
- [ ] Form kontak berfungsi
- [ ] Mobile responsive
- [ ] Performance optimization
- [ ] Backup system setup

**🎉 Selamat! Website SMPN 12 Gresik sudah online dan siap digunakan!**

