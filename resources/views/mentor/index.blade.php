@extends('layouts.dashboard')

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
