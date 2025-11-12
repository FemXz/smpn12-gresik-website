@extends('admin.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                
                <!-- Header -->
                <div class="card-header bg-primary bg-gradient text-white text-center py-4">
                    <h4 class="fw-bold mb-0"><i class="bi bi-person-circle me-2"></i>Profil Admin</h4>
                </div>

                <!-- Body -->
                <div class="card-body bg-light p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Pengguna</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $admin->name ?? '') }}" placeholder="Nama admin...">
                            </div>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $admin->email ?? '') }}" placeholder="email@example.com">
                            </div>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <hr class="my-4">

                        <!-- Password Section -->
                        <h6 class="fw-bold text-secondary mb-3"><i class="bi bi-lock-fill me-1"></i>Ganti Password</h6>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-key"></i></span>
                                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••">
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-shield-lock"></i></span>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••">
                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary fw-bold py-2 rounded-3">
                                <i class="bi bi-save2 me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-white text-center small text-muted py-2">
                    Terakhir login: <span class="fw-semibold">{{ $admin->last_login_at ?? '-' }}</span>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- JS untuk toggle show/hide password --}}
<script>
document.querySelectorAll('.toggle-password').forEach(btn => {
    btn.addEventListener('click', function () {
        const target = document.getElementById(this.dataset.target);
        const icon = this.querySelector('i');
        if (target.type === 'password') {
            target.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            target.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    });
});
</script>
@endsection
