<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'curriculum',
        'career_prospects',
        'duration_years',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->name);
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('name') && empty($program->slug)) {
                $program->slug = Str::slug($program->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

