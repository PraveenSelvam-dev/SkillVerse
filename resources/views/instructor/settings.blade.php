@extends('layouts.dashboard')
@section('title', 'Instructor Settings')
@section('content')
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 30px; }
    .form-control, .form-select { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px 15px; }
    .form-control:focus, .form-select:focus { background: #16213e; border-color: #6C63FF; color: #fff; box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25); }
    .form-label { color: #e0e0e0; font-weight: 500; }
    .btn-gradient { background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; }
    .nav-tabs-custom { border-bottom: 1px solid rgba(255,255,255,0.1); }
    .nav-tabs-custom .nav-link { color: #aaa; border: none; border-bottom: 2px solid transparent; padding: 10px 20px; font-weight: 500; }
    .nav-tabs-custom .nav-link:hover { color: #fff; }
    .nav-tabs-custom .nav-link.active { color: #6C63FF; background: transparent; border-bottom: 2px solid #6C63FF; }
    .avatar-upload { width: 100px; height: 100px; border-radius: 50%; background: #16213e; border: 2px dashed rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; flex-direction: column; cursor: pointer; transition: all 0.2s; position: relative; overflow: hidden; }
    .avatar-upload:hover { border-color: #6C63FF; color: #6C63FF; }
    .input-group-text { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #aaa; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Instructor Profile & Settings</h2>

    <div class="dashboard-card p-0 overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-custom px-4 pt-3" id="settingsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">Public Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="payout-tab" data-bs-toggle="tab" data-bs-target="#payout" type="button" role="tab">Payout Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">Social Links</button>
            </li>
        </ul>

        <div class="tab-content p-4" id="settingsTabsContent">
            <!-- Profile Tab -->
            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <form>
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-upload me-4">
                            <i class="fa-solid fa-camera mb-1"></i>
                            <span class="small">Upload</span>
                        </div>
                        <div>
                            <h6 class="text-white mb-1">Profile Picture</h6>
                            <p class="text-muted small mb-0">Recommended size: 400x400px. Max size: 2MB.</p>
                        </div>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Display Name</label>
                            <input type="text" class="form-control" value="Jane Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Professional Headline</label>
                            <input type="text" class="form-control" value="Senior Full-Stack Developer">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Biography / About Me</label>
                            <textarea class="form-control" rows="5">I am a passionate software engineer with 10+ years of experience...</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Areas of Expertise (Comma separated)</label>
                            <input type="text" class="form-control" value="Laravel, Vue.js, MySQL, Tailwind CSS">
                        </div>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-gradient px-4">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Payout Tab -->
            <div class="tab-pane fade" id="payout" role="tabpanel">
                <form>
                    <div class="alert alert-info bg-info bg-opacity-10 border-info text-info rounded-3 p-3 mb-4">
                        <i class="fa-solid fa-shield-halved me-2"></i> Your payout information is stored securely and encrypted.
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Preferred Payout Method</label>
                        <select class="form-select">
                            <option>Bank Transfer</option>
                            <option selected>PayPal</option>
                            <option>Stripe</option>
                        </select>
                    </div>

                    <div class="row g-4 bg-dark bg-opacity-50 p-3 rounded border border-secondary" style="border-color: rgba(255,255,255,0.05)!important;">
                        <h6 class="text-white mb-0 w-100">PayPal Details</h6>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">PayPal Email Address</label>
                            <input type="email" class="form-control" value="instructor@example.com">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Confirm Email</label>
                            <input type="email" class="form-control" value="instructor@example.com">
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-gradient px-4">Save Payout Info</button>
                    </div>
                </form>
            </div>

            <!-- Social Tab -->
            <div class="tab-pane fade" id="social" role="tabpanel">
                <form>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Personal Website / Portfolio</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-globe"></i></span>
                                <input type="url" class="form-control" placeholder="https://yourwebsite.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-brands fa-linkedin"></i></span>
                                <input type="url" class="form-control" placeholder="https://linkedin.com/in/username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter / X</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-brands fa-x-twitter"></i></span>
                                <input type="url" class="form-control" placeholder="https://twitter.com/username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube Channel</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-brands fa-youtube"></i></span>
                                <input type="url" class="form-control" placeholder="https://youtube.com/c/username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">GitHub</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-brands fa-github"></i></span>
                                <input type="url" class="form-control" placeholder="https://github.com/username">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-gradient px-4">Update Links</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
