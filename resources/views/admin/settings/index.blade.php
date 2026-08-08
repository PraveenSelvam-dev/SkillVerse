@extends('layouts.dashboard')

@section('title', 'Site Settings')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h1 class="h3 mb-0 text-white">Site Settings</h1>
        <p class="text-muted mb-0">Manage global platform configuration.</p>
    </div>

    <div class="row g-4">
        <!-- Settings Sidebar Navigation -->
        <div class="col-md-3">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active bg-transparent text-start text-white border-0 py-3 px-4 rounded-0 border-bottom border-secondary border-opacity-25" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab">
                            <i class="fas fa-cog me-2 text-primary w-20px"></i> General Settings
                        </button>
                        <button class="nav-link bg-transparent text-start text-white border-0 py-3 px-4 rounded-0 border-bottom border-secondary border-opacity-25" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab">
                            <i class="fas fa-credit-card me-2 text-success w-20px"></i> Payment Configuration
                        </button>
                        <button class="nav-link bg-transparent text-start text-white border-0 py-3 px-4 rounded-0 border-bottom border-secondary border-opacity-25" data-bs-toggle="pill" data-bs-target="#v-pills-email" type="button" role="tab">
                            <i class="fas fa-envelope me-2 text-info w-20px"></i> Email & SMTP
                        </button>
                        <button class="nav-link bg-transparent text-start text-white border-0 py-3 px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab">
                            <i class="fas fa-shield-alt me-2 text-warning w-20px"></i> Security
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel">
                    <div class="card bg-darker border-0 shadow-sm">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">General Settings</h5>
                        </div>
                        <div class="card-body p-4">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-light">Site Name</label>
                                        <input type="text" class="form-control bg-dark border-secondary text-white" value="SkillVerse">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Site URL</label>
                                        <input type="url" class="form-control bg-dark border-secondary text-white" value="https://skillverse.com">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-light">Site Logo (Light)</label>
                                        <input type="file" class="form-control bg-dark border-secondary text-muted">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Site Favicon</label>
                                        <input type="file" class="form-control bg-dark border-secondary text-muted">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-light">Site Description (SEO)</label>
                                    <textarea class="form-control bg-dark border-secondary text-white" rows="3">SkillVerse is a comprehensive platform for learning, teaching, mentoring, and freelancing.</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-light">Footer Text</label>
                                    <input type="text" class="form-control bg-dark border-secondary text-white" value="© 2026 SkillVerse. All rights reserved.">
                                </div>
                                <button type="button" class="btn btn-primary">Save General Settings</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Payment Settings -->
                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel">
                    <div class="card bg-darker border-0 shadow-sm">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">Payment Configuration</h5>
                        </div>
                        <div class="card-body p-4">
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label text-light">Currency</label>
                                        <select class="form-select bg-dark border-secondary text-white">
                                            <option value="USD" selected>USD ($)</option>
                                            <option value="EUR">EUR (€)</option>
                                            <option value="GBP">GBP (£)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Minimum Withdrawal Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark border-secondary text-muted">$</span>
                                            <input type="number" class="form-control bg-dark border-secondary text-white" value="50">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label text-light">Platform Commission Rate (%)</label>
                                    <div class="input-group w-50">
                                        <input type="number" class="form-control bg-dark border-secondary text-white" value="20">
                                        <span class="input-group-text bg-dark border-secondary text-muted">%</span>
                                    </div>
                                    <small class="text-muted">Percentage of earnings the platform keeps.</small>
                                </div>

                                <hr class="border-secondary my-4">
                                <h6 class="text-white mb-3">Payment Gateways</h6>
                                
                                <div class="mb-3 p-3 bg-dark rounded border border-secondary border-opacity-25">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fab fa-stripe text-primary fs-3 me-3"></i>
                                            <h6 class="text-white mb-0">Stripe</h6>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm bg-darker border-secondary text-white" placeholder="Public Key">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-sm bg-darker border-secondary text-white" placeholder="Secret Key">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 p-3 bg-dark rounded border border-secondary border-opacity-25">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fab fa-paypal text-info fs-3 me-3"></i>
                                            <h6 class="text-white mb-0">PayPal</h6>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm bg-darker border-secondary text-white" placeholder="Client ID">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-sm bg-darker border-secondary text-white" placeholder="Secret">
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn btn-primary">Save Payment Settings</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Email Settings (Placeholder to show structure) -->
                <div class="tab-pane fade" id="v-pills-email" role="tabpanel">
                    <div class="card bg-darker border-0 shadow-sm">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">SMTP Settings</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-muted">Configure mail settings here.</p>
                        </div>
                    </div>
                </div>

                <!-- Security Settings (Placeholder) -->
                <div class="tab-pane fade" id="v-pills-security" role="tabpanel">
                    <div class="card bg-darker border-0 shadow-sm">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">Security</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-muted">Configure security settings here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Custom active state logic for vertical pills if needed
    document.querySelectorAll('#v-pills-tab button').forEach(button => {
        button.addEventListener('click', (e) => {
            document.querySelectorAll('#v-pills-tab button').forEach(btn => btn.classList.remove('active', 'bg-dark'));
            e.target.closest('button').classList.add('active', 'bg-dark');
        });
    });
</script>
@endsection
@endsection
