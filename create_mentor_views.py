import os
import pathlib

base_dir = r"d:\My_Projects\SkillVerse\resources\views"
os.makedirs(base_dir, exist_ok=True)

files_content = {
    # MENTOR DASHBOARD
    r"mentor\index.blade.php": """@extends('layouts.dashboard')

@section('title', 'Mentor Dashboard')

@php
    $upcomingSessions = 3;
    $totalSessions = 45;
    $revenue = '$3,200';
    $rating = 4.9;

    $recentBookings = [
        ['name' => 'Alice Johnson', 'avatar' => 'https://ui-avatars.com/api/?name=Alice+Johnson&background=random', 'date' => 'Today, 2:00 PM', 'type' => 'Deep Dive (60m)'],
        ['name' => 'Bob Smith', 'avatar' => 'https://ui-avatars.com/api/?name=Bob+Smith&background=random', 'date' => 'Today, 4:00 PM', 'type' => 'Quick Chat (30m)'],
        ['name' => 'Charlie Davis', 'avatar' => 'https://ui-avatars.com/api/?name=Charlie+Davis&background=random', 'date' => 'Tomorrow, 10:00 AM', 'type' => 'Code Review (45m)'],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Mentor Overview</h2>
        <div>
            <a href="{{ route('mentor.availability') ?? '#' }}" class="btn btn-outline-light me-2"><i class="fas fa-clock me-2"></i>Set Availability</a>
            <a href="{{ route('mentor.packages') ?? '#' }}" class="btn btn-primary" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fas fa-plus me-2"></i>Create Package</a>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Upcoming Sessions</p>
                            <h3 class="text-light mb-0">{{ $upcomingSessions }}</h3>
                        </div>
                        <div class="p-3 bg-primary bg-opacity-10 rounded-circle text-primary">
                            <i class="fas fa-calendar-alt fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Sessions</p>
                            <h3 class="text-light mb-0">{{ $totalSessions }}</h3>
                        </div>
                        <div class="p-3 bg-success bg-opacity-10 rounded-circle text-success">
                            <i class="fas fa-video fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Revenue</p>
                            <h3 class="text-light mb-0">{{ $revenue }}</h3>
                        </div>
                        <div class="p-3 bg-warning bg-opacity-10 rounded-circle text-warning">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Rating</p>
                            <h3 class="text-light mb-0"><i class="fas fa-star text-warning me-1"></i>{{ $rating }}</h3>
                        </div>
                        <div class="p-3 bg-info bg-opacity-10 rounded-circle text-info">
                            <i class="fas fa-star fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Today's Schedule -->
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary pt-4 pb-3">
                    <h5 class="text-light mb-0"><i class="fas fa-calendar-day me-2 text-primary"></i>Today's Schedule</h5>
                </div>
                <div class="card-body">
                    <div class="timeline position-relative ps-4 mt-3" style="border-left: 2px solid #2d3748;">
                        @foreach($recentBookings as $booking)
                        <div class="timeline-item mb-4 position-relative">
                            <span class="position-absolute rounded-circle" style="width: 12px; height: 12px; background: #6C63FF; left: -25px; top: 5px;"></span>
                            <div class="d-flex justify-content-between align-items-start bg-dark p-3 rounded shadow-sm border border-secondary border-opacity-25">
                                <div>
                                    <h6 class="text-info mb-1">{{ $booking['date'] }}</h6>
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="{{ $booking['avatar'] }}" alt="{{ $booking['name'] }}" class="rounded-circle me-2" width="30">
                                        <span class="text-light fw-medium">{{ $booking['name'] }}</span>
                                    </div>
                                    <p class="text-muted small mt-2 mb-0"><i class="fas fa-tag me-1"></i>{{ $booking['type'] }}</p>
                                </div>
                                <button class="btn btn-sm btn-outline-light"><i class="fas fa-video me-1"></i>Join</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings List -->
        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary pt-4 pb-3">
                    <h5 class="text-light mb-0"><i class="fas fa-history me-2 text-primary"></i>Recent Bookings</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-bottom">
                        @foreach($recentBookings as $booking)
                        <div class="list-group-item bg-transparent border-bottom border-secondary p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ $booking['avatar'] }}" class="rounded-circle me-3" width="40">
                                <div>
                                    <h6 class="text-light mb-1">{{ $booking['name'] }}</h6>
                                    <small class="text-muted">{{ $booking['type'] }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="p-3 text-center">
                            <a href="#" class="text-decoration-none" style="color: #6C63FF;">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
""",
    r"mentor\appointments.blade.php": """@extends('layouts.dashboard')

@section('title', 'Appointments - Mentor Dashboard')

@php
    $appointments = [
        ['name' => 'Alice Johnson', 'avatar' => 'https://ui-avatars.com/api/?name=Alice+Johnson&background=random', 'date' => 'Today, 2:00 PM', 'duration' => '60 min', 'package' => 'Deep Dive', 'status' => 'Upcoming', 'notes' => 'Need help with Laravel eloquent relationships.'],
        ['name' => 'Bob Smith', 'avatar' => 'https://ui-avatars.com/api/?name=Bob+Smith&background=random', 'date' => 'Today, 4:00 PM', 'duration' => '30 min', 'package' => 'Quick Chat', 'status' => 'Upcoming', 'notes' => 'Career advice.'],
        ['name' => 'Charlie Davis', 'avatar' => 'https://ui-avatars.com/api/?name=Charlie+Davis&background=random', 'date' => 'Tomorrow, 10:00 AM', 'duration' => '45 min', 'package' => 'Code Review', 'status' => 'Upcoming', 'notes' => 'Reviewing a PR.'],
        ['name' => 'Diana Prince', 'avatar' => 'https://ui-avatars.com/api/?name=Diana+Prince&background=random', 'date' => 'Oct 15, 1:00 PM', 'duration' => '60 min', 'package' => 'Deep Dive', 'status' => 'Past', 'notes' => 'Discussed AWS deployment.'],
        ['name' => 'Evan Wright', 'avatar' => 'https://ui-avatars.com/api/?name=Evan+Wright&background=random', 'date' => 'Oct 14, 3:00 PM', 'duration' => '30 min', 'package' => 'Quick Chat', 'status' => 'Past', 'notes' => 'Resume review.'],
        ['name' => 'Fiona Gallagher', 'avatar' => 'https://ui-avatars.com/api/?name=Fiona+Gallagher&background=random', 'date' => 'Oct 12, 11:00 AM', 'duration' => '60 min', 'package' => 'Monthly Mentoring', 'status' => 'Past', 'notes' => 'Session 1/4.'],
        ['name' => 'George Miller', 'avatar' => 'https://ui-avatars.com/api/?name=George+Miller&background=random', 'date' => 'Oct 10, 5:00 PM', 'duration' => '30 min', 'package' => 'Quick Chat', 'status' => 'Cancelled', 'notes' => 'Student had a conflict.'],
        ['name' => 'Hannah Abbott', 'avatar' => 'https://ui-avatars.com/api/?name=Hannah+Abbott&background=random', 'date' => 'Oct 05, 9:00 AM', 'duration' => '60 min', 'package' => 'Deep Dive', 'status' => 'Past', 'notes' => 'React hooks.'],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <h2 class="text-light fw-bold mb-4">Appointments</h2>

    <ul class="nav nav-pills mb-4 gap-2" id="appointmentsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-pill px-4 text-light" style="background-color: rgba(108, 99, 255, 0.2);" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill px-4 text-light" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab" aria-controls="past" aria-selected="false">Past</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill px-4 text-light" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</button>
        </li>
    </ul>

    <div class="tab-content" id="appointmentsTabContent">
        <!-- Upcoming -->
        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
            <div class="row g-4">
                @foreach($appointments as $apt)
                    @if($apt['status'] == 'Upcoming')
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $apt['avatar'] }}" alt="{{ $apt['name'] }}" class="rounded-circle me-3" width="50">
                                            <div>
                                                <h6 class="text-light mb-0">{{ $apt['name'] }}</h6>
                                                <span class="badge bg-primary bg-opacity-25 text-primary mt-1">{{ $apt['package'] }}</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-success">Upcoming</span>
                                    </div>
                                    <ul class="list-unstyled text-muted mb-3 small">
                                        <li class="mb-2"><i class="fas fa-calendar-alt me-2 text-info"></i>{{ $apt['date'] }}</li>
                                        <li class="mb-2"><i class="fas fa-clock me-2 text-warning"></i>{{ $apt['duration'] }}</li>
                                        <li><i class="fas fa-comment-alt me-2 text-secondary"></i>"{{ $apt['notes'] }}"</li>
                                    </ul>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-primary flex-grow-1" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fas fa-video me-1"></i> Join Meeting</button>
                                        <button class="btn btn-sm btn-outline-light px-3"><i class="fas fa-envelope"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Past -->
        <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
            <div class="row g-4">
                @foreach($appointments as $apt)
                    @if($apt['status'] == 'Past')
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-dark border-0 shadow-sm h-100 opacity-75" style="background-color: #0f3460 !important; border-radius: 16px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $apt['avatar'] }}" alt="{{ $apt['name'] }}" class="rounded-circle me-3" width="50">
                                            <div>
                                                <h6 class="text-light mb-0">{{ $apt['name'] }}</h6>
                                                <span class="badge bg-secondary bg-opacity-25 text-light mt-1">{{ $apt['package'] }}</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-secondary">Completed</span>
                                    </div>
                                    <ul class="list-unstyled text-muted mb-0 small">
                                        <li class="mb-2"><i class="fas fa-calendar-alt me-2"></i>{{ $apt['date'] }}</li>
                                        <li class="mb-2"><i class="fas fa-clock me-2"></i>{{ $apt['duration'] }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Cancelled -->
        <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
            <div class="row g-4">
                @foreach($appointments as $apt)
                    @if($apt['status'] == 'Cancelled')
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-dark border-0 shadow-sm h-100 opacity-75" style="background-color: #0f3460 !important; border-radius: 16px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $apt['avatar'] }}" alt="{{ $apt['name'] }}" class="rounded-circle me-3" width="50">
                                            <div>
                                                <h6 class="text-light mb-0">{{ $apt['name'] }}</h6>
                                                <span class="badge bg-secondary bg-opacity-25 text-light mt-1">{{ $apt['package'] }}</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-danger">Cancelled</span>
                                    </div>
                                    <ul class="list-unstyled text-muted mb-0 small">
                                        <li class="mb-2"><i class="fas fa-calendar-alt me-2"></i>{{ $apt['date'] }}</li>
                                        <li><i class="fas fa-info-circle me-2"></i>{{ $apt['notes'] }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .nav-pills .nav-link { color: #aaa; transition: all 0.3s; }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background: linear-gradient(135deg, #6C63FF, #FF6584) !important;
        color: white !important;
    }
</style>
@endsection
""",
    r"mentor\availability.blade.php": """@extends('layouts.dashboard')

@section('title', 'Availability - Mentor Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Set Availability</h2>
        <button class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fas fa-save me-2"></i>Save Changes</button>
    </div>

    <div class="card bg-dark border-0 shadow-sm mb-4" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <label class="form-label text-light">Your Timezone</label>
                    <select class="form-select bg-dark text-light border-secondary">
                        <option value="UTC-8">Pacific Time (US & Canada)</option>
                        <option value="UTC-5" selected>Eastern Time (US & Canada)</option>
                        <option value="UTC+0">London</option>
                        <option value="UTC+5.5">India Standard Time</option>
                    </select>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <p class="text-muted small mb-0"><i class="fas fa-info-circle me-1"></i> Select the times you are available for mentoring sessions. Grey means unavailable.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-bordered border-secondary mb-0 text-center" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr>
                            <th class="py-3 text-muted">Time</th>
                            <th class="py-3 text-light">Mon</th>
                            <th class="py-3 text-light">Tue</th>
                            <th class="py-3 text-light">Wed</th>
                            <th class="py-3 text-light">Thu</th>
                            <th class="py-3 text-light">Fri</th>
                            <th class="py-3 text-muted">Sat</th>
                            <th class="py-3 text-muted">Sun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $times = ['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM'];
                        @endphp
                        @foreach($times as $time)
                        <tr>
                            <td class="text-muted align-middle py-3" style="width: 10%;">{{ $time }}</td>
                            @for($i=0; $i<7; $i++)
                                @php
                                    // Randomly mark some as available for dummy data
                                    $isAvailable = ($i < 5 && rand(0, 1) == 1) ? true : false;
                                @endphp
                                <td class="p-2" style="width: 12.8%;">
                                    <div class="w-100 rounded slot-toggle {{ $isAvailable ? 'bg-primary' : 'bg-secondary bg-opacity-25' }}" style="height: 40px; cursor: pointer; transition: all 0.2s;" data-available="{{ $isAvailable ? '1' : '0' }}">
                                        @if($isAvailable)
                                            <i class="fas fa-check text-white mt-2"></i>
                                        @endif
                                    </div>
                                </td>
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .slot-toggle:hover { opacity: 0.8; }
    .slot-toggle.bg-primary { background: linear-gradient(135deg, #6C63FF, #FF6584) !important; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.slot-toggle').forEach(slot => {
            slot.addEventListener('click', function() {
                let isAvail = this.getAttribute('data-available') === '1';
                if(isAvail) {
                    this.setAttribute('data-available', '0');
                    this.classList.remove('bg-primary');
                    this.classList.add('bg-secondary', 'bg-opacity-25');
                    this.innerHTML = '';
                } else {
                    this.setAttribute('data-available', '1');
                    this.classList.remove('bg-secondary', 'bg-opacity-25');
                    this.classList.add('bg-primary');
                    this.innerHTML = '<i class="fas fa-check text-white mt-2"></i>';
                }
            });
        });
    });
</script>
@endsection
"""
    }

for path, content in files_content.items():
    full_path = os.path.join(base_dir, path)
    os.makedirs(os.path.dirname(full_path), exist_ok=True)
    with open(full_path, "w", encoding="utf-8") as f:
        f.write(content)
print("Mentor views created.")
