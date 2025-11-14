<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Menampilkan daftar guru & staff
     */
    public function index()
    {
        // Ambil semua guru terbaru, 12 per halaman
        $teachers = Teacher::latest()->paginate(12);

        // Kirim ke view 'teachers.index'
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Menampilkan detail guru
     * Menggunakan route model binding berdasarkan slug
     */
    public function show(Teacher $teacher)
    {
        // Ambil 3 guru lain yang berbeda dari guru ini untuk section related
        $relatedTeachers = Teacher::where('id', '!=', $teacher->id)
            ->latest()
            ->take(3)
            ->get();

        // Kirim guru utama dan related ke view
        return view('teachers.show', compact('teacher', 'relatedTeachers'));
    }
}
