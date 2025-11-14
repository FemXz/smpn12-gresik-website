{{-- File: resources/views/admin/ppdb/pendaftar.blade.php --}}
@extends('layouts.admin')
@section('title', 'Manajemen Pendaftar')

@push('styles')
    {{-- (Gunakan CSS dari jawaban sebelumnya untuk badge status) --}}
@endpush

@section('content')
<h1 class="h3 mb-4">Manajemen Pendaftar</h1>

<div class="card shadow-sm">
    <div class="card-header py-3">
        <h6 class="m-0 fw-bold text-primary">Daftar Calon Siswa</h6>
    </div>
    <div class="card-body">
        <!-- Filter & Search Bar -->
        <div class="d-flex flex-wrap gap-2 mb-4">
            <div class="flex-grow-1"><input type="text" class="form-control" placeholder="Cari nama atau NISN..."></div>
            <div><select class="form-select"><option selected>Filter status</option></select></div>
            <div><button class="btn btn-primary"><i class="fas fa-search"></i></button></div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>NISN</th>
                        <th>Asal Sekolah</th>
                        <th>Tgl. Daftar</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh Data Baris 1 --}}
                    <tr>
                        <td>1</td>
                        <td><strong>Ahmad Budi Santoso</strong></td>
                        <td>1234567890</td>
                        <td>SD Negeri 1 Gresik</td>
                        <td>10 Nov 2025</td>
                        <td><span class="badge rounded-pill text-bg-success">Lolos Seleksi</span></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Detail</a>
                        </td>
                    </tr>
                    {{-- Contoh Data Baris 2 --}}
                    <tr>
                        <td>2</td>
                        <td><strong>Citra Lestari</strong></td>
                        <td>0987654321</td>
                        <td>SD Muhammadiyah 2</td>
                        <td>10 Nov 2025</td>
                        <td><span class="badge rounded-pill text-bg-info">Menunggu Verifikasi</span></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Verifikasi</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Paginasi -->
        <nav class="mt-4 d-flex justify-content-center">
            {{-- (Isi paginasi Bootstrap) --}}
        </nav>
    </div>
</div>
@endsection
