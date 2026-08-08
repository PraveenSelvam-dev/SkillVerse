@extends('layouts.dashboard')

@section('title', 'Downloads')

@section('content')
@php
    $downloads = [
        ['name' => 'Laravel MVC Cheat Sheet', 'type' => 'pdf', 'icon' => 'fa-file-pdf', 'color' => '#e25555', 'course' => 'Advanced Laravel Mastery', 'size' => '2.4 MB', 'date' => 'Today'],
        ['name' => 'Project Starter Files', 'type' => 'zip', 'icon' => 'fa-file-zipper', 'color' => '#FFB347', 'course' => 'Vue 3 Composition API', 'size' => '15.8 MB', 'date' => 'Yesterday'],
        ['name' => 'Database Schema Design', 'type' => 'pdf', 'icon' => 'fa-file-pdf', 'color' => '#e25555', 'course' => 'MySQL Performance Tuning', 'size' => '1.1 MB', 'date' => 'Oct 20, 2023'],
        ['name' => 'Docker Compose Template', 'type' => 'code', 'icon' => 'fa-file-code', 'color' => '#6C63FF', 'course' => 'Docker for Web Developers', 'size' => '4 KB', 'date' => 'Oct 15, 2023'],
        ['name' => 'Tailwind Config File', 'type' => 'code', 'icon' => 'fa-file-code', 'color' => '#6C63FF', 'course' => 'Tailwind CSS in Depth', 'size' => '2 KB', 'date' => 'Sep 02, 2023'],
        ['name' => 'Course Slides - Module 1', 'type' => 'pdf', 'icon' => 'fa-file-pdf', 'color' => '#e25555', 'course' => 'PHP 8 New Features', 'size' => '4.5 MB', 'date' => 'Aug 10, 2023'],
        ['name' => 'Exercise Solutions', 'type' => 'zip', 'icon' => 'fa-file-zipper', 'color' => '#FFB347', 'course' => 'Advanced Laravel Mastery', 'size' => '8.2 MB', 'date' => 'Aug 05, 2023'],
        ['name' => 'Interview Questions Guide', 'type' => 'doc', 'icon' => 'fa-file-word', 'color' => '#4479a1', 'course' => 'System Design Interview', 'size' => '1.8 MB', 'date' => 'Jul 12, 2023']
    ];
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .table-dark {
        background-color: transparent;
    }
    .table-dark th {
        border-bottom-color: rgba(255,255,255,0.1);
        color: #a0a0a0;
        font-weight: 500;
    }
    .table-dark td {
        border-bottom-color: rgba(255,255,255,0.05);
        vertical-align: middle;
        color: #e0e0e0;
    }
    .file-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: rgba(255,255,255,0.1);
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">Resource Downloads</h2>
        <div class="input-group" style="width: 250px;">
            <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search files...">
            <button class="btn btn-outline-secondary"><i class="fa-solid fa-search"></i></button>
        </div>
    </div>

    <div class="glass-card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">File Name</th>
                        <th class="py-3">Course</th>
                        <th class="py-3">Size</th>
                        <th class="py-3">Date</th>
                        <th class="text-end pe-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($downloads as $file)
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="file-icon me-3" style="color: {{ $file['color'] }};">
                                    <i class="fa-solid {{ $file['icon'] }}"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-white">{{ $file['name'] }}</h6>
                                    <span class="badge bg-secondary text-uppercase" style="font-size: 0.65rem;">{{ $file['type'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-muted">{{ $file['course'] }}</td>
                        <td class="py-3 text-muted">{{ $file['size'] }}</td>
                        <td class="py-3 text-muted">{{ $file['date'] }}</td>
                        <td class="text-end pe-4 py-3">
                            <button class="btn btn-outline-light btn-sm rounded-circle" style="width: 32px; height: 32px;" title="Download">
                                <i class="fa-solid fa-download"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
