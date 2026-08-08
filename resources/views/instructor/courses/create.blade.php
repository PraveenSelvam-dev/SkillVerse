@extends('layouts.dashboard')
@section('title', 'Create Course')
@section('content')
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 30px; }
    .step-indicator { display: flex; justify-content: space-between; margin-bottom: 30px; position: relative; }
    .step-indicator::before { content: ''; position: absolute; top: 15px; left: 0; right: 0; height: 2px; background: rgba(255,255,255,0.1); z-index: 1; }
    .step { z-index: 2; background: #0f3460; padding: 0 10px; display: flex; flex-direction: column; align-items: center; color: #aaa; transition: all 0.3s; }
    .step.active { color: #6C63FF; }
    .step-icon { width: 32px; height: 32px; border-radius: 50%; background: #16213e; border: 2px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 8px; font-weight: bold; }
    .step.active .step-icon { background: #6C63FF; border-color: #6C63FF; color: white; box-shadow: 0 0 15px rgba(108, 99, 255, 0.5); }
    .step.completed .step-icon { background: #00C9A7; border-color: #00C9A7; color: white; }
    .form-control, .form-select { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 10px 15px; }
    .form-control:focus, .form-select:focus { background: #16213e; border-color: #6C63FF; color: #fff; box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25); }
    .form-label { color: #e0e0e0; font-weight: 500; }
    .btn-gradient { background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; }
    .btn-outline-light { border-color: rgba(255,255,255,0.2); color: #e0e0e0; }
    .btn-outline-light:hover { background: rgba(255,255,255,0.1); color: #fff; border-color: rgba(255,255,255,0.3); }
    .section-box { border: 1px dashed rgba(255,255,255,0.2); border-radius: 8px; padding: 20px; margin-bottom: 20px; background: rgba(255,255,255,0.02); }
    .lesson-box { background: #16213e; border-radius: 8px; padding: 15px; margin-top: 10px; display: flex; align-items: center; gap: 15px; border: 1px solid rgba(255,255,255,0.05); }
    .drag-handle { color: #aaa; cursor: grab; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Create New Course</h2>

    <div class="dashboard-card">
        <div class="step-indicator">
            <div class="step active" id="indicator-1">
                <div class="step-icon">1</div>
                <span>Basic Info</span>
            </div>
            <div class="step" id="indicator-2">
                <div class="step-icon">2</div>
                <span>Curriculum</span>
            </div>
            <div class="step" id="indicator-3">
                <div class="step-icon">3</div>
                <span>Pricing</span>
            </div>
            <div class="step" id="indicator-4">
                <div class="step-icon">4</div>
                <span>Publish</span>
            </div>
        </div>

        <form id="courseForm">
            <!-- Step 1: Basic Info -->
            <div class="step-content active" id="step-1">
                <h5 class="text-white mb-4">Basic Information</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Course Title</label>
                        <input type="text" class="form-control" placeholder="e.g. Advanced Laravel Mastery">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course Slug</label>
                        <input type="text" class="form-control" placeholder="advanced-laravel-mastery" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Web Development</option>
                            <option>Design</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Level</label>
                        <select class="form-select">
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Language</label>
                        <select class="form-select">
                            <option>English</option>
                            <option>Spanish</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Short Description</label>
                        <textarea class="form-control" rows="2" placeholder="Brief summary of the course..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Full Description</label>
                        <textarea class="form-control" rows="5" placeholder="Detailed description..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Course Thumbnail</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Preview Video URL</label>
                        <input type="url" class="form-control" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>

            <!-- Step 2: Curriculum -->
            <div class="step-content d-none" id="step-2">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white m-0">Curriculum Setup</h5>
                    <button type="button" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-plus me-2"></i>Add Section</button>
                </div>
                
                <div class="section-box">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-white m-0"><i class="fa-solid fa-grip-vertical drag-handle me-2"></i> Section 1: Introduction</h6>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-light"><i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    
                    <div class="lesson-box">
                        <i class="fa-solid fa-grip-vertical drag-handle"></i>
                        <span class="badge bg-primary">Video</span>
                        <div class="flex-grow-1 text-white">1. Welcome to the course</div>
                        <div class="text-muted small">02:30</div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label text-muted small">Preview</label>
                        </div>
                        <button type="button" class="btn btn-sm text-muted"><i class="fa-solid fa-pen"></i></button>
                    </div>

                    <div class="lesson-box">
                        <i class="fa-solid fa-grip-vertical drag-handle"></i>
                        <span class="badge bg-info">Text</span>
                        <div class="flex-grow-1 text-white">2. Prerequisites & Setup</div>
                        <div class="text-muted small">5 min read</div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label text-muted small">Preview</label>
                        </div>
                        <button type="button" class="btn btn-sm text-muted"><i class="fa-solid fa-pen"></i></button>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-outline-light mt-3"><i class="fa-solid fa-plus me-2"></i>Add Lesson</button>
                </div>
            </div>

            <!-- Step 3: Pricing -->
            <div class="step-content d-none" id="step-3">
                <h5 class="text-white mb-4">Pricing Strategy</h5>
                <div class="row g-4">
                    <div class="col-12 mb-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="freeCourse">
                            <label class="form-check-label text-white" for="freeCourse">This is a free course</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Regular Price ($)</label>
                        <input type="number" class="form-control" placeholder="99.99">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Discount Price ($)</label>
                        <input type="number" class="form-control" placeholder="49.99">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Coupon Code (Optional)</label>
                        <input type="text" class="form-control" placeholder="LAUNCH50">
                    </div>
                </div>
            </div>

            <!-- Step 4: Publish -->
            <div class="step-content d-none" id="step-4">
                <h5 class="text-white mb-4">Review & Publish</h5>
                <div class="alert alert-info bg-info bg-opacity-10 border-info text-info rounded-3 p-4 mb-4">
                    <h6 class="alert-heading"><i class="fa-solid fa-circle-info me-2"></i>Almost there!</h6>
                    <p class="mb-0">Please review your course details. Once submitted, our team will review the course within 24-48 hours before it goes live.</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-check bg-dark p-3 rounded border border-secondary" style="border-color: rgba(255,255,255,0.1)!important;">
                            <input class="form-check-input ms-1 mt-2" type="radio" name="publishStatus" id="saveDraft" checked>
                            <label class="form-check-label ms-3" for="saveDraft">
                                <strong class="text-white d-block">Save as Draft</strong>
                                <span class="text-muted small">Keep it hidden while you continue working on it.</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check bg-dark p-3 rounded border border-secondary" style="border-color: rgba(255,255,255,0.1)!important;">
                            <input class="form-check-input ms-1 mt-2" type="radio" name="publishStatus" id="submitReview">
                            <label class="form-check-label ms-3" for="submitReview">
                                <strong class="text-white d-block">Submit for Review</strong>
                                <span class="text-muted small">Send to admins for approval to publish.</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-5 pt-3 border-top" style="border-color: rgba(255,255,255,0.1)!important;">
                <button type="button" class="btn btn-outline-light px-4" id="prevBtn" style="display:none;">Previous</button>
                <div class="ms-auto">
                    <button type="button" class="btn btn-gradient px-4" id="nextBtn">Next Step</button>
                    <button type="button" class="btn btn-success px-4" id="submitBtn" style="display:none;"><i class="fa-solid fa-check me-2"></i>Finish</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStep = 1;
        const totalSteps = 4;
        
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        function updateUI() {
            // Update steps visibility
            for(let i=1; i<=totalSteps; i++) {
                document.getElementById('step-'+i).classList.add('d-none');
                
                const indicator = document.getElementById('indicator-'+i);
                indicator.classList.remove('active', 'completed');
                if(i < currentStep) indicator.classList.add('completed');
                if(i === currentStep) indicator.classList.add('active');
            }
            document.getElementById('step-'+currentStep).classList.remove('d-none');
            
            // Update buttons
            prevBtn.style.display = currentStep > 1 ? 'inline-block' : 'none';
            if(currentStep === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }
        }
        
        nextBtn.addEventListener('click', () => { if(currentStep < totalSteps) { currentStep++; updateUI(); } });
        prevBtn.addEventListener('click', () => { if(currentStep > 1) { currentStep--; updateUI(); } });
    });
</script>
@endsection
