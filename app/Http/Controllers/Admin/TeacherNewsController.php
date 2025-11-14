<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeacherNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherNews = TeacherNews::latest()->get();
        return view("admin.teacher_news.index", compact("teacherNews"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.teacher_news.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "author" => "required|string|max:255",
            "is_published" => "boolean",
        ]);

        $data = $request->all();
        $data["is_published"] = $request->has("is_published");
        $data["published_at"] = $data["is_published"] ? now() : null;

        if ($request->hasFile("image")) {
            $imagePath = $request->file("image")->store("uploads/teacher_news", "public");
            $data["image"] = $imagePath;
        }

        TeacherNews::create($data);

        return redirect()->route("admin.teacher_news.index")->with("success", "Berita guru berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherNews $teacherNews)
    {
        return view("admin.teacher_news.edit", compact("teacherNews"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherNews $teacherNews)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "content" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "author" => "required|string|max:255",
            "is_published" => "boolean",
        ]);

        $data = $request->all();
        $data["is_published"] = $request->has("is_published");
        $data["published_at"] = $data["is_published"] ? now() : null;

        if ($request->hasFile("image")) {
            if ($teacherNews->image) {
                Storage::disk("public")->delete($teacherNews->image);
            }
            $imagePath = $request->file("image")->store("uploads/teacher_news", "public");
            $data["image"] = $imagePath;
        }

        $teacherNews->update($data);

        return redirect()->route("admin.teacher_news.index")->with("success", "Berita guru berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherNews $teacherNews)
    {
        if ($teacherNews->image) {
            Storage::disk("public")->delete($teacherNews->image);
        }
        $teacherNews->delete();

        return redirect()->route("admin.teacher_news.index")->with("success", "Berita guru berhasil dihapus!");
    }
}

