@extends("layouts.app")

@section("title", "Ekstrakurikuler")

@section("content")
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ========== Design Matching SMP Negeri 12 Gresik ========== */
* {
    font-family: 'Inter', sans-serif;
}

:root {
    --primary-green: #2c9653ff;
    --dark-green: #16a34a;
    --light-green: #dcfce7;
    --accent-green: #15803d;
    --text-dark: #1f2937;
    --text-light: #6b7280;
    --white: #ffffff;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
}

body {
    background: var(--gray-50);
    color: var(--text-dark);
    line-height: 1.6;
}

/* ========== Hero Section ========== */
.hero-section {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
    color: white;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.06)"/></svg>');
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.hero-content {
    text-align: center;
    position: relative;
    z-index: 10;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 2rem;
    font-weight: 400;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 30px;
}

.hero-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 15px 30px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
    backdrop-filter: blur(10px);
}

.hero-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* ========== Main Content ========== */
.main-content {
    padding: 60px 0;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 15px;
}

.section-subtitle {
    text-align: center;
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 50px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

/* ========== Stats Section ========== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.stat-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(34, 197, 94, 0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 24px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1rem;
    color: var(--text-light);
    font-weight: 500;
}

/* ========== Search Section ========== */
.search-section {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    margin-bottom: 50px;
    border: 1px solid var(--gray-200);
}

.search-box {
    max-width: 500px;
    margin: 0 auto 30px;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 15px 20px 15px 50px;
    border: 2px solid var(--gray-200);
    border-radius: 50px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
    background: var(--gray-50);
}

.search-input:focus {
    border-color: var(--primary-green);
    background: white;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

.search-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 18px;
}

.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

.filter-btn {
    padding: 12px 24px;
    border: 2px solid var(--gray-200);
    background: var(--gray-50);
    color: var(--text-light);
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-green);
    color: white;
    border-color: var(--primary-green);
    transform: translateY(-2px);
}

/* ========== Cards Grid ========== */
.cards-grid {
    display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
  align-items: stretch;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
    /* Set a minimum height for consistent card size */
    min-height: 450px; /* Adjust as needed based on content */
    display: flex;
    flex-direction: column;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(34, 197, 94, 0.15);
}

.card-image {
    height: 200px;
    background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 48px;
    border-radius: 20px;
    overflow: hidden;               /* penting biar img clip */
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-top-left-radius: 20px;   /* biar ikut pas */
    border-top-right-radius: 20px;
}


.card-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(255, 255, 255, 0.95);
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    color: var(--primary-green);
    backdrop-filter: blur(10px);
}

.card-content {
    padding: 25px;
    flex-grow: 1; /* Allow content to grow and push button to bottom */
    display: flex;
    flex-direction: column;
}

.card-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
    line-height: 1.3;
}

.card-info {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    font-size: 14px;
}

.card-info-icon {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    color: white;
    font-size: 14px;
}

.card-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 14px;
    flex-grow: 1; /* Allow description to take available space */
}

.btn-detail {
    background: var(--primary-green);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    margin-top: auto; /* Push button to the bottom */
}

.btn-detail:hover {
    background: var(--dark-green);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
}

/* ========== Info Section ========== */
/* ========================================
   EXTRACURRICULAR HERO SECTION - REFINED
   ======================================== */

.extracurricular-hero {
    /* REFINEMENT: Menggunakan gradient yang sudah ada dan menambah padding */
    background: var(--gradient-hero); /* atau var(--gradient-primary) */
    color: white;
    padding: var(--space-12) 0; /* Padding vertikal yang cukup */
    min-height: 60vh; /* Memberi tinggi minimal agar tidak terlalu pendek */
    display: flex;
    align-items: center;
    text-align: center; /* Default ke tengah untuk mobile */
}

/* Kontainer di dalamnya (jika ada) */
.extracurricular-hero .container {
    max-width: 900px; /* Batasi lebar agar teks tidak terlalu panjang */
}

.extracurricular-hero h1 {
    /* REFINEMENT: Menggunakan font responsif */
    font-size: clamp(2.5rem, 7vw, 4rem);
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: var(--space-4);
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.extracurricular-hero h1 span {
    /* REFINEMENT: Membuat sub-judul menjadi bagian dari H1 tapi lebih kecil */
    display: block;
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 700;
    opacity: 0.9;
}

.extracurricular-hero p {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    max-width: 60ch; /* Batasi panjang baris untuk keterbacaan */
    margin: 0 auto var(--space-8); /* Pusatkan paragraf */
    line-height: 1.7;
}

.extracurricular-hero .hero-buttons {
    display: flex;
    flex-direction: column; /* Susun tombol ke bawah di mobile */
    align-items: center;
    gap: var(--space-4);
}

/* Menggunakan kembali style tombol yang sudah ada */
.extracurricular-hero .btn {
    padding: var(--space-3) var(--space-6);
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition-bounce);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-3);
    border: none;
    cursor: pointer;
    font-size: 1rem;
    width: 90%;
    max-width: 350px; /* Batasi lebar tombol */
}

.extracurricular-hero .btn-primary {
    background: var(--gradient-secondary);
    color: white;
    box-shadow: var(--shadow-lg);
}

.extracurricular-hero .btn-primary:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--shadow-xl);
}

.extracurricular-hero .btn-outline {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.extracurricular-hero .btn-outline:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-3px) scale(1.05);
}

/* ========================================
   MEDIA QUERY UNTUK LAYAR LEBIH BESAR
   ======================================== */

@media (max-width: 414px) {
    body{
        padding-top: 40px !important;
    }
    .extracurricular-hero .hero-buttons {
        flex-direction: row; /* Buat tombol berdampingan */
        justify-content: center;
    }

    .extracurricular-hero .btn {
        width: auto; /* Biarkan lebar tombol ditentukan oleh kontennya */
    }
}

@media (min-width: 768px) {
    .extracurricular-hero {
        text-align: left; /* Ratakan kiri untuk desktop */
        min-height: 50vh;
    }

    .extracurricular-hero p {
        margin-left: 0; /* Hapus margin auto */
    }

    .extracurricular-hero .hero-buttons {
        justify-content: flex-start; /* Ratakan kiri tombol */
    }
}


/* ========== MODAL OVERLAY - FIXED ========== */
#detailModal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    animation: modalFadeIn 0.3s ease-out;
}

.modal-container {
    background: white;
    border-radius: 25px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    position: relative;
    animation: modalSlideIn 0.3s ease-out;
}

.modal-header {
    background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
    color: white;
    padding: 30px;
    position: relative;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 25px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.modal-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.modal-title {
    font-size: 1.8rem;
    font-weight: 800;
    margin: 0;
    padding-right: 60px;
}

.modal-category {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-top: 10px;
    backdrop-filter: blur(10px);
}

.modal-body {
    padding: 30px;
    flex: 1;
    overflow-y: auto;
}

.modal-description {
    color: var(--text-dark);
    line-height: 1.7;
    font-size: 15px;
    margin-bottom: 25px;
    text-align: justify;
}

.modal-info-grid {
    display: grid;
    gap: 15px;
    margin-bottom: 25px;
}

.modal-info-item {
    background: var(--light-green);
    padding: 20px;
    border-radius: 15px;
    border-left: 4px solid var(--primary-green);
    transition: all 0.3s ease;
}

.modal-info-item:hover {
    background: #bbf7d0;
    transform: translateX(5px);
}

.modal-info-label {
    display: flex;
    align-items: center;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 14px;
}

.modal-info-label i {
    margin-right: 10px;
    color: var(--primary-green);
    width: 16px;
}

.modal-info-value {
    color: var(--text-light);
    font-size: 14px;
    margin-left: 26px;
    font-weight: 500;
}

.modal-footer {
    padding: 25px 30px;
    background: var(--gray-50);
    border-top: 1px solid var(--gray-200);
}

.modal-contact-btn {
    background: linear-gradient(135deg, #059669, #047857);
    color: white;
    padding: 15px 25px;
    border: none;
    border-radius: 50px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
}

.modal-contact-btn:hover {
    background: linear-gradient(135deg, #047857, #065f46);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
}

.modal-contact-btn:disabled {
    background: var(--gray-200);
    color: var(--text-light);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* ========== Empty State ========== */
.empty-state {
    text-align: center;
    padding: 60px 40px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid var(--gray-200);
}

.empty-icon {
    font-size: 60px;
    margin-bottom: 20px;
    color: var(--primary-green);
    opacity: 0.7;
}

/* ========== Animations ========== */
@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modalSlideIn {
    from { 
        opacity: 0; 
        transform: scale(0.9) translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: scale(1) translateY(0); 
    }
}

/* ========== Responsive Design ========== */
@media (max-width: 768px) {
    .hero-title { font-size: 2.5rem; }
    .hero-section { padding: 60px 0; }
    .hero-buttons { flex-direction: column; align-items: center; }
    .hero-btn { width: 250px; justify-content: center; }
    .cards-grid { grid-template-columns: 1fr; gap: 20px; }
    .filter-buttons { flex-direction: column; align-items: center; }
    .filter-btn { width: 250px; justify-content: center; }
    .search-section { padding: 25px; margin: 0 10px 40px; }
    .info-section { padding: 40px 0; margin: 40px 10px 0; }
    .container { padding: 0 15px; }
    
    .modal-container { 
        margin: 10px; 
        max-height: 95vh; 
    }
    .modal-header { padding: 25px; }
    .modal-title { font-size: 1.5rem; }
    .modal-body { padding: 20px; }
    .modal-footer { padding: 20px; }
}

@media (max-width: 480px) {
    .hero-title { font-size: 2rem; }
    .search-input { font-size: 16px; }
    .cards-grid { gap: 15px; }
    .card-content { padding: 20px; }
    
    .modal-container { 
        margin: 5px; 
        border-radius: 20px; 
    }
    .modal-header { padding: 20px; }
    .modal-title { font-size: 1.3rem; }
    .modal-body { padding: 15px; }
    .modal-info-item { padding: 15px; }
}

.hidden { display: none !important; }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Ekstrakurikuler SMP Negeri 12 Gresik</h1>
            <p class="hero-subtitle">
                Bergabunglah dengan berbagai kegiatan ekstrakurikuler yang menginspirasi! Kembangkan bakat, minat, dan karakter melalui program-program unggulan kami.
            </p>
            <div class="hero-buttons">
                <a href="#ekstrakurikuler" class="hero-btn">
                    <i class="fas fa-info-circle"></i>
                    Tentang Ekstrakurikuler
                </a>
                <a href="#kontak" class="hero-btn">
                    <i class="fas fa-users"></i>
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        
        <!-- Section Title -->
        <h2 class="section-title">Ekstrakurikuler Unggulan</h2>
        <p class="section-subtitle">
            Temukan dan bergabunglah dengan berbagai kegiatan ekstrakurikuler yang sesuai dengan minat dan bakat Anda
        </p>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ count($extracurriculars) }}+</div>
                <div class="stat-label">Ekstrakurikuler Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number">100%</div>
                <div class="stat-label">Siswa Berpartisipasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-number">50+</div>
                <div class="stat-label">Prestasi Diraih</div>
            </div>
        </div>

        <!-- Search + Filter -->
        <div class="search-section">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari ekstrakurikuler..." class="search-input">
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th-large"></i>
                    <span>Semua</span>
                </button>
                <button class="filter-btn" data-filter="olahraga">
                    <i class="fas fa-running"></i>
                    <span>Olahraga</span>
                </button>
                <button class="filter-btn" data-filter="seni">
                    <i class="fas fa-palette"></i>
                    <span>Seni & Budaya</span>
                </button>
                <button class="filter-btn" data-filter="akademik">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Akademik</span>
                </button>
            </div>
        </div>

        <!-- Cards -->
        <div id="extracurricular-grid" class="cards-grid">
            @forelse ($extracurriculars as $item)
                <div class="card extracurricular-card" 
                     data-category="{{ strtolower($item->category ?? 'akademik') }}" 
                     data-name="{{ strtolower($item->name) }}">
                    
                    <div class="card-image">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                        @else
                            @if(strtolower($item->category ?? 'akademik') == 'olahraga')
                                <i class="fas fa-futbol"></i>
                            @elseif(strtolower($item->category ?? 'akademik') == 'seni')
                                <i class="fas fa-paint-brush"></i>
                            @else
                                <i class="fas fa-book-open"></i>
                            @endif
                        @endif
                        <div class="card-badge">
                            {{ ucfirst($item->category ?? 'Akademik') }}
                        </div>
                    </div>
                    
                    <div class="card-content">
                        <h3 class="card-title">{{ $item->name }}</h3>
                        
                        <div class="card-info">
                            <div class="card-info-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div>
                                <div style="font-weight: 700; color: var(--text-dark);">Pembina</div>
                                <div style="color: var(--text-light);">{{ $item->teacher_in_charge ?? 'Akan segera ditentukan' }}</div>
                            </div>
                        </div>
                        
                        <p class="card-description">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 120) }}
                        </p>
                        
                        <button class="btn-detail detail-btn"
                            data-name="{{ $item->name }}"
                            data-category="{{ ucfirst($item->category ?? 'Akademik') }}"
                            data-description="{{ strip_tags($item->description) }}"
                            data-teacher="{{ $item->teacher_in_charge ?? 'Akan segera ditentukan' }}"
                            data-phone="{{ $item->teacher_phone ?? '' }}"
                            data-schedule="{{ $item->schedule ?? '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Ekstrakurikuler</span>
                        </button>
                    </div>
                </div>
            @empty
                <div class="empty-state" style="grid-column: 1 / -1;">
                    <div class="empty-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--text-dark); margin-bottom: 15px;">
                        Ekstrakurikuler Sedang Dipersiapkan
                    </h3>
                    <p style="color: var(--text-light); font-size: 1.1rem;">Tim admin sedang menyiapkan berbagai kegiatan menarik untuk kalian. Nantikan update selanjutnya!</p>
                </div>
            @endforelse
        </div>
        
        <!-- Info Section -->
        <div class="info-section" id="kontak">
            <div class="container">
                <h2 class="info-title">Siap Bergabung?</h2>
                <p class="info-subtitle">
                    Semua ekstrakurikuler dikelola langsung oleh tim admin sekolah. Untuk informasi lebih lanjut atau pendaftaran, silakan hubungi pembina atau admin sekolah.
                </p>
                <div class="contact-info">
                    <h3><i class="fas fa-phone-alt"></i> Informasi & Pendaftaran</h3>
                    <p>Hubungi admin sekolah atau pembina ekstrakurikuler yang diminati untuk informasi lengkap dan proses pendaftaran.</p>
                    <p style="margin-top: 12px; font-size: 0.9rem; opacity: 0.8;">
                        *Pendaftaran dan pengelolaan ekstrakurikuler dilakukan langsung oleh admin sekolah
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail - FULL SCREEN OVERLAY -->
<div id="detailModal" class="hidden">
    <div class="modal-container">
        <!-- Modal Header -->
        <div class="modal-header">
            <button id="closeModal" class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <h2 id="modalTitle" class="modal-title"></h2>
            <span id="modalCategory" class="modal-category"></span>
        </div>
        
        <!-- Modal Body -->
        <div class="modal-body">
            <p id="modalDescription" class="modal-description"></p>
            
            <div class="modal-info-grid">
                <div class="modal-info-item">
                    <div class="modal-info-label">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Pembina Ekstrakurikuler
                    </div>
                    <div id="modalTeacher" class="modal-info-value"></div>
                </div>
                
                <div id="modalScheduleItem" class="modal-info-item hidden">
                    <div class="modal-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Jadwal Kegiatan
                    </div>
                    <div id="modalSchedule" class="modal-info-value"></div>
                </div>
                
                <div id="modalPhoneItem" class="modal-info-item hidden">
                    <div class="modal-info-label">
                        <i class="fas fa-phone"></i>
                        Kontak Pembina
                    </div>
                    <div id="modalPhone" class="modal-info-value"></div>
                </div>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button id="modalContactBtn" class="modal-contact-btn">
                <i class="fab fa-whatsapp"></i>
                <span>Hubungi Pembina</span>
            </button>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.extracurricular-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filter = btn.getAttribute('data-filter');
            
            cards.forEach(card => {
                const category = card.getAttribute('data-category');
                card.style.display = (filter === 'all' || category === filter) ? 'block' : 'none';
            });
        });
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        cards.forEach(card => {
            const name = card.getAttribute('data-name');
            card.style.display = name.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Modal elements
    const detailModal = document.getElementById('detailModal');
    const closeModal = document.getElementById('closeModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalCategory = document.getElementById('modalCategory');
    const modalDescription = document.getElementById('modalDescription');
    const modalTeacher = document.getElementById('modalTeacher');
    const modalPhone = document.getElementById('modalPhone');
    const modalSchedule = document.getElementById('modalSchedule');
    const modalScheduleItem = document.getElementById('modalScheduleItem');
    const modalPhoneItem = document.getElementById('modalPhoneItem');
    const modalContactBtn = document.getElementById('modalContactBtn');

    let currentPhone = '';
    let currentTeacher = '';

    // Detail button click
    document.querySelectorAll('.detail-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            modalTitle.textContent = this.dataset.name;
            modalCategory.textContent = this.dataset.category;
            modalDescription.textContent = this.dataset.description;
            modalTeacher.textContent = this.dataset.teacher;
            
            // Store current contact info
            currentPhone = this.dataset.phone;
            currentTeacher = this.dataset.teacher;

            // Handle schedule
            if (this.dataset.schedule && this.dataset.schedule.trim() !== '') {
                modalSchedule.textContent = this.dataset.schedule;
                modalScheduleItem.classList.remove('hidden');
            } else {
                modalScheduleItem.classList.add('hidden');
            }

            // Handle phone
            if (this.dataset.phone && this.dataset.phone.trim() !== '') {
                modalPhone.textContent = this.dataset.phone;
                modalPhoneItem.classList.remove('hidden');
                modalContactBtn.disabled = false;
                modalContactBtn.innerHTML = '<i class="fab fa-whatsapp"></i><span>Hubungi Pembina</span>';
            } else {
                modalPhoneItem.classList.add('hidden');
                modalContactBtn.disabled = false;
                modalContactBtn.innerHTML = '<i class="fas fa-info-circle"></i><span>Hubungi Admin</span>';
            }

            // Show modal as full screen overlay
            detailModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scroll
        });
    });

    // Contact button in modal
    modalContactBtn.addEventListener('click', function() {
        if (currentPhone && currentPhone.trim() !== '') {
            window.open(`https://wa.me/${currentPhone}`, '_blank');
        } else {
            alert(`Halo! Untuk bergabung dengan ekstrakurikuler ini, silakan hubungi ${currentTeacher} atau admin sekolah. Terima kasih! 😊`);
        }
    });

    // Modal close functionality
    function closeModalFunction() {
        detailModal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore background scroll
    }

    closeModal.addEventListener('click', closeModalFunction);
    
    // Close modal when clicking outside
    detailModal.addEventListener('click', (e) => { 
        if (e.target === detailModal) {
            closeModalFunction();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !detailModal.classList.contains('hidden')) {
            closeModalFunction();
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endsection


