# 🔒 Panduan Keamanan Website SMPN 12 Gresik

## 🛡️ Status Keamanan Saat Ini

### ✅ Fitur Keamanan yang Sudah Ada (Laravel Default)

1. **CSRF Protection**
   - Laravel otomatis melindungi dari Cross-Site Request Forgery
   - Token CSRF di-generate untuk setiap form

2. **SQL Injection Protection**
   - Eloquent ORM dan Query Builder menggunakan prepared statements
   - Input otomatis di-escape

3. **XSS Protection**
   - Blade templating engine otomatis escape output
   - `{{ $variable }}` aman dari XSS

4. **Session Security**
   - Session ID di-regenerate secara otomatis
   - Secure session configuration

5. **Password Hashing**
   - Menggunakan bcrypt untuk hash password
   - Salt otomatis di-generate

### ⚠️ Yang Perlu Ditingkatkan untuk Production

## 🔧 Langkah-Langkah Pengamanan Wajib

### 1. Environment Configuration

**File `.env` Production:**
```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... # Generate key yang kuat

# Database dengan user terbatas
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smpn12_gresik
DB_USERNAME=smpn12_limited_user  # Bukan root!
DB_PASSWORD=StrongPassword123!@#

# Session security
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=true
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=strict

# Mail security
MAIL_ENCRYPTION=tls
```

### 2. Server Security (Apache/Nginx)

**Nginx Security Headers:**
```nginx
server {
    # SSL Configuration
    listen 443 ssl http2;
    ssl_certificate /path/to/certificate.crt;
    ssl_certificate_key /path/to/private.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers ECDHE-RSA-AES256-GCM-SHA512:DHE-RSA-AES256-GCM-SHA512;
    
    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;
    
    # Hide server information
    server_tokens off;
    
    # Rate limiting
    limit_req_zone $binary_remote_addr zone=login:10m rate=5r/m;
    
    location /login {
        limit_req zone=login burst=5 nodelay;
    }
    
    # Block common attack patterns
    location ~* \.(php|asp|aspx|jsp)$ {
        if ($request_uri !~ "^/index\.php") {
            return 444;
        }
    }
    
    # Deny access to sensitive files
    location ~ /\. {
        deny all;
    }
    
    location ~ /(vendor|storage|bootstrap|config|database|tests)/ {
        deny all;
    }
}
```

### 3. Database Security

**Buat User Database Terbatas:**
```sql
-- Jangan gunakan root untuk aplikasi!
CREATE USER 'smpn12_app'@'localhost' IDENTIFIED BY 'StrongPassword123!@#';
GRANT SELECT, INSERT, UPDATE, DELETE ON smpn12_gresik.* TO 'smpn12_app'@'localhost';
FLUSH PRIVILEGES;

-- Hapus user default yang tidak perlu
DROP USER IF EXISTS ''@'localhost';
DROP USER IF EXISTS ''@'%';
```

### 4. File Permissions

```bash
# Set ownership
sudo chown -R www-data:www-data /var/www/smpn12-gresik-website

# Set permissions
sudo find /var/www/smpn12-gresik-website -type f -exec chmod 644 {} \;
sudo find /var/www/smpn12-gresik-website -type d -exec chmod 755 {} \;

# Storage dan cache writable
sudo chmod -R 775 /var/www/smpn12-gresik-website/storage
sudo chmod -R 775 /var/www/smpn12-gresik-website/bootstrap/cache

# Protect sensitive files
sudo chmod 600 /var/www/smpn12-gresik-website/.env
```

### 5. Firewall Configuration

```bash
# UFW Firewall
sudo ufw enable
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'

# Fail2ban untuk brute force protection
sudo apt install fail2ban -y

# Konfigurasi fail2ban
sudo nano /etc/fail2ban/jail.local
```

**Fail2ban Configuration:**
```ini
[DEFAULT]
bantime = 3600
findtime = 600
maxretry = 5

[nginx-http-auth]
enabled = true
filter = nginx-http-auth
logpath = /var/log/nginx/error.log

[nginx-limit-req]
enabled = true
filter = nginx-limit-req
logpath = /var/log/nginx/error.log
```

## 🚨 Ancaman Keamanan dan Pencegahan

### 1. SQL Injection
**Status:** ✅ **AMAN** (Laravel ORM)
**Pencegahan Tambahan:**
- Selalu gunakan Eloquent atau Query Builder
- Jangan pernah concat string untuk query
- Validasi input dengan Laravel Validation

### 2. Cross-Site Scripting (XSS)
**Status:** ✅ **AMAN** (Blade Auto-escape)
**Pencegahan Tambahan:**
```php
// Gunakan {{ }} untuk auto-escape
{{ $user_input }}

// Jika perlu HTML, gunakan {!! !!} dengan hati-hati
{!! Purifier::clean($trusted_html) !!}
```

### 3. Cross-Site Request Forgery (CSRF)
**Status:** ✅ **AMAN** (Laravel CSRF)
**Implementasi:**
```html
<!-- Semua form harus ada CSRF token -->
<form method="POST" action="/contact">
    @csrf
    <!-- form fields -->
</form>
```

### 4. File Upload Vulnerabilities
**Status:** ⚠️ **PERLU IMPLEMENTASI**
**Pencegahan:**
```php
// Validasi file upload
$request->validate([
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
]);

// Rename file
$filename = time() . '.' . $request->image->extension();
$request->image->move(public_path('uploads'), $filename);
```

### 5. Brute Force Attacks
**Status:** ⚠️ **PERLU IMPLEMENTASI**
**Pencegahan:**
```php
// Rate limiting di routes/web.php
Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/contact', [ContactController::class, 'send']);
});
```

### 6. Directory Traversal
**Status:** ✅ **AMAN** (Laravel Structure)
**Pencegahan Tambahan:**
- Jangan expose folder vendor, storage, config
- Gunakan symbolic links untuk storage

## 🔐 Implementasi Keamanan Tambahan

### 1. Two-Factor Authentication (2FA)

```bash
composer require pragmarx/google2fa-laravel
```

### 2. Content Security Policy (CSP)

```php
// Middleware CSP
public function handle($request, Closure $next)
{
    $response = $next($request);
    $response->headers->set('Content-Security-Policy', 
        "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:;"
    );
    return $response;
}
```

### 3. Input Validation & Sanitization

```php
// Form Request Validation
class ContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9+\-\s]+$/',
            'message' => 'required|string|max:1000',
        ];
    }
    
    public function sanitize()
    {
        $input = $this->all();
        $input['name'] = strip_tags($input['name']);
        $input['message'] = strip_tags($input['message']);
        $this->replace($input);
    }
}
```

### 4. Logging & Monitoring

```php
// Log security events
Log::channel('security')->warning('Failed login attempt', [
    'ip' => $request->ip(),
    'user_agent' => $request->userAgent(),
    'email' => $request->email
]);
```

### 5. Regular Security Updates

```bash
# Update dependencies
composer update

# Security audit
composer audit

# Update server packages
sudo apt update && sudo apt upgrade -y
```

## 📊 Security Checklist

### ✅ Basic Security (Sudah Ada)
- [x] CSRF Protection
- [x] SQL Injection Protection
- [x] XSS Protection
- [x] Session Security
- [x] Password Hashing

### ⚠️ Production Security (Perlu Implementasi)
- [ ] SSL Certificate (HTTPS)
- [ ] Security Headers
- [ ] Rate Limiting
- [ ] File Upload Validation
- [ ] Input Sanitization
- [ ] Error Handling
- [ ] Logging & Monitoring
- [ ] Regular Backups
- [ ] Firewall Configuration
- [ ] Database User Restrictions

### 🔒 Advanced Security (Opsional)
- [ ] Two-Factor Authentication
- [ ] Content Security Policy
- [ ] Web Application Firewall (WAF)
- [ ] DDoS Protection
- [ ] Security Scanning
- [ ] Penetration Testing

## 🚨 Incident Response Plan

### 1. Jika Website Di-hack
```bash
# 1. Isolasi server
sudo ufw deny incoming

# 2. Backup data penting
mysqldump -u username -p database > backup-emergency.sql
tar -czf files-backup.tar.gz /var/www/smpn12-gresik-website

# 3. Analisis log
tail -f /var/log/nginx/access.log
tail -f /var/log/nginx/error.log
tail -f /var/www/smpn12-gresik-website/storage/logs/laravel.log

# 4. Restore dari backup bersih
# 5. Update semua password
# 6. Patch vulnerability
# 7. Monitor aktivitas
```

### 2. Monitoring Tools
- **Log Analysis**: GoAccess, AWStats
- **Security Scanning**: OWASP ZAP, Nikto
- **Uptime Monitoring**: UptimeRobot, Pingdom
- **File Integrity**: AIDE, Tripwire

## 📞 Rekomendasi Keamanan

### Untuk Sekolah (Budget Terbatas)
1. **Wajib**: SSL Certificate (Let's Encrypt - Gratis)
2. **Wajib**: Regular Backups (Daily)
3. **Wajib**: Strong Passwords
4. **Wajib**: Update Rutin
5. **Recommended**: Cloudflare (Gratis untuk basic protection)

### Untuk Production Serius
1. **Premium SSL Certificate**
2. **Web Application Firewall (WAF)**
3. **DDoS Protection**
4. **Security Monitoring Service**
5. **Professional Security Audit**

## ⚡ Quick Security Setup

```bash
#!/bin/bash
# Quick security setup script

# 1. Update system
sudo apt update && sudo apt upgrade -y

# 2. Install security tools
sudo apt install fail2ban ufw -y

# 3. Configure firewall
sudo ufw enable
sudo ufw default deny incoming
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'

# 4. Secure file permissions
sudo chown -R www-data:www-data /var/www/smpn12-gresik-website
sudo find /var/www/smpn12-gresik-website -type f -exec chmod 644 {} \;
sudo find /var/www/smpn12-gresik-website -type d -exec chmod 755 {} \;
sudo chmod 600 /var/www/smpn12-gresik-website/.env

# 5. Install SSL
sudo certbot --nginx -d yourdomain.com

echo "Basic security setup completed!"
```

## 🎯 Kesimpulan

**Status Keamanan Saat Ini: CUKUP AMAN untuk Development**

**Untuk Production: PERLU PENGUATAN KEAMANAN**

Website Laravel yang sudah dibuat memiliki foundation keamanan yang baik, tetapi untuk production environment (terutama untuk website sekolah yang akan diakses publik), perlu implementasi keamanan tambahan seperti:

1. SSL Certificate
2. Security Headers
3. Rate Limiting
4. Input Validation
5. Regular Monitoring
6. Backup Strategy

Dengan implementasi yang tepat, website ini bisa sangat aman dan sulit untuk di-hack. Laravel sendiri adalah framework yang sangat secure jika dikonfigurasi dengan benar.

