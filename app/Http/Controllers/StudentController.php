<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class StudentController extends Controller
{
    public function extracurricular()
    {
        $extracurriculars = Extracurricular::latest()->get();
        return view('student.extracurricular', compact('extracurriculars'));
    }
}
