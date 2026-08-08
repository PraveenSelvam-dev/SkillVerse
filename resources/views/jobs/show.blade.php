@extends('layouts.app')
@section('title', 'Job Details | SkillVerse')

@section('content')
<div class="bg-dark border-bottom border-secondary border-opacity-25 py-5 text-white">
    <div class="container">
        <a href="/jobs" class="text-muted text-decoration-none small mb-4 d-inline-block"><i class="fa-solid fa-arrow-left me-2"></i>Back to Jobs</a>
        
        <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex gap-4">
                <div class="rounded bg-white d-flex justify-content-center align-items-center shadow" style="width: 80px; height: 80px;">
                    <i class="fa-brands fa-laravel fa-3x text-danger"></i>
                </div>
                <div>
                    <h1 class="fw-bold mb-2">Senior Laravel Backend Engineer</h1>
                    <h5 class="text-light opacity-75 mb-3">TechCorp Inc.</h5>
                    <div class="d-flex flex-wrap gap-3 small text-muted">
                        <span class="badge bg-secondary bg-opacity-25 border border-secondary border-opacity-25 px-3 py-2 rounded-pill"><i class="fa-solid fa-briefcase me-1"></i> Full-time</span>
                        <span class="badge bg-secondary bg-opacity-25 border border-secondary border-opacity-25 px-3 py-2 rounded-pill"><i class="fa-solid fa-location-dot me-1"></i> Remote (Global)</span>
                        <span class="badge bg-secondary bg-opacity-25 border border-secondary border-opacity-25 px-3 py-2 rounded-pill text-success"><i class="fa-solid fa-money-bill me-1"></i> $120k - $150k</span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" style="background: #6C63FF; border: none;">Apply Now</button>
        </div>
    </div>
</div>

<div class="container py-5 text-white">
    <div class="row g-5">
        <div class="col-lg-8 text-light opacity-75" style="line-height: 1.8;">
            <h4 class="text-white fw-bold mb-3">About the Role</h4>
            <p>We are looking for an experienced Senior Backend Engineer specializing in Laravel to join our core product team. You will be responsible for designing, building, and maintaining robust APIs that power our global SaaS platform.</p>
            
            <h4 class="text-white fw-bold mt-5 mb-3">What You'll Do</h4>
            <ul>
                <li>Architect and develop high-performance RESTful and GraphQL APIs using Laravel 11.</li>
                <li>Optimize database queries (MySQL/PostgreSQL) for large-scale data sets.</li>
                <li>Implement complex business logic and background processing via Laravel Queues.</li>
                <li>Mentor junior developers and participate in code reviews.</li>
            </ul>
            
            <h4 class="text-white fw-bold mt-5 mb-3">Requirements</h4>
            <ul>
                <li>5+ years of experience in PHP development.</li>
                <li>3+ years of deep expertise with the Laravel framework.</li>
                <li>Strong understanding of software architecture patterns (SOLID, DDD).</li>
                <li>Experience with Redis, Docker, and AWS services.</li>
                <li>Excellent communication skills and ability to work in a remote-first team.</li>
            </ul>
        </div>
        
        <div class="col-lg-4">
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4 sticky-top" style="top: 20px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">About the Company</h5>
                    <p class="small text-light opacity-75 mb-4">TechCorp Inc. is a leading SaaS provider helping businesses automate their workflows. We are a remote-first company with over 200 employees across 15 countries.</p>
                    
                    <ul class="list-unstyled small text-light opacity-75 mb-0">
                        <li class="mb-3"><i class="fa-solid fa-globe text-muted w-20px"></i> techcorp.com</li>
                        <li class="mb-3"><i class="fa-solid fa-users text-muted w-20px"></i> 201-500 employees</li>
                        <li><i class="fa-solid fa-industry text-muted w-20px"></i> Software Development</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
