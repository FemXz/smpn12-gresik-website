@extends('admin.layouts.app')

@section('title', 'Galeri - Admin SMPN 12 Gresik')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Galeri</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($galleries->count())
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($gallery->image)
                           <img src="{{ asset($gallery->image) }}" class="card-img-top" alt="Gambar Galeri">

        @elseif ($gallery->youtube_url)
            <div class="ratio ratio-16x9">
                <iframe src="{{ $gallery->youtube_url }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        @endif

<div class="card-body">
    <h5 class="card-title text-truncate" style="max-width: 100%; white-space: nowrap; overflow: hidden;">
        {{ $gallery->title ?? 'Tanpa Judul' }}
    </h5>
    <p class="card-text text-muted small" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
        {{ $gallery->description ?? '-' }}
    </p>
</div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            {{ $galleries->links() }}
        </div>
    @else
        <div class="alert alert-secondary text-center mt-4">
            Tidak ada galeri ditemukan.
        </div>
    @endif
</div>
@endsection
