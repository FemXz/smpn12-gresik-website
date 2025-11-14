@extends('admin.layouts.app')

@section('title', 'Edit Statistik')

@section('content')
<div class="container mt-4">
    <h2>Edit Statistik Sekolah</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.stats.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Jumlah Siswa</label>
            <input type="number" name="students" class="form-control" value="{{ old('students', $stat->students ?? 0) }}">
        </div>

        <div class="mb-3">
            <label>Jumlah Guru</label>
            <input type="number" name="teachers" class="form-control" value="{{ old('teachers', $stat->teachers ?? 0) }}">
        </div>

        <div class="mb-3">
            <label>Jumlah Staf</label>
            <input type="number" name="staff" class="form-control" value="{{ old('staff', $stat->staff ?? 0) }}">
        </div>

        <div class="mb-3">
            <label>Jumlah Prestasi</label>
            <input type="number" name="achievements" class="form-control" value="{{ old('achievements', $stat->achievements ?? 0) }}">
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
