@extends('layouts.dashboard')
@section('title', 'My Students')
@section('content')
@php
    $stats = [
        ['title' => 'Total Students', 'value' => '1,247', 'color' => '#6C63FF'],
        ['title' => 'Active This Month', 'value' => '856', 'color' => '#00C9A7'],
        ['title' => 'Completion Rate', 'value' => '42%', 'color' => '#FFB347'],
        ['title' => 'Average Progress', 'value' => '68%', 'color' => '#FF6584'],
    ];
    
    $students = [];
    $names = ['Alice Johnson', 'Bob Smith', 'Charlie Brown', 'Diana Prince', 'Evan Wright', 'Fiona Gallagher', 'George Lucas', 'Hannah Abbott', 'Ian Malcolm', 'Julia Roberts', 'Kevin Hart', 'Luna Lovegood', 'Michael Scott', 'Nina Simone', 'Oscar Isaac'];
    foreach($names as $index => $name) {
        $students[] = [
            'name' => $name,
            'avatar' => 'https://ui-avatars.com/api/?name='.urlencode($name).'&background=random',
            'email' => strtolower(explode(' ', $name)[0]) . '@example.com',
            'courses' => rand(1, 4),
            'progress' => rand(10, 100),
            'joined' => '2023-0'.rand(1,9).'-'.rand(10,28),
            'last_active' => rand(1, 30) . ' days ago'
        ];
    }
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 20px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .progress { height: 8px; background-color: rgba(255,255,255,0.1); border-radius: 4px; }
    .progress-bar { background: linear-gradient(90deg, #6C63FF, #FF6584); }
    .search-input { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 20px; padding: 10px 20px; }
    .search-input:focus { background: #16213e; border-color: #6C63FF; color: #fff; box-shadow: none; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">My Students</h2>

    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card text-center py-4">
                <h3 class="fw-bold mb-1" style="color: {{ $stat['color'] }}">{{ $stat['value'] }}</h3>
                <div class="text-muted small text-uppercase letter-spacing-1">{{ $stat['title'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="dashboard-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-white m-0">Student List</h5>
            <div class="d-flex gap-2">
                <input type="text" class="form-control search-input" placeholder="Search students...">
                <button class="btn btn-outline-light rounded-pill px-3"><i class="fa-solid fa-filter"></i></button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Enrolled Courses</th>
                        <th>Avg. Progress</th>
                        <th>Joined Date</th>
                        <th>Last Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student['avatar'] }}" class="rounded-circle me-3" width="40" height="40" alt="Avatar">
                                <div>
                                    <div class="text-white fw-medium">{{ $student['name'] }}</div>
                                    <div class="text-muted small">{{ $student['email'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary rounded-pill px-3">{{ $student['courses'] }}</span></td>
                        <td style="width: 200px;">
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" style="width: {{ $student['progress'] }}%"></div>
                                </div>
                                <span class="text-muted small">{{ $student['progress'] }}%</span>
                            </div>
                        </td>
                        <td>{{ $student['joined'] }}</td>
                        <td class="text-muted">{{ $student['last_active'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Message</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
