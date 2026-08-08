@extends('layouts.app')
@section('title', 'Learning: Laravel 12 Masterclass | SkillVerse')

@section('content')
<!-- Top Navbar specifically for Learning mode (hides main nav via CSS later, or just overlay) -->
<div class="bg-dark text-white border-bottom border-secondary border-opacity-25 py-2 px-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <a href="/courses/show" class="text-white me-3"><i class="fa-solid fa-arrow-left"></i></a>
        <h6 class="mb-0 fw-bold">Laravel 12 Masterclass: From Beginner to Pro</h6>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="progress" style="width: 150px; height: 8px;" data-bs-theme="dark">
            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span class="small text-muted">25% Complete</span>
        <button class="btn btn-sm btn-outline-light rounded-circle" style="width: 32px; height: 32px; padding: 0;"><i class="fa-solid fa-trophy text-warning"></i></button>
    </div>
</div>

<div class="container-fluid p-0 bg-black">
    <div class="row g-0">
        <!-- Left: Video Player -->
        <div class="col-lg-9 d-flex flex-column" style="min-height: calc(100vh - 120px);">
            <!-- Video Area -->
            <div class="bg-black w-100 position-relative d-flex align-items-center justify-content-center" style="height: 60vh;">
                <!-- Dummy Video Player overlay -->
                <i class="fa-solid fa-circle-play fa-5x text-white opacity-75"></i>
                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-3 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-play text-white ms-2"></i>
                    <i class="fa-solid fa-volume-high text-white"></i>
                    <div class="progress flex-grow-1" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 45%"></div>
                    </div>
                    <span class="text-white small">04:12 / 12:45</span>
                    <i class="fa-solid fa-gear text-white ms-2"></i>
                    <i class="fa-solid fa-expand text-white ms-2"></i>
                </div>
            </div>

            <!-- Content Area below video -->
            <div class="bg-dark text-white p-4 flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0">3. Setting up the Development Environment</h3>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary text-white"><i class="fa-solid fa-chevron-left me-2"></i>Prev</button>
                        <button class="btn btn-outline-secondary text-white">Next<i class="fa-solid fa-chevron-right ms-2"></i></button>
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs border-secondary mb-4" id="learnTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active bg-transparent text-white border-0 border-bottom border-primary border-3 fw-bold" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-transparent text-muted border-0 fw-bold" data-bs-toggle="tab" data-bs-target="#qa">Q&A</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-transparent text-muted border-0 fw-bold" data-bs-toggle="tab" data-bs-target="#notes">Notes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-transparent text-muted border-0 fw-bold" data-bs-toggle="tab" data-bs-target="#resources">Resources</button>
                    </li>
                </ul>

                <div class="tab-content" id="learnTabsContent">
                    <div class="tab-pane fade show active text-light" id="overview">
                        <p>In this lesson, we will set up our local development environment. We will cover the installation of PHP, Composer, Node.js, and a local database server like MySQL or PostgreSQL.</p>
                        <p>You can use Laravel Herd, Laravel Sail (Docker), or XAMPP/Valet based on your OS preference.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Curriculum Sidebar -->
        <div class="col-lg-3 bg-dark border-start border-secondary border-opacity-25" style="height: calc(100vh - 56px); overflow-y: auto;">
            <div class="p-3 border-bottom border-secondary border-opacity-25 sticky-top bg-dark">
                <h6 class="text-white fw-bold mb-0">Course Content</h6>
            </div>
            
            <div class="accordion accordion-flush" id="sidebarAccordion" data-bs-theme="dark">
                @for ($i = 1; $i <= 5; $i++)
                <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-10">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $i > 1 ? 'collapsed' : '' }} bg-transparent text-white fw-medium shadow-none py-3" type="button" data-bs-toggle="collapse" data-bs-target="#sideCollapse{{ $i }}">
                            <div class="d-flex flex-column w-100 me-2">
                                <span class="small fw-bold">Section {{ $i }}: {{ ['Introduction', 'Routing', 'Views', 'Database', 'Auth'][ $i-1 ] }}</span>
                                <span class="text-muted" style="font-size: 0.75rem;">0/4 | 45min</span>
                            </div>
                        </button>
                    </h2>
                    <div id="sideCollapse{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}">
                        <div class="accordion-body p-0">
                            <ul class="list-group list-group-flush bg-transparent">
                                @for ($j = 1; $j <= 4; $j++)
                                @php $isActive = ($i == 1 && $j == 3); @endphp
                                <li class="list-group-item bg-transparent text-light border-0 py-2 ps-4 pe-2 {{ $isActive ? 'bg-secondary bg-opacity-25' : 'hover-primary' }}" style="cursor: pointer;">
                                    <div class="d-flex align-items-start gap-2">
                                        <div class="mt-1">
                                            @if($i == 1 && $j < 3)
                                                <i class="fa-solid fa-circle-check text-success"></i>
                                            @else
                                                <input type="checkbox" class="form-check-input mt-0 bg-transparent border-secondary" {{ $isActive ? 'checked' : '' }}>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="mb-0 small {{ $isActive ? 'fw-bold' : '' }}">{{ $j }}. Sample Lecture Title</p>
                                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-video"></i> 12:45
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
