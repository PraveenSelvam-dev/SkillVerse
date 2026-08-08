@extends('layouts.dashboard')
@section('title', 'Instructor Dashboard')
@section('content')
@php
    $stats = [
        ['title' => 'Total Students', 'value' => '1,247', 'icon' => 'fa-users', 'color' => '#6C63FF'],
        ['title' => 'Total Courses', 'value' => '8', 'icon' => 'fa-book-open', 'color' => '#FF6584'],
        ['title' => 'Total Revenue', 'value' => '$12,450', 'icon' => 'fa-dollar-sign', 'color' => '#00C9A7'],
        ['title' => 'Average Rating', 'value' => '4.8', 'icon' => 'fa-star', 'color' => '#FFB347'],
    ];
    $recent_enrollments = [
        ['student' => 'Alice Johnson', 'course' => 'Advanced Laravel Mastery', 'date' => '2023-10-12', 'amount' => '$49.00'],
        ['student' => 'Bob Smith', 'course' => 'Vue.js for Beginners', 'date' => '2023-10-11', 'amount' => '$39.00'],
        ['student' => 'Charlie Brown', 'course' => 'UI/UX Design Principles', 'date' => '2023-10-10', 'amount' => '$59.00'],
        ['student' => 'Diana Prince', 'course' => 'Advanced Laravel Mastery', 'date' => '2023-10-09', 'amount' => '$49.00'],
        ['student' => 'Evan Wright', 'course' => 'Full-Stack Web Dev', 'date' => '2023-10-08', 'amount' => '$89.00'],
    ];
    $top_courses = [
        ['title' => 'Advanced Laravel Mastery', 'enrollments' => 450, 'rating' => 4.9, 'revenue' => '$22,050'],
        ['title' => 'Vue.js for Beginners', 'enrollments' => 320, 'rating' => 4.7, 'revenue' => '$12,480'],
        ['title' => 'Full-Stack Web Dev', 'enrollments' => 280, 'rating' => 4.8, 'revenue' => '$24,920'],
    ];
    $recent_reviews = [
        ['avatar' => 'https://ui-avatars.com/api/?name=Alice&background=random', 'student' => 'Alice Johnson', 'course' => 'Advanced Laravel Mastery', 'rating' => 5, 'comment' => 'This course is amazing! I learned so much about Eloquent relationships.'],
        ['avatar' => 'https://ui-avatars.com/api/?name=Bob&background=random', 'student' => 'Bob Smith', 'course' => 'Vue.js for Beginners', 'rating' => 4, 'comment' => 'Great introduction, but could use more real-world projects.'],
        ['avatar' => 'https://ui-avatars.com/api/?name=Charlie&background=random', 'student' => 'Charlie Brown', 'course' => 'UI/UX Design Principles', 'rating' => 5, 'comment' => 'The principles here changed the way I design completely.'],
    ];
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 20px; transition: all 0.3s ease; }
    .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 8px 32px rgba(0,0,0,0.3); }
    .icon-box { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #fff; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .verified-badge { color: #00C9A7; font-size: 0.9em; margin-left: 10px; }
    .welcome-banner { background: linear-gradient(135deg, rgba(108, 99, 255, 0.2), rgba(255, 101, 132, 0.2)); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 30px; margin-bottom: 30px; display: flex; align-items: center; justify-content: space-between; backdrop-filter: blur(10px); }
    .welcome-text h2 { margin: 0; color: #fff; font-weight: 600; }
    .welcome-text p { margin: 5px 0 0; color: #aaa; }
    .stat-value { font-size: 1.8rem; font-weight: 700; color: #fff; margin: 10px 0 0; }
    .stat-title { color: #aaa; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; }
    .chart-container { height: 300px; width: 100%; position: relative; }
</style>

<div class="container-fluid py-4">
    <div class="welcome-banner">
        <div class="welcome-text">
            <h2>Welcome back, Instructor Name! <i class="fa-solid fa-circle-check verified-badge" title="Verified Instructor"></i></h2>
            <p>Here is what's happening with your courses today.</p>
        </div>
        <div class="d-none d-md-block">
            <a href="#" class="btn" style="background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; border-radius: 8px; padding: 10px 20px;"><i class="fa-solid fa-plus me-2"></i>Create Course</a>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-title">{{ $stat['title'] }}</div>
                        <div class="stat-value">{{ $stat['value'] }}</div>
                    </div>
                    <div class="icon-box" style="background-color: {{ $stat['color'] }}">
                        <i class="fa-solid {{ $stat['icon'] }}"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h5 class="mb-4 text-white">Revenue Overview</h5>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <h5 class="mb-4 text-white">Top Performing Courses</h5>
                <div class="d-flex flex-column gap-3">
                    @foreach($top_courses as $course)
                    <div class="p-3 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                        <h6 class="text-white mb-2 text-truncate" title="{{ $course['title'] }}">{{ $course['title'] }}</h6>
                        <div class="d-flex justify-content-between text-sm" style="color: #aaa; font-size: 0.85rem;">
                            <span><i class="fa-solid fa-users me-1"></i>{{ $course['enrollments'] }}</span>
                            <span><i class="fa-solid fa-star text-warning me-1"></i>{{ $course['rating'] }}</span>
                            <span class="text-success">{{ $course['revenue'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white m-0">Recent Enrollments</h5>
                    <a href="#" class="text-decoration-none" style="color: #6C63FF;">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment['student'] }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $enrollment['course'] }}</td>
                                <td>{{ $enrollment['date'] }}</td>
                                <td class="text-success">{{ $enrollment['amount'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white m-0">Recent Reviews</h5>
                    <a href="#" class="text-decoration-none" style="color: #6C63FF;">View All</a>
                </div>
                <div class="d-flex flex-column gap-3">
                    @foreach($recent_reviews as $review)
                    <div class="p-3 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ $review['avatar'] }}" class="rounded-circle me-2" width="32" height="32" alt="Avatar">
                            <div>
                                <div class="text-white" style="font-size: 0.9rem;">{{ $review['student'] }}</div>
                                <div class="text-warning" style="font-size: 0.75rem;">
                                    @for($i=0; $i<$review['rating']; $i++) <i class="fa-solid fa-star"></i> @endfor
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 text-truncate" style="color: #aaa; font-size: 0.85rem;" title="{{ $review['comment'] }}">"{{ $review['comment'] }}"</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(108, 99, 255, 0.5)');
        gradient.addColorStop(1, 'rgba(108, 99, 255, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [1200, 1900, 1500, 2200, 2800, 2400, 3100, 3800, 3500, 4200],
                    borderColor: '#6C63FF',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#FF6584',
                    pointBorderColor: '#fff',
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#aaa' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#aaa' }
                    }
                }
            }
        });
    });
</script>
@endsection
