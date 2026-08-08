<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mentor_profile_id',
        'mentor_package_id',
        'scheduled_at',
        'status',
        'price',
        'meeting_link',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }

    public function package()
    {
        return $this->belongsTo(MentorPackage::class, 'mentor_package_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'confirmed')->where('scheduled_at', '>', now());
    }
}
