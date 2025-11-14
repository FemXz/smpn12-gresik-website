<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ppdb extends Model
{
    use HasFactory;

    // <- ini tambahan penting
    protected $table = 'ppdb';

    protected $fillable = [
        'academic_year',
        'title',
        'description',
        'registration_start',
        'registration_end',
        'announcement_date',
        'requirements',
        'procedures',
        'contact_person',
        'contact_phone',
        'is_active'
    ];

    protected $casts = [
        'registration_start' => 'date',
        'registration_end' => 'date',
        'announcement_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function isRegistrationOpen()
    {
        $now = Carbon::now()->toDateString();
        return $now >= $this->registration_start && $now <= $this->registration_end;
    }

    public function getRegistrationStatusAttribute()
    {
        $now = Carbon::now()->toDateString();
        
        if ($now < $this->registration_start) {
            return 'Belum Dibuka';
        } elseif ($now > $this->registration_end) {
            return 'Sudah Ditutup';
        } else {
            return 'Sedang Dibuka';
        }
    }
}
