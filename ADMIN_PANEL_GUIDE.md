# Panduan Lengkap Admin Panel Website SMPN 12 Gresik

## Daftar Isi
1. [Pengenalan Admin Panel](#pengenalan-admin-panel)
2. [Akses dan Login](#akses-dan-login)
3. [Dashboard Admin](#dashboard-admin)
4. [Manajemen Berita](#manajemen-berita)
5. [Manajemen Ekstrakurikuler](#manajemen-ekstrakurikuler)
6. [Tips dan Best Practices](#tips-dan-best-practices)
7. [Troubleshooting](#troubleshooting)

## Pengenalan Admin Panel

Admin Panel Website SMPN 12 Gresik adalah sistem manajemen konten yang memungkinkan administrator sekolah untuk mengelola berita dan informasi ekstrakurikuler secara mudah dan efisien. Panel ini dibangun menggunakan framework Laravel dengan antarmuka yang user-friendly dan responsif.

### Fitur Utama
- **Dashboard Informatif**: Menampilkan statistik dan ringkasan konten
- **Manajemen Berita**: CRUD (Create, Read, Update, Delete) untuk artikel berita
- **Manajemen Ekstrakurikuler**: Pengelolaan informasi kegiatan ekstrakurikuler
- **Upload Gambar**: Sistem upload untuk gambar berita dan ekstrakurikuler
- **Preview Konten**: Kemampuan untuk melihat konten sebelum dipublikasikan

## Akses dan Login

### URL Admin Panel
```
http://localhost:8000/admin/dashboard
```

### Cara Mengakses
1. Buka browser web (Chrome, Firefox, Safari, atau Edge)
2. Masukkan URL admin panel di address bar
3. Tekan Enter untuk mengakses halaman admin

**Catatan**: Saat ini admin panel belum memiliki sistem autentikasi. Untuk implementasi production, disarankan untuk menambahkan sistem login yang aman.

## Dashboard Admin

Dashboard adalah halaman utama admin panel yang memberikan gambaran umum tentang konten website.

### Komponen Dashboard

#### 1. Statistik Cards
- **Total Berita**: Menampilkan jumlah artikel berita yang telah dibuat
- **Total Ekstrakurikuler**: Menampilkan jumlah kegiatan ekstrakurikuler
- **Pengunjung Hari Ini**: Statistik pengunjung website (data dummy)
- **Total Halaman**: Jumlah halaman website yang tersedia

#### 2. Berita Terbaru
Tabel yang menampilkan berita terbaru dengan informasi:
- Judul berita
- Penulis
- Tanggal publikasi
- Status publikasi

#### 3. Quick Actions
Panel aksi cepat untuk:
- Tambah Berita Baru
- Tambah Ekstrakurikuler Baru
- Lihat Website (membuka website utama di tab baru)

### Navigasi
Sidebar kiri berisi menu navigasi utama:
- **Dashboard**: Halaman utama admin
- **Berita**: Manajemen artikel berita
- **Ekstrakurikuler**: Manajemen kegiatan ekstrakurikuler
- **Lihat Website**: Link ke website utama

## Manajemen Berita

### Mengakses Halaman Berita
1. Dari dashboard, klik menu "Berita" di sidebar
2. Atau klik tombol "Lihat Detail" pada card "Total Berita"

### Halaman Index Berita
Halaman ini menampilkan daftar semua berita dalam format tabel dengan kolom:
- **Gambar**: Thumbnail gambar berita
- **Judul**: Judul artikel berita
- **Penulis**: Nama penulis berita
- **Tanggal Publish**: Tanggal publikasi
- **Status**: Status publikasi (Published/Draft)
- **Aksi**: Tombol Edit dan Delete

### Menambah Berita Baru

#### 1. Akses Form Tambah Berita
- Klik tombol "Tambah Berita" di halaman index berita
- Atau klik "Tambah Berita" di quick actions dashboard

#### 2. Mengisi Form Berita
Form tambah berita memiliki field berikut:

**Judul Berita** (Wajib)
- Masukkan judul yang menarik dan informatif
- Maksimal 255 karakter
- Akan otomatis dikonversi menjadi slug URL

**Konten Berita** (Wajib)
- Tulis konten berita lengkap
- Mendukung format teks biasa
- Tidak ada batasan karakter

**Gambar Berita** (Opsional)
- Upload gambar pendukung berita
- Format yang didukung: JPEG, PNG, JPG, GIF
- Maksimal ukuran file: 2MB
- Gambar akan otomatis di-resize jika diperlukan

**Penulis** (Wajib)
- Nama penulis berita
- Default: "Admin"

**Publikasikan sekarang** (Checkbox)
- Centang untuk langsung mempublikasikan berita
- Tidak dicentang akan menyimpan sebagai draft

#### 3. Menyimpan Berita
- Klik tombol "Simpan Berita" untuk menyimpan
- Klik "Batal" untuk membatalkan dan kembali ke halaman index

### Mengedit Berita

#### 1. Akses Form Edit
- Di halaman index berita, klik tombol "Edit" pada baris berita yang ingin diedit

#### 2. Mengubah Data
- Form edit sama dengan form tambah berita
- Semua field akan terisi dengan data yang sudah ada
- Ubah data sesuai kebutuhan

#### 3. Menyimpan Perubahan
- Klik "Update Berita" untuk menyimpan perubahan
- Klik "Batal" untuk membatalkan perubahan

### Menghapus Berita

#### 1. Konfirmasi Penghapusan
- Di halaman index berita, klik tombol "Delete" pada baris berita yang ingin dihapus
- Sistem akan meminta konfirmasi penghapusan

#### 2. Penghapusan Permanen
- Setelah dikonfirmasi, berita akan dihapus permanen dari database
- Gambar yang terkait juga akan dihapus dari server

**Peringatan**: Penghapusan berita bersifat permanen dan tidak dapat dibatalkan.

## Manajemen Ekstrakurikuler

### Mengakses Halaman Ekstrakurikuler
1. Dari dashboard, klik menu "Ekstrakurikuler" di sidebar
2. Atau klik tombol "Lihat Detail" pada card "Total Ekstrakurikuler"

### Halaman Index Ekstrakurikuler
Halaman ini menampilkan daftar semua ekstrakurikuler dalam format tabel dengan kolom:
- **Gambar**: Foto kegiatan ekstrakurikuler
- **Nama Ekstrakurikuler**: Nama kegiatan
- **Deskripsi**: Ringkasan deskripsi kegiatan
- **Jadwal**: Jadwal pelaksanaan kegiatan
- **Pembina**: Nama guru pembina
- **Aksi**: Tombol Edit dan Delete

### Menambah Ekstrakurikuler Baru

#### 1. Akses Form Tambah
- Klik tombol "Tambah Ekstrakurikuler" di halaman index
- Atau klik "Tambah Ekstrakurikuler" di quick actions dashboard

#### 2. Mengisi Form Ekstrakurikuler
Form tambah ekstrakurikuler memiliki field berikut:

**Nama Ekstrakurikuler** (Wajib)
- Nama kegiatan ekstrakurikuler
- Contoh: "Pramuka", "Basket", "English Club"
- Maksimal 255 karakter

**Deskripsi** (Wajib)
- Deskripsi lengkap tentang kegiatan
- Jelaskan tujuan, manfaat, dan aktivitas yang dilakukan
- Tidak ada batasan karakter

**Gambar Ekstrakurikuler** (Opsional)
- Upload foto kegiatan atau logo ekstrakurikuler
- Format yang didukung: JPEG, PNG, JPG, GIF
- Maksimal ukuran file: 2MB

**Jadwal** (Opsional)
- Jadwal pelaksanaan kegiatan
- Contoh: "Setiap Jumat, 14:00-16:00"

**Pembina** (Opsional)
- Nama guru atau staff yang membina kegiatan
- Contoh: "Bapak Ahmad, S.Pd"

#### 3. Menyimpan Ekstrakurikuler
- Klik tombol "Simpan Ekstrakurikuler" untuk menyimpan
- Klik "Batal" untuk membatalkan dan kembali ke halaman index

### Mengedit Ekstrakurikuler

#### 1. Akses Form Edit
- Di halaman index ekstrakurikuler, klik tombol "Edit" pada baris yang ingin diedit

#### 2. Mengubah Data
- Form edit sama dengan form tambah ekstrakurikuler
- Semua field akan terisi dengan data yang sudah ada
- Ubah data sesuai kebutuhan

#### 3. Menyimpan Perubahan
- Klik "Update Ekstrakurikuler" untuk menyimpan perubahan
- Klik "Batal" untuk membatalkan perubahan

### Menghapus Ekstrakurikuler

#### 1. Konfirmasi Penghapusan
- Di halaman index ekstrakurikuler, klik tombol "Delete" pada baris yang ingin dihapus
- Sistem akan meminta konfirmasi penghapusan

#### 2. Penghapusan Permanen
- Setelah dikonfirmasi, data ekstrakurikuler akan dihapus permanen
- Gambar yang terkait juga akan dihapus dari server

## Tips dan Best Practices

### Penulisan Berita
1. **Judul yang Menarik**: Buat judul yang informatif dan menarik perhatian
2. **Konten Berkualitas**: Tulis konten yang jelas, informatif, dan mudah dipahami
3. **Gambar Relevan**: Gunakan gambar yang mendukung dan relevan dengan konten
4. **Periksa Ejaan**: Selalu periksa ejaan dan tata bahasa sebelum mempublikasikan
5. **Update Berkala**: Publikasikan berita secara berkala untuk menjaga website tetap aktif

### Manajemen Ekstrakurikuler
1. **Deskripsi Lengkap**: Berikan deskripsi yang lengkap dan menarik
2. **Jadwal Jelas**: Cantumkan jadwal yang jelas dan mudah dipahami
3. **Foto Menarik**: Gunakan foto kegiatan yang menunjukkan antusiasme siswa
4. **Update Informasi**: Perbarui informasi secara berkala sesuai perkembangan kegiatan

### Optimasi Gambar
1. **Ukuran File**: Pastikan ukuran file tidak terlalu besar (maksimal 2MB)
2. **Resolusi**: Gunakan resolusi yang cukup untuk tampilan web (1200x800 px ideal)
3. **Format**: Gunakan format JPEG untuk foto, PNG untuk gambar dengan transparansi
4. **Nama File**: Beri nama file yang deskriptif sebelum upload

## Troubleshooting

### Masalah Umum dan Solusi

#### 1. Gambar Tidak Terupload
**Penyebab Umum**:
- Ukuran file terlalu besar (>2MB)
- Format file tidak didukung
- Koneksi internet bermasalah

**Solusi**:
- Kompres gambar sebelum upload
- Pastikan format file adalah JPEG, PNG, JPG, atau GIF
- Periksa koneksi internet

#### 2. Form Tidak Tersimpan
**Penyebab Umum**:
- Field wajib tidak diisi
- Koneksi database bermasalah
- Session timeout

**Solusi**:
- Pastikan semua field wajib (bertanda *) sudah diisi
- Refresh halaman dan coba lagi
- Hubungi administrator teknis jika masalah berlanjut

#### 3. Halaman Tidak Dapat Diakses
**Penyebab Umum**:
- Server Laravel tidak berjalan
- URL salah
- Masalah jaringan

**Solusi**:
- Pastikan server Laravel berjalan (`php artisan serve`)
- Periksa URL yang digunakan
- Periksa koneksi internet

#### 4. Perubahan Tidak Muncul di Website
**Penyebab Umum**:
- Cache browser
- Cache Laravel
- Perubahan belum disimpan

**Solusi**:
- Refresh halaman website (Ctrl+F5)
- Clear cache browser
- Pastikan perubahan sudah disimpan di admin panel

### Kontak Dukungan Teknis
Jika mengalami masalah yang tidak dapat diselesaikan dengan panduan ini, hubungi:
- **Administrator Teknis**: admin@smpn12gresik.sch.id
- **Tim IT Sekolah**: it-support@smpn12gresik.sch.id

---

**Catatan**: Panduan ini dibuat untuk versi admin panel saat ini. Fitur dan tampilan dapat berubah seiring dengan update sistem.

