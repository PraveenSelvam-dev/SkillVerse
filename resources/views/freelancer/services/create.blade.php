@extends('layouts.dashboard')

@section('title', 'Create Service - Freelancer Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Create New Service</h2>
        <div>
            <button class="btn btn-outline-secondary text-light me-2">Save as Draft</button>
            <button class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Publish Service</button>
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
                            <input type="text" class="form-control bg-dark text-light border-secondary" placeholder="I will build a full stack Laravel application...">
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-light">Category</label>
                                <select class="form-select bg-dark text-light border-secondary">
                                    <option>Web Development</option>
                                    <option>Mobile App Development</option>
                                    <option>UI/UX Design</option>
                                    <option>Database Architecture</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-light">Tags</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" placeholder="laravel, php, web-app, backend">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Description</label>
                            <textarea class="form-control bg-dark text-light border-secondary" rows="8" placeholder="Describe your service in detail..."></textarea>
                        </div>

                        <h5 class="text-light mb-4 pb-2 border-bottom border-secondary border-opacity-50 mt-5">Requirements</h5>
                        <div class="mb-3">
                            <label class="form-label text-light">What do you need from the buyer to get started?</label>
                            <textarea class="form-control bg-dark text-light border-secondary" rows="4" placeholder="e.g., Please provide brand guidelines, API keys, and project specifications."></textarea>
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
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4"></textarea>
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
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4"></textarea>
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
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Delivery (Days)</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Revisions</label>
                                            <input type="number" class="form-control form-control-sm bg-dark text-light border-secondary">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Features (One per line)</label>
                                            <textarea class="form-control form-control-sm bg-dark text-light border-secondary" rows="4"></textarea>
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
                        <p class="text-muted small mb-3">Upload a thumbnail to show in the service directory. (Max 5MB)</p>
                        
                        <div class="border border-2 border-dashed border-secondary rounded p-5 text-center mb-4" style="cursor: pointer; background: rgba(255,255,255,0.02);">
                            <i class="fas fa-cloud-upload-alt text-muted mb-3" style="font-size: 3rem;"></i>
                            <h6 class="text-light">Click to upload</h6>
                            <p class="text-muted small mb-0">or drag and drop here</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-light">Video URL (Optional)</label>
                            <input type="url" class="form-control bg-dark text-light border-secondary" placeholder="https://youtube.com/...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
