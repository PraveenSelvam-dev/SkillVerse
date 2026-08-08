@extends('layouts.dashboard')

@section('title', 'My Wishlist')

@section('content')
@php
    $wishlist = [
        ['title' => 'Mastering Nuxt 3', 'instructor' => 'Vue Mastery', 'price' => '$49.99', 'rating' => 4.9, 'img' => 'https://ui-avatars.com/api/?name=N3&background=00dc82&color=fff&size=300'],
        ['title' => 'Fullstack React & Node', 'instructor' => 'Code Academy', 'price' => '$89.99', 'rating' => 4.7, 'img' => 'https://ui-avatars.com/api/?name=RN&background=61dafb&color=fff&size=300'],
        ['title' => 'Advanced CSS & Sass', 'instructor' => 'Jonas S', 'price' => '$29.99', 'rating' => 4.8, 'img' => 'https://ui-avatars.com/api/?name=CS&background=cc6699&color=fff&size=300'],
        ['title' => 'Go for Web Dev', 'instructor' => 'Todd McLeod', 'price' => '$59.99', 'rating' => 4.6, 'img' => 'https://ui-avatars.com/api/?name=GO&background=00add8&color=fff&size=300'],
        ['title' => 'System Design Interview', 'instructor' => 'ByteByteGo', 'price' => '$99.99', 'rating' => 4.9, 'img' => 'https://ui-avatars.com/api/?name=SD&background=ff9900&color=fff&size=300'],
        ['title' => 'Figma UI/UX Masterclass', 'instructor' => 'DesignCourse', 'price' => '$39.99', 'rating' => 4.8, 'img' => 'https://ui-avatars.com/api/?name=F&background=f24e1e&color=fff&size=300']
    ];
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        transition: transform 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
    }
    .course-img {
        height: 150px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }
    .btn-remove {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(0,0,0,0.5);
        color: white;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .btn-remove:hover {
        background: #FF6584;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">My Wishlist</h2>
        <span class="badge bg-primary rounded-pill px-3 py-2 fs-6">{{ count($wishlist) }} Items</span>
    </div>

    @if(count($wishlist) > 0)
    <div class="row g-4">
        @foreach($wishlist as $item)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="glass-card h-100 d-flex flex-column position-relative">
                <button class="btn-remove"><i class="fa-solid fa-times"></i></button>
                <img src="{{ $item['img'] }}" class="course-img w-100" alt="{{ $item['title'] }}">
                <div class="p-4 d-flex flex-column flex-grow-1">
                    <h5 class="text-white mb-1">{{ $item['title'] }}</h5>
                    <p class="text-muted small mb-2">{{ $item['instructor'] }}</p>
                    
                    <div class="d-flex align-items-center mb-3">
                        <span class="text-warning me-2"><i class="fa-solid fa-star"></i> {{ $item['rating'] }}</span>
                    </div>
                    
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <span class="text-white fw-bold fs-5">{{ $item['price'] }}</span>
                        <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-cart-plus me-1"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-5">
        <i class="fa-regular fa-heart text-muted mb-3" style="font-size: 4rem;"></i>
        <h4 class="text-white">Your wishlist is empty</h4>
        <p class="text-muted">Explore courses and add them to your wishlist to save them for later.</p>
        <button class="btn btn-primary mt-3" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Browse Courses</button>
    </div>
    @endif
</div>
@endsection
