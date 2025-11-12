@extends("layouts.app")

@section("title", "Berita Guru - SMP Negeri 12 Gresik")

@section("content")
<div class="container-fluid">
    <!-- Hero Section -->
    <div class="hero-section bg-primary text-white py-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Berita Guru</h1>
                    <p class="lead">Informasi terbaru dari para guru dan tenaga pendidik SMPN 12 Gresik</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-chalkboard-teacher fa-5x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if($teacherNews->count() > 0)
                @foreach($teacherNews as $news)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            @if($news->image)
                                <img src="{{ asset("storage/" . $news->image) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 250px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="fas fa-chalkboard-teacher fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $news->published_at->format("d M Y") }}
                                    </small>
                                    <small class="text-muted ms-3">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $news->author }}
                                    </small>
                                </div>
                                <h5 class="card-title">{{ $news->title }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($news->content), 150) }}</p>
                                <a href="{{ route("teacher-news.show", $news->slug) }}" class="btn btn-primary mt-auto">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        <i class="fas fa-info-circle fa-2x mb-3"></i>
                        <h4>Belum Ada Berita Guru</h4>
                        <p>Saat ini belum ada berita dari guru yang dipublikasikan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($teacherNews->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {{ $teacherNews->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.3;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.btn-primary {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #764ba2, #667eea);
    transform: translateY(-2px);
}
</style>
@endsection

