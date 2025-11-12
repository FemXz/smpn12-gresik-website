# Struktur File Laravel - Website SMPN 12 Gresik

## 📁 Struktur Direktori Utama

```
smpn12-gresik-website/
├── app/                          # Logika aplikasi utama
│   ├── Console/                  # Artisan commands
│   ├── Exceptions/               # Exception handlers
│   ├── Http/                     # Controllers, Middleware, Requests
│   │   ├── Controllers/          # Controllers untuk handle request
│   │   │   ├── HomeController.php
│   │   │   ├── AboutController.php
│   │   │   ├── NewsController.php
│   │   │   ├── GalleryController.php
│   │   │   ├── ContactController.php
│   │   │   ├── StudentController.php
│   │   │   ├── TeacherController.php
│   │   │   └── FacilityController.php
│   │   ├── Middleware/           # Middleware untuk filter request
│   │   └── Requests/             # Form request validation
│   ├── Models/                   # Eloquent models (database)
│   └── Providers/                # Service providers
├── bootstrap/                    # Bootstrap aplikasi
├── config/                       # File konfigurasi
├── database/                     # Database migrations, seeders, factories
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/                       # File yang bisa diakses publik
│   ├── assets/                   # Asset website (logo, gambar)
│   │   └── logo-smp.png
│   ├── css/                      # CSS files
│   ├── js/                       # JavaScript files
│   └── index.php                 # Entry point aplikasi
├── resources/                    # Resources (views, assets)
│   ├── css/                      # CSS source files
│   ├── js/                       # JavaScript source files
│   └── views/                    # Blade templates
│       ├── layouts/
│       │   └── app.blade.php     # Layout utama
│       └── home.blade.php        # Homepage
├── routes/                       # Route definitions
│   ├── web.php                   # Web routes
│   ├── api.php                   # API routes
│   └── console.php               # Console routes
├── storage/                      # Storage untuk cache, logs, uploads
├── tests/                        # Unit dan feature tests
├── vendor/                       # Dependencies dari Composer
├── .env                          # Environment variables
├── .env.example                  # Template environment
├── artisan                       # Artisan CLI tool
├── composer.json                 # Composer dependencies
└── composer.lock                 # Composer lock file
```

## 🎯 Penjelasan Folder Penting

### 📂 app/Http/Controllers/
Berisi semua controller yang menangani logika bisnis:

- **HomeController.php**: Menangani halaman beranda
- **AboutController.php**: Menangani halaman tentang sekolah
- **NewsController.php**: Menangani berita dan pengumuman
- **GalleryController.php**: Menangani galeri foto dan video
- **ContactController.php**: Menangani form kontak
- **StudentController.php**: Menangani portal siswa dan akademik
- **TeacherController.php**: Menangani data guru dan staff
- **FacilityController.php**: Menangani informasi fasilitas

### 📂 resources/views/
Berisi template Blade untuk tampilan:

- **layouts/app.blade.php**: Template utama dengan navbar, footer, dan styling
- **home.blade.php**: Template halaman beranda
- **about/**: Folder untuk halaman tentang sekolah
- **news/**: Folder untuk halaman berita
- **gallery/**: Folder untuk halaman galeri
- **contact/**: Folder untuk halaman kontak

### 📂 routes/web.php
Berisi definisi semua route website:

```php
// Route utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route tentang sekolah
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
    Route::get('/history', [AboutController::class, 'history'])->name('about.history');
    Route::get('/vision-mission', [AboutController::class, 'visionMission'])->name('about.vision-mission');
});

// Route berita
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('news.show');
});

// Dan route lainnya...
```

### 📂 public/assets/
Berisi asset website:

- **logo-smp.png**: Logo sekolah SMPN 12 Gresik
- **images/**: Folder untuk gambar-gambar website
- **css/**: File CSS tambahan
- **js/**: File JavaScript tambahan

## 🔧 File Konfigurasi Penting

### .env
File environment variables yang berisi konfigurasi:

```env
APP_NAME="SMPN 12 Gresik"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smpn12_gresik
DB_USERNAME=root
DB_PASSWORD=
```

### composer.json
File yang mendefinisikan dependencies PHP:

```json
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "Website SMPN 12 Gresik",
    "require": {
        "php": "^8.1",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.2",
        "laravel/tinker": "^2.8"
    }
}
```

## 🎨 Fitur Website yang Sudah Dibuat

### 1. **Homepage Modern**
- Hero section dengan gradient background
- Statistik sekolah dengan animasi counter
- Berita terbaru dengan card design
- Agenda mendatang
- Fasilitas unggulan
- Call-to-action section

### 2. **Navigation System**
- Navbar responsif dengan dropdown
- Menu utama: Beranda, Tentang, Akademik, Guru & Staff, Fasilitas, Galeri, Berita, Kontak
- Portal Siswa button
- Mobile-friendly hamburger menu

### 3. **Design Features**
- Modern gradient design
- Smooth animations dengan AOS (Animate On Scroll)
- Responsive design untuk mobile dan desktop
- Custom CSS dengan CSS variables
- Bootstrap 5 integration
- Font Awesome icons
- Google Fonts (Inter & Poppins)

### 4. **Backend Structure**
- MVC pattern (Model-View-Controller)
- RESTful routing
- Blade templating engine
- Middleware untuk security
- Environment-based configuration

## 🚀 Cara Menjalankan Website

### Localhost Development:
```bash
# 1. Masuk ke direktori project
cd smpn12-gresik-website

# 2. Install dependencies
composer install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Jalankan development server
php artisan serve --host=0.0.0.0 --port=8000
```

### Production Deployment:
```bash
# 1. Upload files ke server
# 2. Install dependencies
composer install --optimize-autoloader --no-dev

# 3. Set environment
cp .env.example .env
# Edit .env sesuai server production

# 4. Generate key dan cache
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Set permissions
chmod -R 755 storage bootstrap/cache
```

## 📱 Responsive Design

Website ini sudah dioptimasi untuk:
- **Desktop**: Layout full dengan sidebar dan multiple columns
- **Tablet**: Layout yang disesuaikan dengan breakpoint medium
- **Mobile**: Single column layout dengan hamburger menu

## 🎯 Teknologi yang Digunakan

- **Backend**: Laravel 10 (PHP 8.1+)
- **Frontend**: HTML5, CSS3, JavaScript ES6
- **CSS Framework**: Bootstrap 5
- **Icons**: Font Awesome 6
- **Fonts**: Google Fonts (Inter, Poppins)
- **Animations**: AOS (Animate On Scroll)
- **Database**: MySQL (siap untuk integrasi)

## 📋 Fitur yang Bisa Dikembangkan

1. **Database Integration**: Koneksi ke MySQL untuk data dinamis
2. **Admin Panel**: Dashboard untuk mengelola konten
3. **User Authentication**: Login sistem untuk siswa dan guru
4. **Content Management**: CRUD untuk berita, galeri, dll
5. **File Upload**: Upload gambar dan dokumen
6. **Search Function**: Pencarian konten website
7. **Multi-language**: Dukungan bahasa Indonesia dan Inggris
8. **SEO Optimization**: Meta tags dan sitemap
9. **Performance**: Caching dan optimization
10. **Security**: CSRF protection, input validation

Website ini sudah memiliki foundation yang kuat dan siap untuk dikembangkan lebih lanjut sesuai kebutuhan sekolah.



## 🎯 Fitur Admin Panel Terbaru

### Backend Admin Panel
- **Dashboard Admin**: 
  - Statistik real-time (Total Berita, Ekstrakurikuler, Pengunjung)
  - Cards informatif dengan ikon dan warna yang menarik
  - Quick Actions untuk akses cepat ke fitur utama
  - Tabel berita terbaru dengan status publikasi

- **Manajemen Berita**: 
  - CRUD lengkap (Create, Read, Update, Delete)
  - Form tambah/edit dengan validasi lengkap
  - Upload gambar dengan preview dan validasi ukuran/format
  - Sistem publikasi (Published/Draft) dengan checkbox
  - Auto-generate slug dari judul untuk SEO-friendly URLs
  - Tips menulis berita di sidebar form

- **Manajemen Ekstrakurikuler**: 
  - CRUD lengkap untuk kegiatan ekstrakurikuler
  - Upload gambar kegiatan dengan preview
  - Informasi jadwal dan pembina yang terstruktur
  - Deskripsi lengkap kegiatan
  - Auto-generate slug untuk URL yang SEO-friendly

- **Upload System**: 
  - Validasi format file (JPEG, PNG, JPG, GIF)
  - Validasi ukuran maksimal 2MB
  - Auto-resize gambar jika diperlukan
  - Penyimpanan terorganisir di direktori uploads/

- **Admin Interface**: 
  - Sidebar navigation yang responsif
  - Design modern dengan Bootstrap 5
  - Color-coded menu items
  - Breadcrumb navigation
  - Responsive design untuk semua device

## 📂 Struktur Admin Panel

```
app/Http/Controllers/Admin/
├── DashboardController.php       # Dashboard admin dengan statistik
├── NewsController.php            # CRUD berita dengan upload gambar
└── ExtracurricularController.php # CRUD ekstrakurikuler

app/Models/
├── News.php                      # Model berita dengan fillable fields
└── Extracurricular.php          # Model ekstrakurikuler

resources/views/admin/
├── layouts/
│   └── app.blade.php            # Layout admin dengan sidebar
├── dashboard.blade.php          # Dashboard dengan cards dan statistik
├── news/
│   ├── index.blade.php          # Daftar berita dengan tabel
│   ├── create.blade.php         # Form tambah berita
│   └── edit.blade.php           # Form edit berita
└── extracurriculars/
    ├── index.blade.php          # Daftar ekstrakurikuler
    ├── create.blade.php         # Form tambah ekstrakurikuler
    └── edit.blade.php           # Form edit ekstrakurikuler

database/migrations/
├── create_news_table.php        # Tabel berita dengan fields lengkap
└── create_extracurriculars_table.php # Tabel ekstrakurikuler

public/uploads/
├── news/                        # Upload gambar berita
└── extracurriculars/           # Upload gambar ekstrakurikuler
```

## 🔧 Database Schema

### Tabel News
```sql
- id (Primary Key)
- title (VARCHAR 255) - Judul berita
- slug (VARCHAR 255) - URL-friendly slug
- content (TEXT) - Konten berita
- image (VARCHAR 255) - Path gambar
- author (VARCHAR 255) - Penulis
- is_published (BOOLEAN) - Status publikasi
- published_at (TIMESTAMP) - Tanggal publikasi
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Tabel Extracurriculars
```sql
- id (Primary Key)
- name (VARCHAR 255) - Nama ekstrakurikuler
- slug (VARCHAR 255) - URL-friendly slug
- description (TEXT) - Deskripsi kegiatan
- image (VARCHAR 255) - Path gambar
- schedule (VARCHAR 255) - Jadwal kegiatan
- teacher_in_charge (VARCHAR 255) - Pembina
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

## 🚀 Cara Menggunakan Admin Panel

### Akses Admin Panel
1. Buka browser dan akses: `http://localhost:8000/admin/dashboard`
2. Dashboard akan menampilkan statistik dan overview konten
3. Gunakan sidebar untuk navigasi ke fitur yang diinginkan

### Mengelola Berita
1. Klik menu "Berita" di sidebar
2. Klik "Tambah Berita" untuk membuat berita baru
3. Isi form dengan lengkap (judul, konten, gambar, penulis)
4. Centang "Publikasikan sekarang" jika ingin langsung publish
5. Klik "Simpan Berita"

### Mengelola Ekstrakurikuler
1. Klik menu "Ekstrakurikuler" di sidebar
2. Klik "Tambah Ekstrakurikuler" untuk membuat data baru
3. Isi informasi lengkap (nama, deskripsi, jadwal, pembina)
4. Upload gambar kegiatan jika ada
5. Klik "Simpan Ekstrakurikuler"

## 📋 Validasi dan Keamanan

### Validasi Form
- **Berita**: Judul dan konten wajib diisi, gambar opsional dengan validasi format dan ukuran
- **Ekstrakurikuler**: Nama dan deskripsi wajib diisi, field lain opsional
- **Upload**: Validasi format file (image), maksimal 2MB

### Keamanan
- CSRF protection pada semua form
- Validasi input server-side
- Sanitasi data sebelum disimpan ke database
- Upload file dengan validasi ketat

## 🎨 Design dan UX

### Admin Interface
- **Modern Design**: Menggunakan Bootstrap 5 dengan custom styling
- **Color Coding**: Menu dan cards menggunakan warna yang konsisten
- **Responsive**: Tampilan optimal di desktop, tablet, dan mobile
- **User-Friendly**: Interface intuitif dengan navigasi yang jelas

### User Experience
- **Quick Actions**: Akses cepat ke fitur utama dari dashboard
- **Breadcrumb**: Navigasi yang jelas untuk orientasi pengguna
- **Feedback**: Pesan sukses/error yang informatif
- **Preview**: Preview gambar sebelum upload

