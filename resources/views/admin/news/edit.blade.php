@extends("admin.layouts.app")

@section("title", "Edit Berita - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Edit Berita</h1>
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
                    <form action="{{ route("admin.news.update", $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old("title", $news->title) }}" required>
                            @error("title")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                            <textarea class="form-control @error("content") is-invalid @enderror" id="content" name="content" rows="10" required>{{ old("content", $news->content) }}</textarea>
                            @error("content")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Berita</label>
                            @if($news->image)
                                <div class="mb-2">
                                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="img-thumbnail" style="max-width: 200px;">
                                    <p class="text-muted small mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error("image")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</div>
                        </div>
                        
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Akademik" {{ old('category', $news->category ?? '') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Prestasi" {{ old('category', $news->category ?? '') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Acara" {{ old('category', $news->category ?? '') == 'Acara' ? 'selected' : '' }}>Acara</option>
                                </select>
                            </div>


                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("author") is-invalid @enderror" id="author" name="author" value="{{ old("author", $news->author) }}" required>
                            @error("author")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="published_at" name="published_at" value="1" {{ old("published_at", $news->published_at) ? "checked" : "" }}>
                                <label class="form-check-label" for="published_at">
                                    Publikasikan sekarang
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Berita
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
                    <h5 class="card-title mb-0">Informasi Berita</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Dibuat:</td>
                            <td>{{ $news->created_at->format("d M Y H:i") }}</td>
                        </tr>
                        <tr>
                            <td>Diupdate:</td>
                            <td>{{ $news->updated_at->format("d M Y H:i") }}</td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                @if($news->published_at)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-warning">Draft</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Slug:</td>
                            <td><code>{{ $news->slug }}</code></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

