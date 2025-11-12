@extends('layouts.app')

@section('title', 'Berita - SMP Negeri 12 Gresik')
@section('description', 'Berita terbaru dan informasi penting dari SMP Negeri 12 Gresik')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <!-- Background Grid Pattern -->
    <div class="hero-grid-background"></div>
    
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-title">
                Berita & Informasi
            </h1>
            <p class="hero-subtitle">
                Ikuti perkembangan terbaru dan prestasi gemilang dari SMP Negeri 12 Gresik
            </p>
<div class="search-box">
    <form action="{{ route('information.news') }}" method="GET" class="search-form">
        <i class="fas fa-search search-icon"></i>

        <input type="text" name="search" class="search-input"
               placeholder="Cari berita..." value="{{ request('search') }}">

        <button type="button" class="clear-btn">&times;</button>

        <button type="submit" class="search-btn">
            <i class="fas fa-arrow-right"></i>
        </button>
    </form>
</div>

            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="news-container">
        <!-- Filter Tabs -->
        <div class="filter-container">
            <div class="filter-tabs">
               <a href="{{ route('information.news') }}" class="filter-tab {{ request('category') == null ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> Semua Berita
                </a>
                <a href="{{ route('information.news', ['category' => 'Akademik']) }}" class="filter-tab {{ request('category') == 'Akademik' ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap"></i> Akademik
                </a>
                <a href="{{ route('information.news', ['category' => 'Prestasi']) }}" class="filter-tab {{ request('category') == 'Prestasi' ? 'active' : '' }}">
                    <i class="fas fa-trophy"></i> Prestasi
                </a>
                <a href="{{ route('information.news', ['category' => 'Acara']) }}" class="filter-tab {{ request('category') == 'Acara' ? 'active' : '' }}">
                    <i class="fas fa-calendar"></i> Acara
                </a>

            </div>
        </div>

        <!-- News Grid -->
        <div class="news-grid">
            @if($news->isEmpty() && request('search'))
                <div class="no-results">
                    <div class="no-results-content">
                        <i class="fas fa-search no-results-icon"></i>
                        <h3 class="no-results-title">Tidak ditemukan</h3>
                        <p class="no-results-text">
                            Tidak ada berita yang cocok dengan pencarian:
                            <strong>"{{ request('search') }}"</strong>.
                        </p>
                        <a href="{{ route('information.news') }}" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Kembali ke semua berita
                        </a>
                    </div>
                </div>
            @else
                @forelse($news as $item)
                <article class="news-card" data-category="{{ strtolower($item->category ?? 'general') }}">
                    <div class="news-image-container">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="news-image">
                        @else
                            <div class="news-image-placeholder">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        @endif

                        @if($item->category)
                            <span class="news-badge">
                                {{ $item->category }}
                            </span>
                        @endif
                    </div>

                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                            </span>
                            <span class="news-meta-item">
                                <i class="fas fa-user"></i>
                                {{ $item->author ?? 'Admin' }}
                            </span>
                            @if($item->view_count)
                                <span class="news-meta-item">
                                    <i class="fas fa-eye"></i>
                                    {{ $item->view_count }} views
                                </span>
                            @endif
                        </div>

                        <h3 class="news-title">
                        <a href="{{ route('information.news.show', $item->slug) }}" class="news-link">
                            {{ $item->title }}
                        </a>

                        </h3>

                        <p class="news-excerpt">
                            {{ Str::limit(strip_tags($item->content), 120) }}
                        </p>

                    <a href="{{ route('information.news.show', $item->slug) }}" class="btn btn-primary">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>

                    </div>
                </article>
                @empty
                <div class="no-news">
                    <div class="no-news-content">
                        <i class="fas fa-newspaper no-news-icon"></i>
                        <h3 class="no-news-title">Belum Ada Berita</h3>
                        <p class="no-news-text">Berita akan segera hadir. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
                @endforelse
            @endif
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="pagination-container">
            <div class="pagination-wrapper">
                {{ $news->appends(request()->query())->links() }}
            </div>
        </div>
        @endif
    </div>
</section>


<!-- Notifikasi -->
<div class="notification" id="notification" style="display: none;">
    <div class="notification-icon">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <div class="notification-content">
        <div class="notification-title">Oops!</div>
        <div class="notification-message">Tidak ada berita ditemukan</div>
    </div>
    <button class="close-btn" id="closeBtn">
        <i class="fas fa-times"></i>
    </button>
</div>


<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="newsletter-container">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <h3 class="newsletter-title">Dapatkan Berita Terbaru</h3>
                <p class="newsletter-subtitle">Berlangganan newsletter kami untuk mendapatkan informasi terbaru langsung di email Anda.</p>
            </div>
            <div class="newsletter-form-container">
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Email Anda">
                    <button type="submit" class="newsletter-button">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* ========================================
   CSS VARIABLES - SMART SCHOOL THEME
   ======================================== */
:root {
/* Primary - Modern Green */
--primary-50:  #f0fdf4;
--primary-100: #dcfce7;
--primary-200: #bbf7d0;
--primary-300: #86efac;
--primary-400: #4ade80;
--primary-500: #22c55e; 
--primary-600: #16a34a;
--primary-700: #15803d;
--primary-800: #166534;
--primary-900: #14532d;

    /* Secondary Colors - Tech Green */
    --secondary-50: #ecfdf5;
    --secondary-100: #d1fae5;
    --secondary-200: #a7f3d0;
    --secondary-300: #6ee7b7;
    --secondary-400: #34d399;
    --secondary-500: #10b981;
    --secondary-600: #059669;
    --secondary-700: #047857;
    --secondary-800: #065f46;
    --secondary-900: #064e3b;
    
    /* Neutral Colors */
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-400: #9ca3af;
    --gray-500: #6b7280;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-800: #1f2937;
    --gray-900: #111827;
    
    /* Smart Gradients */
    --gradient-primary: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-500) 50%, var(--secondary-500) 100%);
    --gradient-secondary: linear-gradient(135deg, var(--secondary-500) 0%, var(--secondary-400) 100%);
    --gradient-hero: linear-gradient(135deg, var(--primary-900) 0%, var(--primary-700) 30%, var(--primary-600) 70%, var(--secondary-500) 100%);
    
    /* Modern Shadows */
    --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    
    /* Smooth Transitions */
    --transition-fast: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    
    /* Border Radius */
    --radius-sm: 0.375rem;
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;
    --radius-2xl: 1.5rem;
    --radius-3xl: 2rem;
    --radius-full: 9999px;
    
    /* Spacing */
    --space-1: 0.25rem;
    --space-2: 0.5rem;
    --space-3: 0.75rem;
    --space-4: 1rem;
    --space-5: 1.25rem;
    --space-6: 1.5rem;
    --space-8: 2rem;
    --space-10: 2.5rem;
    --space-12: 3rem;
    --space-16: 4rem;
    --space-20: 5rem;
    --space-24: 6rem;
}

/* ========================================
   HERO SECTION
   ======================================== */
.hero-section {
    position: relative;
    margin-top: 50px;
    min-height: 60vh;
    background: var(--gradient-hero);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--space-6) var(--space-4);
    overflow: hidden;
}

.hero-grid-background {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(to right, rgba(255,255,255,0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    opacity: 0.3;
    pointer-events: none;
    z-index: 1;
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    position: relative;
    z-index: 10;
    padding: 0 var(--space-6);
}

.hero-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.hero-title {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    line-height: 1.1;
    margin-bottom: var(--space-6);
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: var(--space-8);
    line-height: 1.7;
}

.search-box {
    position: relative;
    background: #fff;
    border-radius: 50px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 360px;
    margin: 0 auto;
    padding: 2px;
}

.search-form {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.search-input {
    flex: 1;
    padding: 12px 50px 12px 40px; /* space buat ikon kiri + tombol kanan */
    border: none;
    outline: none;
    font-size: 15px;
    border-radius: 50px;
    color: #333;
    background: transparent;
}

.search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #4caf50; /* hijau icon */
    font-size: 16px;
}

.clear-btn {
    position: absolute;
    right: 50px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #aaa;
    font-size: 16px;
    cursor: pointer;
    padding: 5px;
    border-radius: 50%;
    display: none;
}

.clear-btn:hover {
    background: #f2f2f2;
    color: #555;
}

.search-btn {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    background: #4caf50; /* hijau */
    border: none;
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    transition: 0.2s ease;
}

.search-btn:hover {
    background: #43a047; /* hijau lebih gelap */
}

.search-btn:active {
    background: #388e3c;
}

.search-input:focus {
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

/* clear button muncul kalau input ada isi */
.search-input:not(:placeholder-shown) ~ .clear-btn {
    display: block;
}


/* ========================================
   RESPONSIVE
   ======================================== */
@media (max-width: 1024px) {
    .hero-title {
        font-size: 2.8rem;
    }
    .hero-subtitle {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    .hero-subtitle {
        font-size: 1rem;
    }
    .search-form {
        flex-direction: column;
        gap: var(--space-3);
    }
    .search-button {
        width: 100%;
        padding: 14px;
    }
}

@media (max-width: 480px) {
  .search-box {
      max-width: 100%;       /* full width layar HP */
      margin: 0 16px;        /* kasih jarak kiri kanan */
      border-radius: 60px;   /* kapsul lebih mulus */
  }

  .search-input {
      padding: 16px 60px 16px 45px; /* lebih lega */
      font-size: 16px;              /* font lebih besar */
  }

  .search-icon {
      font-size: 18px; /* icon lebih jelas */
      left: 16px;
  }

  .clear-btn {
      right: 58px;
      font-size: 18px;
  }

  .search-btn {
      width: 44px;
      height: 44px;
      font-size: 18px;
      right: 8px;
  }
}

@media (max-width: 360px) {
  .search-box {
      max-width: 100%;       
      margin: -10px;        
      border-radius: 60px;  
  }

  .search-input {
      padding: 16px 55px 16px 50px; 
      font-size: 16px;             
  }

  .search-icon {
      font-size: 18px; 
      left: 16px;
  }

  .clear-btn {
      right: 58px;
      font-size: 18px;
  }

  .search-btn {
      width: 44px;
      height: 44px;
      font-size: 18px;
      right: 8px;
  }
}



/* ========================================
   NEWS SECTION
   ======================================== */
.news-section {
    padding: var(--space-20) 0;
}

.news-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-6);
}

.filter-tabs {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.filter-tab {
    position: relative;
    padding: 10px 22px;
    border-radius: 30px;
    border: none;
    background: white;
    color: #065f46;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    text-decoration: none;
    outline: none;
}

.filter-tab::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: rgba(16, 185, 129, 0.08);
    opacity: 0;
    transform: scale(0.9);
    transition: all 0.25s ease;
}

.filter-tab:hover::after {
    opacity: 1;
    transform: scale(1);
}

.filter-tab:hover {
    color: #059669;
    transform: translateY(-2px);
}

.filter-tab.active {
    background: linear-gradient(135deg, #0c8033ff, #159631ff, #047857);
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .filter-tabs {
        gap: 6px;
        padding: 4px;
    }
    .filter-tab {
        padding: 8px 16px;
        font-size: 13px;
    }
}


/* News Section */
.news {
    padding: var(--space-20) 0;
    background: #f9fafb;
}

/* Grid */
.news-grid {
    display: grid;
    justify-content: center;
    grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
    gap: var(--space-8);
    margin-bottom: var(--space-16);
}

/* Card */
.news-card {
    display: flex;
    flex-direction: column;
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: var(--transition-bounce);
    max-width: 400px;
    min-height: 520px; 
        margin: 0 auto;
    padding: 18px;
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

/* Image */
.news-image-container {
    position: relative;
    overflow: hidden;
}

.news-image {
    border-radius: 20px;
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: var(--transition-normal);
}

.news-card:hover .news-image {
    transform: scale(1.05);
}

.news-badge {
    position: absolute;
    top: var(--space-3);
    left: var(--space-3);
    background: var(--primary-600);
    color: white;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Content */
.news-content {
    flex: 1; /* biar dorong button ke bawah */
    display: flex;
    flex-direction: column;
    padding: var(--space-6);
}

.news-meta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    margin-bottom: var(--space-4);
    color: var(--gray-500);
    font-size: 0.85rem;
}

.news-meta-item {
    display: flex;
    align-items: center;
    gap: var(--space-1);
}

.news-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: var(--space-3);
    line-height: 1.4;
}

.news-link {
    color: var(--gray-800);
    text-decoration: none;
    transition: var(--transition-normal);
}

.news-link:hover {
    color: var(--primary-600);
}

.news-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    font-size: 0.9rem;
    margin-bottom: auto; /* dorong button ke bawah */
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-6);
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition-bounce);
    border: none;
    cursor: pointer;
    font-size: 0.9rem;
    margin-top: auto; /* selalu di bawah */
}

.btn-primary {
    background: var(--gradient-primary);
    color: white;
    box-shadow: var(--shadow-md);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: white;
}


/* No Results/News */
.no-results,
.no-news {
    grid-column: 1 / -1;
    text-align: center;
    padding: var(--space-20) var(--space-6);
}

.no-results-content,
.no-news-content {
    max-width: 400px;
    margin: 0 auto;
}

.no-results-icon,
.no-news-icon {
    font-size: 4rem;
    color: var(--gray-400);
    margin-bottom: var(--space-6);
}

.no-results-title,
.no-news-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--gray-600);
    margin-bottom: var(--space-3);
}

.no-results-text,
.no-news-text {
    color: var(--gray-500);
    margin-bottom: var(--space-6);
}

/* Pagination */
.pagination-container {
    display: flex;
    justify-content: center;
}

.pagination-wrapper {
    display: flex;
    gap: var(--space-2);
}

/* ========================================
   NEWSLETTER SECTION
   ======================================== */
.newsletter-section {
    padding: var(--space-20) 0;
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
}

.newsletter-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-6);
}

.newsletter-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: var(--space-8);
    align-items: center;
}

.newsletter-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.875rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: var(--space-3);
}

.newsletter-subtitle {
    color: var(--gray-600);
    line-height: 1.6;
}

.newsletter-form {
    display: flex;
    gap: var(--space-2);
}

.newsletter-input {
    flex: 1;
    padding: var(--space-3) var(--space-5);
    border-radius: var(--radius-full);
    border: 2px solid var(--gray-200);
    outline: none;
    transition: var(--transition-normal);
}

.newsletter-input:focus {
    border-color: var(--primary-600);
    box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
}

.newsletter-button {
    padding: var(--space-3) var(--space-6);
    border-radius: var(--radius-full);
    border: none;
    background: var(--gradient-primary);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition-bounce);
    white-space: nowrap;
}

.newsletter-button:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}


/* === NOTIFICATION === */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #10b981, #059669, #047857);
    color: white;
    padding: 16px 20px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    display: flex;
    align-items: center;
    gap: 12px;
    max-width: 320px;
    width: calc(100% - 40px);
    z-index: 9999;
    animation: slideIn 0.3s ease-out;
}

/* garis tipis atas */
.notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #34d399, #10b981, #059669);
}

.notification-icon {
    background: rgba(255, 255, 255, 0.15);
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.notification-content {
    flex: 1;
}

.notification-title {
    font-weight: 600;
    font-size: 15px;
    margin-bottom: 2px;
}

.notification-message {
    font-size: 13px;
    opacity: 0.9;
    line-height: 1.4;
}

.close-btn {
    background: none;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    padding: 6px;
    border-radius: 8px;
    opacity: 0.7;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.close-btn:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.1);
}

/* Animasi */
@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.notification.fade-out {
    animation: fadeOut 0.3s ease-in forwards;
}

@keyframes fadeOut {
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

/* Responsif buat mobile */
@media (max-width: 640px) {
    .notification {
        right: 10px;
        left: 10px;
        max-width: none;
        width: auto;
        font-size: 14px;
        padding: 14px 16px;
    }
    .notification-icon {
        width: 36px;
        height: 36px;
        font-size: 16px;
    }
    .notification-title {
        font-size: 14px;
    }
    .notification-message {
        font-size: 12px;
    }
}




/* ========================================
   RESPONSIVE DESIGN
   ======================================== */
@media (max-width: 768px) {
    .hero-section {
        min-height: 50vh;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .search-form {
        flex-direction: column;
    }
    
    .filter-tabs {
        justify-content: center;
    }
    
    .filter-tab {
        margin: var(--space-1);
        padding: var(--space-2) var(--space-4);
        font-size: 0.9rem;
    }
    
    .news-grid {
        grid-template-columns: 1fr;
        gap: var(--space-6);
    }
    
    .newsletter-content {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .newsletter-form {
        flex-direction: column;
    }
}

/* ========================================
   ANIMATIONS
   ======================================== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.news-card {
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.news-card.loading {
    opacity: 0.7;
    pointer-events: none;
    position: relative;
}

.news-card.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: shimmer 1.5s infinite;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // === FILTER TABS ===
    const filterTabs = document.querySelectorAll(".filter-tab");
    const newsCards = document.querySelectorAll(".news-card");

    filterTabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            const filter = this.dataset.filter;

            // Update active tab
            filterTabs.forEach((t) => t.classList.remove("active"));
            this.classList.add("active");

            // Add loading state
            newsCards.forEach((card) => {
                card.classList.add("loading");
            });

            // Filter cards
            setTimeout(() => {
                newsCards.forEach((card) => {
                    card.classList.remove("loading");

                    if (filter === "all") {
                        card.style.display = "block";
                    } else {
                        const category = card.dataset.category;
                        if (category && category.includes(filter)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    }
                });
            }, 300);
        });
    });

    // === NEWSLETTER FORM ===
    const newsletterForm = document.querySelector(".newsletter-form");
    if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const email = this.querySelector(".newsletter-input").value;

            if (email) {
                const button = this.querySelector(".newsletter-button");
                const originalText = button.innerHTML;

                button.innerHTML = '<i class="fas fa-check"></i> Berhasil!';
                button.style.background = "var(--gradient-secondary)";

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = "var(--gradient-primary)";
                    this.reset();
                }, 2000);
            }
        });
    }

    // === SEARCH ===
    const input = document.querySelector(".search-input");
    const clearBtn = document.querySelector(".clear-btn");
    const searchForm = document.querySelector(".search-form");

    // clear button
    if (clearBtn) {
        clearBtn.addEventListener("click", () => {
            input.value = "";
            clearBtn.style.display = "none";
            input.focus();
            showAllNews();
        });
    }

    // submit search
    if (searchForm) {
        searchForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const keyword = input.value.toLowerCase().trim();
            let found = 0;

            newsCards.forEach((card) => {
                const title =
                    card.querySelector(".news-title")?.innerText.toLowerCase() ||
                    "";
                const content =
                    card
                        .querySelector(".news-content")
                        ?.innerText.toLowerCase() || "";

                if (title.includes(keyword) || content.includes(keyword)) {
                    card.style.display = "block";
                    found++;
                } else {
                    card.style.display = "none";
                }
            });

            // kalau tidak ada hasil → tampilkan notifikasi
            if (found === 0) {
                showNotification();
            }
        });
    }

    // tampilkan semua berita lagi
    function showAllNews() {
        newsCards.forEach((card) => (card.style.display = "block"));
    }

    // show/hide clear button
    input.addEventListener("input", () => {
        clearBtn.style.display = input.value ? "block" : "none";
    });

    // === NOTIFICATION ===
    const notification = document.getElementById("notification");
    const closeBtn = document.getElementById("closeBtn");

    function showNotification() {
        if (!notification) return;
        notification.style.display = "flex";
        notification.classList.remove("fade-out");

        setTimeout(() => {
            notification.classList.add("fade-out");
            setTimeout(() => {
                notification.style.display = "none";
            }, 300);
        }, 3000); // auto close 3 detik
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            notification.classList.add("fade-out");
            setTimeout(() => {
                notification.style.display = "none";
            }, 300);
        });
    }
});
</script>

@endpush
@endsection

