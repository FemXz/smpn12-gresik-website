@extends("admin.layouts.app")

@section("title", "Dashboard - Admin SMPN 12 Gresik")
@section("page-title", "Dashboard")

@section("content")
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Selamat datang di panel admin SMPN 12 Gresik</p>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-number text-primary">{{ \App\Models\News::count() }}</div>
            <div class="stat-label">Total Berita</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +12% dari bulan lalu
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card success">
            <div class="stat-icon success">
                <i class="fas fa-running"></i>
            </div>
            <div class="stat-number text-success">{{ \App\Models\Extracurricular::count() }}</div>
            <div class="stat-label">Ekstrakurikuler</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +5% dari bulan lalu
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card warning">
            <div class="stat-icon warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number text-warning">{{ \App\Models\Teacher::count() }}</div>
            <div class="stat-label">Guru & Staff</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +2% dari bulan lalu
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card info">
            <div class="stat-icon info">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-number text-info">{{ \App\Models\TeacherNews::count() }}</div>
            <div class="stat-label">Berita Guru</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +8% dari bulan lalu
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats Row -->
<div class="row mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card primary">
            <div class="stat-icon primary">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-number text-primary">{{ \App\Models\Program::count() }}</div>
            <div class="stat-label">Program Keahlian</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                Stabil
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card success">
            <div class="stat-icon success">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-number text-success">{{ \App\Models\Ebook::count() }}</div>
            <div class="stat-label">E-Books</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +15% dari bulan lalu
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card warning">
            <div class="stat-icon warning">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-number text-warning">{{ \App\Models\Alumni::count() }}</div>
            <div class="stat-label">Alumni</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                +25% dari bulan lalu
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
        <div class="stat-card info">
            <div class="stat-icon info">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-number text-info">{{ \App\Models\Ppdb::count() }}</div>
            <div class="stat-label">PPDB</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up me-1"></i>
                Aktif
            </div>
        </div>
    </div>
</div>

<!-- Content Cards -->
<div class="row">
    <!-- Recent News -->
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2 text-primary"></i>
                    Berita Terbaru
                </h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Views</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\News::latest()->take(5)->get() as $news)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ Str::limit($news->title, 40) }}</div>
                                </td>
                                <td>{{ $news->author }}</td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $news->category ?? 'Umum' }}</span>
                                </td>
                                <td>{{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $news->view_count ?? 0 }}</span>
                                </td>
                                <td>
                                    @if($news->published_at)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada berita.</p>
                                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Berita Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2 text-warning"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Berita
                    </a>
                    <a href="{{ route('admin.programs.create') }}" class="btn btn-success">
                        <i class="fas fa-graduation-cap me-2"></i>Tambah Program
                    </a>
                    <a href="{{ route('admin.extracurriculars.create') }}" class="btn btn-info">
                        <i class="fas fa-running me-2"></i>Tambah Ekstrakurikuler
                    </a>
                    <a href="{{ route('admin.teachers.create') }}" class="btn btn-warning">
                        <i class="fas fa-user-plus me-2"></i>Tambah Guru/Staff
                    </a>
                    <a href="{{ route('admin.ebooks.create') }}" class="btn btn-secondary">
                        <i class="fas fa-book me-2"></i>Tambah E-Book
                    </a>
                    <hr>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-clock me-2 text-info"></i>
                    Aktivitas Terbaru
                </h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Berita Baru Ditambahkan</h6>
                            <p class="timeline-text">Admin menambahkan berita "Prestasi Siswa"</p>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Guru Baru Terdaftar</h6>
                            <p class="timeline-text">Pak Ahmad bergabung sebagai guru matematika</p>
                            <small class="text-muted">5 jam yang lalu</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-warning"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">E-Book Diupload</h6>
                            <p class="timeline-text">Materi pembelajaran baru tersedia</p>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Teacher News Section -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-chalkboard-teacher me-2 text-info"></i>
                    Berita Guru Terbaru
                </h5>
                <a href="{{ route('admin.teacher-news.index') }}" class="btn btn-sm btn-info">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\TeacherNews::latest()->take(5)->get() as $news)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ Str::limit($news->title, 50) }}</div>
                                </td>
                                <td>{{ $news->author }}</td>
                                <td>{{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $news->view_count ?? 0 }}</span>
                                </td>
                                <td>
                                    @if($news->published_at)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.teacher-news.edit', $news) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada berita guru.</p>
                                    <a href="{{ route('admin.teacher-news.create') }}" class="btn btn-info">
                                        <i class="fas fa-plus me-2"></i>Tambah Berita Guru Pertama
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@push('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }

    .timeline-marker {
        position: absolute;
        left: -22px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .timeline-content {
        background: #f8fafc;
        padding: 15px;
        border-radius: 10px;
        border-left: 3px solid var(--primary-color);
    }

    .timeline-title {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-color);
    }

    .timeline-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 5px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto refresh stats every 30 seconds
    setInterval(function() {
        // You can implement AJAX refresh here if needed
    }, 30000);

    // Initialize charts or other dashboard widgets here
    document.addEventListener('DOMContentLoaded', function() {
        // Add any dashboard-specific JavaScript here
    });
</script>
@endpush
@endsection

