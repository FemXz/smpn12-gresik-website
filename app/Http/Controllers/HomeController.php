<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Teacher;
use App\Models\Stat;

class HomeController extends Controller
{
    public function index()
    {
        // 🔹 Ambil berita terbaru (3 terakhir)
        $latestNews = News::where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // 🔹 Kalau tabel News kosong → kasih placeholder biar gak error
        if ($latestNews->isEmpty()) {
            $latestNews = collect([
                (object) [
                    'title' => 'Belum ada berita terbaru',
                    'slug' => '#',
                    'thumbnail' => 'default-news.jpg',
                    'excerpt' => 'Berita akan segera hadir...',
                    'published_at' => now(),
                ],
            ]);
        }

        // 🔹 Ambil semua guru
        $teachers = Teacher::orderBy('name')->get();

        // 🔹 Ambil data statistik dari database
        $stat = Stat::first();

        // 🔹 Kalau belum ada data di tabel stats → isi default 0
        if (!$stat) {
            $stat = (object) [
                'students' => 0,
                'teachers' => 0,
                'staff' => 0,
                'achievements' => 0,
            ];
        }

        // 🔹 Siapkan data lain untuk view
        $data = [
            'hero' => [
                'title' => 'SMP Negeri 12 Gresik',
                'subtitle' => 'Unggul dalam Prestasi, Berkarakter, dan Berwawasan Global',
                'description' => 'Sekolah yang mengutamakan kualitas pendidikan dengan fasilitas modern dan tenaga pengajar profesional untuk membentuk generasi yang cerdas dan berkarakter.',
            ],
            'stats' => [
                'students' => $stat->students,
                'teachers' => $stat->teachers,
                'staff' => $stat->staff,
                'achievements' => $stat->achievements,
            ],
            'latest_news' => $latestNews,
            'upcoming_events' => [
                [
                    'title' => 'Penerimaan Siswa Baru 2025/2026',
                    'date' => '2025-03-01',
                    'time' => '08:00 WIB',
                    'location' => 'SMPN 12 Gresik',
                ],
                [
                    'title' => 'Festival Seni dan Budaya',
                    'date' => '2025-02-20',
                    'time' => '09:00 WIB',
                    'location' => 'Aula Sekolah',
                ],
                [
                    'title' => 'Kompetisi Robotika Antar Sekolah',
                    'date' => '2025-02-15',
                    'time' => '10:00 WIB',
                    'location' => 'Lab Komputer',
                ],
            ],
            'facilities' => [
                [
                    'name' => 'Laboratorium Sains',
                    'description' => 'Lab modern dengan peralatan lengkap untuk praktikum Fisika, Kimia, dan Biologi',
                    'icon' => 'microscope',
                ],
                [
                    'name' => 'Perpustakaan Digital',
                    'description' => 'Koleksi buku digital dan fisik dengan sistem manajemen modern',
                    'icon' => 'book-open',
                ],
                [
                    'name' => 'Lab Komputer',
                    'description' => 'Fasilitas komputer terbaru dengan koneksi internet berkecepatan tinggi',
                    'icon' => 'monitor',
                ],
                [
                    'name' => 'Aula Serbaguna',
                    'description' => 'Ruang pertemuan dan acara dengan kapasitas 500 orang',
                    'icon' => 'users',
                ],
            ],
        ];

        // 🔹 Kirim semua data ke view
        return view('home', compact('data', 'teachers', 'stat'));
    }

    // 🔹 API untuk event mendatang
    public function upcomingEvents()
    {
        return response()->json([
            [
                'title' => 'Penerimaan Siswa Baru 2025/2026',
                'date' => '2025-03-01',
                'time' => '08:00 WIB',
                'location' => 'SMPN 12 Gresik',
            ],
            [
                'title' => 'Festival Seni dan Budaya',
                'date' => '2025-02-20',
                'time' => '09:00 WIB',
                'location' => 'Aula Sekolah',
            ],
        ]);
    }
}
