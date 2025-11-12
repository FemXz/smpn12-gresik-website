<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Ini penting biar tidak default ke 'alumnis'
    protected $table = 'alumni';

    protected $fillable = [
        'name',
        'graduation_year',
        'program',
        'current_job',
        'company',
        'email',
        'phone',
        'testimonial',
        'photo',
        'is_featured',
        'is_approved'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_approved' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
