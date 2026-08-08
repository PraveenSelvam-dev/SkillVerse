@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .nav-pills .nav-link {
        color: #a0a0a0;
        border-radius: 8px;
        padding: 10px 20px;
        margin-bottom: 5px;
        text-align: left;
    }
    .nav-pills .nav-link.active {
        background: rgba(108, 99, 255, 0.2);
        color: #6C63FF;
        border-left: 3px solid #6C63FF;
    }
    .form-control, .form-select {
        background-color: #1a1a2e;
        border: 1px solid rgba(255,255,255,0.1);
        color: #e0e0e0;
    }
    .form-control:focus, .form-select:focus {
        background-color: #16213e;
        border-color: #6C63FF;
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }
    .avatar-upload {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #1a1a2e;
        border: 2px dashed rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #a0a0a0;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-upload:hover {
        border-color: #6C63FF;
        color: #6C63FF;
    }
    .form-switch .form-check-input {
        background-color: #333;
        border-color: #555;
    }
    .form-switch .form-check-input:checked {
        background-color: #00C9A7;
        border-color: #00C9A7;
    }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Account Settings</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="glass-card p-3 position-sticky" style="top: 20px;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"><i class="fa-regular fa-user me-2"></i> Profile</button>
                    <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab"><i class="fa-solid fa-shield-halved me-2"></i> Account & Security</button>
                    <button class="nav-link" id="v-pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notifications" type="button" role="tab"><i class="fa-regular fa-bell me-2"></i> Notifications</button>
                    <button class="nav-link" id="v-pills-privacy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-privacy" type="button" role="tab"><i class="fa-solid fa-lock me-2"></i> Privacy</button>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="glass-card p-4">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                        <h4 class="text-white mb-4">Public Profile</h4>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar-upload me-4">
                                <i class="fa-solid fa-camera fs-3"></i>
                                <img src="https://ui-avatars.com/api/?name=Alex+D&background=6C63FF&color=fff" class="position-absolute w-100 h-100" style="object-fit: cover; opacity: 0.8;">
                            </div>
                            <div>
                                <h6 class="text-white">Profile Photo</h6>
                                <p class="text-muted small mb-2">JPG, GIF or PNG. Max size of 2MB.</p>
                                <button class="btn btn-outline-light btn-sm">Upload New</button>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted">First Name</label>
                                <input type="text" class="form-control" value="Alex">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Last Name</label>
                                <input type="text" class="form-control" value="Developer">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Headline (Bio)</label>
                            <input type="text" class="form-control" value="Enthusiastic Learner & Aspiring Fullstack Developer">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">About Me</label>
                            <textarea class="form-control" rows="4">I love learning new technologies and building cool web apps.</textarea>
                        </div>
                        
                        <h5 class="text-white mt-4 mb-3">Social Links</h5>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-muted"><i class="fa-brands fa-github"></i></span>
                                <input type="text" class="form-control" placeholder="GitHub URL">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-muted"><i class="fa-brands fa-linkedin"></i></span>
                                <input type="text" class="form-control" placeholder="LinkedIn URL">
                            </div>
                        </div>

                        <button class="btn btn-primary" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save Changes</button>
                    </div>

                    <!-- Account Tab -->
                    <div class="tab-pane fade" id="v-pills-account" role="tabpanel">
                        <h4 class="text-white mb-4">Account Security</h4>
                        
                        <div class="mb-4">
                            <label class="form-label text-muted">Email Address</label>
                            <input type="email" class="form-control" value="alex@example.com" disabled>
                            <div class="form-text text-muted">To change your email, please contact support.</div>
                        </div>

                        <h5 class="text-white mt-4 mb-3">Change Password</h5>
                        <div class="mb-3">
                            <label class="form-label text-muted">Current Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted">Confirm New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        
                        <button class="btn btn-primary mb-5" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Update Password</button>

                        <hr style="border-color: rgba(255,255,255,0.1);">

                        <h5 class="text-danger mt-4 mb-2">Delete Account</h5>
                        <p class="text-muted small">Once you delete your account, there is no going back. Please be certain.</p>
                        <button class="btn btn-outline-danger">Delete My Account</button>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel">
                        <h4 class="text-white mb-4">Notification Preferences</h4>
                        
                        <div class="mb-4">
                            <h6 class="text-white mb-3">Email Notifications</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="n1" checked>
                                <label class="form-check-label text-white" for="n1">Course Updates & Announcements</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="n2" checked>
                                <label class="form-check-label text-white" for="n2">Mentor Messages</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="n3">
                                <label class="form-check-label text-white" for="n3">Promotions and Offers</label>
                            </div>
                        </div>

                        <div>
                            <h6 class="text-white mb-3">Push Notifications</h6>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="n4" checked>
                                <label class="form-check-label text-white" for="n4">New Messages</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="n5" checked>
                                <label class="form-check-label text-white" for="n5">Mentor Session Reminders</label>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary mt-3" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save Preferences</button>
                    </div>

                    <!-- Privacy Tab -->
                    <div class="tab-pane fade" id="v-pills-privacy" role="tabpanel">
                        <h4 class="text-white mb-4">Privacy Settings</h4>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="p1" checked>
                            <label class="form-check-label text-white" for="p1">Make my profile visible to other students</label>
                        </div>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="p2">
                            <label class="form-check-label text-white" for="p2">Show my enrolled courses on my profile</label>
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" id="p3">
                            <label class="form-check-label text-white" for="p3">Allow search engines to index my profile</label>
                        </div>
                        
                        <button class="btn btn-primary" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Save Privacy Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
