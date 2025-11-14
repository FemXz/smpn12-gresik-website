@extends("layouts.app")

@section("title", isset($teacher) ? $teacher->name . " - Guru & Staff - SMP Negeri 12 Gresik" : "Guru & Staff - SMP Negeri 12 Gresik")

@section("content")
<style>
/* SMPN 12 Gresik Teacher Pages - Modern CSS Styling */

/* CSS Custom Properties */
:root {
  --primary-color: #2a7c4aff;
  --secondary-color: #1c5837ff;
  --accent-color: #f59e0b;
  --neutral-color: #64748b;
  --background-color: #f8fafc;
  --white: #ffffff;
  --text-dark: #1e293b;
  --text-light: #64748b;
  --border-color: #e2e8f0;
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
  --radius-sm: 0.375rem;
  --radius-md: 0.5rem;
  --radius-lg: 0.75rem;
  --radius-xl: 1rem;
  --radius-full: 9999px;
}

/* Reset and Base Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 16px;
  scroll-behavior: smooth;
}

body {
  font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  line-height: 1.6;
  color: var(--text-dark);
  background-color: var(--background-color);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
  font-weight: 600;
  line-height: 1.2;
  margin-bottom: 0.5em;
}

h1 { font-size: clamp(2rem, 4vw, 3rem); }
h2 { font-size: clamp(1.5rem, 3vw, 2.25rem); }
h3 { font-size: clamp(1.25rem, 2.5vw, 1.875rem); }
h4 { font-size: clamp(1.125rem, 2vw, 1.5rem); }
h5 { font-size: clamp(1rem, 1.5vw, 1.25rem); }
h6 { font-size: clamp(0.875rem, 1.25vw, 1.125rem); }

p {
  margin-bottom: 1rem;
  color: var(--text-light);
}

a {
  color: var(--primary-color);
  text-decoration: none;
  transition: color 0.3s ease;
}

a:hover {
  color: var(--secondary-color);
}

/* Container */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 640px) {
  .container { padding: 0 1.5rem; }
}

@media (min-width: 1024px) {
  .container { padding: 0 2rem; }
}

/* Hero Section */
.hero-section {
margin-top: 70px;
  background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
  color: var(--white);
  padding: 4rem 0;
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
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.3;
}

.hero-content {
  position: relative;
  z-index: 1;
  display: grid;
  grid-template-columns: 1fr;
  gap: 2rem;
  align-items: center;
}

@media (min-width: 768px) {
  .hero-content {
    grid-template-columns: 2fr 1fr;
  }
}

.hero-text h1 {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 700;
  margin-bottom: 1rem;
  background: linear-gradient(45deg, var(--white), rgba(255, 255, 255, 0.8));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-text p {
  font-size: clamp(1.125rem, 2vw, 1.5rem);
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 0;
}

.hero-icon {
  text-align: center;
  font-size: 5rem;
  opacity: 0.7;
}

/* Breadcrumb */
.breadcrumb {
  background-color: var(--white);
  padding: 1rem 0;
  border-bottom: 1px solid var(--border-color);
}

.breadcrumb-list {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  list-style: none;
  font-size: 0.875rem;
}

.breadcrumb-item {
  color: var(--text-light);
}

.breadcrumb-item:not(:last-child)::after {
  content: '/';
  margin-left: 0.5rem;
  color: var(--border-color);
}

.breadcrumb-item a {
  color: var(--primary-color);
  transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
  color: var(--secondary-color);
}

.breadcrumb-item.active {
  color: var(--text-dark);
  font-weight: 500;
}

/* Main Content */
.main-content {
  padding: 3rem 0;
}

/* Teacher Grid */
.teacher-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

/* Teacher Card */
.teacher-card {
  background: var(--white);
  border-radius: var(--radius-xl);
  padding: 2rem;
  text-align: center;
  box-shadow: var(--shadow-md);
  transition: all 0.3s ease;
  border: 1px solid var(--border-color);
  position: relative;
  overflow: hidden;
}

.teacher-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.teacher-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl);
}

.teacher-card:hover::before {
  transform: scaleX(1);
}

.teacher-avatar {
  width: 120px;
  height: 120px;
  border-radius: var(--radius-full);
  margin: 0 auto 1.5rem;
  position: relative;
  overflow: hidden;
  border: 4px solid var(--border-color);
  transition: border-color 0.3s ease;
}

.teacher-card:hover .teacher-avatar {
  border-color: var(--primary-color);
}

.teacher-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.teacher-avatar-placeholder {
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, var(--background-color), #e2e8f0);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-light);
  font-size: 3rem;
}

.teacher-name {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--text-dark);
  margin-bottom: 0.5rem;
}

.teacher-position {
  color: var(--primary-color);
  font-weight: 500;
  margin-bottom: 1rem;
}

.teacher-bio {
  color: var(--text-light);
  font-size: 0.875rem;
  line-height: 1.5;
  margin-bottom: 1.5rem;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  border-radius: var(--radius-md);
  font-weight: 500;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
  border: none;
  font-size: 0.875rem;
}

.btn-primary {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: var(--white);
  box-shadow: var(--shadow-sm);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
  color: var(--white);
}

.btn-outline {
  background: transparent;
  color: var(--primary-color);
  border: 2px solid var(--primary-color);
}

.btn-outline:hover {
  background: var(--primary-color);
  color: var(--white);
  transform: translateY(-2px);
}

.btn-secondary {
  background: var(--neutral-color);
  color: var(--white);
}

.btn-secondary:hover {
  background: var(--text-dark);
  color: var(--white);
  transform: translateY(-2px);
}

.btn-sm {
  padding: 0.5rem 1rem;
  font-size: 0.8rem;
}

/* Teacher Detail Page */
.teacher-detail {
  background: var(--white);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-lg);
  overflow: hidden;
  margin-bottom: 3rem;
}

.teacher-detail-content {
  padding: 3rem;
}

.teacher-detail-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 3rem;
  align-items: start;
}

@media (min-width: 768px) {
  .teacher-detail-grid {
    grid-template-columns: 300px 1fr;
  }
}

.teacher-detail-sidebar {
  text-align: center;
}

.teacher-detail-avatar {
  width: 200px;
  height: 200px;
  border-radius: var(--radius-full);
  margin: 0 auto 2rem;
  position: relative;
  overflow: hidden;
  border: 6px solid var(--border-color);
  box-shadow: var(--shadow-lg);
}

.teacher-detail-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.teacher-detail-avatar-placeholder {
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, var(--background-color), #e2e8f0);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-light);
  font-size: 4rem;
}

.contact-info {
  background: var(--background-color);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
  margin-top: 1rem;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 1rem;
  font-size: 0.875rem;
}

.contact-item:last-child {
  margin-bottom: 0;
}

.contact-item i {
  width: 20px;
  text-align: center;
}

.contact-item a {
  color: var(--text-dark);
  transition: color 0.3s ease;
}

.contact-item a:hover {
  color: var(--primary-color);
}

.teacher-detail-main h1 {
  color: var(--text-dark);
  margin-bottom: 0.5rem;
}

.teacher-detail-position {
  color: var(--primary-color);
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 2rem;
}

.bio-section {
  margin-bottom: 2rem;
}

.bio-section h3 {
  color: var(--text-dark);
  margin-bottom: 1rem;
  font-size: 1.125rem;
}

.bio-content {
  color: var(--text-light);
  line-height: 1.7;
  font-size: 1rem;
}

.additional-info {
  background: var(--background-color);
  border-radius: var(--radius-lg);
  padding: 2rem;
  margin-top: 2rem;
}

.info-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  margin-top: 1rem;
}

.info-item {
  background: var(--white);
  padding: 1.5rem;
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border-left: 4px solid var(--primary-color);
}

.info-item i {
  color: var(--primary-color);
  margin-right: 0.75rem;
  font-size: 1.125rem;
}

.info-item strong {
  color: var(--text-dark);
}

/* Navigation Section */
.navigation-section {
  border-top: 1px solid var(--border-color);
  padding-top: 2rem;
  margin-top: 2rem;
}

.navigation-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1rem;
}

@media (min-width: 640px) {
  .navigation-grid {
    grid-template-columns: 1fr 1fr;
  }
}

.nav-left {
  text-align: left;
}

.nav-right {
  text-align: right;
}

@media (max-width: 639px) {
  .nav-right {
    text-align: left;
  }
}

/* Related Teachers Section */
.related-teachers {
  margin-top: 3rem;
}

.related-teachers h3 {
  color: var(--text-dark);
  margin-bottom: 2rem;
  text-align: center;
}

.related-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
}

.related-card {
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
  text-align: center;
  box-shadow: var(--shadow-md);
  transition: all 0.3s ease;
  border: 1px solid var(--border-color);
}

.related-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.related-avatar {
  width: 80px;
  height: 80px;
  border-radius: var(--radius-full);
  margin: 0 auto 1rem;
  overflow: hidden;
  border: 3px solid var(--border-color);
}

.related-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.related-avatar-placeholder {
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, var(--background-color), #e2e8f0);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-light);
  font-size: 2rem;
}

.related-name {
  font-weight: 600;
  color: var(--text-dark);
  margin-bottom: 0.5rem;
}

.related-position {
  color: var(--text-light);
  font-size: 0.875rem;
  margin-bottom: 1rem;
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 4rem 2rem;
  background: var(--white);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-md);
}

.empty-state i {
  font-size: 4rem;
  color: var(--text-light);
  margin-bottom: 1.5rem;
}

.empty-state h4 {
  color: var(--text-dark);
  margin-bottom: 1rem;
}

.empty-state p {
  color: var(--text-light);
  max-width: 400px;
  margin: 0 auto;
}

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  margin-top: 3rem;
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    padding: 2rem 0;
  }
  
  .main-content {
    padding: 2rem 0;
  }
  
  .teacher-detail-content {
    padding: 2rem;
  }
  
  .teacher-detail-avatar {
    width: 150px;
    height: 150px;
  }
  
  .teacher-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
}

@media (max-width: 480px) {
  .teacher-card {
    padding: 1.5rem;
  }
  
  .teacher-detail-content {
    padding: 1.5rem;
  }
  
  .additional-info {
    padding: 1.5rem;
  }
}

/* Animations */
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

.teacher-card {
  animation: fadeInUp 0.6s ease forwards;
}

.teacher-card:nth-child(2) { animation-delay: 0.1s; }
.teacher-card:nth-child(3) { animation-delay: 0.2s; }
.teacher-card:nth-child(4) { animation-delay: 0.3s; }
.teacher-card:nth-child(5) { animation-delay: 0.4s; }
.teacher-card:nth-child(6) { animation-delay: 0.5s; }

/* Utility Classes */
.text-center { text-align: center; }
.text-left { text-align: left; }
.text-right { text-align: right; }
.mb-0 { margin-bottom: 0; }
.mb-1 { margin-bottom: 0.5rem; }
.mb-2 { margin-bottom: 1rem; }
.mb-3 { margin-bottom: 1.5rem; }
.mt-0 { margin-top: 0; }
.mt-1 { margin-top: 0.5rem; }
.mt-2 { margin-top: 1rem; }
.mt-3 { margin-top: 1.5rem; }
</style>

<div class="container-fluid">
    @if(isset($teacher))
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <div class="container">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route("teachers") }}">Guru & Staff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $teacher->name }}</li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <div class="container">
                <!-- Teacher Detail Card -->
                <div class="teacher-detail">
                    <div class="teacher-detail-content">
                        <div class="teacher-detail-grid">
                            <!-- Sidebar -->
                            <div class="teacher-detail-sidebar">
                                <div class="teacher-detail-avatar">
                                    @if($teacher->photo)
                                        <img src="{{ asset("storage/" . $teacher->photo) }}" alt="{{ $teacher->name }}">
                                    @else
                                        <div class="teacher-detail-avatar-placeholder">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Contact Info -->
                                <div class="contact-info">
                                    @if($teacher->email)
                                        <div class="contact-item">
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>
                                        </div>
                                    @endif
                                    @if($teacher->phone)
                                        <div class="contact-item">
                                            <i class="fas fa-phone"></i>
                                            <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a>
                                        </div>
                                    @endif
                                    @if($teacher->nip)
                                        <div class="contact-item">
                                            <i class="fas fa-id-card"></i>
                                            <span>NIP: {{ $teacher->nip }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Main Content -->
                            <div class="teacher-detail-main">
                                <h1>{{ $teacher->name }}</h1>
                                <p class="teacher-detail-position">{{ $teacher->position }}</p>
                                
                                @if($teacher->bio)
                                    <!-- Bio Section -->
                                    <div class="bio-section">
                                        <h3>Profil</h3>
                                        <div class="bio-content">
                                            <p>{!! nl2br(e($teacher->bio)) !!}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Additional Info -->
                                <div class="additional-info">
                                    <h3>Informasi Tambahan</h3>
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <i class="fas fa-graduation-cap"></i>
                                            <strong>Pendidikan:</strong> S2 Magister Pendidikan
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-calendar"></i>
                                            <strong>Pengalaman:</strong> 25+ Tahun
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-award"></i>
                                            <strong>Spesialisasi:</strong> Manajemen Pendidikan
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-users"></i>
                                            <strong>Jabatan:</strong> Kepala Sekolah
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-certificate"></i>
                                            <strong>Sertifikasi:</strong> Pendidik Profesional
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-language"></i>
                                            <strong>Bahasa:</strong> Indonesia, Inggris
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="navigation-section">
                            <div class="navigation-grid">
                                <div class="nav-left">
                                    <a href="{{ route("teachers") }}" class="btn btn-outline">
                                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Guru
                                    </a>
                                </div>
                                <div class="nav-right">
                                    <a href="{{ route("home") }}" class="btn btn-primary">
                                        <i class="fas fa-home"></i> Beranda
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Teachers -->
                @php
                    $relatedTeachers = \App\Models\Teacher::where("id", "!=", $teacher->id)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp

                @if($relatedTeachers->count() > 0)
                    <div class="related-teachers">
                        <h3>Guru & Staff Lainnya</h3>
                        <div class="related-grid">
                            @foreach($relatedTeachers as $related)
                                <div class="related-card">
                                    <div class="related-avatar">
                                        @if($related->photo)
                                            <img src="{{ asset("storage/" . $related->photo) }}" alt="{{ $related->name }}">
                                        @else
                                            <div class="related-avatar-placeholder">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <h4 class="related-name">{{ $related->name }}</h4>
                                    <p class="related-position">{{ $related->position }}</p>
                                    <a href="{{ route("teachers.show", $related->slug) }}" class="btn btn-sm btn-outline">Lihat Profil</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </main>
    @else
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Guru & Staff</h1>
                        <p>Kenali lebih dekat para pendidik dan tenaga kependidikan profesional kami yang berdedikasi untuk memberikan pendidikan terbaik</p>
                    </div>
                    <div class="hero-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="main-content">
            <div class="container">
                <!-- Teacher Grid -->
                <div class="teacher-grid">
                    @if($teachers->count() > 0)
                        @foreach($teachers as $teacher)
                            <div class="teacher-card">
                                <div class="teacher-avatar">
                                    @if($teacher->photo)
                                        <img src="{{ asset("storage/" . $teacher->photo) }}" alt="{{ $teacher->name }}">
                                    @else
                                        <div class="teacher-avatar-placeholder">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="teacher-name">{{ $teacher->name }}</h3>
                                <p class="teacher-position">{{ $teacher->position }}</p>
                                <p class="teacher-bio">{{ Str::limit($teacher->bio, 80) }}</p>
                                <a href="{{ route("teachers.show", $teacher->slug) }}" class="btn btn-primary">
                                    Lihat Profil <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-info-circle"></i>
                            <h4>Belum Ada Data Guru & Staff</h4>
                            <p>Saat ini belum ada data guru dan staff yang tersedia. Silakan kembali lagi nanti.</p>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if($teachers->hasPages())
                    <div class="pagination">
                        {{ $teachers->links() }}
                    </div>
                @endif
            </div>
        </main>
    @endif
</div>

<script>
    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Add loading animation
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });

    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.teacher-card, .teacher-detail, .related-card').forEach(element => {
        observer.observe(element);
    });

    // Add hover effect for contact items on detail page
    document.querySelectorAll('.contact-item a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
</script>
@endsection


