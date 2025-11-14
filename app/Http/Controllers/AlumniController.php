<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $featuredAlumni = Alumni::featured()->approved()->take(6)->get();
        $allAlumni = Alumni::approved()->orderBy('graduation_year', 'desc')->paginate(12);
        
        return view('alumni.index', compact('featuredAlumni', 'allAlumni'));
    }

    public function register()
    {
        return view('alumni.register');
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('alumni', 'public');
        }

        Alumni::create($validated);

        return redirect()->route('alumni.register')->with('success', 'Data alumni berhasil dikirim dan akan diverifikasi oleh admin.');
    }
}

