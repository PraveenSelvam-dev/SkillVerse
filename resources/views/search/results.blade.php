@extends('layouts.app')
@section('title', 'Search Results | SkillVerse')

@section('content')
<div class="bg-dark py-4 border-bottom border-secondary border-opacity-25">
    <div class="container">
        <form action="/search" class="d-flex mb-3">
            <div class="input-group input-group-lg w-100 shadow" style="border-radius: 50px; overflow: hidden;">
                <input type="text" class="form-control border-0 text-dark" value="Laravel" placeholder="Search..." style="background: #fff; padding-left: 25px;">
                <button class="btn btn-primary px-4 fw-bold" style="background: #6C63FF; border: none;"><i class="fa-solid fa-search"></i> Search</button>
            </div>
        </form>
        <p class="text-white mb-0">Found <strong class="text-primary">24</strong> results for "Laravel"</p>
    </div>
</div>

<div class="container py-4 text-white">
    <!-- Tabs -->
    <ul class="nav nav-pills nav-justified mb-5 bg-dark border border-secondary border-opacity-25 rounded-pill p-1" id="searchTabs" role="tablist">
        <li class="nav-item"><button class="nav-link active rounded-pill text-white fw-bold" data-bs-toggle="tab" data-bs-target="#all">All Results (24)</button></li>
        <li class="nav-item"><button class="nav-link text-muted rounded-pill fw-bold hover-white" data-bs-toggle="tab" data-bs-target="#courses">Courses (12)</button></li>
        <li class="nav-item"><button class="nav-link text-muted rounded-pill fw-bold hover-white" data-bs-toggle="tab" data-bs-target="#mentors">Mentors (5)</button></li>
        <li class="nav-item"><button class="nav-link text-muted rounded-pill fw-bold hover-white" data-bs-toggle="tab" data-bs-target="#services">Services (7)</button></li>
    </ul>

    <div class="tab-content" id="searchTabsContent">
        <!-- All Tab (showing mixed results) -->
        <div class="tab-pane fade show active" id="all">
            <h4 class="fw-bold mb-4 border-bottom border-secondary border-opacity-25 pb-2">Courses</h4>
            <div class="row g-4 mb-5">
                <!-- Course Cards (dummy x3) -->
                @for($i=0; $i<3; $i++)
                <div class="col-md-4">
                    <div class="card h-100 bg-dark border-secondary border-opacity-25 text-white rounded-4 p-3 sv-card">
                        <div class="d-flex gap-3 align-items-center mb-3">
                            <div class="bg-danger rounded p-2 text-white"><i class="fa-brands fa-laravel fa-2x"></i></div>
                            <h6 class="fw-bold mb-0">Laravel Masterclass {{$i+1}}</h6>
                        </div>
                        <p class="small text-muted mb-auto">By Taylor Otwell &bull; 4.9 <i class="fa-solid fa-star text-warning"></i></p>
                    </div>
                </div>
                @endfor
            </div>

            <h4 class="fw-bold mb-4 border-bottom border-secondary border-opacity-25 pb-2">Mentors</h4>
            <div class="row g-4 mb-5">
                <!-- Mentor Cards -->
                @for($i=0; $i<2; $i++)
                <div class="col-md-6">
                    <div class="card bg-dark border-secondary border-opacity-25 text-white rounded-4 p-3 sv-card">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center text-white fw-bold fs-4" style="width: 50px; height: 50px;">L</div>
                            <div>
                                <h6 class="fw-bold mb-0">Laravel Expert {{$i+1}}</h6>
                                <p class="small text-muted mb-0">Backend Dev &bull; $50/hr</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        
        <!-- Other tabs just contain empty state placeholders for this demo -->
        <div class="tab-pane fade" id="courses"><p class="text-center text-muted">Courses tab content...</p></div>
        <div class="tab-pane fade" id="mentors"><p class="text-center text-muted">Mentors tab content...</p></div>
        <div class="tab-pane fade" id="services"><p class="text-center text-muted">Services tab content...</p></div>
    </div>
</div>
@endsection
