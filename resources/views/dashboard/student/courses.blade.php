@extends('layouts.dashboard')

@section('title', 'My Courses')

@section('content')
@php
    $courses = [
        ['title' => 'Advanced Laravel Mastery', 'instructor' => 'Alex Developer', 'progress' => 65, 'last_accessed' => 'Today', 'status' => 'in_progress', 'img' => 'https://ui-avatars.com/api/?name=L&background=ef3b2d&color=fff&size=300'],
        ['title' => 'Vue 3 Composition API', 'instructor' => 'Evan You', 'progress' => 30, 'last_accessed' => 'Yesterday', 'status' => 'in_progress', 'img' => 'https://ui-avatars.com/api/?name=V&background=4fc08d&color=fff&size=300'],
        ['title' => 'Docker for Web Developers', 'instructor' => 'Jane Smith', 'progress' => 15, 'last_accessed' => '3 days ago', 'status' => 'in_progress', 'img' => 'https://ui-avatars.com/api/?name=D&background=2496ed&color=fff&size=300'],
        ['title' => 'Tailwind CSS in Depth', 'instructor' => 'Adam Wathan', 'progress' => 100, 'last_accessed' => '1 week ago', 'status' => 'completed', 'img' => 'https://ui-avatars.com/api/?name=T&background=38b2ac&color=fff&size=300'],
        ['title' => 'PHP 8 New Features', 'instructor' => 'Taylor Otwell', 'progress' => 100, 'last_accessed' => '2 weeks ago', 'status' => 'completed', 'img' => 'https://ui-avatars.com/api/?name=P&background=777bb4&color=fff&size=300'],
        ['title' => 'MySQL Performance Tuning', 'instructor' => 'John Doe', 'progress' => 100, 'last_accessed' => '1 month ago', 'status' => 'completed', 'img' => 'https://ui-avatars.com/api/?name=M&background=4479a1&color=fff&size=300'],
        ['title' => 'Git & GitHub Pro', 'instructor' => 'Linus T', 'progress' => 5, 'last_accessed' => '2 months ago', 'status' => 'in_progress', 'img' => 'https://ui-avatars.com/api/?name=G&background=f34f29&color=fff&size=300'],
        ['title' => 'RESTful API Design', 'instructor' => 'API Guru', 'progress' => 0, 'last_accessed' => 'Never', 'status' => 'in_progress', 'img' => 'https://ui-avatars.com/api/?name=R&background=000&color=fff&size=300']
    ];
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.4);
    }
    .nav-pills .nav-link {
        color: #e0e0e0;
        border-radius: 8px;
    }
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #6C63FF, #FF6584);
        color: white;
    }
    .course-img {
        height: 160px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">My Courses</h2>
        <div class="input-group" style="width: 250px;">
            <span class="input-group-text bg-dark border-secondary text-muted"><i class="fa-solid fa-search"></i></span>
            <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search courses...">
        </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-pills mb-4" id="courseTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active px-4" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab">All Courses</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-4" id="progress-tab" data-bs-toggle="pill" data-bs-target="#progress" type="button" role="tab">In Progress</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-4" id="completed-tab" data-bs-toggle="pill" data-bs-target="#completed" type="button" role="tab">Completed</button>
        </li>
    </ul>

    <div class="tab-content" id="courseTabsContent">
        <!-- All Courses -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <div class="row g-4">
                @foreach($courses as $course)
                <div class="col-md-6 col-lg-3">
                    <div class="glass-card h-100 d-flex flex-column">
                        <img src="{{ $course['img'] }}" class="course-img w-100" alt="{{ $course['title'] }}">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h5 class="text-white mb-1">{{ $course['title'] }}</h5>
                            <p class="text-muted small mb-3">{{ $course['instructor'] }}</p>
                            
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span>{{ $course['progress'] == 100 ? 'Completed' : 'Progress' }}</span>
                                    <span>{{ $course['progress'] }}%</span>
                                </div>
                                <div class="progress mb-3" style="height: 6px; background: rgba(255,255,255,0.1);">
                                    <div class="progress-bar {{ $course['progress'] == 100 ? 'bg-success' : '' }}" 
                                         role="progressbar" 
                                         style="width: {{ $course['progress'] }}%; {{ $course['progress'] != 100 ? 'background: linear-gradient(135deg, #6C63FF, #FF6584);' : '' }}">
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted" style="font-size: 0.75rem;">Accessed: {{ $course['last_accessed'] }}</span>
                                    @if($course['progress'] == 100)
                                        <button class="btn btn-outline-success btn-sm">Review</button>
                                    @else
                                        <button class="btn btn-primary btn-sm" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Continue</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Other tabs would filter the dummy data in a real app, here we just show the structure -->
        <div class="tab-pane fade" id="progress" role="tabpanel">
            <p class="text-muted text-center py-5">In progress courses will appear here...</p>
        </div>
        <div class="tab-pane fade" id="completed" role="tabpanel">
            <p class="text-muted text-center py-5">Completed courses will appear here...</p>
        </div>
    </div>
</div>
@endsection
