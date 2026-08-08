@extends('layouts.dashboard')

@section('title', 'Freelancer Dashboard')

@php
    $activeOrders = 4;
    $completedOrders = 23;
    $revenue = '$5,600';
    $rating = 4.8;

    $recentOrders = [
        ['id' => 'ORD-001', 'client' => 'Acme Corp', 'service' => 'Full Stack Web App', 'progress' => 75, 'deadline' => 'Tomorrow', 'status' => 'In Progress'],
        ['id' => 'ORD-002', 'client' => 'John Smith', 'service' => 'UI/UX Design', 'progress' => 30, 'deadline' => 'Oct 20', 'status' => 'In Progress'],
        ['id' => 'ORD-003', 'client' => 'TechStart', 'service' => 'API Integration', 'progress' => 10, 'deadline' => 'Oct 25', 'status' => 'Just Started'],
        ['id' => 'ORD-004', 'client' => 'Sarah Lee', 'service' => 'Bug Fixing', 'progress' => 95, 'deadline' => 'Today', 'status' => 'Under Review'],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Freelancer Overview</h2>
        <div>
            <a href="{{ route('freelancer.orders') ?? '#' }}" class="btn btn-outline-light me-2"><i class="fas fa-list me-2"></i>View Orders</a>
            <a href="{{ route('freelancer.services.create') ?? '#' }}" class="btn btn-primary" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fas fa-plus me-2"></i>Create Service</a>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Active Orders</p>
                            <h3 class="text-light mb-0">{{ $activeOrders }}</h3>
                        </div>
                        <div class="p-3 bg-primary bg-opacity-10 rounded-circle text-primary">
                            <i class="fas fa-briefcase fa-lg"></i>
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
                            <p class="text-muted mb-1">Completed</p>
                            <h3 class="text-light mb-0">{{ $completedOrders }}</h3>
                        </div>
                        <div class="p-3 bg-success bg-opacity-10 rounded-circle text-success">
                            <i class="fas fa-check-circle fa-lg"></i>
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
        <!-- Active Orders -->
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary pt-4 pb-3">
                    <h5 class="text-light mb-0"><i class="fas fa-tasks me-2 text-primary"></i>Active Orders</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0" style="--bs-table-bg: transparent;">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 text-muted border-secondary">Order</th>
                                    <th class="py-3 text-muted border-secondary">Service & Client</th>
                                    <th class="py-3 text-muted border-secondary">Progress</th>
                                    <th class="py-3 text-muted border-secondary">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td class="py-3 px-4 align-middle border-secondary border-opacity-25 text-info">{{ $order['id'] }}</td>
                                    <td class="py-3 align-middle border-secondary border-opacity-25">
                                        <h6 class="text-light mb-1">{{ $order['service'] }}</h6>
                                        <small class="text-muted"><i class="fas fa-user me-1"></i>{{ $order['client'] }}</small>
                                    </td>
                                    <td class="py-3 align-middle border-secondary border-opacity-25" style="width: 25%;">
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span class="text-light">{{ $order['status'] }}</span>
                                            <span class="text-muted">{{ $order['progress'] }}%</span>
                                        </div>
                                        <div class="progress bg-secondary bg-opacity-25" style="height: 6px;">
                                            <div class="progress-bar {{ $order['progress'] > 80 ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $order['progress'] }}%" aria-valuenow="{{ $order['progress'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="py-3 align-middle border-secondary border-opacity-25">
                                        <span class="badge bg-secondary bg-opacity-25 text-light"><i class="far fa-clock me-1"></i>{{ $order['deadline'] }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Earnings -->
        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary pt-4 pb-3">
                    <h5 class="text-light mb-0"><i class="fas fa-wallet me-2 text-success"></i>Recent Earnings</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-bottom">
                        <div class="list-group-item bg-transparent border-bottom border-secondary p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-light mb-1">API Integration</h6>
                                    <small class="text-muted">Cleared - Oct 12</small>
                                </div>
                                <span class="text-success fw-bold">+$450.00</span>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent border-bottom border-secondary p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-light mb-1">Landing Page Design</h6>
                                    <small class="text-muted">Cleared - Oct 10</small>
                                </div>
                                <span class="text-success fw-bold">+$250.00</span>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent border-bottom border-secondary p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-light mb-1">Database Optimization</h6>
                                    <small class="text-warning">Pending - Expected Oct 18</small>
                                </div>
                                <span class="text-light fw-bold">$300.00</span>
                            </div>
                        </div>
                        <div class="p-3 text-center mt-auto">
                            <a href="#" class="text-decoration-none" style="color: #6C63FF;">View All Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
