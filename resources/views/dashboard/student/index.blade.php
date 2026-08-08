@extends('layouts.dashboard')

@section('title', 'Student Dashboard Overview')

@section('content')
@php
    $stats = [
        ['title' => 'Enrolled Courses', 'value' => '12', 'icon' => 'fa-book-open', 'color' => '#6C63FF'],
        ['title' => 'Completed', 'value' => '5', 'icon' => 'fa-check-circle', 'color' => '#00C9A7'],
        ['title' => 'Certificates', 'value' => '3', 'icon' => 'fa-award', 'color' => '#FFB347'],
        ['title' => 'Hours Learned', 'value' => '86', 'icon' => 'fa-clock', 'color' => '#FF6584']
    ];

    $continueLearning = [
        ['title' => 'Advanced Laravel Mastery', 'progress' => 65, 'image' => 'https://ui-avatars.com/api/?name=AL&background=6C63FF&color=fff&size=200'],
        ['title' => 'Vue 3 Composition API', 'progress' => 30, 'image' => 'https://ui-avatars.com/api/?name=V3&background=00C9A7&color=fff&size=200'],
        ['title' => 'Docker for Web Developers', 'progress' => 15, 'image' => 'https://ui-avatars.com/api/?name=DK&background=FFB347&color=fff&size=200']
    ];

    $recentActivity = [
        ['text' => 'Enrolled in Advanced Laravel Mastery', 'time' => '2 hours ago', 'icon' => 'fa-plus', 'color' => '#6C63FF'],
        ['text' => 'Completed lesson: Middleware deeply explained', 'time' => '5 hours ago', 'icon' => 'fa-check', 'color' => '#00C9A7'],
        ['text' => 'Earned certificate: PHP Basics', 'time' => '1 day ago', 'icon' => 'fa-award', 'color' => '#FFB347'],
        ['text' => 'Booked mentor session with Jane Doe', 'time' => '2 days ago', 'icon' => 'fa-calendar', 'color' => '#FF6584'],
        ['text' => 'Completed quiz: Vue Routing (90%)', 'time' => '3 days ago', 'icon' => 'fa-star', 'color' => '#00C9A7']
    ];

    $recommended = [
        ['title' => 'Mastering React 18', 'instructor' => 'John Smith', 'rating' => 4.8],
        ['title' => 'AWS Certified Practitioner', 'instructor' => 'Emily Chen', 'rating' => 4.9],
        ['title' => 'UI/UX Principles', 'instructor' => 'Sarah Johnson', 'rating' => 4.7],
        ['title' => 'Python Data Science', 'instructor' => 'Mike Brown', 'rating' => 4.6]
    ];
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        color: #e0e0e0;
    }
    .stat-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .progress-bar-gradient {
        background: linear-gradient(135deg, #6C63FF, #FF6584);
    }
    .activity-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-white mb-1">Welcome back, Alex! 👋</h2>
            <p class="text-muted mb-0">Here's what's happening with your learning journey.</p>
        </div>
        <button class="btn btn-primary" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">
            <i class="fa-solid fa-compass me-2"></i>Explore New Courses
        </button>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
        <div class="col-md-3">
            <div class="glass-card p-4 h-100 d-flex align-items-center">
                <div class="stat-card-icon me-3" style="background: {{ $stat['color'] }}20; color: {{ $stat['color'] }}">
                    <i class="fa-solid {{ $stat['icon'] }}"></i>
                </div>
                <div>
                    <h3 class="mb-0 text-white fw-bold">{{ $stat['value'] }}</h3>
                    <p class="text-muted mb-0 small">{{ $stat['title'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Continue Learning -->
            <h4 class="text-white mb-3">Continue Learning</h4>
            <div class="row g-4 mb-4">
                @foreach($continueLearning as $course)
                <div class="col-md-4">
                    <div class="glass-card p-3 h-100 transition-hover">
                        <img src="{{ $course['image'] }}" class="img-fluid rounded mb-3 w-100" style="height: 120px; object-fit: cover;">
                        <h6 class="text-white mb-3 text-truncate">{{ $course['title'] }}</h6>
                        <div class="d-flex justify-content-between text-muted small mb-1">
                            <span>Progress</span>
                            <span>{{ $course['progress'] }}%</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(255,255,255,0.1);">
                            <div class="progress-bar progress-bar-gradient" role="progressbar" style="width: {{ $course['progress'] }}%;"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Recommended Courses -->
            <h4 class="text-white mb-3">Recommended for You</h4>
            <div class="row g-4">
                @foreach($recommended as $rec)
                <div class="col-md-6">
                    <div class="glass-card p-3 d-flex align-items-center h-100">
                        <div class="bg-secondary rounded me-3" style="width: 60px; height: 60px;"></div>
                        <div>
                            <h6 class="text-white mb-1">{{ $rec['title'] }}</h6>
                            <p class="text-muted small mb-1">{{ $rec['instructor'] }}</p>
                            <div class="text-warning small">
                                <i class="fa-solid fa-star"></i> {{ $rec['rating'] }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Upcoming Sessions -->
            <div class="glass-card p-4 mb-4" style="background: linear-gradient(135deg, rgba(108,99,255,0.1), rgba(255,101,132,0.1));">
                <h5 class="text-white mb-3"><i class="fa-solid fa-calendar-check me-2 text-primary"></i>Upcoming Sessions</h5>
                <div class="bg-dark rounded p-3 mb-2 border border-secondary">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-white mb-1">Code Review with Sarah</h6>
                            <p class="text-muted small mb-0"><i class="fa-regular fa-clock me-1"></i> Today, 3:00 PM</p>
                        </div>
                        <span class="badge bg-primary">Mentor</span>
                    </div>
                </div>
                <button class="btn btn-outline-light btn-sm w-100 mt-2">View Schedule</button>
            </div>

            <!-- Recent Activity -->
            <div class="glass-card p-4">
                <h5 class="text-white mb-4">Recent Activity</h5>
                <div class="position-relative">
                    @foreach($recentActivity as $index => $activity)
                    <div class="d-flex mb-3 position-relative">
                        @if(!$loop->last)
                        <div class="position-absolute" style="left: 15px; top: 32px; bottom: -15px; width: 2px; background: rgba(255,255,255,0.1);"></div>
                        @endif
                        <div class="activity-icon me-3 z-1" style="background: {{ $activity['color'] }}20; color: {{ $activity['color'] }}">
                            <i class="fa-solid {{ $activity['icon'] }}"></i>
                        </div>
                        <div>
                            <p class="text-white mb-0 small">{{ $activity['text'] }}</p>
                            <span class="text-muted" style="font-size: 0.75rem;">{{ $activity['time'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
