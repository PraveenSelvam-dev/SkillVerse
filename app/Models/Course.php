<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'category_id',
        'title',
        'slug',
        'description',
        'requirements',
        'what_you_will_learn',
        'thumbnail',
        'video_url',
        'price',
        'discount_price',
        'level',
        'language',
        'status',
        'is_featured',
        'is_free',
        'duration_hours',
        'average_rating',
        'total_reviews',
        'total_students',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_free' => 'boolean',
        'duration_hours' => 'decimal:1',
        'average_rating' => 'decimal:2',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sections()
    {
        return $this->hasMany(CourseSection::class)->orderBy('position');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, CourseSection::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function reviews()
    {
        return $this->hasMany(CourseReview::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_free', true);
    }

    public function scopeByCategory($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public function getEffectivePriceAttribute()
    {
        if ($this->is_free) return 0;
        return $this->discount_price > 0 ? $this->discount_price : $this->price;
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : asset('images/default-course.png');
    }
}
