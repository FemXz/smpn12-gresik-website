<?php

namespace App\Http\Controllers;

use App\Models\TeacherNews;
use Illuminate\Http\Request;

class TeacherNewsController extends Controller
{
    public function index()
    {
        $teacherNews = TeacherNews::where("is_published", true)->latest()->paginate(10);
        return view("teacher_news.index", compact("teacherNews"));
    }

    public function show(TeacherNews $teacherNews)
    {
        if (!$teacherNews->is_published) {
            abort(404);
        }
        return view("teacher_news.show", compact("teacherNews"));
    }
}

