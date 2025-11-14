<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    private $uploadFolder = 'uploads/gallery';

    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048|required_without:youtube_url',
            'youtube_url'  => 'nullable|url|required_without:image',
        ]);

        $path = null;
        $youtubeEmbed = null;

        // Upload gambar
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($this->uploadFolder), $imageName);
            $path = $this->uploadFolder . '/' . $imageName;
        }

        // Input YouTube
        if ($request->youtube_url) {
            $youtubeEmbed = $this->convertYoutubeUrl($request->youtube_url);
        }

        Gallery::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'image'        => $path,
            'youtube_url'  => $youtubeEmbed,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto/Video berhasil diunggah.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048|required_without:youtube_url',
            'youtube_url'  => 'nullable|url|required_without:image',
        ]);

        // Title & desc
        $gallery->title = $request->title;
        $gallery->description = $request->description;

        // Ganti gambar
        if ($request->hasFile('image')) {
            if ($gallery->image && File::exists(public_path($gallery->image))) {
                File::delete(public_path($gallery->image));
            }
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($this->uploadFolder), $imageName);
            $gallery->image = $this->uploadFolder . '/' . $imageName;
            $gallery->youtube_url = null;
        }

        // Ganti YouTube
        if ($request->youtube_url) {
            if ($gallery->image && File::exists(public_path($gallery->image))) {
                File::delete(public_path($gallery->image));
                $gallery->image = null;
            }
            $gallery->youtube_url = $this->convertYoutubeUrl($request->youtube_url);
        }

        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && File::exists(public_path($gallery->image))) {
            File::delete(public_path($gallery->image));
        }
        $gallery->delete();

        return back()->with('success', 'Foto/Video berhasil dihapus.');
    }

    /**
     * Convert berbagai format YouTube URL ke embed URL standar
     */
    private function convertYoutubeUrl($url)
    {
        $videoId = null;
        $parsedUrl = parse_url($url);

        // youtu.be/VIDEO_ID
        if (isset($parsedUrl['host']) && str_contains($parsedUrl['host'], 'youtu.be')) {
            $videoId = ltrim($parsedUrl['path'], '/');
        }

        // youtube.com/watch?v=VIDEO_ID
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            if (!empty($queryParams['v'])) {
                $videoId = $queryParams['v'];
            }
        }

        // youtube.com/embed/VIDEO_ID | /v/VIDEO_ID | /shorts/VIDEO_ID
        if (isset($parsedUrl['path'])) {
            if (preg_match('/\/(embed|v|shorts)\/([a-zA-Z0-9_-]{11})/', $parsedUrl['path'], $matches)) {
                $videoId = $matches[2];
            }
        }

        // Validasi panjang videoId (11 karakter)
        if ($videoId && strlen($videoId) === 11) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        return null;
    }
}
