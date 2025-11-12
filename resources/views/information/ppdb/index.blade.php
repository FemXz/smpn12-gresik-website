

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Lengkap PPDB - SMP Negeri 12 Gresik</title>

    {{-- Anda bisa menggunakan file CSS utama dari proyek Anda --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #16a34a;
            --primary-gradient: linear-gradient(135deg, #16a34a, #22c55e );
            --gray-50: #f8f9fa;
            --gray-100: #f1f3f5;
            --gray-700: #495057;
            --gray-900: #212529;
        }

        body {
            background-color: var(--gray-50);
            font-family: 'Poppins', sans-serif;
            color: var(--gray-700);
        }

        /* Header Minimalis */
        .ppdb-header-minimal {
            background: white;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .ppdb-header-minimal .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .ppdb-header-minimal .logo img { height: 40px; }
        .ppdb-header-minimal .logo-text { color: var(--gray-900); font-weight: 600; font-size: 1.1rem; }
        .ppdb-header-minimal .back-button { color: var(--gray-700); text-decoration: none; font-weight: 500; transition: color 0.3s ease; }
        .ppdb-header-minimal .back-button:hover { color: var(--primary-color); }

        /* Kontainer Utama */
        .ppdb-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Judul Halaman */
        .page-title { text-align: center; margin-bottom: 3rem; }
        .page-title h1 {
            font-size: clamp(2rem, 5vw, 2.75rem);
            font-weight: 800;
            color: var(--gray-900);
            line-height: 1.2;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .page-title p { font-size: 1.1rem; color: var(--gray-700); margin-top: 1rem; }

        /* Kartu Seksi */
        .ppdb-section-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.07), 0 4px 6px -2px rgba(0,0,0,0.05);
            border: 1px solid var(--gray-100);
        }
        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-100);
            padding-bottom: 1rem;
        }
        .section-title i { font-size: 1.5rem; color: var(--primary-color); }
        .section-title h2 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); }

        /* Timeline Alur */
        .timeline { list-style: none; padding: 0; position: relative; }
        .timeline:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 20px;
            width: 4px;
            background: var(--gray-100);
            border-radius: 2px;
        }
        .timeline-item { display: flex; gap: 1.5rem; margin-bottom: 1.5rem; position: relative; }
        .timeline-icon {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 1;
            border: 4px solid var(--gray-50);
        }
        .timeline-content { padding-top: 0.5rem; }
        .timeline-content strong { font-weight: 600; color: var(--gray-900); }
        .timeline-content p { margin-bottom: 0; font-size: 0.95rem; }

        /* Syarat Pendaftaran */
        .requirements-list { list-style: none; padding-left: 0; }
        .requirements-list li { display: flex; gap: 1rem; margin-bottom: 1rem; line-height: 1.6; }
        .requirements-list i { color: var(--primary-color); margin-top: 5px; }

        /* Tabel */
        .table thead th { background-color: var(--gray-100); }
        .table .date-highlight { font-weight: 600; color: var(--primary-color); }
        .table .quota-highlight { font-weight: 600; color: #0d6efd; }

        /* FAQ */
        .accordion-button:not(.collapsed) {
            color: var(--gray-900);
            background-color: #e7f5ec;
            box-shadow: inset 0 -1px 0 rgba(0,0,0,.125);
            font-weight: 600;
        }
        .accordion-button:focus { box-shadow: 0 0 0 0.25rem rgba(22, 163, 74, 0.25); }

        /* Tombol Aksi Mengambang */
        .floating-cta {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 1rem 1.5rem;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
            display: none;
            z-index: 1000;
        }
        .floating-cta .btn {
            width: 100%;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            background: var(--primary-gradient);
            border: none;
        }
        @media (max-width: 768px) {
            .floating-cta { display: block; }
            .ppdb-container { margin-bottom: 120px; }
        }
    </style>
</head>
<body>

    <header class="ppdb-header-minimal">
        <a href="/" class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Logo_tut_wuri_handayani.svg/1200px-Logo_tut_wuri_handayani.svg.png" alt="Logo SMPN 12 Gresik">
            <span class="logo-text">SMP Negeri 12 Gresik</span>
        </a>
        <a href="/" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </header>

    <main class="ppdb-container">
        <div class="page-title">
            <h1>Panduan Lengkap PPDB 2026/2027</h1>
            <p>Semua informasi yang Anda butuhkan untuk bergabung dengan sekolah kami.</p>
        </div>

        <!-- Alur Pendaftaran -->
        <div class="ppdb-section-card">
            <div class="section-title">
                <i class="fas fa-shoe-prints"></i>
                <h2>Alur Pendaftaran</h2>
            </div>
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-user-plus"></i></div>
                    <div class="timeline-content"><strong>Buat Akun</strong><p>Calon siswa membuat akun melalui portal PPDB online.</p></div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-keyboard"></i></div>
                    <div class="timeline-content"><strong>Isi Formulir</strong><p>Melengkapi semua data diri, orang tua, dan nilai rapor.</p></div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <div class="timeline-content"><strong>Unggah Berkas</strong><p>Mengunggah dokumen persyaratan dalam format digital (PDF/JPG ).</p></div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-search"></i></div>
                    <div class="timeline-content"><strong>Verifikasi Panitia</strong><p>Panitia akan memeriksa kelengkapan dan keabsahan data.</p></div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-bullhorn"></i></div>
                    <div class="timeline-content"><strong>Lihat Pengumuman</strong><p>Hasil seleksi diumumkan secara online sesuai jadwal.</p></div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="timeline-content"><strong>Daftar Ulang</strong><p>Siswa yang lulus wajib melakukan daftar ulang untuk konfirmasi.</p></div>
                </li>
            </ul>
        </div>

        <!-- Syarat Pendaftaran -->
        <div class="ppdb-section-card">
            <div class="section-title">
                <i class="fas fa-file-alt"></i>
                <h2>Syarat Pendaftaran</h2>
            </div>
            <ul class="requirements-list">
                <li><i class="fas fa-check"></i><div>Telah lulus dari Sekolah Dasar (SD)/sederajat.</div></li>
                <li><i class="fas fa-check"></i><div>Berusia maksimal 15 tahun pada tanggal 1 Juli 2026.</div></li>
                <li><i class="fas fa-check"></i><div>Scan Kartu Keluarga (KK) dalam format PDF/JPG.</div></li>
                <li><i class="fas fa-check"></i><div>Scan Akta Kelahiran dalam format PDF/JPG.</div></li>
                <li><i class="fas fa-check"></i><div>Scan Rapor kelas 4, 5, dan semester 1 kelas 6.</div></li>
                <li><i class="fas fa-check"></i><div>Pas foto berwarna terbaru ukuran 3x4.</div></li>
                <li><i class="fas fa-check"></i><div>Scan sertifikat prestasi (jika mendaftar melalui Jalur Prestasi).</div></li>
            </ul>
        </div>

        <!-- Jadwal Penting -->
        <div class="ppdb-section-card">
            <div class="section-title">
                <i class="fas fa-calendar-alt"></i>
                <h2>Jadwal Penting</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr><th>Kegiatan</th><th>Tanggal</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Pendaftaran & Unggah Berkas</td><td class="date-highlight">1 - 15 Juni 2026</td></tr>
                        <tr><td>Seleksi & Verifikasi Berkas</td><td class="date-highlight">16 - 20 Juni 2026</td></tr>
                        <tr><td>Pengumuman Hasil Seleksi</td><td class="date-highlight">22 Juni 2026 (Pukul 10:00 WIB)</td></tr>
                        <tr><td>Daftar Ulang</td><td class="date-highlight">23 - 25 Juni 2026</td></tr>
                        <tr><td>Hari Pertama Masuk Sekolah</td><td class="date-highlight">13 Juli 2026</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Jalur Pendaftaran -->
        <div class="ppdb-section-card">
            <div class="section-title">
                <i class="fas fa-project-diagram"></i>
                <h2>Jalur Pendaftaran & Kuota</h2>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr><th>Jalur</th><th>Deskripsi Singkat</th><th class="text-center">Kuota</th></tr>
                    </thead>
                    <tbody>
                        <tr><td><strong>Zonasi</strong></td><td>Bagi calon siswa yang berdomisili di dalam wilayah zonasi sekolah.</td><td class="text-center quota-highlight">50%</td></tr>
                        <tr><td><strong>Afirmasi</strong></td><td>Bagi calon siswa dari keluarga ekonomi tidak mampu.</td><td class="text-center quota-highlight">15%</td></tr>
                        <tr><td><strong>Perpindahan Tugas</strong></td><td>Bagi calon siswa yang orang tuanya pindah tugas.</td><td class="text-center quota-highlight">5%</td></tr>
                        <tr><td><strong>Prestasi</strong></td><td>Bagi calon siswa yang memiliki prestasi akademik atau non-akademik.</td><td class="text-center quota-highlight">30%</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tanya Jawab (FAQ) -->
        <div class="ppdb-section-card">
            <div class="section-title">
                <i class="fas fa-question-circle"></i>
                <h2>Tanya Jawab (FAQ)</h2>
            </div>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Apakah ada biaya pendaftaran?</button></h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Tidak ada. Proses pendaftaran di SMP Negeri 12 Gresik sepenuhnya **gratis** dan tidak dipungut biaya apapun.</div></div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Bisakah mendaftar di lebih dari satu jalur?</button></h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Calon siswa hanya dapat memilih **satu jalur pendaftaran** saja (Zonasi, Afirmasi, Perpindahan Tugas, atau Prestasi).</div></div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Bagaimana jika saya kesulitan saat mendaftar online?</button></h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Jangan khawatir, panitia PPDB kami menyediakan layanan bantuan. Anda bisa datang langsung ke sekolah pada jam kerja atau menghubungi narahubung kami melalui WhatsApp yang tertera di halaman kontak.</div></div>
                </div>
            </div>
        </div>
    </main>

    <div class="floating-cta">
        <a href="{{-- route('ppdb.create') --}}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Daftar Sekarang
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
