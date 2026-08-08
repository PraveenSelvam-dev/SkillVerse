@extends('layouts.app')
@section('title', 'Jobs | SkillVerse')

@section('content')
@php
    $jobs = [
        ['title' => 'Senior Frontend Developer', 'company' => 'TechCorp Inc.', 'type' => 'Full-time', 'location' => 'Remote (US)', 'salary' => '$120k - $150k', 'posted' => '2 days ago'],
        ['title' => 'Laravel Backend Engineer', 'company' => 'Startup SaaS', 'type' => 'Contract', 'location' => 'Remote (Global)', 'salary' => '$60/hr', 'posted' => '5 hours ago'],
        ['title' => 'UI/UX Product Designer', 'company' => 'Design Studio', 'type' => 'Full-time', 'location' => 'New York, NY', 'salary' => '$90k - $120k', 'posted' => '1 day ago'],
        ['title' => 'DevOps Engineer', 'company' => 'CloudScale', 'type' => 'Full-time', 'location' => 'Remote (EU)', 'salary' => '€70k - €90k', 'posted' => '3 days ago'],
        ['title' => 'Data Scientist', 'company' => 'AI Solutions', 'type' => 'Full-time', 'location' => 'San Francisco, CA', 'salary' => '$140k - $180k', 'posted' => '1 week ago'],
        ['title' => 'Technical Writer', 'company' => 'OpenSource Co', 'type' => 'Part-time', 'location' => 'Remote', 'salary' => '$40/hr', 'posted' => '2 weeks ago'],
    ];
@endphp

<div class="bg-dark py-5 border-bottom border-secondary border-opacity-25">
    <div class="container text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Job Board</h1>
        <p class="text-muted lead mx-auto mb-5" style="max-width: 600px;">Find your next career opportunity at top companies hiring directly from the SkillVerse community.</p>
        
        <div class="card bg-secondary bg-opacity-25 border-secondary border-opacity-25 mx-auto" style="max-width: 800px; border-radius: 50px;">
            <div class="card-body p-2 d-flex flex-wrap gap-2">
                <input type="text" class="form-control bg-transparent border-0 text-white shadow-none flex-grow-1 px-3" placeholder="Job title, keywords, or company...">
                <select class="form-select bg-dark text-white border-0 shadow-none w-auto rounded-pill px-3">
                    <option>Any Location</option>
                    <option>Remote Only</option>
                </select>
                <button class="btn btn-primary rounded-pill px-4 fw-bold" style="background: #6C63FF; border: none;">Search</button>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card bg-dark border-secondary border-opacity-25 text-white rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Filters</h5>
                    
                    <h6 class="text-muted small fw-bold text-uppercase mb-3">Job Type</h6>
                    @foreach(['Full-time', 'Part-time', 'Contract', 'Freelance', 'Internship'] as $type)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label small text-light">{{ $type }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center text-white mb-4">
                <h5 class="mb-0">{{ count($jobs) }} Jobs Found</h5>
            </div>
            
            <div class="d-flex flex-column gap-3">
                @foreach($jobs as $job)
                <div class="card bg-dark border-secondary border-opacity-25 text-white sv-card rounded-4 p-4" style="transition: transform 0.2s; cursor: pointer;" onclick="window.location.href='/jobs/show'">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="rounded bg-white d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-building fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1"><a href="/jobs/show" class="text-white text-decoration-none">{{ $job['title'] }}</a></h5>
                                <div class="text-muted small d-flex flex-wrap gap-3 mt-2">
                                    <span><i class="fa-solid fa-building me-1"></i> {{ $job['company'] }}</span>
                                    <span><i class="fa-solid fa-location-dot me-1"></i> {{ $job['location'] }}</span>
                                    <span><i class="fa-solid fa-briefcase me-1"></i> {{ $job['type'] }}</span>
                                    <span class="text-success fw-bold"><i class="fa-solid fa-money-bill me-1"></i> {{ $job['salary'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-end gap-2">
                            <button class="btn btn-outline-light rounded-pill px-4">Apply</button>
                            <span class="text-muted small">{{ $job['posted'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
