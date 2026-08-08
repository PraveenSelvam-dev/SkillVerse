<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'thumbnail',
        'price',
        'delivery_days',
        'is_active',
        'average_rating',
        'total_reviews',
        'total_orders',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'average_rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function packages()
    {
        return $this->hasMany(ServicePackage::class);
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
