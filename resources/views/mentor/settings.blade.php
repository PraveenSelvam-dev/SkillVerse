@extends('layouts.dashboard')

@section('title', 'Settings - Mentor Dashboard')

@section('content')
<div class="container-fluid py-4">
    <h2 class="text-light fw-bold mb-4">Mentor Profile Settings</h2>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-sm mb-4" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary py-3">
                    <h5 class="text-light mb-0">Public Profile</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row mb-4 align-items-center">
                            <div class="col-auto">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=6C63FF&color=fff" alt="Profile" class="rounded-circle" width="100">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-light mb-2"><i class="fas fa-camera me-2"></i>Change Photo</button>
                                <p class="text-muted small mb-0">Recommended size: 400x400px. Max size: 2MB.</p>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-light">Professional Title</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" value="Senior Full Stack Developer">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-light">Years of Experience</label>
                                <input type="number" class="form-control bg-dark text-light border-secondary" value="8">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light">Areas of Expertise (Comma separated)</label>
                            <input type="text" class="form-control bg-dark text-light border-secondary" value="Laravel, React, System Architecture, AWS">
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Bio</label>
                            <textarea class="form-control bg-dark text-light border-secondary" rows="5">I'm a passionate software engineer with 8 years of experience building scalable web applications. I love helping junior developers find their path and master complex concepts in PHP and JavaScript ecosystems.</textarea>
                            <div class="form-text text-muted">A brief description of yourself, your experience, and how you can help students.</div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary py-3">
                    <h5 class="text-light mb-0">Meeting Preferences</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-light">Preferred Platform</label>
                            <select class="form-select bg-dark text-light border-secondary">
                                <option value="zoom" selected>Zoom</option>
                                <option value="meet">Google Meet</option>
                                <option value="teams">Microsoft Teams</option>
                                <option value="custom">Custom Link</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-light">Default Meeting Link</label>
                            <input type="url" class="form-control bg-dark text-light border-secondary" value="https://zoom.us/j/1234567890">
                            <div class="form-text text-muted">This link will be automatically shared with students when they book a session.</div>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary border-opacity-25">
                            <button type="button" class="btn btn-outline-secondary text-light">Cancel</button>
                            <button type="button" class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save All Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm mb-4" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary py-3">
                    <h5 class="text-light mb-0">Profile Status</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-grow-1">
                            <h6 class="text-light mb-0">Accepting Students</h6>
                            <small class="text-muted">Turn off to hide from search</small>
                        </div>
                        <div class="form-check form-switch fs-4">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <hr class="border-secondary border-opacity-50">
                    <p class="text-muted small mb-3">Your profile is currently <span class="text-success fw-bold">Live</span> and visible to students.</p>
                    <button class="btn btn-outline-info w-100"><i class="fas fa-external-link-alt me-2"></i>View Public Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
