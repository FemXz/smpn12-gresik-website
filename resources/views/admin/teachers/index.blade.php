@extends("admin.layouts.app")

@section("title", "Kelola Guru & Staff - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Kelola Guru & Staff</h1>
                <a href="{{ route("admin.teachers.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Tambah Guru/Staff
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session("success") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($teachers->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i> Belum ada data guru atau staff yang ditambahkan.
                            <br>
                            <a href="{{ route("admin.teachers.create") }}" class="btn btn-sm btn-info mt-3">
                                <i class="fas fa-plus me-2"></i> Tambah Guru/Staff Pertama
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle" id="teachersTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Pendidikan</th>
                                        <th>Level Karier</th>
                                        <th>Pengalaman</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Urutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if($teacher->photo)
                                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <i class="fas fa-user-circle fa-3x text-muted"></i>
                                                @endif
                                            </td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->nip ?? '-' }}</td>
                                            <td>{{ $teacher->position }}</td>
                                            <td>{{ $teacher->subject ?? '-' }}</td>
                                            <td>{{ $teacher->education ?? '-' }}</td>
                                            <td>{{ $teacher->career_level ?? '-' }}</td>
                                            <td>{{ $teacher->experience ?? '-' }}</td>
                                            <td>{{ $teacher->email ?? '-' }}</td>
                                            <td>
                                                @if($teacher->status === 'active')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>{{ $teacher->order ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")
<script>
    $(document).ready(function() {
        // Uncomment ini kalau mau pakai DataTables:
        // $("#teachersTable").DataTable();
    });
</script>
@endpush
