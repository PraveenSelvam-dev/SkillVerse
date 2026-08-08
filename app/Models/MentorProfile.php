<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'about',
        'expertise',
        'hourly_rate',
        'availability',
        'is_active',
        'average_rating',
        'total_reviews',
        'total_students',
    ];

    protected $casts = [
        'expertise' => 'array',
        'hourly_rate' => 'decimal:2',
        'availability' => 'array',
        'is_active' => 'boolean',
        'average_rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->hasMany(MentorPackage::class, 'mentor_id');
    }

    public function bookings()
    {
        return $this->hasMany(MentorBooking::class, 'mentor_id');
    }
}
