{{-- File: resources/views/admin/ppdb/pengaturan.blade.php --}}
@extends('layouts.admin')
@section('title', 'Pengaturan Halaman PPDB')

@push('styles')
    {{-- (Gunakan CSS dari jawaban sebelumnya untuk poster-upload & dynamic-list) --}}
@endpush

@section('content')
<h1 class="h3 mb-4">Pengaturan Halaman Informasi PPDB</h1>

<div class="card shadow-sm">
    <!-- Navigasi Tab -->
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="umum-tab" data-bs-toggle="tab" data-bs-target="#umum" type="button">Umum</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="jadwal-tab" data-bs-toggle="tab" data-bs-target="#jadwal" type="button">Jadwal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button">FAQ</button>
            </li>
        </ul>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="card-body p-4">
            <div class="tab-content" id="myTabContent">
                <!-- Tab 1: Pengaturan Umum (Poster & Judul) -->
                <div class="tab-pane fade show active" id="umum" role="tabpanel">
                    {{-- (Isi form pengaturan umum seperti jawaban sebelumnya) --}}
                </div>

                <!-- Tab 2: Manajemen Jadwal -->
                <div class="tab-pane fade" id="jadwal" role="tabpanel">
                    {{-- (Isi form manajemen jadwal seperti jawaban sebelumnya) --}}
                </div>

                <!-- Tab 3: Manajemen FAQ -->
                <div class="tab-pane fade" id="faq" role="tabpanel">
                    {{-- (Isi form manajemen FAQ seperti jawaban sebelumnya) --}}
                </div>
            </div>
        </div>

        <div class="card-footer text-end bg-light">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> Simpan Semua Perubahan</button>
        </div>
    </form>
</div>

@push('scripts')
    {{-- (Gunakan JS dari jawaban sebelumnya untuk pratinjau gambar) --}}
@endpush
@endsection
