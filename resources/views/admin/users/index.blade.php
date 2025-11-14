@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen User</h1>

    {{-- ✅ Tabs --}}
    <ul class="nav nav-tabs" id="userTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending Users</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button" role="tab">Active Users</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="userTabsContent">
        {{-- Pending Users --}}
        <div class="tab-pane fade show active" id="pending" role="tabpanel">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users->where('status', 'pending') as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{-- Approve --}}
                                <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Approve</button>
                                </form>

                                {{-- Delete --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Active Users --}}
        <div class="tab-pane fade" id="active" role="tabpanel">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users->where('status', 'active') as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{-- Delete --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
