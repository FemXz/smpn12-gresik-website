<?php

namespace App\Http\Controllers;

use App\Models\PpdbSetting;

class PpdbController extends Controller
{
    /**
     * Halaman PPDB Utama
     */
    public function index()
    {
        $ppdb = PpdbSetting::first();

        // Jika belum ada data sama sekali
        if (!$ppdb) {
            return view('information.ppdb.index', ['ppdb' => null]);
        }

        return view('information.ppdb.index', compact('ppdb'));
    }

    /**
     * Halaman Detail PPDB (opsional)
     */
    public function show()
    {
        $ppdb = PpdbSetting::first();

        if (!$ppdb) {
            return view('information.ppdb.show', ['ppdb' => null]);
        }

        return view('information.ppdb.show', compact('ppdb'));
    }
}
