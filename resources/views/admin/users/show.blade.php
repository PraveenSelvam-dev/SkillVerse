@extends('layouts.dashboard')

@section('title', 'User Details')

@section('content')
<div class="container-fluid py-4">
    <!-- User Header Profile -->
    <div class="card bg-darker border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8 d-flex align-items-center">
                    <div class="avatar avatar-xl me-4 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; font-size: 2.5rem;">
                        J
                    </div>
                    <div>
                        <h2 class="h3 mb-1 text-white">John Doe <i class="fas fa-check-circle text-primary fs-5 ms-1" title="Verified"></i></h2>
                        <p class="text-muted mb-2">john.doe@example.com</p>
                        <div class="d-flex gap-2">
                            <span class="badge bg-info bg-opacity-20 text-info px-3 py-2 rounded-pill">Instructor</span>
                            <span class="badge bg-success bg-opacity-20 text-success px-3 py-2 rounded-pill">Active</span>
                            <span class="text-muted small d-flex align-items-center ms-2"><i class="far fa-calendar-alt me-1"></i> Joined: Jan 15, 2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                        <button class="btn btn-outline-primary"><i class="fas fa-envelope me-2"></i>Message</button>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-info"></i>Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-ban me-2 text-warning"></i>Deactivate Account</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-times-circle me-2 text-secondary"></i>Remove Verification</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs border-secondary mb-4" id="userTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active bg-transparent border-0 text-white" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" style="border-bottom: 2px solid #6C63FF !important;">Overview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-transparent border-0 text-muted" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab">Courses</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-transparent border-0 text-muted" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab">Transactions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-transparent border-0 text-muted" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab">Activity</button>
        </li>
    </ul>

    <div class="tab-content" id="userTabsContent">
        <!-- Overview Tab -->
        <div class="tab-pane fade show active" id="overview" role="tabpanel">
            <div class="row g-4">
                <div class="col-xl-4">
                    <div class="card bg-darker border-0 shadow-sm h-100">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">Contact & Info</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-3">
                                    <i class="fas fa-phone text-muted mt-1 me-3 w-20px text-center"></i>
                                    <div>
                                        <small class="text-muted d-block">Phone</small>
                                        <span class="text-white">+1 (555) 123-4567</span>
                                    </div>
                                </li>
                                <li class="d-flex mb-3">
                                    <i class="fas fa-globe text-muted mt-1 me-3 w-20px text-center"></i>
                                    <div>
                                        <small class="text-muted d-block">Website</small>
                                        <a href="#" class="text-primary text-decoration-none">https://johndoe.com</a>
                                    </div>
                                </li>
                                <li class="d-flex mb-3">
                                    <i class="fas fa-map-marker-alt text-muted mt-1 me-3 w-20px text-center"></i>
                                    <div>
                                        <small class="text-muted d-block">Location</small>
                                        <span class="text-white">New York, USA</span>
                                    </div>
                                </li>
                            </ul>
                            
                            <hr class="border-secondary my-4">
                            
                            <h6 class="text-white mb-3">Social Profiles</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-muted hover-primary"><i class="fab fa-twitter fs-5"></i></a>
                                <a href="#" class="text-muted hover-primary"><i class="fab fa-linkedin fs-5"></i></a>
                                <a href="#" class="text-muted hover-primary"><i class="fab fa-github fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-8">
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="card bg-darker border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h3 class="text-white mb-1">12</h3>
                                    <p class="text-muted mb-0">Courses Enrolled</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-darker border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h3 class="text-white mb-1">4</h3>
                                    <p class="text-muted mb-0">Courses Created</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-darker border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <h3 class="text-white mb-1">$4,250</h3>
                                    <p class="text-muted mb-0">Total Spent/Earned</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card bg-darker border-0 shadow-sm">
                        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
                            <h5 class="text-white mb-0">Biography</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                Senior full-stack developer with 10+ years of experience building scalable web applications. Passionate about teaching and sharing knowledge with the community. Specialized in Laravel, Vue.js, and cloud architecture.
                            </p>
                            <p class="text-muted mb-0">
                                Currently working as a Lead Developer at TechCorp, while managing several popular open-source projects on GitHub.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Other tabs would contain their respective content (tables, timelines) -->
        <div class="tab-pane fade" id="courses" role="tabpanel">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-video text-muted fs-1 mb-3"></i>
                    <h5 class="text-white">Courses Content</h5>
                    <p class="text-muted">Displays enrolled and created courses.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="transactions" role="tabpanel">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-receipt text-muted fs-1 mb-3"></i>
                    <h5 class="text-white">Transactions History</h5>
                    <p class="text-muted">Displays user purchases and earnings.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="activity" role="tabpanel">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-history text-muted fs-1 mb-3"></i>
                    <h5 class="text-white">User Activity Log</h5>
                    <p class="text-muted">Displays timeline of user actions (login, updates, enrollments).</p>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Simple script to handle tab switching visual states
    document.querySelectorAll('#userTabs button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('#userTabs button').forEach(btn => {
                btn.classList.remove('text-white');
                btn.classList.add('text-muted');
                btn.style.borderBottom = 'none';
            });
            button.classList.remove('text-muted');
            button.classList.add('text-white');
            button.style.borderBottom = '2px solid #6C63FF';
        });
    });
</script>
@endsection
@endsection
