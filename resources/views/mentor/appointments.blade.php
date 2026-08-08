@extends('layouts.dashboard')

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
