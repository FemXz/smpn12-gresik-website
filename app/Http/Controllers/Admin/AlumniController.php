<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::orderBy('created_at', 'desc')->get();
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:4',
            'program' => 'nullable|string|max:255',
            'current_job' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'testimonial' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        Alumni::create($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    public function edit(Alumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:4',
            'program' => 'nullable|string|max:255',
            'current_job' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'testimonial' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            if ($alumni->photo) {
                Storage::disk('public')->delete($alumni->photo);
            }
            $validated['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        $alumni->update($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->photo) {
            Storage::disk('public')->delete($alumni->photo);
        }

        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

    public function approve(Alumni $alumni)
    {
        $alumni->update(['is_approved' => true]);
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil disetujui.');
    }

    public function feature(Alumni $alumni)
    {
        $alumni->update(['is_featured' => !$alumni->is_featured]);
        $status = $alumni->is_featured ? 'ditampilkan' : 'disembunyikan';
        return redirect()->route('admin.alumni.index')->with('success', "Alumni berhasil {$status} dari halaman utama.");
    }
}

