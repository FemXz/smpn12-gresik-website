<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $activePpdb = Ppdb::active()->orderBy('created_at', 'desc')->get();
        return view('information.ppdb.index', compact('activePpdb'));
    }

    public function show(Ppdb $ppdb)
    {
        return view('ppdb.show', compact('ppdb'));
    }
}

