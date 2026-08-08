<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'service_package_id',
        'status',
        'price',
        'delivery_date',
        'requirements',
        'delivery_files',
        'seller_notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'delivery_date' => 'date',
        'delivery_files' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(ServicePackage::class, 'service_package_id');
    }

    public function review()
    {
        return $this->hasOne(ServiceReview::class, 'order_id');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
