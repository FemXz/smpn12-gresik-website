@extends("admin.layouts.app")

@section("title", "Tambah Guru/Staff - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Tambah Guru/Staff</h1>
                <a href="{{ route("admin.teachers.index") }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.teachers.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" name="name" value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- NIP --}}
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP (Nomor Induk Pegawai)</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                id="nip" name="nip" value="{{ old('nip') }}">
                            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Jabatan --}}
                        <div class="mb-3">
                            <label for="position" class="form-label">Jabatan *</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                id="position" name="position" value="{{ old('position') }}" required>
                            @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Mata Pelajaran --}}
                        <div class="mb-3">
                            <label for="subject" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                id="subject" name="subject" value="{{ old('subject') }}">
                            @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Pendidikan Terakhir --}}
                        <div class="mb-3">
                            <label for="education" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control @error('education') is-invalid @enderror" 
                                id="education" name="education" value="{{ old('education') }}">
                            @error('education') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Jenjang Karir --}}
                        <div class="mb-3">
                            <label for="career_level" class="form-label">Jenjang Karir</label>
                            <input type="text" class="form-control @error('career_level') is-invalid @enderror" 
                                id="career_level" name="career_level" value="{{ old('career_level') }}">
                            @error('career_level') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Pengalaman --}}
                        <div class="mb-3">
                            <label for="experience" class="form-label">Pengalaman (contoh: 10+ Tahun)</label>
                            <input type="text" class="form-control @error('experience') is-invalid @enderror" 
                                id="experience" name="experience" value="{{ old('experience') }}">
                            @error('experience') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Biografi --}}
                        <div class="mb-3">
                            <label for="bio" class="form-label">Biografi Singkat</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="5">{{ old('bio') }}</textarea>
                            @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Foto --}}
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                id="photo" name="photo" accept="image/*">
                            <small class="form-text text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.</small>
                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email') }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Nomor Telepon --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Urutan --}}
                        <div class="mb-3">
                            <label for="order" class="form-label">Urutan Tampilan</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                id="order" name="order" value="{{ old('order', 0) }}">
                            @error('order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tombol Simpan --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Simpan Data Guru
                        </button>
                        <a href="{{ route('admin.teachers.index') }}" class="btn btn-danger">
                            <i class="fas fa-times me-2"></i> Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sidebar Tips --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tips Mengisi Data Guru</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Isi nama lengkap dan jabatan dengan benar.</li>
                        <li>NIP opsional, jika ada bisa diisi.</li>
                        <li>Tambahkan mata pelajaran jika guru mengajar.</li>
                        <li>Gunakan foto profil yang jelas.</li>
                        <li>Status bisa diatur untuk menonaktifkan guru dari tampilan publik.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
