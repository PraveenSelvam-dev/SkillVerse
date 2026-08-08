@extends('layouts.app')
@section('title', 'Laravel Developers Community | SkillVerse')

@section('content')
<!-- Community Cover -->
<div class="w-100" style="height: 250px; background: linear-gradient(135deg, #FF2D20, #1a1a2e);"></div>

<div class="container position-relative text-white" style="margin-top: -80px;">
    <div class="card bg-dark border-secondary border-opacity-50 shadow-lg mb-4" style="border-radius: 16px;">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-end gap-3">
                <div class="d-flex gap-4 align-items-end">
                    <div class="rounded bg-white p-3 shadow" style="width: 100px; height: 100px;">
                        <i class="fa-brands fa-laravel fa-4x text-danger"></i>
                    </div>
                    <div class="pb-2">
                        <h2 class="fw-bold mb-1">Laravel Developers</h2>
                        <div class="text-muted small">
                            <span><i class="fa-solid fa-globe me-1"></i> Public Community</span>
                            <span class="mx-2">&bull;</span>
                            <span><i class="fa-solid fa-users me-1"></i> 12,500 Members</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary rounded-pill px-4" style="background: #6C63FF; border: none;">Joined <i class="fa-solid fa-check ms-1"></i></button>
                    <button class="btn btn-outline-light rounded-circle" style="width: 40px; height: 40px;"><i class="fa-solid fa-ellipsis"></i></button>
                </div>
            </div>
        </div>
        <!-- Tabs -->
        <div class="border-top border-secondary border-opacity-25 px-4 pt-3">
            <ul class="nav nav-underline gap-4 border-0" id="communityTabs">
                <li class="nav-item"><a class="nav-link active text-white fw-bold pb-2 border-bottom border-3 border-primary" href="#">Discussions</a></li>
                <li class="nav-item"><a class="nav-link text-muted pb-2" href="#">Members</a></li>
                <li class="nav-item"><a class="nav-link text-muted pb-2" href="#">Events</a></li>
                <li class="nav-item"><a class="nav-link text-muted pb-2" href="#">About</a></li>
            </ul>
        </div>
    </div>

    <div class="row g-4">
        <!-- Feed -->
        <div class="col-lg-8">
            <!-- Create Post -->
            <div class="card bg-dark border-secondary border-opacity-25 mb-4 p-3" style="border-radius: 12px;">
                <div class="d-flex gap-3 align-items-center">
                    <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center text-white" style="width: 40px; height: 40px;">U</div>
                    <input type="text" class="form-control bg-transparent border-secondary text-white rounded-pill" placeholder="Start a discussion...">
                </div>
            </div>

            <!-- Posts -->
            @for($i=0; $i<3; $i++)
            <div class="card bg-dark border-secondary border-opacity-25 mb-4" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-white" style="width: 45px; height: 45px;">D</div>
                            <div>
                                <h6 class="mb-0 fw-bold">David Smith <span class="badge bg-secondary text-light ms-1 rounded-pill" style="font-size: 0.6rem;">Admin</span></h6>
                                <span class="text-muted small">2 hours ago</span>
                            </div>
                        </div>
                        <button class="btn btn-sm text-muted"><i class="fa-solid fa-ellipsis"></i></button>
                    </div>
                    
                    <h5 class="fw-bold">What's your favorite new feature in Laravel 11?</h5>
                    <p class="text-light opacity-75">I've been playing around with the new directory structure and it's so much cleaner! What do you all think about the streamlined configs and routes?</p>
                    
                    <div class="border-top border-secondary border-opacity-25 pt-3 mt-3 d-flex gap-4 text-muted small fw-bold">
                        <span class="cursor-pointer hover-primary"><i class="fa-regular fa-thumbs-up me-1"></i> 142 Likes</span>
                        <span class="cursor-pointer hover-primary"><i class="fa-regular fa-comment me-1"></i> 24 Comments</span>
                        <span class="cursor-pointer hover-primary ms-auto"><i class="fa-solid fa-share me-1"></i> Share</span>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card bg-dark border-secondary border-opacity-25 sticky-top" style="top: 20px; border-radius: 12px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">About Community</h6>
                    <p class="small text-light opacity-75 mb-4">The official SkillVerse community for Laravel developers. Discuss the framework, get help with bugs, and share your open-source packages.</p>
                    
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 mb-2 small text-light">
                            <i class="fa-solid fa-earth-americas text-muted w-15px"></i> Public
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2 small text-light">
                            <i class="fa-solid fa-calendar text-muted w-15px"></i> Created Jan 2024
                        </div>
                    </div>
                    
                    <h6 class="fw-bold mb-3 border-top border-secondary border-opacity-25 pt-3">Top Contributors</h6>
                    <div class="d-flex flex-column gap-3">
                        @for($i=1; $i<=3; $i++)
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center text-white" style="width: 35px; height: 35px;">U{{$i}}</div>
                            <div>
                                <p class="mb-0 small fw-bold">User Name {{$i}}</p>
                                <span class="text-muted" style="font-size: 0.7rem;">1.2K Points</span>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
