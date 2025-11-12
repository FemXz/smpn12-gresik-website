<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'file_path',
        'file_type',
        'author',
        'category',
        'download_count',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ebook) {
            if (empty($ebook->slug)) {
                $ebook->slug = Str::slug($ebook->title);
            }
        });

        static::updating(function ($ebook) {
            if ($ebook->isDirty('title') && empty($ebook->slug)) {
                $ebook->slug = Str::slug($ebook->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }
}

