<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Str;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->paginate(10);
        return view('admin.extracurriculars.index', compact('extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.extracurriculars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'schedule' => 'nullable|string|max:255',
            'teacher_in_charge' => 'nullable|string|max:255',
            'category' => 'required|string|max:50', // tambahan
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/extracurriculars'), $imageName);
            $data['image'] = 'uploads/extracurriculars/' . $imageName;
        }

        Extracurricular::create($data);

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurriculars.edit', compact('extracurricular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'schedule' => 'nullable|string|max:255',
                'teacher_in_charge' => 'nullable|string|max:255',
                'category' => 'required|string|max:50', // tambahan
            ]);

            $data = $request->all();
            $data['slug'] = Str::slug($request->name);


        if ($request->hasFile('image')) {
            // Delete old image
            if ($extracurricular->image && file_exists(public_path($extracurricular->image))) {
                unlink(public_path($extracurricular->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/extracurriculars'), $imageName);
            $data['image'] = 'uploads/extracurriculars/' . $imageName;
        }

        $extracurricular->update($data);

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        // Delete image file
        if ($extracurricular->image && file_exists(public_path($extracurricular->image))) {
            unlink(public_path($extracurricular->image));
        }

        $extracurricular->delete();

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}

