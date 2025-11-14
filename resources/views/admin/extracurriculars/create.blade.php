@extends("admin.layouts.app")

@section("title", "Tambah Ekstrakurikuler - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Tambah Ekstrakurikuler</h1>
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
                    <form action="{{ route("admin.extracurriculars.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") }}" required>
                            @error("name")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error("category") is-invalid @enderror" id="category" name="category" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Olahraga" {{ old("category") == "Olahraga" ? "selected" : "" }}>Olahraga</option>
                                <option value="Seni" {{ old("category") == "Seni" ? "selected" : "" }}>Seni</option>
                                <option value="Akademik" {{ old("category") == "Akademik" ? "selected" : "" }}>Akademik</option>
                                <option value="Lainnya" {{ old("category") == "Lainnya" ? "selected" : "" }}>Lainnya</option>
                            </select>
                            @error("category")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error("description") is-invalid @enderror" id="description" name="description" rows="5" required>{{ old("description") }}</textarea>
                            @error("description")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gambar --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Ekstrakurikuler</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error("image")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maks 2MB.</div>
                        </div>

                        {{-- Jadwal --}}
                        <div class="mb-3">
                            <label for="schedule" class="form-label">Jadwal</label>
                            <input type="text" class="form-control @error("schedule") is-invalid @enderror" id="schedule" name="schedule" value="{{ old("schedule") }}">
                            @error("schedule")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Pembina --}}
                        <div class="mb-3">
                            <label for="teacher_in_charge" class="form-label">Pembina</label>
                            <input type="text" class="form-control @error("teacher_in_charge") is-invalid @enderror" id="teacher_in_charge" name="teacher_in_charge" value="{{ old("teacher_in_charge") }}">
                            @error("teacher_in_charge")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        {{-- Tombol --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Simpan Ekstrakurikuler
                            </button>
                            <a href="{{ route("admin.extracurriculars.index") }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tips --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tips Menambah Ekstrakurikuler</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Gunakan nama dan kategori yang jelas</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Sertakan gambar kegiatan jika ada</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Tambahkan jadwal dan pembina</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
