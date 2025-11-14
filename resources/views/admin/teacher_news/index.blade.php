@extends("admin.layouts.app")

@section("title", "Kelola Berita Guru - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Kelola Berita Guru</h1>
                <a href="{{ route("admin.teacher-news.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Tambah Berita Guru
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

                    @if($teacherNews->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i> Belum ada berita guru yang ditambahkan.
                            <br>
                            <a href="{{ route("admin.teacher-news.create") }}" class="btn btn-sm btn-info mt-3">
                                <i class="fas fa-plus me-2"></i> Tambah Berita Guru Pertama
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="teacherNewsTable">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Tanggal Publish</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacherNews as $news)
                                        <tr>
                                            <td>
                                                @if($news->image)
                                                    <img src="{{ asset("storage/" . $news->image) }}" alt="{{ $news->title }}" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                                                @else
                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                @endif
                                            </td>
                                            <td>{{ $news->title }}</td>
                                            <td>{{ $news->author }}</td>
                                            <td>{{ $news->published_at ? $news->published_at->format("d M Y") : "-" }}</td>
                                            <td>
                                                @if($news->is_published)
                                                    <span class="badge bg-success">Published</span>
                                                @else
                                                    <span class="badge bg-warning">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route("admin.teacher-news.edit", $news) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route("admin.teacher-news.destroy", $news) }}" method="POST" class="d-inline" onsubmit="return confirm("Apakah Anda yakin ingin menghapus berita ini?");">
                                                    @csrf
                                                    @method("DELETE")
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
        // Initialize DataTables if needed
        // $("#teacherNewsTable").DataTable();
    });
</script>
@endpush

