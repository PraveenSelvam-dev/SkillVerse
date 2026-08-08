@extends('layouts.app')
@section('title', ($course->title ?? 'Course Details') . ' | SkillVerse')

@section('content')
<div class="bg-dark border-bottom border-secondary border-opacity-25 text-white pb-5 pt-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/courses') }}" class="text-muted text-decoration-none">Courses</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">{{ $course->title ?? 'Course Details' }}</li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <div class="col-lg-8 pe-lg-5">
                <h1 class="fw-bold display-5 mb-3">{{ $course->title ?? 'Full Stack Masterclass' }}</h1>
                <p class="lead text-muted mb-4">{{ $course->description ?? 'Master essential skills with real-world projects and expert mentorship.' }}</p>
                
                <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
                    <span class="badge bg-warning text-dark"><i class="fa-solid fa-star"></i> Featured</span>
                    <span class="text-warning fw-bold">{{ number_format($course->average_rating ?? 4.9, 1) }} <i class="fa-solid fa-star"></i></span>
                    <span class="text-light">{{ number_format($course->total_students ?? 1250) }} students enrolled</span>
                    <span class="badge bg-primary text-white">{{ ucfirst($course->level ?? 'All Levels') }}</span>
                </div>
                
                <div class="d-flex align-items-center gap-4 text-muted small">
                    <span><i class="fa-solid fa-user me-2"></i>Created by <strong class="text-white">{{ $course->instructor->name ?? 'SkillVerse Instructor' }}</strong></span>
                    <span><i class="fa-solid fa-globe me-2"></i>English</span>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card bg-dark border-secondary border-opacity-50 text-white shadow-lg" style="border-radius: 16px; overflow: hidden; background: #0f3460 !important;">
                    <div class="d-flex justify-content-center align-items-center bg-primary" style="height: 180px; background: linear-gradient(135deg, #2563eb, #7c3aed) !important;">
                        <i class="fa-solid fa-graduation-cap fa-5x text-white opacity-75"></i>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fs-2 fw-bold text-success">${{ number_format($course->price ?? 49.99, 2) }}</span>
                            <span class="badge bg-success">Full Access</span>
                        </div>
                        <a href="{{ url('courses/' . ($course->slug ?? 'course-1') . '/learn') }}" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold mb-3 shadow">
                            <i class="fa-solid fa-play me-2"></i> Start Learning Now
                        </a>
                        <ul class="list-unstyled text-muted small mb-0">
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Full lifetime video & note access</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Interactive quizzes & completion certificate</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> Access on mobile, tablet, and desktop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 pe-lg-5 text-white">
            <h4 class="fw-bold mb-4">Course Curriculum & Lessons</h4>
            
            <div class="accordion accordion-flush mb-5" id="curriculumAccordion" data-bs-theme="dark">
                @forelse ($sections as $section)
                <div class="accordion-item bg-dark border-secondary border-opacity-25 mb-2 rounded-3 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }} bg-transparent text-white fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $section->id }}">
                            {{ $section->title }}
                        </button>
                    </h2>
                    <div id="collapse{{ $section->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}">
                        <div class="accordion-body px-0 py-2">
                            <ul class="list-group list-group-flush bg-transparent">
                                @forelse ($section->lessons as $lesson)
                                <li class="list-group-item bg-transparent text-light border-secondary border-opacity-10 d-flex justify-content-between align-items-center py-3 px-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-circle-play text-primary me-3 fs-5"></i>
                                        <a href="{{ url('courses/' . ($course->slug ?? 'course-1') . '/learn') }}" class="text-decoration-none text-white hover-primary fw-medium">
                                            {{ $lesson->title }}
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="badge bg-success rounded-pill">Open</span>
                                        <span class="text-muted small"><i class="fa-regular fa-clock me-1"></i>{{ $lesson->duration_minutes ?? 10 }}m</span>
                                    </div>
                                </li>
                                @empty
                                <li class="list-group-item bg-transparent text-muted small py-2 px-3">No lessons added to this section yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-muted text-center py-4">No curriculum sections listed yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
