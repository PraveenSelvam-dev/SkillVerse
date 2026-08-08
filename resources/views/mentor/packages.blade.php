@extends('layouts.dashboard')

@section('title', 'Packages - Mentor Dashboard')

@php
    $packages = [
        ['title' => 'Quick Chat', 'price' => 25, 'duration' => '30 min', 'sessions' => 1, 'active' => true],
        ['title' => 'Deep Dive', 'price' => 75, 'duration' => '60 min', 'sessions' => 1, 'active' => true],
        ['title' => 'Monthly Mentoring', 'price' => 200, 'duration' => '60 min', 'sessions' => 4, 'active' => false],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">My Packages</h2>
        <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#createPackageModal" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">
            <i class="fas fa-plus me-2"></i>Create Package
        </button>
    </div>

    <div class="row g-4">
        @foreach($packages as $pkg)
        <div class="col-md-6 col-lg-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body position-relative">
                    <div class="form-check form-switch position-absolute" style="top: 20px; right: 20px;">
                        <input class="form-check-input" type="checkbox" role="switch" {{ $pkg['active'] ? 'checked' : '' }}>
                    </div>
                    <h5 class="text-light fw-bold mb-3 w-75">{{ $pkg['title'] }}</h5>
                    <h3 class="text-primary mb-3" style="color: #6C63FF !important;">${{ $pkg['price'] }} <small class="text-muted fs-6 fw-normal">/ {{ $pkg['duration'] }}</small></h3>
                    
                    <ul class="list-unstyled text-muted mb-4">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ $pkg['sessions'] }} Session{{ $pkg['sessions'] > 1 ? 's' : '' }}</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>1-on-1 Video Call</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Direct Messaging</li>
                        <li><i class="fas fa-check text-success me-2"></i>Action Plan</li>
                    </ul>
                    
                    <div class="d-flex gap-2 mt-auto">
                        <button class="btn btn-outline-light flex-grow-1"><i class="fas fa-edit me-2"></i>Edit</button>
                        <button class="btn btn-outline-danger px-3"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Create Package Modal -->
<div class="modal fade" id="createPackageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-0" style="background-color: #1a1a2e !important; border-radius: 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.5);">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title text-light">Create New Package</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-light">Package Title</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" placeholder="e.g., Deep Dive Review">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Description</label>
                        <textarea class="form-control bg-dark text-light border-secondary" rows="3" placeholder="Describe what the student will get..."></textarea>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label text-light">Duration</label>
                            <select class="form-select bg-dark text-light border-secondary">
                                <option value="30">30 Minutes</option>
                                <option value="60" selected>60 Minutes</option>
                                <option value="90">90 Minutes</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-light">Price ($)</label>
                            <input type="number" class="form-control bg-dark text-light border-secondary" placeholder="50">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-light">Number of Sessions</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" value="1" min="1">
                    </div>
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary py-2" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
