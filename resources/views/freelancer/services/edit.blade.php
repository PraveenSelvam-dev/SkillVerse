@extends('layouts.dashboard')

@section('title', 'Edit Service - Freelancer Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Edit Service</h2>
        <div>
            <button class="btn btn-outline-secondary text-light me-2">Cancel</button>
            <button class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save Changes</button>
        </div>
    </div>

    <form>
        <div class="row g-4">
            <!-- Left Column: Details -->
            <div class="col-lg-8">
                <div class="card bg-dark border-0 shadow-sm mb-4" style="background-color: #0f3460 !important; border-radius: 16px;">
                    <div class="card-body p-4">
                        <h5 class="text-light mb-4 pb-2 border-bottom border-secondary border-opacity-50">Overview</h5>
                        
                        <div class="mb-4">
                            <label class="form-label text-light">Service Title</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" value="Full Stack Laravel Web Application">
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-light">Category</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option selected>Web Development</option>
                                    <option>Mobile App Development</option>
                                    <option>UI/UX Design</option>
                                    <option>Database Architecture</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-light">Tags</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" value="laravel, php, vuejs, fullstack">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light border-secondary" rows="8">I will build a scalable, secure, and modern full-stack web application using Laravel and Vue.js/React. With over 5 years of experience, I ensure clean code, proper architecture, and responsive design.</textarea>
                        </div>

                        <h5 class="text-light mb-4 pb-2 border-bottom border-secondary border-opacity-50 mt-5">Requirements</h5>
                        <div class="mb-3">
                            <label class="form-label text-light">What do you need from the buyer to get started?</label>
                            <textarea class="form-control bg-dark text-light border-secondary" rows="4">Please provide detailed project specifications, design assets (if any), and access to necessary APIs or third-party services.</textarea>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                    <div class="card-body p-4">
                        <h5 class="text-light mb-4 pb-2 border-bottom border-secondary border-opacity-50">Packages</h5>
                        
                        <div class="row g-4">
                            <!-- Basic -->
                            <div class="col-md-4">
                                <div class="card bg-dark border border-secondary border-opacity-50 h-100" style="border-radius: 12px;">
                                    <div class="card-header bg-transparent border-bottom border-secondary py-3 text-center">
                                        <h6 class="text-light mb-0">Basic</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Price ($)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="500">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="7">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="2">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4">Simple Backend
Basic UI
Up to 5 Pages</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Standard -->
                            <div class="col-md-4">
                                <div class="card bg-dark border border-primary border-opacity-50 h-100 position-relative" style="border-radius: 12px;">
                                    <div class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">Popular</div>
                                    <div class="card-header bg-transparent border-bottom border-secondary py-3 text-center mt-2">
                                        <h6 class="text-primary mb-0">Standard</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Price ($)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="1200">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="14">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="4">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4">Advanced Backend
Custom UI/UX
API Integration
Admin Panel</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Premium -->
                            <div class="col-md-4">
                                <div class="card bg-dark border border-secondary border-opacity-50 h-100" style="border-radius: 12px;">
                                    <div class="card-header bg-transparent border-bottom border-secondary py-3 text-center">
                                        <h6 class="text-light mb-0">Premium</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Price ($)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="2500">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="30">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary" value="99">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4">Enterprise Architecture
Payment Gateway
Cloud Deployment
1 Month Support</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Media -->
            <div class="col-lg-4">
                <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                    <div class="card-header bg-transparent border-bottom border-secondary py-3">
                        <h5 class="text-light mb-0">Gallery</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <!-- Current Thumbnail -->
                            <div style="height: 150px; background: linear-gradient(135deg, #6C63FF, #3b82f6); border-radius: 8px;" class="mb-2 d-flex align-items-center justify-content-center">
                                <span class="text-white fw-bold">Service Cover</span>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-light w-100">Change Image</button>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-light">Video URL (Optional)</label>
                            <input type="url" class="form-control bg-dark text-light border-secondary" value="https://youtube.com/watch?v=example">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
