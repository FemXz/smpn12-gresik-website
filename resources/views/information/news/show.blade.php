@extends('layouts.app')

@section('title', $news->title . ' - SMP Negeri 12 Gresik')
@section('description', Str::limit(strip_tags($news->content), 160))

@section('content')
<!-- Hero Section with Featured Image -->
<section class="article-hero-section">
    <!-- Background Grid Pattern -->
    <div class="hero-grid-background"></div>
    
    @if($news->image)
        <div class="hero-image-background">
            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="hero-bg-image">
            <div class="hero-image-overlay"></div>
        </div>
    @endif
    
    <div class="hero-container">
        <div class="hero-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <span class="breadcrumb-separator">/</span>
                <a href="{{ route('information.news') }}" class="breadcrumb-item">Berita</a>
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-current">{{ Str::limit($news->title, 50) }}</span>
            </nav>

            <!-- Category Badge -->
            @if($news->category)
                <div class="category-badge">
                    <i class="fas fa-tag"></i>
                    {{ $news->category }}
                </div>
            @endif
            
            <!-- Title -->
            <h1 class="article-title">
                {{ $news->title }}
            </h1>
            
            <!-- Meta Information -->
            <div class="article-meta">
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $news->author ?? 'Admin SMP Negeri 12 Gresik' }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-eye"></i>
                    <span>{{ number_format($news->view_count ?? 0) }} views</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ ceil(str_word_count(strip_tags($news->content)) / 200) }} min read</span>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
                <div class="scroll-arrow">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content-section">
    <div class="article-container">
        <div class="article-wrapper">
            <!-- Featured Image Card (if exists and not shown in hero) -->
            @if($news->image)
                <div class="featured-image-card">
                    <div class="image-container">
                        <img src="{{ asset($news->image) }}" 
                             alt="{{ $news->title }}" 
                             class="featured-image">
                        <div class="image-caption">
                            {{ $news->title }}
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Social Share Buttons -->
            <div class="social-share-container">
                <div class="social-share">
                    <span class="share-label">Bagikan:</span>
                    <div class="share-buttons">
                        <button class="share-btn facebook" data-platform="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button class="share-btn twitter" data-platform="twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="share-btn whatsapp" data-platform="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button class="share-btn copy-link" data-platform="copy">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Article Content -->
            <div class="article-content">
                {!! $news->content !!}
            </div>
            
            <!-- Tags Section -->
            @if($news->tags || $news->category)
                <div class="tags-section">
                    <h4 class="tags-title">Tags:</h4>
                    <div class="tags-container">
                        @if($news->category)
                            <span class="tag">{{ $news->category }}</span>
                        @endif
                        @if($news->tags)
                            @foreach(explode(',', $news->tags) as $tag)
                                <span class="tag">{{ trim($tag) }}</span>
                            @endforeach
                        @else
                            <span class="tag">Berita</span>
                            <span class="tag">SMP Negeri 12 Gresik</span>
                            <span class="tag">Pendidikan</span>
                        @endif
                    </div>
                </div>
            @endif
            
            <!-- Navigation -->
            <div class="article-navigation">
                <a href="{{ route('information.news') }}" class="nav-btn back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Berita
                </a>
                <button class="nav-btn share-btn-mobile" onclick="shareArticle()">
                    <i class="fas fa-share-alt"></i>
                    Bagikan
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Related News Section -->
@if($relatedNews && $relatedNews->count() > 0)
<section class="related-news-section">
  <div class="related-container">
    
    <div class="section-header text-center mb-4">
      <h2 class="section-title">Berita Terkait</h2>
      <p class="section-subtitle">Artikel menarik lainnya yang mungkin Anda sukai</p>
    </div>

    <div class="related-grid">
      @foreach($relatedNews as $item)
      <article class="related-card">
        <div class="related-image-container">
          @if(!empty($item->image))
            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="related-image">
          @else
            <div class="related-image-placeholder">
              <i class="fas fa-newspaper"></i>
            </div>
          @endif

          @if(!empty($item->category))
            <span class="related-badge">{{ $item->category }}</span>
          @endif
        </div>

        <div class="related-content">
          <div class="related-meta">
            <span class="related-date">
              <i class="fas fa-calendar-alt"></i>
              {{ optional($item->published_at ?? $item->created_at)->format('d M Y') }}
            </span>
          </div>

          <h3 class="related-title">
            <a href="{{ route('information.news.show', $item->slug) }}">{{ $item->title }}</a>
          </h3>

          <p class="related-excerpt">
            {{ Str::limit(strip_tags($item->content), 100) }}
          </p>

          <a href="{{ route('information.news.show', $item->slug) }}" class="related-link">
            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </article>
      @endforeach
    </div>

    <div class="more-news text-center mt-4">
      <a href="{{ route('information.news') }}" class="btn btn-outline">
        <i class="fas fa-newspaper"></i> Lihat Semua Berita
      </a>
    </div>

  </div>
</section>
@endif


<!-- Back to Top Button -->
<button id="backToTop" class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Reading Progress Bar -->
<div class="reading-progress">
    <div class="reading-progress-bar"></div>
</div>

@push('styles')
<style>
/* ========================================
   ARTICLE PAGE STYLES
   ======================================== */

/* CSS Variables - Consistent with index page */
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

.article-hero-section {
    position: relative;
    margin-top: 50px;
    min-height: 70vh;
    background: var(--gradient-hero);
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-grid-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
        linear-gradient(to right, rgba(255,255,255,0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    opacity: 0.3;
    pointer-events: none;
    z-index: 1;
}

.hero-image-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
}

.hero-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(20, 83, 45, 0.8) 0%, rgba(22, 163, 74, 0.6) 100%);
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-6);
    width: 100%;
    position: relative;
    z-index: 10;
}

.hero-content {
    text-align: center;
    max-width: 900px;
    margin: 0 auto;
}

/* Breadcrumb */
.breadcrumb {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    margin-bottom: var(--space-9);
    font-size: 0.9rem;
}

.breadcrumb-item {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: var(--transition-normal);
}

.breadcrumb-item:hover {
    color: white;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.6);
}

.breadcrumb-current {
    color: white;
    font-weight: 600;
}

/* Category Badge */
.category-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: var(--space-6);
}

/* Article Title */
.article-title {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(1.5rem, 2.5vw, 1rem); /* lebih besar biar stand out */
    font-weight: 800;
    color: white;
    line-height: 1.3;
    margin-bottom: 15px; /* rapetin jarak ke meta */
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

/* Article Meta */
.article-meta {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;         
    margin-bottom: 20px; 
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}


/* Scroll Indicator */
.scroll-indicator {
    margin-top: var(--space-8);
}

.scroll-arrow {
    animation: bounce 2s infinite;
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.5rem;
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0,-30px,0);
    }
    70% {
        transform: translate3d(0,-15px,0);
    }
    90% {
        transform: translate3d(0,-4px,0);
    }
}

/* ========================================
   ARTICLE CONTENT SECTION
   ======================================== */
.article-content-section {
    padding: var(--space-4) 0;
    background: white;
}

.article-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-6);
}

.article-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

/* Featured Image Card */
.featured-image-card {
    margin-bottom: var(--space-16);
    margin-top: calc(-1 * var(--space-20));
    position: relative;
    z-index: 20;
}

.image-container {
    background: white;
    padding: var(--space-6);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-2xl);
    border: 1px solid var(--gray-100);
}

.featured-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: var(--radius-2xl);
    transition: var(--transition-normal);
    cursor: zoom-in;
}

.featured-image:hover {
    transform: scale(1.02);
}

.image-caption {
    text-align: center;
    margin-top: var(--space-4);
    color: var(--gray-600);
    font-style: italic;
    font-size: 0.9rem;
}

/* Social Share */
.social-share-container {
    display: flex;
    justify-content: center;
    margin-bottom: var(--space-16);
}

.social-share {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    background: white;
    backdrop-filter: blur(10px);
    border: 1px solid var(--gray-200);
    padding: var(--space-4) var(--space-6);
    border-radius: var(--radius-full);
    box-shadow: var(--shadow-lg);
}

.share-label {
    font-weight: 600;
    color: var(--gray-700);
    font-size: 0.9rem;
}

.share-buttons {
    display: flex;
    gap: var(--space-2);
}

.share-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    color: white;
    cursor: pointer;
    transition: var(--transition-bounce);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

.share-btn:hover {
    transform: translateY(-2px) scale(1.1);
    box-shadow: var(--shadow-lg);
}

.share-btn.facebook { background: #1877f2; }
.share-btn.twitter { background: #1da1f2; }
.share-btn.whatsapp { background: #25d366; }
.share-btn.copy-link { background: var(--gray-600); }

/* Article Content */
.article-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--gray-800);
    margin-bottom: var(--space-16);
}

.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4,
.article-content h5,
.article-content h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    color: var(--gray-900);
    margin-top: var(--space-12);
    margin-bottom: var(--space-6);
    line-height: 1.3;
}

.article-content h2 {
    font-size: 2rem;
    border-bottom: 3px solid var(--primary-600);
    padding-bottom: var(--space-3);
}

.article-content h3 {
    font-size: 1.5rem;
}

.article-content h4 {
    font-size: 1.25rem;
}

.article-content p {
    margin-bottom: var(--space-6);
}

.article-content img {
    width: 100%;
    height: auto;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-lg);
    margin: var(--space-8) 0;
    cursor: zoom-in;
    transition: var(--transition-normal);
}

.article-content img:hover {
    transform: scale(1.02);
    box-shadow: var(--shadow-xl);
}

.article-content blockquote {
    border-left: 4px solid var(--primary-600);
    background: linear-gradient(135deg, var(--primary-50), var(--secondary-50));
    padding: var(--space-6);
    margin: var(--space-8) 0;
    border-radius: var(--radius-xl);
    font-style: italic;
    position: relative;
}

.article-content blockquote::before {
    content: '"';
    font-size: 4rem;
    color: var(--primary-600);
    position: absolute;
    top: -0.5rem;
    left: var(--space-4);
    opacity: 0.3;
}

.article-content ul,
.article-content ol {
    margin: var(--space-6) 0;
    padding-left: var(--space-8);
}

.article-content li {
    margin-bottom: var(--space-2);
}

.article-content a {
    color: var(--primary-600);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: var(--transition-normal);
}

.article-content a:hover {
    border-bottom-color: var(--primary-600);
}

/* Tags Section */
.tags-section {
    padding: var(--space-8) 0;
    border-top: 1px solid var(--gray-200);
    margin-bottom: var(--space-8);
}

.tags-title {
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: var(--space-4);
}

.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
}

.tag {
    background: var(--primary-100);
    color: var(--primary-800);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    font-size: 0.875rem;
    font-weight: 500;
    transition: var(--transition-normal);
    cursor: pointer;
}

.tag:hover {
    background: var(--primary-200);
    transform: translateY(-1px);
}

/* Article Navigation */
.article-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-6) 0;
    border-top: 1px solid var(--gray-200);
}

.nav-btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-3) var(--space-6);
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition-bounce);
    border: none;
    cursor: pointer;
    font-size: 0.9rem;
}

.back-btn {
    background: var(--gradient-primary);
    color: white;
    box-shadow: var(--shadow-md);
}

.back-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: white;
}

.share-btn-mobile {
    background: transparent;
    color: var(--primary-600);
    border: 2px solid var(--primary-600);
    display: none;
}

.share-btn-mobile:hover {
    background: var(--primary-600);
    color: white;
    transform: translateY(-2px);
}

/* ========================================
   RELATED NEWS SECTION
   ======================================== */
.related-news-section {
    padding: var(--space-20) 0;
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
}

.related-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-6);
}

.section-header {
    text-align: center;
    margin-bottom: var(--space-16);
}

.section-title {
    font-family: 'Poppins', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: var(--space-4);
}

.section-subtitle {
    color: var(--gray-600);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-8);
    margin-bottom: var(--space-16);
}

.related-card {
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    transition: var(--transition-bounce);
    border: 1px solid var(--gray-100);
}

.related-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.related-image-container {
    position: relative;
    overflow: hidden;
}

.related-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: var(--transition-normal);
}

.related-card:hover .related-image {
    transform: scale(1.05);
}

.related-image-placeholder {
    width: 100%;
    height: 200px;
    background: var(--gray-100);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gray-400);
    font-size: 3rem;
}

.related-badge {
    position: absolute;
    top: var(--space-3);
    left: var(--space-3);
    background: var(--primary-600);
    color: white;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 600;
}

.related-content {
    padding: var(--space-6);
}

.related-meta {
    margin-bottom: var(--space-3);
}

.related-date {
    display: flex;
    align-items: center;
    gap: var(--space-1);
    color: var(--gray-500);
    font-size: 0.875rem;
}

.related-title {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: var(--space-3);
    line-height: 1.4;
}

.related-title a {
    color: var(--gray-800);
    text-decoration: none;
    transition: var(--transition-normal);
}

.related-title a:hover {
    color: var(--primary-600);
}

.related-excerpt {
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-4);
    font-size: 0.95rem;
}

.related-link {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    color: var(--primary-600);
    font-weight: 600;
    text-decoration: none;
    font-size: 0.9rem;
    transition: var(--transition-normal);
}

.related-link:hover {
    color: var(--primary-700);
    transform: translateX(4px);
}

.more-news {
    text-align: center;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-4) var(--space-8);
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition-bounce);
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-outline {
    background: transparent;
    color: var(--primary-600);
    border: 2px solid var(--primary-600);
}

.btn-outline:hover {
    background: var(--primary-600);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* ========================================
   UTILITY COMPONENTS
   ======================================== */

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: var(--space-8);
    right: var(--space-8);
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    transition: var(--transition-bounce);
    box-shadow: var(--shadow-lg);
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    transform: translateY(-4px) scale(1.1);
    box-shadow: var(--shadow-xl);
}

/* Reading Progress Bar */
.reading-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: rgba(255, 255, 255, 0.2);
    z-index: 9999;
}

.reading-progress-bar {
    height: 100%;
    background: var(--gradient-primary);
    width: 0%;
    transition: width 0.3s ease;
}

/* ========================================
   RESPONSIVE DESIGN
   ======================================== */
@media (max-width: 768px) {
    .article-hero-section {
        min-height: 60vh;
    }
    
    .article-title {
        font-size: 2rem;
    }
    
    .article-meta {
        flex-direction: column;
        align-items: center;
        gap: var(--space-3);
    }
    
    .meta-item {
        font-size: 0.8rem;
        padding: var(--space-2) var(--space-3);
    }
    
    .breadcrumb {
        flex-wrap: wrap;
        font-size: 0.8rem;
    }
    
    .featured-image-card {
        margin-top: calc(-1 * var(--space-12));
    }
    
    .image-container {
        padding: var(--space-4);
    }
    
    .featured-image {
        height: 250px;
    }
    
    .social-share {
        flex-wrap: wrap;
        justify-content: center;
        padding: var(--space-3);
    }
    
    .article-content {
        font-size: 1rem;
    }
    
    .article-navigation {
        flex-direction: column;
        gap: var(--space-3);
    }
    
    .share-btn-mobile {
        display: inline-flex;
    }
    
    .social-share-container {
        display: none;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
        gap: var(--space-6);
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .back-to-top {
        bottom: var(--space-4);
        right: var(--space-4);
        width: 45px;
        height: 45px;
    }
}

/* Untuk layar max 480px */
@media (max-width: 480px) {
    .article-title {
        font-size: 1.25rem;   /* kecilin judul */
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .article-meta {
        flex-direction: row;  /* tetap baris */
        flex-wrap: wrap;      /* biar bisa turun kalau ga muat */
        gap: 6px;             /* jarak antar item rapetin */
        margin-bottom: 15px;
    }

    .meta-item {
        font-size: 0.75rem;   /* kecilin teks */
        padding: 4px 8px;     /* lebih tipis */
        border-radius: 12px;
        gap: 4px;
    }

    .category-badge {
        font-size: 0.75rem;
        padding: 3px 8px;
        margin-bottom: 12px;
    }
}

/* Untuk layar max 360px */
@media (max-width: 360px) {
    body{
        padding-top: 20px;
    }
    .article-title {
        font-size: 1.1rem;
    }

    .article-meta {
        gap: 4px;   /* lebih rapet lagi */
    }

    .meta-item {
        font-size: 0.7rem;
        padding: 3px 6px;
    }
}
    .breadcrumb {
        margin-top: 20px;   /* agak turun di layar kecil */
        font-size: 0.8rem;  /* kecilin biar pas */
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

.related-card {
    animation: fadeInUp 0.6s ease forwards;
}

.related-card:nth-child(1) { animation-delay: 0.1s; }
.related-card:nth-child(2) { animation-delay: 0.2s; }
.related-card:nth-child(3) { animation-delay: 0.3s; }

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Print Styles */
@media print {
    .social-share-container,
    .article-navigation,
    .back-to-top,
    .reading-progress {
        display: none !important;
    }
    
    .article-hero-section {
        min-height: auto;
        background: white !important;
        color: black !important;
    }
    
    .article-title {
        color: black !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all features
    initBackToTop();
    initReadingProgress();
    initSocialShare();
    initImageZoom();
    initSmoothScrolling();
    
    // Back to Top Button
    function initBackToTop() {
        const backToTop = document.getElementById('backToTop');
        if (!backToTop) return;
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Reading Progress Bar
    function initReadingProgress() {
        const progressBar = document.querySelector('.reading-progress-bar');
        if (!progressBar) return;
        
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }
    
    // Social Share
    function initSocialShare() {
        const shareButtons = document.querySelectorAll('.share-btn');
        
        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                const platform = this.dataset.platform;
                const url = encodeURIComponent(window.location.href);
                const title = encodeURIComponent(document.title);
                
                let shareUrl = '';
                
                switch(platform) {
                    case 'facebook':
                        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                        break;
                    case 'twitter':
                        shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                        break;
                    case 'whatsapp':
                        shareUrl = `https://wa.me/?text=${title}%20${url}`;
                        break;
                    case 'copy':
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            showToast('Link berhasil disalin!');
                        });
                        return;
                }
                
                if (shareUrl) {
                    window.open(shareUrl, '_blank', 'width=600,height=400');
                }
            });
        });
    }
    
    // Image Zoom
    function initImageZoom() {
        const images = document.querySelectorAll('.article-content img, .featured-image');
        
        images.forEach(img => {
            img.addEventListener('click', function() {
                createImageModal(this.src, this.alt);
            });
        });
    }
    
    function createImageModal(src, alt) {
        const modal = document.createElement('div');
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            animation: fadeIn 0.3s ease;
        `;
        
        modal.innerHTML = `
            <div style="position: relative; max-width: 90%; max-height: 90%;">
                <img src="${src}" alt="${alt}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                <button style="position: absolute; top: -3rem; right: 0; background: none; border: none; color: white; font-size: 2rem; cursor: pointer; padding: 0.5rem;">&times;</button>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                document.body.removeChild(modal);
            }
        });
        
        modal.querySelector('button').addEventListener('click', function() {
            document.body.removeChild(modal);
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.body.contains(modal)) {
                document.body.removeChild(modal);
            }
        });
    }
    
    // Smooth Scrolling
    function initSmoothScrolling() {
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
    }
    
    // Toast Notification
    function showToast(message, duration = 3000) {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gray-800);
            color: white;
            padding: 1rem 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            z-index: 10000;
            animation: slideUp 0.3s ease;
        `;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.animation = 'slideUp 0.3s ease reverse';
            setTimeout(() => {
                if (document.body.contains(toast)) {
                    document.body.removeChild(toast);
                }
            }, 300);
        }, duration);
    }
    
    // Global share function for mobile
    window.shareArticle = function() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                url: window.location.href
            });
        } else {
            // Fallback to copy link
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Link berhasil disalin!');
            });
        }
    };
});

// Add keyframe animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(100%);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush
@endsection

