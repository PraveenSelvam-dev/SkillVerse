@extends('layouts.dashboard')

@section('title', 'Orders - Freelancer Dashboard')

@php
    $orders = [
        ['id' => 'ORD-1001', 'buyer' => 'Acme Corp', 'avatar' => 'https://ui-avatars.com/api/?name=Acme+Corp&background=random', 'service' => 'Full Stack Web App', 'package' => 'Standard', 'price' => 1200, 'deadline' => 'Oct 25, 2023', 'status' => 'In Progress', 'step' => 2],
        ['id' => 'ORD-1002', 'buyer' => 'John Smith', 'avatar' => 'https://ui-avatars.com/api/?name=John+Smith&background=random', 'service' => 'UI/UX Design', 'package' => 'Basic', 'price' => 250, 'deadline' => 'Oct 20, 2023', 'status' => 'In Progress', 'step' => 2],
        ['id' => 'ORD-1003', 'buyer' => 'Sarah Lee', 'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Lee&background=random', 'service' => 'Bug Fixing', 'package' => 'Premium', 'price' => 150, 'deadline' => 'Today', 'status' => 'Delivered', 'step' => 3],
        ['id' => 'ORD-1004', 'buyer' => 'TechStart', 'avatar' => 'https://ui-avatars.com/api/?name=TechStart&background=random', 'service' => 'API Integration', 'package' => 'Standard', 'price' => 600, 'deadline' => 'Oct 15, 2023', 'status' => 'Completed', 'step' => 4],
        ['id' => 'ORD-1005', 'buyer' => 'Mike Johnson', 'avatar' => 'https://ui-avatars.com/api/?name=Mike+Johnson&background=random', 'service' => 'Landing Page', 'package' => 'Basic', 'price' => 100, 'deadline' => 'Oct 10, 2023', 'status' => 'Completed', 'step' => 4],
        ['id' => 'ORD-1006', 'buyer' => 'Emily Davis', 'avatar' => 'https://ui-avatars.com/api/?name=Emily+Davis&background=random', 'service' => 'Database Design', 'package' => 'Premium', 'price' => 500, 'deadline' => 'Oct 08, 2023', 'status' => 'Completed', 'step' => 4],
        ['id' => 'ORD-1007', 'buyer' => 'Alex Turner', 'avatar' => 'https://ui-avatars.com/api/?name=Alex+Turner&background=random', 'service' => 'Code Review', 'package' => 'Basic', 'price' => 50, 'deadline' => 'Oct 05, 2023', 'status' => 'Cancelled', 'step' => 0],
        ['id' => 'ORD-1008', 'buyer' => 'Jessica Alba', 'avatar' => 'https://ui-avatars.com/api/?name=Jessica+Alba&background=random', 'service' => 'UI/UX Design', 'package' => 'Standard', 'price' => 400, 'deadline' => 'Oct 30, 2023', 'status' => 'In Progress', 'step' => 2],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <h2 class="text-light fw-bold mb-4">Manage Orders</h2>

    <ul class="nav nav-pills mb-4 gap-2" id="ordersTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-pill px-4 text-light" style="background-color: rgba(108, 99, 255, 0.2);" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button" role="tab">Active</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill px-4 text-light" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button" role="tab">Delivered</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill px-4 text-light" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill px-4 text-light" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab">Cancelled</button>
        </li>
    </ul>

    <div class="tab-content" id="ordersTabContent">
        <!-- Loop for each tab would be ideal, but for simplicity, showing a combined view filtered by JS in real app, here we render all in one or split manually -->
        <div class="tab-pane fade show active" id="active" role="tabpanel">
            <div class="row g-4">
                @foreach($orders as $order)
                    @if($order['status'] == 'In Progress' || $order['status'] == 'Delivered')
                    <div class="col-12">
                        <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <span class="text-primary fw-bold">{{ $order['id'] }}</span>
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ $order['avatar'] }}" alt="{{ $order['buyer'] }}" class="rounded-circle me-2" width="40">
                                            <h6 class="text-light mb-0">{{ $order['buyer'] }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <h5 class="text-light mb-1">{{ $order['service'] }}</h5>
                                        <span class="badge bg-secondary bg-opacity-25 text-light me-2">{{ $order['package'] }} Package</span>
                                        <span class="text-success fw-bold">${{ $order['price'] }}</span>
                                    </div>
                                    <div class="col-md-2 mt-3 mt-md-0 text-md-center">
                                        <p class="text-muted small mb-1">Deadline</p>
                                        <span class="text-light {{ $order['deadline'] == 'Today' ? 'text-danger fw-bold' : '' }}"><i class="far fa-clock me-1"></i>{{ $order['deadline'] }}</span>
                                    </div>
                                    <div class="col-md-3 mt-3 mt-md-0 text-md-end">
                                        @if($order['status'] == 'In Progress')
                                            <button class="btn btn-sm btn-primary mb-2 w-100" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Deliver Work</button>
                                        @elseif($order['status'] == 'Delivered')
                                            <button class="btn btn-sm btn-warning mb-2 w-100">Modify Delivery</button>
                                        @endif
                                        <button class="btn btn-sm btn-outline-light w-100"><i class="fas fa-comment me-1"></i> Message</button>
                                    </div>
                                </div>

                                <!-- Progress Bar Indicator -->
                                <div class="position-relative mt-4 pt-2">
                                    <div class="progress" style="height: 4px; background-color: #2d3748;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($order['step'] - 1) * 33.33 }}%;"></div>
                                    </div>
                                    <div class="d-flex justify-content-between position-absolute w-100 top-0 mt-1" style="transform: translateY(-50%);">
                                        <div class="rounded-circle {{ $order['step'] >= 1 ? 'bg-success' : 'bg-secondary' }} d-flex justify-content-center align-items-center" style="width: 24px; height: 24px;"><i class="fas fa-check text-white" style="font-size: 10px;"></i></div>
                                        <div class="rounded-circle {{ $order['step'] >= 2 ? 'bg-success' : 'bg-secondary' }} d-flex justify-content-center align-items-center" style="width: 24px; height: 24px;"><i class="fas fa-check text-white" style="font-size: 10px;"></i></div>
                                        <div class="rounded-circle {{ $order['step'] >= 3 ? 'bg-success' : 'bg-secondary' }} d-flex justify-content-center align-items-center" style="width: 24px; height: 24px;"><i class="fas fa-check text-white" style="font-size: 10px;"></i></div>
                                        <div class="rounded-circle {{ $order['step'] >= 4 ? 'bg-success' : 'bg-secondary' }} d-flex justify-content-center align-items-center" style="width: 24px; height: 24px;"><i class="fas fa-check text-white" style="font-size: 10px;"></i></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 text-muted" style="font-size: 0.75rem;">
                                        <span>Ordered</span>
                                        <span>In Progress</span>
                                        <span>Delivered</span>
                                        <span>Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Other tabs (Delivered, Completed, Cancelled) would filter similarly -->
        <div class="tab-pane fade" id="completed" role="tabpanel">
             <div class="row g-4">
                @foreach($orders as $order)
                    @if($order['status'] == 'Completed')
                     <div class="col-12">
                        <div class="card bg-dark border-0 shadow-sm opacity-75" style="background-color: #0f3460 !important; border-radius: 16px;">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <span class="text-secondary fw-bold">{{ $order['id'] }}</span>
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ $order['avatar'] }}" alt="{{ $order['buyer'] }}" class="rounded-circle me-2" width="40">
                                            <h6 class="text-light mb-0">{{ $order['buyer'] }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-3 mt-md-0">
                                        <h5 class="text-light mb-1">{{ $order['service'] }}</h5>
                                        <span class="text-success fw-bold">${{ $order['price'] }}</span>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0 text-md-end">
                                        <span class="badge bg-success bg-opacity-25 text-success fs-6"><i class="fas fa-check-circle me-2"></i>Completed</span>
                                    </div>
                                </div>
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
