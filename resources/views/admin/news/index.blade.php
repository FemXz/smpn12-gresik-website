@extends("admin.layouts.app")

@section("title", "Kelola Berita - Admin SMPN 12 Gresik")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Kelola Berita</h1>
                <a href="{{ route("admin.news.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Tambah Berita
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
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Publish</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($news as $item)
                                <tr>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $item->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit(strip_tags($item->content), 50) }}</small>
                                    </td>
                                    <td>{{ $item->author }}</td>
                                    <td>
                                        @if($item->published_at)
                                            {{ $item->published_at->format("d M Y") }}
                                        @else
                                            <span class="text-muted">Belum dipublish</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->published_at)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route("admin.news.edit", $item) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route("admin.news.destroy", $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-newspaper fa-3x mb-3"></i>
                                            <p>Belum ada berita yang ditambahkan.</p>
                                            <a href="{{ route("admin.news.create") }}" class="btn btn-primary">
                                                <i class="fas fa-plus me-2"></i> Tambah Berita Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($news->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $news->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

