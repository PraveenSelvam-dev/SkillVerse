@extends('layouts.dashboard')

@section('title', 'My Learning')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .circular-progress {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: conic-gradient(#6C63FF 65%, rgba(255,255,255,0.1) 0);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .circular-progress::before {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #16213e;
    }
    .circular-progress-value {
        position: relative;
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
    }
    .streak-fire {
        font-size: 3rem;
        background: -webkit-linear-gradient(#FFB347, #FF6584);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .skill-badge {
        background: rgba(108, 99, 255, 0.2);
        color: #e0e0e0;
        border: 1px solid rgba(108, 99, 255, 0.4);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
    }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Learning Analytics</h2>

    <div class="row g-4 mb-4">
        <!-- Main Activity -->
        <div class="col-lg-8">
            <div class="glass-card p-4 h-100">
                <h5 class="text-white mb-4">Current Focus</h5>
                <div class="d-flex align-items-center bg-dark p-4 rounded border border-secondary mb-4">
                    <div class="circular-progress me-4">
                        <span class="circular-progress-value">65%</span>
                    </div>
                    <div>
                        <h4 class="text-white">Advanced Laravel Mastery</h4>
                        <p class="text-muted mb-2">Module 4: Service Containers & Providers</p>
                        <p class="text-sm text-info mb-3"><i class="fa-solid fa-clock me-1"></i> Est. 4 hours remaining</p>
                        <button class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Resume Lesson</button>
                    </div>
                </div>

                <h5 class="text-white mb-3">Time Spent This Week</h5>
                <div class="bg-dark rounded p-3 d-flex align-items-end justify-content-between" style="height: 200px; border: 1px solid rgba(255,255,255,0.1);">
                    <!-- Fake Chart -->
                    @php
                        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                        $heights = [40, 70, 30, 90, 60, 20, 50];
                    @endphp
                    @foreach($days as $idx => $day)
                    <div class="d-flex flex-column align-items-center" style="width: 12%;">
                        <div class="w-50 rounded-top" style="height: {{ $heights[$idx] }}px; background: linear-gradient(to top, #6C63FF, #FF6584);"></div>
                        <span class="text-muted small mt-2">{{ $day }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Streak -->
            <div class="glass-card p-4 mb-4 text-center">
                <h5 class="text-white mb-3">Learning Streak</h5>
                <i class="fa-solid fa-fire streak-fire mb-2"></i>
                <h2 class="text-white fw-bold mb-1">12 Days</h2>
                <p class="text-muted mb-0">You're on a roll! Keep it up!</p>
            </div>

            <!-- Skills -->
            <div class="glass-card p-4">
                <h5 class="text-white mb-3">Skills in Progress</h5>
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="skill-badge">PHP</span>
                    <span class="skill-badge">Laravel</span>
                    <span class="skill-badge">Vue.js</span>
                    <span class="skill-badge">Docker</span>
                    <span class="skill-badge">API Design</span>
                </div>
                
                <h5 class="text-white mb-3">Next Milestone</h5>
                <div class="bg-dark p-3 rounded border border-secondary">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-trophy text-warning me-3 fs-3"></i>
                        <div>
                            <h6 class="text-white mb-1">Laravel Expert Badge</h6>
                            <p class="text-muted small mb-0">Complete 2 more modules to earn.</p>
                        </div>
                    </div>
                    <div class="progress mt-2" style="height: 4px; background: #333;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
