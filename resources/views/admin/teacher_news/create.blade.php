@extends("admin.layouts.app")

@section("title", "Tambah Berita Guru - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Tambah Berita Guru</h1>
                <a href="{{ route("admin.teacher-news.index") }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.teacher-news.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Berita *</label>
                            <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old("title") }}" required>
                            @error("title")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Berita *</label>
                            <textarea class="form-control @error("content") is-invalid @enderror" id="content" name="content" rows="10" required>{{ old("content") }}</textarea>
                            @error("content")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Berita</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.</small>
                            @error("image")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis *</label>
                            <input type="text" class="form-control @error("author") is-invalid @enderror" id="author" name="author" value="{{ old("author", "Admin") }}" required>
                            @error("author")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old("is_published") ? "checked" : "" }}>
                            <label class="form-check-label" for="is_published">
                                Publikasikan sekarang
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Simpan Berita</button>
                        <a href="{{ route("admin.teacher-news.index") }}" class="btn btn-danger"><i class="fas fa-times me-2"></i> Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tips Menulis Berita</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Gunakan judul yang menarik dan informatif</li>
                        <li>Tulis konten yang jelas dan mudah dipahami</li>
                        <li>Sertakan gambar yang relevan</li>
                        <li>Periksa ejaan dan tata bahasa</li>
                        <li>Publikasikan setelah review</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


