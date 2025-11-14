<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeacherNews extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "image",
        "author",
        "is_published",
        "published_at",
    ];

    protected $casts = [
        "is_published" => "boolean",
        "published_at" => "datetime",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacherNews) {
            $teacherNews->slug = Str::slug($teacherNews->title);
        });

        static::updating(function ($teacherNews) {
            $teacherNews->slug = Str::slug($teacherNews->title);
        });
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}

