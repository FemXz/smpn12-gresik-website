<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view("admin.teachers.index", compact("teachers"));
    }

    public function create()
    {
        return view("admin.teachers.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "nip" => "nullable|string|max:255|unique:teachers,nip",
            "slug" => "nullable|string|max:255|unique:teachers,slug",
            "position" => "required|string|max:255",
            "subject" => "nullable|string|max:255",
            "education" => "nullable|string|max:255",
            "career_level" => "nullable|string|max:255",
            "experience" => "nullable|string|max:255",
            "bio" => "nullable|string",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "email" => "nullable|email|max:255",
            "phone" => "nullable|string|max:255",
            "status" => "in:aktif,nonaktif",
            "order" => "nullable|integer",
        ]);

        $data = $request->all();
        $data["slug"] = Str::slug($request->name);

        if ($request->hasFile("photo")) {
            $photoPath = $request->file("photo")->store("uploads/teachers", "public");
            $data["photo"] = $photoPath;
        }

        Teacher::create($data);

        return redirect()->route("admin.teachers.index")->with("success", "Data guru berhasil ditambahkan!");
    }

    public function edit(Teacher $teacher)
    {
        return view("admin.teachers.edit", compact("teacher"));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "nip" => "nullable|string|max:255|unique:teachers,nip," . $teacher->id,
            "slug" => "nullable|string|max:255|unique:teachers,slug," . $teacher->id,
            "position" => "required|string|max:255",
            "subject" => "nullable|string|max:255",
            "education" => "nullable|string|max:255",
            "career_level" => "nullable|string|max:255",
            "experience" => "nullable|string|max:255",
            "bio" => "nullable|string",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "email" => "nullable|email|max:255",
            "phone" => "nullable|string|max:255",
            "status" => "in:aktif,nonaktif",
            "order" => "nullable|integer",
        ]);

        $data = $request->all();
        $data["slug"] = Str::slug($request->name);

        if ($request->hasFile("photo")) {
            if ($teacher->photo) {
                Storage::disk("public")->delete($teacher->photo);
            }
            $photoPath = $request->file("photo")->store("uploads/teachers", "public");
            $data["photo"] = $photoPath;
        }

        $teacher->update($data);

        return redirect()->route("admin.teachers.index")->with("success", "Data guru berhasil diperbarui!");
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            Storage::disk("public")->delete($teacher->photo);
        }
        $teacher->delete();

        return redirect()->route("admin.teachers.index")->with("success", "Data guru berhasil dihapus!");
    }
}
