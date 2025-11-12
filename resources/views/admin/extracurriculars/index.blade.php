@extends("admin.layouts.app")

@section("title", "Kelola Ekstrakurikuler - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Kelola Ekstrakurikuler</h1>
                <a href="{{ route("admin.extracurriculars.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Tambah Ekstrakurikuler
                </a>
            </div>
        </div>
    </div>

    @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Ekstrakurikuler</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jadwal</th>
                                    <th>Pembina</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($extracurriculars as $item)
                                <tr>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td>{{ $item->category ?? '-' }}</td>
                                    <td>{{ Str::limit(strip_tags($item->description), 50) }}</td>
                                    <td>{{ $item->schedule }}</td>
                                    <td>{{ $item->teacher_in_charge }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route("admin.extracurriculars.edit", $item) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route("admin.extracurriculars.destroy", $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-running fa-3x mb-3"></i>
                                            <p>Belum ada ekstrakurikuler yang ditambahkan.</p>
                                            <a href="{{ route("admin.extracurriculars.create") }}" class="btn btn-primary">
                                                <i class="fas fa-plus me-2"></i> Tambah Ekstrakurikuler Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($extracurriculars->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $extracurriculars->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
