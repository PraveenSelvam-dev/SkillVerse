import os
import textwrap

base_dir = r"d:\My_Projects\SkillVerse\resources\views\instructor"
os.makedirs(os.path.join(base_dir, "courses"), exist_ok=True)

files = {}

files["index.blade.php"] = """@extends('layouts.dashboard')
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
            <a href="{{ route('instructor.courses.create') ?? '#' }}" class="btn" style="background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; border-radius: 8px; padding: 10px 20px;"><i class="fa-solid fa-plus me-2"></i>Create Course</a>
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
"""

files["courses/index.blade.php"] = """@extends('layouts.dashboard')
@section('title', 'My Courses')
@section('content')
@php
    $courses = [
        ['title' => 'Advanced Laravel Mastery', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/6C63FF?text=Laravel', 'category' => 'Web Development', 'status' => 'Published', 'status_color' => 'success', 'students' => 450, 'rating' => 4.9, 'revenue' => '$22,050', 'date' => '2023-01-15'],
        ['title' => 'Vue.js for Beginners', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/00C9A7?text=Vue.js', 'category' => 'Web Development', 'status' => 'Published', 'status_color' => 'success', 'students' => 320, 'rating' => 4.7, 'revenue' => '$12,480', 'date' => '2023-03-22'],
        ['title' => 'UI/UX Design Principles', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/FF6584?text=UI/UX', 'category' => 'Design', 'status' => 'Draft', 'status_color' => 'warning', 'students' => 0, 'rating' => 0, 'revenue' => '$0', 'date' => '2023-09-10'],
        ['title' => 'Full-Stack Web Dev', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/6C63FF?text=Full-Stack', 'category' => 'Web Development', 'status' => 'Published', 'status_color' => 'success', 'students' => 280, 'rating' => 4.8, 'revenue' => '$24,920', 'date' => '2022-11-05'],
        ['title' => 'Python for Data Science', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/FFB347?text=Python', 'category' => 'Data Science', 'status' => 'Pending', 'status_color' => 'info', 'students' => 0, 'rating' => 0, 'revenue' => '$0', 'date' => '2023-10-01'],
        ['title' => 'Digital Marketing 101', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/FF6584?text=Marketing', 'category' => 'Marketing', 'status' => 'Archived', 'status_color' => 'secondary', 'students' => 150, 'rating' => 4.2, 'revenue' => '$4,500', 'date' => '2021-08-14'],
        ['title' => 'React Native Mobile Apps', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/00C9A7?text=React', 'category' => 'Mobile Dev', 'status' => 'Draft', 'status_color' => 'warning', 'students' => 0, 'rating' => 0, 'revenue' => '$0', 'date' => '2023-10-20'],
        ['title' => 'Machine Learning A-Z', 'thumbnail' => 'https://via.placeholder.com/150x100/16213e/6C63FF?text=ML', 'category' => 'Data Science', 'status' => 'Published', 'status_color' => 'success', 'students' => 890, 'rating' => 4.9, 'revenue' => '$88,110', 'date' => '2022-05-18'],
    ];
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 20px; }
    .btn-gradient { background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; transition: transform 0.2s; }
    .btn-gradient:hover { transform: scale(1.05); color: white; }
    .nav-pills-custom .nav-link { color: #aaa; border-radius: 20px; margin-right: 10px; padding: 8px 20px; }
    .nav-pills-custom .nav-link.active { background: rgba(108, 99, 255, 0.2); color: #6C63FF; font-weight: 600; border: 1px solid #6C63FF; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .course-thumb { border-radius: 8px; object-fit: cover; width: 100px; height: 66px; }
    .action-btn { width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; margin-right: 5px; text-decoration: none; transition: all 0.2s; }
    .btn-edit { background: rgba(255, 179, 71, 0.1); color: #FFB347; }
    .btn-edit:hover { background: #FFB347; color: #1a1a2e; }
    .btn-view { background: rgba(108, 99, 255, 0.1); color: #6C63FF; }
    .btn-view:hover { background: #6C63FF; color: #fff; }
    .btn-delete { background: rgba(255, 101, 132, 0.1); color: #FF6584; }
    .btn-delete:hover { background: #FF6584; color: #fff; }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">My Courses</h2>
        <a href="#" class="btn btn-gradient px-4"><i class="fa-solid fa-plus me-2"></i>Create New Course</a>
    </div>

    <div class="dashboard-card mb-4">
        <ul class="nav nav-pills nav-pills-custom mb-4" id="course-filters">
            <li class="nav-item"><a class="nav-link active" href="#">All</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Published</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Draft</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pending</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Archived</a></li>
        </ul>

        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Students</th>
                        <th>Rating</th>
                        <th>Revenue</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $course['thumbnail'] }}" class="course-thumb me-3" alt="Thumbnail">
                                <div>
                                    <h6 class="text-white mb-1">{{ $course['title'] }}</h6>
                                    <span class="text-muted" style="font-size: 0.85rem;">{{ $course['category'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-{{ $course['status_color'] }}">{{ $course['status'] }}</span></td>
                        <td>{{ $course['students'] }}</td>
                        <td><i class="fa-solid fa-star text-warning me-1"></i>{{ $course['rating'] > 0 ? $course['rating'] : 'N/A' }}</td>
                        <td>{{ $course['revenue'] }}</td>
                        <td>{{ $course['date'] }}</td>
                        <td>
                            <a href="#" class="action-btn btn-edit" title="Edit"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="action-btn btn-view" title="View"><i class="fa-solid fa-eye"></i></a>
                            <a href="#" class="action-btn btn-delete" title="Delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
"""

files["courses/create.blade.php"] = """@extends('layouts.dashboard')
@section('title', 'Create Course')
@section('content')
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 30px; }
    .step-indicator { display: flex; justify-content: space-between; margin-bottom: 30px; position: relative; }
    .step-indicator::before { content: ''; position: absolute; top: 15px; left: 0; right: 0; height: 2px; background: rgba(255,255,255,0.1); z-index: 1; }
    .step { z-index: 2; background: #0f3460; padding: 0 10px; display: flex; flex-direction: column; align-items: center; color: #aaa; transition: all 0.3s; }
    .step.active { color: #6C63FF; }
    .step-icon { width: 32px; height: 32px; border-radius: 50%; background: #16213e; border: 2px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 8px; font-weight: bold; }
    .step.active .step-icon { background: #6C63FF; border-color: #6C63FF; color: white; box-shadow: 0 0 15px rgba(108, 99, 255, 0.5); }
    .step.completed .step-icon { background: #00C9A7; border-color: #00C9A7; color: white; }
    .form-control, .form-select { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 10px 15px; }
    .form-control:focus, .form-select:focus { background: #16213e; border-color: #6C63FF; color: #fff; box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25); }
    .form-label { color: #e0e0e0; font-weight: 500; }
    .btn-gradient { background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; }
    .btn-outline-light { border-color: rgba(255,255,255,0.2); color: #e0e0e0; }
    .btn-outline-light:hover { background: rgba(255,255,255,0.1); color: #fff; border-color: rgba(255,255,255,0.3); }
    .section-box { border: 1px dashed rgba(255,255,255,0.2); border-radius: 8px; padding: 20px; margin-bottom: 20px; background: rgba(255,255,255,0.02); }
    .lesson-box { background: #16213e; border-radius: 8px; padding: 15px; margin-top: 10px; display: flex; align-items: center; gap: 15px; border: 1px solid rgba(255,255,255,0.05); }
    .drag-handle { color: #aaa; cursor: grab; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Create New Course</h2>

    <div class="dashboard-card">
        <div class="step-indicator">
            <div class="step active" id="indicator-1">
                <div class="step-icon">1</div>
                <span>Basic Info</span>
            </div>
            <div class="step" id="indicator-2">
                <div class="step-icon">2</div>
                <span>Curriculum</span>
            </div>
            <div class="step" id="indicator-3">
                <div class="step-icon">3</div>
                <span>Pricing</span>
            </div>
            <div class="step" id="indicator-4">
                <div class="step-icon">4</div>
                <span>Publish</span>
            </div>
        </div>

        <form id="courseForm">
            <!-- Step 1: Basic Info -->
            <div class="step-content active" id="step-1">
                <h5 class="text-white mb-4">Basic Information</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Course Title</label>
                        <input type="text" class="form-control" placeholder="e.g. Advanced Laravel Mastery">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course Slug</label>
                        <input type="text" class="form-control" placeholder="advanced-laravel-mastery" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Web Development</option>
                            <option>Design</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Level</label>
                        <select class="form-select">
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Language</label>
                        <select class="form-select">
                            <option>English</option>
                            <option>Spanish</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Short Description</label>
                        <textarea class="form-control" rows="2" placeholder="Brief summary of the course..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Full Description</label>
                        <textarea class="form-control" rows="5" placeholder="Detailed description..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course Thumbnail</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Preview Video URL</label>
                        <input type="url" class="form-control" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>

            <!-- Step 2: Curriculum -->
            <div class="step-content d-none" id="step-2">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white m-0">Curriculum Setup</h5>
                    <button type="button" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-plus me-2"></i>Add Section</button>
                </div>
                
                <div class="section-box">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-white m-0"><i class="fa-solid fa-grip-vertical drag-handle me-2"></i> Section 1: Introduction</h6>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-light"><i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    
                    <div class="lesson-box">
                        <i class="fa-solid fa-grip-vertical drag-handle"></i>
                        <span class="badge bg-primary">Video</span>
                        <div class="flex-grow-1 text-white">1. Welcome to the course</div>
                        <div class="text-muted small">02:30</div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label text-muted small">Preview</label>
                        </div>
                        <button type="button" class="btn btn-sm text-muted"><i class="fa-solid fa-pen"></i></button>
                    </div>

                    <div class="lesson-box">
                        <i class="fa-solid fa-grip-vertical drag-handle"></i>
                        <span class="badge bg-info">Text</span>
                        <div class="flex-grow-1 text-white">2. Prerequisites & Setup</div>
                        <div class="text-muted small">5 min read</div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label text-muted small">Preview</label>
                        </div>
                        <button type="button" class="btn btn-sm text-muted"><i class="fa-solid fa-pen"></i></button>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-outline-light mt-3"><i class="fa-solid fa-plus me-2"></i>Add Lesson</button>
                </div>
            </div>

            <!-- Step 3: Pricing -->
            <div class="step-content d-none" id="step-3">
                <h5 class="text-white mb-4">Pricing Strategy</h5>
                <div class="row g-4">
                    <div class="col-12 mb-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="freeCourse">
                            <label class="form-check-label text-white" for="freeCourse">This is a free course</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Regular Price ($)</label>
                        <input type="number" class="form-control" placeholder="99.99">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Discount Price ($)</label>
                        <input type="number" class="form-control" placeholder="49.99">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Coupon Code (Optional)</label>
                        <input type="text" class="form-control" placeholder="LAUNCH50">
                    </div>
                </div>
            </div>

            <!-- Step 4: Publish -->
            <div class="step-content d-none" id="step-4">
                <h5 class="text-white mb-4">Review & Publish</h5>
                <div class="alert alert-info bg-info bg-opacity-10 border-info text-info rounded-3 p-4 mb-4">
                    <h6 class="alert-heading"><i class="fa-solid fa-circle-info me-2"></i>Almost there!</h6>
                    <p class="mb-0">Please review your course details. Once submitted, our team will review the course within 24-48 hours before it goes live.</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-check bg-dark p-3 rounded border border-secondary" style="border-color: rgba(255,255,255,0.1)!important;">
                            <input class="form-check-input ms-1 mt-2" type="radio" name="publishStatus" id="saveDraft" checked>
                            <label class="form-check-label ms-3" for="saveDraft">
                                <strong class="text-white d-block">Save as Draft</strong>
                                <span class="text-muted small">Keep it hidden while you continue working on it.</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check bg-dark p-3 rounded border border-secondary" style="border-color: rgba(255,255,255,0.1)!important;">
                            <input class="form-check-input ms-1 mt-2" type="radio" name="publishStatus" id="submitReview">
                            <label class="form-check-label ms-3" for="submitReview">
                                <strong class="text-white d-block">Submit for Review</strong>
                                <span class="text-muted small">Send to admins for approval to publish.</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-5 pt-3 border-top" style="border-color: rgba(255,255,255,0.1)!important;">
                <button type="button" class="btn btn-outline-light px-4" id="prevBtn" style="display:none;">Previous</button>
                <div class="ms-auto">
                    <button type="button" class="btn btn-gradient px-4" id="nextBtn">Next Step</button>
                    <button type="button" class="btn btn-success px-4" id="submitBtn" style="display:none;"><i class="fa-solid fa-check me-2"></i>Finish</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStep = 1;
        const totalSteps = 4;
        
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        function updateUI() {
            // Update steps visibility
            for(let i=1; i<=totalSteps; i++) {
                document.getElementById('step-'+i).classList.add('d-none');
                
                const indicator = document.getElementById('indicator-'+i);
                indicator.classList.remove('active', 'completed');
                if(i < currentStep) indicator.classList.add('completed');
                if(i === currentStep) indicator.classList.add('active');
            }
            document.getElementById('step-'+currentStep).classList.remove('d-none');
            
            // Update buttons
            prevBtn.style.display = currentStep > 1 ? 'inline-block' : 'none';
            if(currentStep === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }
        }
        
        nextBtn.addEventListener('click', () => { if(currentStep < totalSteps) { currentStep++; updateUI(); } });
        prevBtn.addEventListener('click', () => { if(currentStep > 1) { currentStep--; updateUI(); } });
    });
</script>
@endsection
"""

files["courses/edit.blade.php"] = """@extends('layouts.dashboard')
@section('title', 'Edit Course')
@section('content')
<!-- Reusing the form from create, plus danger zone -->
<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Edit Course: Advanced Laravel Mastery</h2>
    
    <div class="alert alert-warning bg-warning bg-opacity-10 border-warning text-warning rounded-3 p-3 mb-4 d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation fs-4 me-3"></i>
        <div>
            <strong>Status: Published</strong> - Any changes made to curriculum will be immediately visible to enrolled students.
        </div>
    </div>
    
    <!-- (Form omitted for brevity in script, it would be identical to create.blade.php with prefilled values) -->
    <div class="card bg-dark text-white border-secondary mb-4" style="border-color: rgba(255,255,255,0.1)!important;">
        <div class="card-body text-center py-5">
            <h4 class="text-muted">[Form from Create View Pre-filled]</h4>
            <a href="{{ route('instructor.courses.index') ?? '#' }}" class="btn btn-outline-light mt-3">Back to Courses</a>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="card mt-5" style="background: rgba(255, 101, 132, 0.05); border: 1px solid rgba(255, 101, 132, 0.3); border-radius: 16px;">
        <div class="card-body p-4">
            <h5 class="text-danger mb-3"><i class="fa-solid fa-triangle-exclamation me-2"></i>Danger Zone</h5>
            <p class="text-muted mb-4">Deleting this course will permanently remove all associated data, including curriculum, resources, and student progress. This action cannot be undone.</p>
            <button class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Delete Course</button>
        </div>
    </div>
</div>
@endsection
"""

files["students.blade.php"] = """@extends('layouts.dashboard')
@section('title', 'My Students')
@section('content')
@php
    $stats = [
        ['title' => 'Total Students', 'value' => '1,247', 'color' => '#6C63FF'],
        ['title' => 'Active This Month', 'value' => '856', 'color' => '#00C9A7'],
        ['title' => 'Completion Rate', 'value' => '42%', 'color' => '#FFB347'],
        ['title' => 'Average Progress', 'value' => '68%', 'color' => '#FF6584'],
    ];
    
    $students = [];
    $names = ['Alice Johnson', 'Bob Smith', 'Charlie Brown', 'Diana Prince', 'Evan Wright', 'Fiona Gallagher', 'George Lucas', 'Hannah Abbott', 'Ian Malcolm', 'Julia Roberts', 'Kevin Hart', 'Luna Lovegood', 'Michael Scott', 'Nina Simone', 'Oscar Isaac'];
    foreach($names as $index => $name) {
        $students[] = [
            'name' => $name,
            'avatar' => 'https://ui-avatars.com/api/?name='.urlencode($name).'&background=random',
            'email' => strtolower(explode(' ', $name)[0]) . '@example.com',
            'courses' => rand(1, 4),
            'progress' => rand(10, 100),
            'joined' => '2023-0'.rand(1,9).'-'.rand(10,28),
            'last_active' => rand(1, 30) . ' days ago'
        ];
    }
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 20px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .progress { height: 8px; background-color: rgba(255,255,255,0.1); border-radius: 4px; }
    .progress-bar { background: linear-gradient(90deg, #6C63FF, #FF6584); }
    .search-input { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 20px; padding: 10px 20px; }
    .search-input:focus { background: #16213e; border-color: #6C63FF; color: #fff; box-shadow: none; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">My Students</h2>

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card text-center py-4">
                <h3 class="fw-bold mb-1" style="color: {{ $stat['color'] }}">{{ $stat['value'] }}</h3>
                <div class="text-muted small text-uppercase letter-spacing-1">{{ $stat['title'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="dashboard-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-white m-0">Student List</h5>
            <div class="d-flex gap-2">
                <input type="text" class="form-control search-input" placeholder="Search students...">
                <button class="btn btn-outline-light rounded-pill px-3"><i class="fa-solid fa-filter"></i></button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Enrolled Courses</th>
                        <th>Avg. Progress</th>
                        <th>Joined Date</th>
                        <th>Last Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student['avatar'] }}" class="rounded-circle me-3" width="40" height="40" alt="Avatar">
                                <div>
                                    <div class="text-white fw-medium">{{ $student['name'] }}</div>
                                    <div class="text-muted small">{{ $student['email'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary rounded-pill px-3">{{ $student['courses'] }}</span></td>
                        <td style="width: 200px;">
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" style="width: {{ $student['progress'] }}%"></div>
                                </div>
                                <span class="text-muted small">{{ $student['progress'] }}%</span>
                            </div>
                        </td>
                        <td>{{ $student['joined'] }}</td>
                        <td class="text-muted">{{ $student['last_active'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Message</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
"""

files["revenue.blade.php"] = """@extends('layouts.dashboard')
@section('title', 'Revenue & Payouts')
@section('content')
@php
    $transactions = [];
    $courses = ['Advanced Laravel Mastery', 'Vue.js for Beginners', 'Full-Stack Web Dev'];
    for($i=1; $i<=20; $i++) {
        $amount = rand(39, 99) . '.00';
        $transactions[] = [
            'date' => '2023-10-'.str_pad(rand(1,28), 2, '0', STR_PAD_LEFT),
            'desc' => 'Course Enrollment',
            'course' => $courses[array_rand($courses)],
            'amount' => '$'.$amount,
            'status' => 'Completed',
            'type' => 'Sale'
        ];
    }
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 24px; }
    .amount-large { font-size: 2.5rem; font-weight: 700; color: #fff; line-height: 1; margin-bottom: 5px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; padding-top: 15px; padding-bottom: 15px; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; padding-top: 15px; padding-bottom: 15px; }
    .chart-container { height: 300px; width: 100%; position: relative; }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white m-0">Revenue & Payouts</h2>
        <a href="{{ route('instructor.withdraw') ?? '#' }}" class="btn" style="background: linear-gradient(135deg, #00C9A7, #009980); color: white; border: none; border-radius: 8px; padding: 10px 20px;"><i class="fa-solid fa-money-bill-transfer me-2"></i>Withdraw Funds</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="dashboard-card h-100" style="background: linear-gradient(135deg, rgba(108, 99, 255, 0.2), rgba(15, 52, 96, 1)); border-color: rgba(108, 99, 255, 0.3);">
                <div class="text-muted text-uppercase small fw-bold mb-3">Total Earnings</div>
                <div class="amount-large">$12,450.00</div>
                <div class="text-success small"><i class="fa-solid fa-arrow-trend-up me-1"></i> Lifetime</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">This Month</div>
                <div class="amount-large">$2,850.50</div>
                <div class="text-success small"><i class="fa-solid fa-arrow-trend-up me-1"></i> +12.5% from last month</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">Pending Clearance</div>
                <div class="amount-large text-warning">$450.00</div>
                <div class="text-muted small">Clears in 14 days</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">Available for Withdrawal</div>
                <div class="amount-large text-success">$1,200.00</div>
                <div class="text-muted small">Minimum $50</div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Revenue Over Time</h5>
                <div class="chart-container">
                    <canvas id="revLineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Earnings by Course</h5>
                <div class="chart-container">
                    <canvas id="revBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <h5 class="text-white mb-4">Transaction History</h5>
        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Course</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $tx)
                    <tr>
                        <td class="text-muted">{{ $tx['date'] }}</td>
                        <td class="text-white">{{ $tx['desc'] }}</td>
                        <td><span class="text-truncate d-inline-block" style="max-width: 200px; color: #aaa;">{{ $tx['course'] }}</span></td>
                        <td><span class="badge bg-secondary">{{ $tx['type'] }}</span></td>
                        <td class="text-success fw-bold">{{ $tx['amount'] }}</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">{{ $tx['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Line Chart
        new Chart(document.getElementById('revLineChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Revenue',
                    data: [500, 800, 600, 950],
                    borderColor: '#00C9A7',
                    backgroundColor: 'rgba(0, 201, 167, 0.1)',
                    borderWidth: 2, tension: 0.4, fill: true
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#aaa' } },
                    x: { grid: { display: false }, ticks: { color: '#aaa' } }
                }
            }
        });

        // Bar Chart
        new Chart(document.getElementById('revBarChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Laravel', 'Vue.js', 'Full-Stack'],
                datasets: [{
                    data: [6500, 3200, 2750],
                    backgroundColor: ['#6C63FF', '#00C9A7', '#FF6584'],
                    borderRadius: 4
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#aaa' } },
                    y: { grid: { display: false }, ticks: { color: '#aaa' } }
                }
            }
        });
    });
</script>
@endsection
"""

for name, content in files.items():
    filepath = os.path.join(base_dir, name)
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
print("Files generated successfully.")
