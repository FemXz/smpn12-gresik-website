<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('ebooks.index', compact('ebooks'));
    }

    public function show(Ebook $ebook)
    {
        return view('ebooks.show', compact('ebook'));
    }

    public function download(Ebook $ebook)
    {
        if (!Storage::exists($ebook->file_path)) {
            abort(404, 'File not found');
        }

        $ebook->incrementDownloadCount();

        return Storage::download($ebook->file_path, $ebook->title . '.' . $ebook->file_type);
    }
}

