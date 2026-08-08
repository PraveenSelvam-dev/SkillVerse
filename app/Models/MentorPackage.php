<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id',
        'title',
        'description',
        'price',
        'duration_minutes',
        'calls_count',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function mentor()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }

    public function bookings()
    {
        return $this->hasMany(MentorBooking::class);
    }
}
