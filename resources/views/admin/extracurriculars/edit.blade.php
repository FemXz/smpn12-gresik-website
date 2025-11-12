@extends("admin.layouts.app")

@section("title", "Edit Ekstrakurikuler - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Edit Ekstrakurikuler</h1>
                <a href="{{ route("admin.extracurriculars.index") }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.extracurriculars.update", $extracurricular) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name", $extracurricular->name) }}" required>
                            @error("name")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tambahan Kategori --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error("category") is-invalid @enderror" id="category" name="category" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Olahraga" {{ old("category", $extracurricular->category) == "Olahraga" ? "selected" : "" }}>Olahraga</option>
                                <option value="Seni" {{ old("category", $extracurricular->category) == "Seni" ? "selected" : "" }}>Seni</option>
                                <option value="Akademik" {{ old("category", $extracurricular->category) == "Akademik" ? "selected" : "" }}>Akademik</option>
                                <option value="Lainnya" {{ old("category", $extracurricular->category) == "Lainnya" ? "selected" : "" }}>Lainnya</option>
                            </select>
                            @error("category")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error("description") is-invalid @enderror" id="description" name="description" rows="5" required>{{ old("description", $extracurricular->description) }}</textarea>
                            @error("description")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Ekstrakurikuler</label>
                            @if($extracurricular->image)
                                <div class="mb-2">
                                    <img src="{{ asset($extracurricular->image) }}" alt="{{ $extracurricular->name }}" class="img-thumbnail" style="max-width: 200px;">
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
                            <label for="schedule" class="form-label">Jadwal</label>
                            <input type="text" class="form-control @error("schedule") is-invalid @enderror" id="schedule" name="schedule" value="{{ old("schedule", $extracurricular->schedule) }}">
                            @error("schedule")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="teacher_in_charge" class="form-label">Pembina</label>
                            <input type="text" class="form-control @error("teacher_in_charge") is-invalid @enderror" id="teacher_in_charge" name="teacher_in_charge" value="{{ old("teacher_in_charge", $extracurricular->teacher_in_charge) }}">
                            @error("teacher_in_charge")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update Ekstrakurikuler
                            </button>
                            <a href="{{ route("admin.extracurriculars.index") }}" class="btn btn-secondary">
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
                    <h5 class="card-title mb-0">Informasi Ekstrakurikuler</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td>Dibuat:</td>
                            <td>{{ $extracurricular->created_at->format("d M Y H:i") }}</td>
                        </tr>
                        <tr>
                            <td>Diupdate:</td>
                            <td>{{ $extracurricular->updated_at->format("d M Y H:i") }}</td>
                        </tr>
                        <tr>
                            <td>Slug:</td>
                            <td><code>{{ $extracurricular->slug }}</code></td>
                        </tr>
                        <tr>
                            <td>Kategori:</td>
                            <td>{{ $extracurricular->category }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
