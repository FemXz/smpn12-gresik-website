<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Redirect langsung ke halaman sejarah
        return redirect()->route('about.history');
    }

    public function history()
    {
        return view('about.history');
    }

    public function visionMission()
    {
        return view('about.vision-mission');
    }

    public function organization()
    {
        return view('about.organization');
    }
}
