@extends('layouts.app')
@section('title', 'Browse Categories | SkillVerse')

@section('content')
<div class="bg-dark text-white border-bottom border-secondary border-opacity-25 py-5 text-center">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">Explore All Categories</h1>
        <p class="lead text-muted mx-auto mb-4" style="max-width: 650px;">Find top-rated courses, expert mentors, and freelance services organized by your industry of choice.</p>
        
        <form action="{{ url('/search') }}" method="GET" class="mx-auto" style="max-width: 500px;">
            <div class="input-group input-group-lg shadow-sm" style="border-radius: 50px; overflow: hidden;">
                <input type="text" name="q" class="form-control border-0 bg-white text-dark" placeholder="Search categories or skills..." style="padding-left: 25px;">
                <button class="btn btn-primary px-4" type="submit" style="background-color: #6C63FF; border-color: #6C63FF;"><i class="fa-solid fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @foreach($categories as $cat)
        <div class="col-md-6 col-lg-3">
            <div class="card sv-card border-0 text-white h-100 p-4" style="background: #0f3460; border-radius: 16px; transition: transform 0.3s ease;">
                <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6C63FF, #FF6584);">
                    <i class="fa-solid {{ $cat->icon ?? 'fa-folder' }} fa-xl text-white"></i>
                </div>
                
                <h5 class="fw-bold mb-2">
                    <a href="{{ url('/courses?category=' . ($cat->id ?? '1')) }}" class="text-white text-decoration-none hover-primary">
                        {{ $cat->name }}
                    </a>
                </h5>
                
                <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6;">
                    {{ $cat->description ?? 'Explore comprehensive courses and services in this field.' }}
                </p>
                
                <div class="d-flex justify-content-between align-items-center border-top border-secondary border-opacity-25 pt-3 mt-auto">
                    <span class="text-primary small fw-bold"><i class="fa-solid fa-book-open me-1"></i> {{ number_format($cat->courses_count ?? 120) }} Courses</span>
                    <a href="{{ url('/courses?category=' . ($cat->id ?? '1')) }}" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        Explore <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
