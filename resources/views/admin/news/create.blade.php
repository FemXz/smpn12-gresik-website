@extends("admin.layouts.app")

@section("title", "Tambah Berita - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Tambah Berita</h1>
                <a href="{{ route("admin.news.index") }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.news.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old("title") }}" required>
                            @error("title")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                            <textarea class="form-control @error("content") is-invalid @enderror" id="content" name="content" rows="10" required>{{ old("content") }}</textarea>
                            @error("content")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Berita</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error("image")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>
                        </div>

                                <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Akademik" {{ old('category') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Prestasi" {{ old('category') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Acara" {{ old('category') == 'Acara' ? 'selected' : '' }}>Acara</option>
                                </select>
                            </div>


                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("author") is-invalid @enderror" id="author" name="author" value="{{ old("author", "Admin") }}" required>
                            @error("author")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="published_at" name="published_at" value="1" {{ old("published_at") ? "checked" : "" }}>
                                <label class="form-check-label" for="published_at">
                                    Publikasikan sekarang
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Simpan Berita
                            </button>
                            <a href="{{ route("admin.news.index") }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                        </div>
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
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Gunakan judul yang menarik dan informatif
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Tulis konten yang jelas dan mudah dipahami
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Sertakan gambar yang relevan
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Periksa ejaan dan tata bahasa
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Publikasikan setelah review
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

