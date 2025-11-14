<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'slug',
            'nip',
            'position',
            'subject',
            'education',
            'career_level',
            'experience',
            'bio',
            'photo',
            'email',
            'phone',
            'status',
            'order',
        ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacher) {
            $teacher->slug = static::generateUniqueSlug($teacher->name);
        });

        static::updating(function ($teacher) {
            if ($teacher->isDirty('name')) {
                $teacher->slug = static::generateUniqueSlug($teacher->name, $teacher->id);
            }
        });
    }

    protected static function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
