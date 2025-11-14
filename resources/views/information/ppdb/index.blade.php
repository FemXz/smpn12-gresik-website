{{--
  File: resources/views/informasi/ppdb/detail.blade.php
  (Desain Baru terinspirasi dari SMPN 03 Batu)
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi PPDB - SMP Negeri 12 Gresik</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #16a34a;
            --gray-50: #f8f9fa;
            --gray-700: #495057;
            --gray-900: #212529;
        }
        body { background-color: var(--gray-50 ); font-family: 'Poppins', sans-serif; color: var(--gray-700); }
        .main-container { max-width: 850px; margin: 2rem auto; }
        .article-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .article-header { padding: 2rem 2.5rem 1.5rem; }
        .article-header h1 { font-weight: 700; color: var(--gray-900); line-height: 1.3; }
        .article-meta { font-size: 0.9rem; color: #6c757d; }
        .article-poster img { width: 100%; height: 400px; object-fit: cover; }
        .article-body { padding: 2rem 2.5rem; }
        .article-section { margin-bottom: 2.5rem; }
        .section-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--gray-900);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        .toc { /* Table of Contents */
            background-color: #f1f3f5;
            border-left: 4px solid var(--primary-color);
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
        }
        .toc ul { padding-left: 1rem; margin-bottom: 0; }
        .toc a { text-decoration: none; color: #0d6efd; }
        .timeline { /* ... (CSS timeline dari sebelumnya) ... */ }
        .requirements-list { /* ... (CSS requirements dari sebelumnya) ... */ }
        .table .date-highlight { font-weight: 600; color: var(--primary-color); }
        .table .quota-highlight { font-weight: 600; color: #0d6efd; }
        .accordion-button:not(.collapsed) { color: var(--gray-900); background-color: #e7f5ec; box-shadow: none; font-weight: 600; }
    </style>
</head>
<body>
    {{-- Anda bisa menambahkan header minimalis di sini jika mau --}}

    <div class="main-container">
        <div class="article-card">
            <div class="article-header">
                <h1 class="mb-2">Informasi PPDB SMP Negeri 12 Gresik Tahun Ajaran 2026/2027</h1>
                <div class="article-meta">
                    <i class="fas fa-calendar-alt"></i> Dipublikasikan pada 10 November 2025
                </div>
            </div>
            <div class="article-poster">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop" alt="Poster PPDB">
            </div>
            <div class="article-body">
                
                <!-- Daftar Isi (Table of Contents ) -->
                <div class="article-section toc">
                    <h5 class="fw-bold">Daftar Isi</h5>
                    <ul>
                        <li><a href="#alur">Alur Pendaftaran</a></li>
                        <li><a href="#syarat">Syarat Pendaftaran</a></li>
                        <li><a href="#jadwal">Jadwal Penting</a></li>
                        <li><a href="#jalur">Jalur Pendaftaran & Kuota</a></li>
                        <li><a href="#faq">Tanya Jawab (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Alur Pendaftaran -->
                <div id="alur" class="article-section">
                    <h2 class="section-title">Alur Pendaftaran</h2>
                    {{-- (Konten Alur Pendaftaran dari kode Anda sebelumnya) --}}
                </div>

                <!-- Syarat Pendaftaran -->
                <div id="syarat" class="article-section">
                    <h2 class="section-title">Syarat Pendaftaran</h2>
                    {{-- (Konten Syarat Pendaftaran dari kode Anda sebelumnya) --}}
                </div>

                <!-- Jadwal Penting -->
                <div id="jadwal" class="article-section">
                    <h2 class="section-title">Jadwal Penting</h2>
                    {{-- (Konten Tabel Jadwal dari kode Anda sebelumnya) --}}
                </div>

                <!-- Jalur Pendaftaran -->
                <div id="jalur" class="article-section">
                    <h2 class="section-title">Jalur Pendaftaran & Kuota</h2>
                    {{-- (Konten Tabel Jalur & Kuota dari kode Anda sebelumnya) --}}
                </div>

                <!-- Tanya Jawab (FAQ) -->
                <div id="faq" class="article-section">
                    <h2 class="section-title">Tanya Jawab (FAQ)</h2>
                    {{-- (Konten Accordion FAQ dari kode Anda sebelumnya) --}}
                </div>

                <div class="text-center mt-5">
                    <a href="https://ppdb.dinas-gresik.net" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-external-link-alt me-2"></i> Kunjungi Laman Pendaftaran Resmi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
