<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::orderBy('created_at', 'desc')->get();
        return view('admin.ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        return view('admin.ebooks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('ebooks/thumbnails', 'public');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $validated['file_path'] = $file->store('ebooks/files', 'public');
            $validated['file_type'] = $file->getClientOriginalExtension();
        }

        Ebook::create($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook)
    {
        return view('admin.ebooks.edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($ebook->thumbnail) {
                Storage::disk('public')->delete($ebook->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('ebooks/thumbnails', 'public');
        }

        if ($request->hasFile('file')) {
            if ($ebook->file_path) {
                Storage::disk('public')->delete($ebook->file_path);
            }
            $file = $request->file('file');
            $validated['file_path'] = $file->store('ebooks/files', 'public');
            $validated['file_type'] = $file->getClientOriginalExtension();
        }

        $ebook->update($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook)
    {
        if ($ebook->thumbnail) {
            Storage::disk('public')->delete($ebook->thumbnail);
        }
        if ($ebook->file_path) {
            Storage::disk('public')->delete($ebook->file_path);
        }

        $ebook->delete();

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil dihapus.');
    }
}

