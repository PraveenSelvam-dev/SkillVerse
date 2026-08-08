@extends('layouts.dashboard')

@section('title', 'My Services - Freelancer Dashboard')

@php
    $services = [
        ['title' => 'Full Stack Laravel Web Application', 'price' => 500, 'orders' => 12, 'rating' => 4.9, 'active' => true],
        ['title' => 'Custom UI/UX Design in Figma', 'price' => 250, 'orders' => 8, 'rating' => 4.7, 'active' => true],
        ['title' => 'API Development & Integration', 'price' => 300, 'orders' => 15, 'rating' => 5.0, 'active' => true],
        ['title' => 'Database Architecture Design', 'price' => 150, 'orders' => 3, 'rating' => 4.5, 'active' => false],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">My Services</h2>
        <a href="{{ route('freelancer.services.create') ?? '#' }}" class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">
            <i class="fas fa-plus me-2"></i>Create Service
        </a>
    </div>

    <div class="row g-4">
        @foreach($services as $index => $service)
        <div class="col-md-6 col-lg-3">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px; overflow: hidden;">
                <!-- Thumbnail Placeholder -->
                <div style="height: 150px; background: linear-gradient(135deg, {{ ['#6C63FF, #3b82f6', '#FF6584, #f59e0b', '#10b981, #3b82f6', '#8b5cf6, #ec4899'][$index % 4] }});">
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="text-light fw-bold mb-0" style="font-size: 1.1rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $service['title'] }}</h5>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" role="switch" {{ $service['active'] ? 'checked' : '' }}>
                        </div>
                    </div>
                    
                    <div class="mt-auto pt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small">Starting at</span>
                            <span class="text-primary fw-bold fs-5" style="color: #6C63FF !important;">${{ $service['price'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 text-muted small">
                            <span><i class="fas fa-shopping-cart me-1"></i>{{ $service['orders'] }} Orders</span>
                            <span><i class="fas fa-star text-warning me-1"></i>{{ $service['rating'] }}</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('freelancer.services.edit', 1) ?? '#' }}" class="btn btn-sm btn-outline-light flex-grow-1"><i class="fas fa-edit me-1"></i>Edit</a>
                            <button class="btn btn-sm btn-outline-danger px-3"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
