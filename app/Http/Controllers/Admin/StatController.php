<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stat;

class StatController extends Controller
{
    public function edit()
    {
        $stat = Stat::first(); // ambil record pertama
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'students' => 'required|integer|min:0',
            'teachers' => 'required|integer|min:0',
            'staff' => 'required|integer|min:0',
            'achievements' => 'required|integer|min:0',
        ]);

        // 🔹 Ambil record pertama atau buat baru
        $stat = Stat::first();

        if ($stat) {
            // Kalau udah ada -> update
            $stat->update([
                'students' => $request->students,
                'teachers' => $request->teachers,
                'staff' => $request->staff,
                'achievements' => $request->achievements,
            ]);
        } else {
            // Kalau belum ada -> create
            Stat::create([
                'students' => $request->students,
                'teachers' => $request->teachers,
                'staff' => $request->staff,
                'achievements' => $request->achievements,
            ]);
        }

        return redirect()->route('admin.stats.edit')->with('success', 'Statistik berhasil diperbarui!');
    }
}
