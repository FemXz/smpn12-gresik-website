@extends('layouts.app')

@section('title', 'Beranda - SMP Negeri 12 Gresik Smart School')
@section('description', 'SMP Negeri 12 Gresik adalah Smart School unggulan yang mengutamakan kualitas pendidikan dengan teknologi modern dan tenaga pengajar profesional.')

@push('styles')
<style>
    /* ========================================
       ADDITIONAL STYLES FOR HOME PAGE
       ======================================== */

    /* Hero Section Enhancements */
    .hero {
        padding-top: 80px; /* Account for fixed navbar */
    }

    /* Stats Section */
    .stats {
        background: var(--gradient-primary);
        padding: var(--space-16) 0;
        position: relative;
        overflow: hidden;
    }

    .stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23dots)"/></svg>');
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--space-8);
        position: relative;
        z-index: 2;
    }

    .stat-item {
        text-align: center;
        color: white;
        padding: var(--space-6);
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-2xl);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition-bounce);
    }

    .stat-item:hover {
        transform: translateY(-10px) scale(1.05);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: var(--shadow-2xl);
    }

    .stat-icon {
        font-size: 3rem;
        margin-bottom: var(--space-4);
        opacity: 0.9;
    }

    .stat-number {
        font-family: 'Poppins', sans-serif;
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: var(--space-2);
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: 1.1rem;
        font-weight: 500;
        opacity: 0.9;
    }

  /* =========================
   NEWS SECTION
   ========================= */
.news {
    padding: 60px 20px;
    background: #f9fafbbe; /* abu lembut */
}

/* Grid */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 350px));
    gap: 2rem;
    justify-content: center;
}

/* Card */
.news-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 350px;
    position: relative;
    padding: 18px;
}

.news-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 12px 25px rgba(0,0,0,0.12);
}

/* Image */
.news-image {
    height: 220px;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    background: #ddd;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.08);
}

/* Date badge */
.news-date {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, #16a34a, #22c55e);
    color: white;
    padding: 5px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

/* Content */
.news-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.news-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 10px;
    line-height: 1.4;
}

.news-title a {
    text-decoration: none;
    color: inherit;
    transition: color 0.3s ease;
}

.news-title a:hover {
    color: #16a34a;
}

.news-excerpt {
    font-size: 0.9rem;
    line-height: 1.6;
    color: #6b7280;
    flex-grow: 1;
    margin-bottom: 15px;
}


/* 📱 Mobile 360px Fix */
@media (max-width: 390px) {
    .news-card {
        max-width: 100%;
        padding: 14px;
        border-radius: 16px;
    }

    .news-image {
        height: 180px;
        border-radius: 14px;
    }

    .news-date {
        top: 10px;
        right: 10px;
        font-size: 0.7rem;
        padding: 4px 10px;
        border-radius: 10px;
    }

    .news-content {
        padding: 14px 4px 0 4px;
    }

    .news-title {
        font-size: 1rem;
        margin-bottom: 8px;
        line-height: 1.35;
    }

    .news-excerpt {
        font-size: 0.8rem;
        line-height: 1.4;
        margin-bottom: 12px;
    }
}




/* Button */
.news-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #16a34a, #22c55e);
    color: white;
    padding: 10px 18px;
    border-radius: 9999px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(22,163,74,0.3);
    transition: all 0.3s ease;
    margin-top: auto; /* selalu ke bawah */
}

.news-button i {
    margin-left: 8px;
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.news-button:hover {
    background: linear-gradient(135deg, #15803d, #16a34a);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(22,163,74,0.4);
}

.news-button:hover i {
    transform: translateX(4px);
}

/* Responsive */
@media (max-width: 480px) {
    .news-grid {
        grid-template-columns: 1fr;
    }
    .news-card {
        max-width: 100%;
        max-height: 90%;
    }
}

    /* Events Section */
    .events {
        padding: var(--space-24) 0;
        background: var(--gray-50);
    }

    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: var(--space-8);
    }

    .event-card {
        background: white;
        border-radius: var(--radius-2xl);
        padding: var(--space-6);
        box-shadow: var(--shadow-md);
        transition: var(--transition-bounce);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }

    .event-date {
        display: flex;
        align-items: center;
        margin-bottom: var(--space-4);
    }

    .date-box {
        background: var(--gradient-primary);
        color: white;
        padding: var(--space-3);
        border-radius: var(--radius-xl);
        text-align: center;
        min-width: 70px;
        margin-right: var(--space-3);
    }

    .date-box .day {
        font-weight: 800;
        font-size: 1.2rem;
        line-height: 1;
    }

    .date-box .month {
        font-size: 0.8rem;
        opacity: 0.9;
    }

    .event-meta {
        flex: 1;
    }

    .event-time {
        color: var(--primary-600);
        font-weight: 600;
        margin-bottom: var(--space-1);
        font-size: 0.9rem;
    }

    .event-location {
        color: var(--gray-500);
        font-size: 0.9rem;
    }

    .event-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: var(--space-3);
    }

    /* Facilities Section */
    .facilities {
        padding: var(--space-24) 0;
        background: white;
    }

    .facilities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--space-8);
    }

    .facility-card {
        background: white;
        border-radius: var(--radius-2xl);
        padding: var(--space-6);
        box-shadow: var(--shadow-md);
        transition: var(--transition-bounce);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .facility-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: var(--transition-normal);
    }

    .facility-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-xl);
    }

    .facility-card:hover::before {
        transform: scaleX(1);
    }

    .facility-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--space-4);
        box-shadow: var(--shadow-glow);
        transition: var(--transition-bounce);
    }

    .facility-card:hover .facility-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .facility-icon i {
        font-size: 2rem;
        color: white;
    }

    .facility-name {
        font-family: 'Poppins', sans-serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: var(--space-3);
    }

    .facility-description {
        color: var(--gray-600);
        line-height: 1.6;
        font-size: 0.9rem;
    }

    /* CTA Section */
    .cta {
        background: var(--gradient-hero);
        padding: var(--space-20) 0;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .cta-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: var(--space-8);
        position: relative;
        z-index: 2;
    }

    .cta-text {
        flex: 1;
    }

    .cta-text h2 {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: var(--space-4);
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .cta-text p {
        font-size: 1.2rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .cta-buttons {
        display: flex;
        gap: var(--space-4);
        flex-wrap: wrap;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: var(--space-6);
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: white;
        cursor: pointer;
        transition: var(--transition-normal);
    }

    .scroll-indicator:hover {
        transform: translateX(-50%) translateY(-5px);
    }

    .scroll-indicator small {
        display: block;
        margin-bottom: var(--space-2);
        opacity: 0.8;
    }

    .scroll-indicator i {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-6);
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .news-grid,
        .events-grid,
        .facilities-grid {
            grid-template-columns: 1fr;
        }

        .cta-content {
            flex-direction: column;
            text-align: center;
        }

        .cta-text h2 {
            font-size: 2rem;
        }

        .cta-buttons {
            justify-content: center;
        }

        .event-date {
            flex-direction: column;
            align-items: flex-start;
        }

        .date-box {
            margin-right: 0;
            margin-bottom: var(--space-3);
        }
    }

    @media (max-width: 480px) {
        .stat-item {
            padding: var(--space-4);
        }

        .stat-number {
            font-size: 2rem;
        }

        .cta-text h2 {
            font-size: 1.8rem;
        }

        .cta-text p {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero">
  <div class="hero-content">
    <div class="hero-text" data-aos="fade-right">
      <h1>Selamat Datang di<br>SMP Negeri 12 Gresik</h1>
      <p>
        Membangun generasi cerdas dan berkarakter melalui pendidikan berkualitas
        dengan teknologi modern. Bergabunglah dengan kami untuk masa depan yang gemilang.
      </p>
      <div class="hero-buttons">
        <a href="{{ route('about') }}" class="btn btn-primary">
          <i class="fas fa-info-circle"></i> Tentang Kami
        </a>
        <a href="{{ route('student.portal') ?? '#' }}" class="btn btn-outline">
          <i class="fas fa-user-graduate"></i> Portal Siswa
        </a>
      </div>
    </div>

    <!-- 🔥 Swiper 3D Card Stack (renamed to stackShowcase) -->
    <div class="swiper stackShowcase" data-aos="fade-left">
      <div class="swiper-wrapper">
        @foreach($data['latest_news']->take(5) as $index => $news)
        <div class="swiper-slide">
          <div class="stack-card" style="--i: {{ $index }}">
            <div class="stack-image">
              @if($news->image)
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
              @else
                <img src="https://via.placeholder.com/400x200?text=No+Image" alt="Placeholder">
              @endif
              <span class="stack-badge">NEW</span>
            </div>
            <div class="stack-content">
              <div class="stack-info">
                <span><i class="fas fa-calendar-alt"></i> {{ $news->published_at->format('d M Y') }}</span>
                <span><i class="fas fa-user"></i> Admin</span>
              </div>
              <h3>{{ \Illuminate\Support\Str::limit($news->title, 60) }}</h3>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 80) }}</p>
              <div class="stack-footer">
                <a href="{{ route('information.news.show', $news->slug) }}" class="stack-button">Lihat Berita</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination mt-4"></div>
    </div>

    <div class="scroll-indicator" onclick="scrollToStats()">
      <small>Scroll untuk melihat lebih banyak</small>
      <i class="fas fa-chevron-down"></i>
    </div>
  </div>
</section>

<!-- SwiperJS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const swiper = new Swiper(".stackShowcase", {
    effect: "cards",
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    slidesPerView: "auto",

    cardsEffect: {
      perSlideRotate: 6,
      perSlideOffset: 10,
      rotate: true,
      slideShadows: false,
    },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    observer: true,
    observeParents: true,
    watchSlidesProgress: true,
    speed: 800,
  });
});
</script>

<style>
/* === SWIPER STACK SHOWCASE === */
.stackShowcase {
  width: 100%;
  max-width: 380px; /* Sedikit lebih lebar biar proporsional */
  perspective: 1000px;
  margin: 0 auto;
  padding: 12px;
  box-sizing: border-box;
  overflow: visible !important;
}

.stackShowcase .swiper-slide {
  display: flex;
  justify-content: center;
  align-items: center;
}

/* === CARD STYLE === */
.stack-card {
  width: 100%;
  aspect-ratio: 3 / 4.2; /* ✅ menjaga proporsi seragam antar card */
  background: linear-gradient(180deg, #ffffff 0%, #f9fafb 100%);
  border-radius: 18px;
  overflow: hidden;
  transition: all 0.35s ease;
  display: flex;
  flex-direction: column;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  padding: 8px;
}

/* Hover effect */
.stack-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
}

/* === IMAGE === */
.stack-image {
  position: relative;
  width: 100%;
  height: 55%; /* ✅ proporsional dengan tinggi card */
  overflow: hidden;
  border-radius: 14px;
}

.stack-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.stack-card:hover .stack-image img {
  transform: scale(1.06);
}

/* === BADGE === */
.stack-badge {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background: linear-gradient(135deg, #16a34a, #0f766e);
  color: #fff;
  padding: 5px 10px;
  border-radius: 6px;
  font-size: 0.7rem;
  font-weight: 600;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

/* === CONTENT === */
.stack-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 0.9rem 1rem 1.1rem;
  color: #222;
}

/* === INFO === */
.stack-info {
  display: flex;
  justify-content: space-between;
  font-size: 0.78rem;
  color: #6b7280;
  font-weight: 500;
  flex-wrap: wrap;
  gap: 6px;
}

.stack-info i {
  color: #16a34a;
  margin-right: 4px;
}

/* === TITLE === */
.stack-content h3 {
  font-size: 1rem;
  font-weight: 700;
  color: #111827;
  line-height: 1.35;
  transition: color 0.3s ease;
  margin: 0 0 4px;
}

.stack-card:hover h3 {
  color: #0f766e;
}

/* === TEXT === */
.stack-content p {
  font-size: 0.85rem;
  line-height: 1.45;
  color: #374151;
  margin: 0 0 0.6rem;
}

/* === BUTTON === */
.stack-button {
  display: block;
  width: 100%;
  text-align: center;
  background: linear-gradient(135deg, #16a34a, #0f766e);
  color: #fff;
  font-size: 0.82rem;
  font-weight: 600;
  padding: 8px 0;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
}

.stack-button:hover {
  background: linear-gradient(135deg, #0f766e, #064e3b);
  transform: translateY(-2px);
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
  .stackShowcase {
    max-width: 340px;
    padding: 10px;
  }

  .stack-card {
    aspect-ratio: 3 / 4.5; /* sedikit lebih tinggi di mobile */
    border-radius: 16px;
    padding: 6px;
  }

  .stack-image {
    height: 50%;
  }

  .stack-content h3 {
    font-size: 0.95rem;
  }

  .stack-content p {
    font-size: 0.8rem;
  }

  .stack-button {
    font-size: 0.78rem;
  }
}

@media (max-width: 480px) {
  .stackShowcase {
    max-width: 300px;
    padding: 8px;
  }

  .stack-card {
    aspect-ratio: 3 / 4.8;
    border-radius: 14px;
  }
}


</style>



<script>
// Drag-scroll 3D Card
const slider = document.querySelector(".news-card-stack");
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener("mousedown", e => {
  isDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener("mouseleave", () => isDown = false);
slider.addEventListener("mouseup", () => isDown = false);
slider.addEventListener("mousemove", e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 1.3;
  slider.scrollLeft = scrollLeft - walk;
});

// Touch support
slider.addEventListener("touchstart", e => {
  isDown = true;
  startX = e.touches[0].pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener("touchend", () => isDown = false);
slider.addEventListener("touchmove", e => {
  if (!isDown) return;
  const x = e.touches[0].pageX - slider.offsetLeft;
  const walk = (x - startX) * 1.3;
  slider.scrollLeft = scrollLeft - walk;
});
</script>


<!-- Stats Section -->
<section class="stats" id="stats-section">
    <div class="container">
        <div class="stats-grid" data-aos="fade-up">

            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stat-number" data-count="{{ $stat->students ?? 850 }}">0</div>
                <div class="stat-label">Siswa Aktif</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-number" data-count="{{ $stat->teachers ?? 45 }}">0</div>
                <div class="stat-label">Tenaga Pengajar</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" data-count="{{ $stat->staff ?? 25 }}">0</div>
                <div class="stat-label">Staf Administrasi</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-number" data-count="{{ $stat->achievements ?? 150 }}">0</div>
                <div class="stat-label">Prestasi Diraih</div>
            </div>

        </div>
    </div>
</section>



    <style>
        .welcome-hero {
            background-color: #f0f9f7;
            padding: 60px 20px;
        }

        .welcome-hero__container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .welcome-hero__image {
            width: 100%;
            height: 450px;
            background-color: #e0f2f1;
            border-radius: 8px;
            overflow: hidden;
        }

        .welcome-hero__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .welcome-hero__content h2 {
            font-size: 28px;
            font-weight: 600;
            color: #1b5e20;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .welcome-hero__subtitle {
            font-size: 14px;
            font-weight: 500;
            color: #4caf50;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .welcome-hero__text {
            font-size: 15px;
            line-height: 1.7;
            color: #424242;
            margin-bottom: 16px;
        }

        .welcome-hero__text:last-of-type {
            margin-bottom: 28px;
        }

        .welcome-hero__signature {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #c8e6c9;
        }

        .welcome-hero__name {
            font-size: 16px;
            font-weight: 600;
            color: #1b5e20;
            margin-bottom: 4px;
        }

        .welcome-hero__position {
            font-size: 13px;
            color: #558b2f;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-hero {
                padding: 40px 20px;
            }

            .welcome-hero__container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .welcome-hero__image {
                height: 350px;
            }

            .welcome-hero__content h2 {
                font-size: 24px;
            }

            .welcome-hero__text {
                font-size: 14px;
                line-height: 1.6;
            }
        }

        @media (max-width: 480px) {
            .welcome-hero {
                padding: 30px 16px;
            }

            .welcome-hero__container {
                gap: 20px;
            }

            .welcome-hero__image {
                height: 280px;
            }

            .welcome-hero__content h2 {
                font-size: 20px;
            }

            .welcome-hero__subtitle {
                font-size: 12px;
            }

            .welcome-hero__text {
                font-size: 13px;
            }

            .welcome-hero__name {
                font-size: 14px;
            }

            .welcome-hero__position {
                font-size: 12px;
            }
        }
    </style>
    <section class="welcome-hero">
        <div class="welcome-hero__container">
            <div class="welcome-hero__image">
                <img src="https://via.placeholder.com/500x450?text=Foto+Kepala+Sekolah" alt="Kepala Sekolah">
            </div>

            <div class="welcome-hero__content">
                <div class="welcome-hero__subtitle">Sambutan Kepala Sekolah</div>
                <h2>Selamat Datang di Sekolah Kami</h2>

                <p class="welcome-hero__text">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh. Dengan penuh kebanggaan, saya menyambut Anda di sekolah kami. Kami berkomitmen untuk memberikan pendidikan berkualitas yang mengembangkan akademik, karakter, dan kepribadian setiap siswa.
                </p>

                <p class="welcome-hero__text">
                    Setiap siswa adalah aset berharga. Dengan dedikasi dan dukungan dari semua pihak, kami yakin dapat menciptakan generasi yang cerdas, berakhlak mulia, dan siap menghadapi masa depan.
                </p>

                <div class="welcome-hero__signature">
                    <div class="welcome-hero__name">Drs. Nama Kepala Sekolah</div>
                    <div class="welcome-hero__position">Kepala Sekolah</div>
                </div>
            </div>
        </div>
    </section>


<!-- Latest News Section -->
<section class="news">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Berita Terbaru</h2>
            <p>Ikuti perkembangan dan prestasi terbaru dari SMP Negeri 12 Gresik</p>
        </div>

        <div class="news-grid">
            @if(isset($data['latest_news']) && $data['latest_news']->count())
                @foreach($data['latest_news'] as $index => $news)
                    <article class="news-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
<div class="news-image">
    @if(!empty($news->image))
      <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">

    @else
        <i class="fas fa-newspaper"></i>
    @endif
    <div class="news-date">{{ $news->published_at->format('d M Y') }}</div>
</div>


                        <div class="news-content">
                            <h3 class="news-title">
                                <a href="{{ route('information.news.show', $news->slug) }}">
                                    {{ $news->title }}
                                </a>
                            </h3>
                            <p class="news-excerpt">
                                {{ \Illuminate\Support\Str::limit(strip_tags($news->content), 120) }}
                            </p>
                            <a href="{{ route('information.news.show', $news->slug) }}" class="btn btn-primary">
                                Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            @else
                <p class="text-center text-gray-500" data-aos="fade-up">
                    Belum ada berita terbaru yang ditampilkan.
                </p>
            @endif
        </div>

        <div class="text-center mt-6" data-aos="fade-up">
            <a href="{{ route('information.news') }}" class="btn btn-primary">
                <i class="fas fa-newspaper"></i>
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>


<!-- Upcoming Events Section -->
<section class="events">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Agenda Mendatang</h2>
            <p>Jangan lewatkan kegiatan dan acara penting di sekolah kami</p>
        </div>

        <div class="events-grid">
            @if(isset($data['upcoming_events']) && count($data['upcoming_events']) > 0)
                @foreach($data['upcoming_events'] as $index => $event)
                <div class="event-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="event-date">
                        <div class="date-box">
                            <div class="day">{{ date('d', strtotime($event['date'])) }}</div>
                            <div class="month">{{ date('M', strtotime($event['date'])) }}</div>
                        </div>
                        <div class="event-meta">
                            <div class="event-time">
                                <i class="fas fa-clock"></i>
                                {{ $event['time'] }}
                            </div>
                            <div class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $event['location'] }}
                            </div>
                        </div>
                    </div>
                    <h3 class="event-title">{{ $event['title'] }}</h3>
                    <a href="#" class="btn btn-primary">
                        Detail Acara <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                @endforeach
            @else
                <!-- Default events if no data -->
                <div class="event-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="event-date">
                        <div class="date-box">
                            <div class="day">25</div>
                            <div class="month">Jan</div>
                        </div>
                        <div class="event-meta">
                            <div class="event-time">
                                <i class="fas fa-clock"></i>
                                08:00 - 12:00
                            </div>
                            <div class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Aula Sekolah
                            </div>
                        </div>
                    </div>
                    <h3 class="event-title">Seminar Teknologi Pendidikan</h3>
                    <a href="#" class="btn btn-primary">
                        Detail Acara <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="event-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="event-date">
                        <div class="date-box">
                            <div class="day">30</div>
                            <div class="month">Jan</div>
                        </div>
                        <div class="event-meta">
                            <div class="event-time">
                                <i class="fas fa-clock"></i>
                                07:30 - 15:00
                            </div>
                            <div class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Lapangan Sekolah
                            </div>
                        </div>
                    </div>
                    <h3 class="event-title">Penerimaan Siswa Baru 2024</h3>
                    <a href="#" class="btn btn-primary">
                        Detail Acara <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="event-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="event-date">
                        <div class="date-box">
                            <div class="day">05</div>
                            <div class="month">Feb</div>
                        </div>
                        <div class="event-meta">
                            <div class="event-time">
                                <i class="fas fa-clock"></i>
                                09:00 - 16:00
                            </div>
                            <div class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Lab Komputer
                            </div>
                        </div>
                    </div>
                    <h3 class="event-title">Workshop Coding untuk Siswa</h3>
                    <a href="#" class="btn btn-primary">
                        Detail Acara <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

{{--
    File: resources/views/components/teacher-section.blade.php (atau nama file Anda)

    Catatan:
    - Kode ini mengasumsikan Anda meneruskan variabel `$teachers` dari controller.
    - Pastikan path untuk gambar (`asset('storage/'.$teacher->photo)`) sudah benar.
--}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
 /* === FONT DASAR === */
body, html {
    font-family: 'Inter', sans-serif;
    background-color: #f8fafc;
}

/* === CONTAINER UTAMA SECTION === */
.teacher-section-container {
    background: linear-gradient(145deg, #f9fafb 0%, #f1f5f9 100% );
}

/* === JUDUL DAN BADGE === */
.section-badge {
    background: linear-gradient(135deg, #2eb650, #0e7e39);
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    box-shadow: 0 4px 20px rgba(46, 182, 80, 0.3);
}

.main-title {
    font-size: clamp(2.25rem, 5vw, 3.5rem);
    font-weight: 800;
    color: #1e293b;
    line-height: 1.2;
}

/* === KARTU DETAIL GURU (KIRI) === */
.featured-teacher-card {
    width: 100%;
    max-width: 400px;
    height: auto;
    padding: 1rem;
    border-radius: 1.5rem;
    box-shadow: 0 20px 40px -15px rgba(0,0,0,0.08);
    overflow: hidden;
}

.featured-teacher-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 1rem;
}

.featured-teacher-name {
    font-size: 1.75rem;
    font-weight: 700;
    color: #111827;
    margin-top: 30px;
}

.featured-teacher-position {
    font-size: 1rem;
    color: #6b7280;
}

/* === GRID KARTU GURU KECIL (KANAN) === */
.teacher-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    align-content: flex-start;
}

/* Responsive grid untuk tablet dan desktop */
@media (min-width: 640px) {
    .teacher-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
}

@media (min-width: 1024px) {
    .teacher-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
}

/* === KARTU GURU KECIL (ITEM GRID) === */
.teacher-card {
    position: relative;
    cursor: pointer;
    overflow: hidden;
    border-radius: 1rem;
    background-color: #ffffffff; /* Warna placeholder saat gambar loading */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 2px solid transparent;
    padding: 20px;
    /* Menjaga rasio aspek kartu tetap konsisten */
    aspect-ratio: 3 / 4;
}

.teacher-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px -10px rgba(30, 90, 50, 0.47);
}

.teacher-card.active {
    border-color: #22c55e; /* Warna hijau untuk menandai yang aktif */
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
}

.teacher-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 20px;
    transition: transform 0.4s ease;
}

.teacher-card:hover img {
    transform: scale(1.1);
}

/* Overlay untuk nama dan jabatan (muncul saat hover) */
.teacher-card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem 1rem 1rem;
    color: white;
    background: linear-gradient(to top, rgba(7, 94, 60, 0.8), transparent);

    /* Sembunyikan di awal */
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.teacher-card:hover .teacher-card-overlay {
    opacity: 1;
    transform: translateY(0);
}

.teacher-card-name {
    font-weight: 600;
    font-size: 0.9rem;
    line-height: 1.3;
}

.teacher-card-position {
    font-size: 0.75rem;
    opacity: 0.8;
}




/* === MOBILE RESPONSIVE STYLES === */

@media (max-width: 639px) {
  .teacher-section-container {
    padding: 1.5rem 1rem;
  }

.featured-teacher-card {
  width: 100%;
  max-width: 100%;
  height: auto;
  padding: 0;
  overflow: hidden;
  border-radius: 12px;
}

.featured-teacher-image img {
  width: 200px;
  height: 400px;
  object-fit: contain;   /* biar full tanpa kepotong */
  object-position: center;
  display: block;
}


.featured-teacher-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;  /* biar full kiri–kanan */
  object-position: top center; /* fokus ke bagian atas, bawahnya melar */
  display: block;
}


  .teacher-grid {
    grid-template-columns: repeat(2, 1fr); /* 2 kolom di mobile */
    gap: 1rem;
  }
  .teacher-card {
    width: 100%;
    max-width: 160px;  /* kecilin card */
    padding: 10px;
    aspect-ratio: 3/4;
  }
}

@media (max-width: 1023px) {
    .featured-teacher-card {
        padding: 1.5rem;
    }

    .featured-teacher-image {
        max-width: 200px;
    }

    .featured-teacher-name {
        font-size: 1.5rem;
    }

    .main-title {
        font-size: 2rem;
    }

    .section-badge {
        font-size: 0.75rem;
        padding: 0.4rem 1.2rem;
    }
}

@media (max-width: 639px) {
    .teacher-section-container {
        padding: 3rem 0;
    }

    .featured-teacher-card {
        padding: 1rem;
    }

    .featured-teacher-image {
        max-width: 150px;
    }

    .featured-teacher-name {
        font-size: 1.25rem;
        margin-top: 1rem;
    }

    .main-title {
        font-size: 1.75rem;
    }

    .teacher-grid {
        gap: 0.75rem;
    }

    .teacher-card {
        aspect-ratio: 1 / 1.2;
    }
}

/* === SMOOTH TRANSITIONS === */
.featured-teacher-card {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

/* === HOVER EFFECTS === */
.featured-teacher-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 25px 50px -15px rgba(0, 0, 0, 0.12);
}

/* === SOCIAL ICONS STYLING === */
.social-icons a {
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: 0.5rem;
}

.social-icons a:hover {
    background-color: #f3f4f6;
    transform: translateY(-2px);
}


    </style>
</head>
<body>




<section class="ppdb-section-v3">
    <div class="container">
        <div class="ppdb-card-v3" data-aos="fade-up">

            <!-- Kolom Kiri: Konten Informasi -->
            <div class="ppdb-content-v3">
                <div class="ppdb-header-v3">
                    <span class="ppdb-badge-v3">
                        {{ optional($ppdb)->section_badge ?? 'PPDB T.A.' }}
                    </span>

                    <h2 class="ppdb-title-v3">
                        {{ optional($ppdb)->section_title ?? 'Informasi Penerimaan Siswa Baru' }}
                    </h2>

                    <p class="ppdb-description-v3">
                        {!! optional($ppdb)->section_description ?? 'Deskripsi belum diatur.' !!}
                    </p>
                </div>

                <!-- JALUR PENDAFTARAN -->
                <div class="ppdb-schedule-v3">

                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-hands-helping"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Afirmasi</h6>
                            <span>{{ optional($ppdb)->section_jalur_afirmasi ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-exchange-alt"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Perpindahan Tugas</h6>
                            <span>{{ optional($ppdb)->section_jalur_pindah ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-trophy"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Prestasi</h6>
                            <span>{{ optional($ppdb)->section_jalur_prestasi ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-map-marked-alt"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Zonasi</h6>
                            <span>{{ optional($ppdb)->section_jalur_zonasi ?? '-' }}</span>
                        </div>
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="ppdb-buttons-v3">

                    <a href="{{ optional($ppdb)->button_panduan_link ?? '#' }}"
                       class="btn btn-primary">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ optional($ppdb)->button_panduan_text ?? 'Lihat Panduan Lengkap' }}
                    </a>

                    <a href="{{ optional($ppdb)->button_wa_link ?? '#' }}"
                       class="btn btn-outline-secondary">
                        <i class="fab fa-whatsapp me-2"></i>
                        {{ optional($ppdb)->button_wa_text ?? 'Hubungi Panitia' }}
                    </a>

                </div>
            </div>

            <!-- Kolom Kanan: Gambar Slider -->
            <div class="ppdb-image-v3">
                <div class="swiper ppdbSwiperV3">
                    <div class="swiper-wrapper">

                        @if(optional($ppdb)->slider_1)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $ppdb->slider_1) }}" alt="Slider 1">
                            </div>
                        @endif

                        @if(optional($ppdb)->slider_2)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $ppdb->slider_2) }}" alt="Slider 2">
                            </div>
                        @endif

                        @if(optional($ppdb)->slider_3)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $ppdb->slider_3) }}" alt="Slider 3">
                            </div>
                        @endif

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>

        </div>
    </div>
</section>



<!-- CSS (TIDAK ADA PERUBAHAN, TETAP SAMA SEPERTI SEBELUMNYA ) -->
<style>
    .ppdb-section-v3 {
        padding: 5rem 0;
        background: #f8f9fa;
    }
    .ppdb-card-v3 {
        display: grid;
        grid-template-columns: 1fr;
        background: #ffffff;
        border-radius: 1.25rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        overflow: hidden;
        border: 1px solid #e9ecef;
    }
    @media (min-width: 992px) {
        .ppdb-card-v3 { grid-template-columns: 55% 45%; }
    }
    .ppdb-content-v3 {
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
    }
    @media (max-width: 768px) {
        .ppdb-content-v3 { padding: 2rem 1.5rem; }
    }
    .ppdb-badge-v3 {
        font-size: 0.8rem;
        font-weight: 600;
        color: #16a34a;
        background-color: #e7f5ec;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        align-self: flex-start;
        margin-bottom: 1rem;
    }
    .ppdb-title-v3 {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.5rem;
    }
    .ppdb-description-v3 {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    .ppdb-schedule-v3 {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    @media (min-width: 576px) {
        .ppdb-schedule-v3 { grid-template-columns: 1fr 1fr; }
    }
    .schedule-item-v3 {
        display: flex;
        align-items: center;
        gap: 1rem;
        background-color: #f8f9fa;
        padding: 0.75rem;
        border-radius: 0.75rem;
        border: 1px solid #e9ecef;
    }
    .schedule-icon-v3 {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #16a34a;
        color: white;
    }
    .schedule-info-v3 h6 {
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    .schedule-info-v3 span {
        font-size: 0.8rem;
        color: #6c757d;
    }
    .ppdb-buttons-v3 {
        margin-top: auto;
        display: flex;
        gap: 0.75rem;
    }
    .ppdb-buttons-v3 .btn {
        font-weight: 500;
        padding: 0.6rem 1.2rem;
        border-radius: 0.5rem;
    }
    .ppdb-image-v3 {
        position: relative;
        min-height: 400px;
    }
    @media (max-width: 991px) {
        .ppdb-image-v3 {
            order: -1;
            height: 300px;
        }
    }
    .ppdbSwiperV3 {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
    }
    .ppdbSwiperV3 .swiper-slide img {
        width: 100%; height: 100%;
        object-fit: cover;
    }
    .ppdbSwiperV3 .swiper-button-next,
    .ppdbSwiperV3 .swiper-button-prev {
        color: #fff;
        background-color: rgba(0,0,0,0.2);
        width: 40px; height: 40px;
        border-radius: 50%;
    }
    .ppdbSwiperV3 .swiper-button-next::after,
    .ppdbSwiperV3 .swiper-button-prev::after {
        font-size: 1rem;
    }
    /* ===== MOBILE FIX ===== */
@media (max-width: 575px) {
    .ppdb-title-v3 {
        font-size: 1.5rem; /* lebih kecil supaya muat */
    }

    .ppdb-description-v3 {
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .ppdb-schedule-v3 {
        grid-template-columns: 1fr; /* satu kolom aja */
        gap: 0.75rem;
    }

    .schedule-item-v3 {
        padding: 0.6rem;
        gap: 0.5rem;
    }

    .schedule-icon-v3 {
        width: 35px;
        height: 35px;
    }

    .ppdb-buttons-v3 {
        flex-direction: column; /* tombol stack di mobile */
        gap: 0.5rem;
    }

    .ppdb-buttons-v3 .btn {
        width: 100%; /* tombol full-width */
        text-align: center;
    }

    .ppdb-image-v3 {
        min-height: 200px; /* biar ga terlalu tinggi */
    }
}

</style>

<!-- JavaScript (TIDAK ADA PERUBAHAN) -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  if (typeof Swiper !== 'undefined') {
    const ppdbSwiperV3 = new Swiper(".ppdbSwiperV3", {
      loop: true,
      effect: 'fade',
      autoplay: { delay: 4000, disableOnInteraction: false },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }
});
</script>






<section class="teacher-section-container py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Header Section -->
        <div class="text-center mb-12 lg:mb-16">
            <span class="section-badge">Guru Kami</span>
            <h2 class="main-title mt-4">Mereka yang Menginspirasi</h2>
        </div>

        @if(isset($teachers) && $teachers->count() > 0)
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">

              <!-- Panel Detail Guru (Kiri) -->
<div id="guru-detail" class="w-full lg:w-2/5 lg:sticky top-24 self-start">
    <div class="featured-teacher-card p-6 text-center">
        <div class="featured-teacher-image aspect-square max-w-xs mx-auto">
            <img
                src="{{ $teachers->first()->photo ? asset('public/'.$teachers->first()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($teachers->first()->name) . '&background=random' }}"
                alt="{{ $teachers->first()->name }}"
                id="featured-image"
                loading="lazy">
        </div>
        <h3 class="featured-teacher-name mt-6" id="featured-name">{{ $teachers->first()->name }}</h3>
        <p class="featured-teacher-position" id="featured-position">{{ $teachers->first()->position }}</p>
    </div>
</div>

<!-- Grid Guru (Kanan) -->
<div class="w-full lg:w-3/5">
    <div class="teacher-grid">
        @foreach($teachers as $teacher)
            <div class="teacher-card"
                 onclick="showTeacherDetails(this)"
                 data-nama="{{ $teacher->name }}"
                 data-jabatan="{{ $teacher->position }}"
                 data-foto="{{ $teacher->photo ? asset('public/'.$teacher->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($teacher->name) . '&background=random' }}">

                <img
                    src="{{ $teacher->photo ? asset('public/'.$teacher->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($teacher->name) . '&background=random' }}"
                    alt="{{ $teacher->name }}"
                    loading="lazy">

                <div class="teacher-card-overlay">
                    <h4 class="teacher-card-name">{{ $teacher->name }}</h4>
                    <p class="teacher-card-position">{{ $teacher->position }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>


            </div>
        @else
            <p class="text-center text-gray-500">Data guru tidak ditemukan.</p>
        @endif
    </div>
            <div class="text-center mt-6" data-aos="fade-up">
            <a href="{{ route('teachers') }}" class="btn btn-primary">
                <i class="fas fa-chalkboard-teacher"></i>
                Lihat Semua Staf & Guru
            </a>
        </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const firstCard = document.querySelector('.teacher-card');
        if (firstCard) {
            firstCard.classList.add('active');
        }
    });

    function showTeacherDetails(cardElement) {
        const nama = cardElement.dataset.nama;
        const jabatan = cardElement.dataset.jabatan;
        const foto = cardElement.dataset.foto;

        const detailPanel = document.getElementById('guru-detail');
        const featuredImage = document.getElementById('featured-image');
        const featuredName = document.getElementById('featured-name');
        const featuredPosition = document.getElementById('featured-position');

        detailPanel.style.opacity = '0.5';
        detailPanel.style.transform = 'scale(0.98)';

        setTimeout(() => {
            featuredImage.src = foto;
            featuredImage.alt = nama;
            featuredName.textContent = nama;
            featuredPosition.textContent = jabatan;

            detailPanel.style.opacity = '1';
            detailPanel.style.transform = 'scale(1)';
        }, 200);

        document.querySelectorAll('.teacher-card').forEach(card => {
            card.classList.remove('active');
        });
        cardElement.classList.add('active');
    }
</script>

</body>
</html>


<!-- Facilities Section -->
<section class="facilities">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Fasilitas Unggulan</h2>
            <p>Fasilitas modern dan lengkap untuk mendukung proses pembelajaran yang optimal</p>
        </div>

        <div class="facilities-grid">
            @if(isset($data['facilities']) && count($data['facilities']) > 0)
                @foreach($data['facilities'] as $index => $facility)
                <div class="facility-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="facility-icon">
                        <i class="fas fa-{{ $facility['icon'] }}"></i>
                    </div>
                    <h3 class="facility-name">{{ $facility['name'] }}</h3>
                    <p class="facility-description">{{ $facility['description'] }}</p>
                </div>
                @endforeach
            @else
                <!-- Default facilities if no data -->
                <div class="facility-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="facility-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3 class="facility-name">Laboratorium Komputer</h3>
                    <p class="facility-description">Lab komputer modern dengan perangkat terbaru untuk pembelajaran teknologi informasi.</p>
                </div>

                <div class="facility-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="facility-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3 class="facility-name">Laboratorium IPA</h3>
                    <p class="facility-description">Fasilitas laboratorium lengkap untuk praktikum fisika, kimia, dan biologi.</p>
                </div>

                <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="facility-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 class="facility-name">Perpustakaan Digital</h3>
                    <p class="facility-description">Perpustakaan modern dengan koleksi buku digital dan akses internet gratis.</p>
                </div>

                <div class="facility-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="facility-icon">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3 class="facility-name">Fasilitas Olahraga</h3>
                    <p class="facility-description">Lapangan olahraga lengkap dan gymnasium untuk berbagai aktivitas fisik.</p>
                </div>

                <div class="facility-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="facility-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3 class="facility-name">Studio Musik</h3>
                    <p class="facility-description">Studio musik dengan peralatan lengkap untuk pengembangan bakat seni musik.</p>
                </div>

                <div class="facility-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="facility-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="facility-name">Kantin Sehat</h3>
                    <p class="facility-description">Kantin dengan menu makanan sehat dan bergizi untuk mendukung kesehatan siswa.</p>
                </div>
            @endif
        </div>

        <div class="text-center mt-6" data-aos="fade-up">
            <a href="{{ route('facilities') }}" class="btn btn-primary">
                <i class="fas fa-building"></i>
                Lihat Semua Fasilitas
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <div class="cta-text">
                <h2>Bergabunglah dengan Keluarga Besar SMPN 12 Gresik</h2>
                <p>Wujudkan masa depan cerah bersama pendidikan berkualitas dan fasilitas terdepan</p>
            </div>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="fas fa-phone"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('about') }}" class="btn btn-outline">
                    <i class="fas fa-info-circle"></i>
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Counter animation for stats
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 20);
    }

    // Initialize counter animation when stats section is visible
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('[data-count]');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-count'));
                    animateCounter(counter, target);
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const statsSection = document.querySelector('.stats');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Smooth scroll function for hero scroll indicator
    function scrollToStats() {
        document.getElementById('stats-section').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
@endpush

