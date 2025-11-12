<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection; // Kita akan menggunakan Collection untuk data tabel
use stdClass; // Kita akan menggunakan stdClass untuk objek data palsu

class PpdbAdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin PPDB dengan data statistik palsu.
     */
    public function dashboard()
    {
        // Membuat data statistik palsu
        $stats = new stdClass();
        $stats->total_pendaftar = 350;
        $stats->lolos_seleksi = 280;
        $stats->menunggu_verifikasi = 45;
        $stats->tidak_lolos = 25;

        // Membuat data aktivitas terbaru palsu
        $activities = new Collection([
            (object) ['time' => '10 menit lalu', 'description' => '<strong>Ahmad Budi</strong> baru saja mendaftar.'],
            (object) ['time' => '1 jam lalu', 'description' => 'Status <strong>Citra Lestari</strong> diubah menjadi "Lolos Seleksi".'],
            (object) ['time' => '3 jam lalu', 'description' => '<strong>Dewi Anggraini</strong> mengunggah ulang berkas.'],
            (object) ['time' => '1 hari lalu', 'description' => 'Jadwal PPDB telah diperbarui.'],
        ]);

        return view('admin.ppdb.dashboard', compact('stats', 'activities'));
    }

    /**
     * Menampilkan halaman daftar pendaftar dengan data palsu dan paginasi.
     */
    public function pendaftar()
    {
        // Membuat koleksi data pendaftar palsu
        $pendaftarData = new Collection([
            (object) [
                'id' => 1,
                'nama_lengkap' => 'Ahmad Budi Santoso',
                'nisn' => '1234567890',
                'asal_sekolah' => 'SD Negeri 1 Gresik',
                'tanggal_daftar' => '10 Nov 2025',
                'status' => 'Lolos Seleksi',
                'status_class' => 'success', // untuk warna badge
            ],
            (object) [
                'id' => 2,
                'nama_lengkap' => 'Citra Lestari',
                'nisn' => '0987654321',
                'asal_sekolah' => 'SD Muhammadiyah 2',
                'tanggal_daftar' => '10 Nov 2025',
                'status' => 'Menunggu Verifikasi',
                'status_class' => 'info',
            ],
            (object) [
                'id' => 3,
                'nama_lengkap' => 'Dewi Anggraini',
                'nisn' => '5678901234',
                'asal_sekolah' => 'MI Miftahul Huda',
                'tanggal_daftar' => '09 Nov 2025',
                'status' => 'Berkas Tidak Lengkap',
                'status_class' => 'warning',
            ],
            (object) [
                'id' => 4,
                'nama_lengkap' => 'Eko Prasetyo',
                'nisn' => '4321098765',
                'asal_sekolah' => 'SD Al-Hikmah',
                'tanggal_daftar' => '08 Nov 2025',
                'status' => 'Tidak Lolos',
                'status_class' => 'danger',
            ],
        ]);

        // Anda bisa menambahkan lebih banyak data di sini untuk testing paginasi
        // Untuk saat ini, kita akan menampilkan semua data tanpa paginasi
        $pendaftar = $pendaftarData;

        return view('admin.ppdb.pendaftar', compact('pendaftar'));
    }

    /**
     * Menampilkan halaman pengaturan dengan data palsu.
     */
    public function pengaturan()
    {
        // Membuat data pengaturan umum palsu
        $pengaturanUmum = (object) [
            'page_title' => 'Panduan Lengkap PPDB 2026/2027',
            'page_subtitle' => 'Semua informasi yang Anda butuhkan untuk bergabung dengan sekolah kami.',
            'poster_url' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop',
        ];

        // Membuat data jadwal palsu
        $jadwal = new Collection([
            (object ) ['kegiatan' => 'Pendaftaran & Unggah Berkas', 'tanggal' => '1 - 15 Juni 2026'],
            (object) ['kegiatan' => 'Seleksi & Verifikasi Berkas', 'tanggal' => '16 - 20 Juni 2026'],
            (object) ['kegiatan' => 'Pengumuman Hasil Seleksi', 'tanggal' => '22 Juni 2026'],
            (object) ['kegiatan' => 'Daftar Ulang', 'tanggal' => '23 - 25 Juni 2026'],
        ]);

        // Membuat data FAQ palsu
        $faq = new Collection([
            (object) ['pertanyaan' => 'Apakah ada biaya pendaftaran?', 'jawaban' => 'Tidak ada. Proses pendaftaran di SMP Negeri 12 Gresik sepenuhnya gratis.'],
            (object) ['pertanyaan' => 'Bisakah mendaftar di lebih dari satu jalur?', 'jawaban' => 'Calon siswa hanya dapat memilih satu jalur pendaftaran saja.'],
        ]);

        return view('admin.ppdb.pengaturan', compact('pengaturanUmum', 'jadwal', 'faq'));
    }
}
