@extends('layouts.app')
@section('title', 'Dr. Alan Turing - AI Mentor | SkillVerse')

@section('content')
<!-- Hero Profile -->
<div class="bg-dark border-bottom border-secondary border-opacity-25 pb-5">
    <!-- Cover Image -->
    <div style="height: 200px; background: linear-gradient(135deg, #16213e, #6C63FF);"></div>
    
    <div class="container position-relative" style="margin-top: -60px;">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex gap-4 align-items-end mb-4">
                    <img src="https://ui-avatars.com/api/?name=Alan+Turing&background=0f3460&color=fff&size=150" class="rounded-circle border border-4 border-dark shadow" alt="Profile" style="width: 120px; height: 120px;">
                    <div class="text-white pb-2">
                        <h2 class="fw-bold mb-1">Dr. Alan Turing <i class="fa-solid fa-circle-check text-primary ms-1 fs-5"></i></h2>
                        <p class="text-light opacity-75 mb-0 fs-5">Senior AI Researcher @ Google | Algorithms Expert</p>
                    </div>
                </div>
                
                <div class="d-flex gap-4 text-white mb-4 flex-wrap">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-star text-warning"></i>
                        <span class="fw-bold">5.0</span>
                        <span class="text-muted">(120 Reviews)</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>10 Years Experience</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>London, UK (Remote)</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="fa-regular fa-clock"></i>
                        <span>Replies in < 2 hours</span>
                    </div>
                </div>
                
                <div class="text-light opacity-75">
                    <h5 class="fw-bold text-white mb-3">About Me</h5>
                    <p>I am a passionate AI researcher and engineer with over 10 years of experience building scalable machine learning systems. I've led teams at top tech companies and love helping developers transition into AI or level up their algorithmic problem-solving skills.</p>
                    <p>Whether you're preparing for FAANG interviews, designing a complex ML architecture, or just starting with Python, I can provide tailored guidance and action plans.</p>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-white fw-bold mb-3">Expertise</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(['Python', 'Machine Learning', 'Deep Learning', 'System Design', 'Algorithms', 'TensorFlow', 'PyTorch'] as $skill)
                        <span class="badge bg-secondary bg-opacity-25 text-light border border-secondary border-opacity-25 rounded-pill px-3 py-2">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mt-lg-0">
                <!-- Booking Card -->
                <div class="card bg-dark border-secondary border-opacity-50 text-white shadow-lg sticky-top" style="top: 20px; border-radius: 16px; margin-top: -80px;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-center mb-4 border-bottom border-secondary border-opacity-25 pb-3">Book a Session</h4>
                        
                        <div class="d-grid gap-3 mb-4">
                            <!-- Tier 1 -->
                            <label class="border border-primary rounded p-3 cursor-pointer position-relative" style="background: rgba(108, 99, 255, 0.1);">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package" id="pkg1" checked>
                                    <div class="ms-2">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-bold">Introductory Call</span>
                                            <span class="fw-bold text-success">$50</span>
                                        </div>
                                        <span class="small text-light opacity-75">30 mins &bull; Quick advice, resume review, or tech stack discussion.</span>
                                    </div>
                                </div>
                            </label>
                            
                            <!-- Tier 2 -->
                            <label class="border border-secondary border-opacity-25 rounded p-3 cursor-pointer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package" id="pkg2">
                                    <div class="ms-2">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-bold">Deep Dive Session</span>
                                            <span class="fw-bold text-success">$150</span>
                                        </div>
                                        <span class="small text-light opacity-75">1 hour &bull; Code review, mock interview, or architecture planning.</span>
                                    </div>
                                </div>
                            </label>
                            
                            <!-- Tier 3 -->
                            <label class="border border-secondary border-opacity-25 rounded p-3 cursor-pointer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package" id="pkg3">
                                    <div class="ms-2">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-bold">Monthly Mentorship</span>
                                            <span class="fw-bold text-success">$500</span>
                                        </div>
                                        <span class="small text-light opacity-75">4x 1hr sessions &bull; Continuous guidance, goal tracking, and support.</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        
                        <button class="btn btn-primary w-100 fw-bold py-2 mb-3 rounded-pill" style="background: #6C63FF; border: none;">Continue to Booking</button>
                        <button class="btn btn-outline-light w-100 fw-bold py-2 rounded-pill">Message Mentor</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-white">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="fw-bold mb-4">Reviews (120)</h4>
            
            @for($i=0; $i<3; $i++)
            <div class="card bg-dark border-secondary border-opacity-25 mb-3" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">U{{ $i }}</div>
                            <div>
                                <h6 class="mb-0 fw-bold">Student Name</h6>
                                <span class="text-muted small">2 weeks ago</span>
                            </div>
                        </div>
                        <div class="text-warning small">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p class="text-light opacity-75 mb-0">Alan is an incredible mentor. He helped me completely restructure my machine learning portfolio which directly led to me landing a role at a top tech company. Highly recommend!</p>
                </div>
            </div>
            @endfor
            
            <button class="btn btn-outline-secondary text-white mt-2">Read More Reviews</button>
        </div>
    </div>
</div>
@endsection
