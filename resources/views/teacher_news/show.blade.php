@extends("layouts.app")

@section("title", $teacherNews->title . " - Berita Guru - SMP Negeri 12 Gresik")

@section("content")
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("home") }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route("teacher-news") }}">Berita Guru</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($teacherNews->title, 50) }}</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <article class="card border-0 shadow-sm">
                    @if($teacherNews->image)
                        <img src="{{ asset("storage/" . $teacherNews->image) }}" class="card-img-top" alt="{{ $teacherNews->title }}" style="height: 400px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body p-4">
                        <!-- Article Meta -->
                        <div class="mb-4">
                            <div class="d-flex flex-wrap align-items-center text-muted mb-2">
                                <span class="me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $teacherNews->published_at->format("d F Y") }}
                                </span>
                                <span class="me-3">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $teacherNews->author }}
                                </span>
                                <span class="me-3">
                                    <i class="fas fa-tag me-1"></i>
                                    Berita Guru
                                </span>
                            </div>
                        </div>

                        <!-- Article Title -->
                        <h1 class="display-5 fw-bold mb-4">{{ $teacherNews->title }}</h1>

                        <!-- Article Content -->
                        <div class="article-content">
                            {!! nl2br(e($teacherNews->content)) !!}
                        </div>

                        <!-- Share Buttons -->
                        <div class="mt-5 pt-4 border-top">
                            <h6 class="mb-3">Bagikan Artikel Ini:</h6>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-facebook-f me-1"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($teacherNews->title) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-twitter me-1"></i> Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($teacherNews->title . " - " . request()->fullUrl()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="mt-4 pt-4 border-top">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route("teacher-news") }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Berita Guru
                                    </a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route("home") }}" class="btn btn-primary">
                                        <i class="fas fa-home me-1"></i> Beranda
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Related Articles -->
                @php
                    $relatedNews = \App\Models\TeacherNews::where("is_published", true)
                        ->where("id", "!=", $teacherNews->id)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp

                @if($relatedNews->count() > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">Berita Guru Lainnya</h3>
                        <div class="row">
                            @foreach($relatedNews as $related)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        @if($related->image)
                                            <img src="{{ asset("storage/" . $related->image) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 150px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                                <i class="fas fa-chalkboard-teacher fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ Str::limit($related->title, 60) }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit(strip_tags($related->content), 80) }}</p>
                                            <a href="{{ route("teacher-news.show", $related->slug) }}" class="btn btn-sm btn-outline-primary">Baca</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1) !important;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}
</style>
@endsection

