@extends('layouts.dashboard')
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
