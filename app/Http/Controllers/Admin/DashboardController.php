<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Extracurricular;
use App\Models\User; // ✨ Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $totalExtracurriculars = Extracurricular::count();

        $pendingUsers = User::where('status', 'pending')->get(); // ✔

        return view('admin.dashboard', compact('pendingUsers', 'totalNews', 'totalExtracurriculars'));
       
    }
}
