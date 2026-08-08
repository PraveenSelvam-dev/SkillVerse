@extends('layouts.dashboard')

@section('title', 'Ticket Details')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="{{ url('admin/support') }}" class="text-muted text-decoration-none mb-2 d-inline-block"><i class="fas fa-arrow-left me-1"></i> Back to Tickets</a>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-1 text-white">Cannot access purchased course</h1>
                <p class="text-muted mb-0">Ticket #TK-4920 &bull; Created 2 days ago</p>
            </div>
            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Priority: High
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item text-info" href="#">Low</a></li>
                        <li><a class="dropdown-item text-warning" href="#">Medium</a></li>
                        <li><a class="dropdown-item text-danger" href="#">High</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Status: Open
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Open</a></li>
                        <li><a class="dropdown-item" href="#">In Progress</a></li>
                        <li><a class="dropdown-item" href="#">Resolved</a></li>
                        <li><a class="dropdown-item" href="#">Closed</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card bg-darker border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <!-- Messages Thread -->
                    <div class="d-flex flex-column gap-4">
                        <!-- User Message -->
                        <div class="d-flex">
                            <div class="avatar avatar-md me-3 bg-secondary rounded-circle text-center text-white flex-shrink-0" style="width: 40px; height: 40px; line-height: 40px;">
                                U
                            </div>
                            <div class="flex-grow-1">
                                <div class="bg-dark p-3 rounded border border-secondary border-opacity-25">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="text-white mb-0">User Name</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <p class="text-light mb-0 text-break">
                                        Hi, I recently purchased the "Mastering Laravel 10" course, but it's not showing up in my dashboard under "My Courses". My payment went through and I got the receipt. Can you help?
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Admin Reply -->
                        <div class="d-flex flex-row-reverse">
                            <div class="avatar avatar-md ms-3 bg-primary rounded-circle text-center text-white flex-shrink-0" style="width: 40px; height: 40px; line-height: 40px;">
                                A
                            </div>
                            <div class="flex-grow-1">
                                <div class="bg-primary bg-opacity-10 p-3 rounded border border-primary border-opacity-25">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="text-white mb-0">Admin (You)</h6>
                                        <small class="text-muted">1 day ago</small>
                                    </div>
                                    <p class="text-light mb-0 text-break">
                                        Hello! I'm sorry to hear you're experiencing this issue. I've checked your account and it seems there was a slight delay in syncing the payment status with our enrollment database. 
                                        I have manually triggered the sync. Could you please refresh your dashboard and check if the course is there now?
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Reply -->
                        <div class="d-flex">
                            <div class="avatar avatar-md me-3 bg-secondary rounded-circle text-center text-white flex-shrink-0" style="width: 40px; height: 40px; line-height: 40px;">
                                U
                            </div>
                            <div class="flex-grow-1">
                                <div class="bg-dark p-3 rounded border border-secondary border-opacity-25">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="text-white mb-0">User Name</h6>
                                        <small class="text-muted">5 hours ago</small>
                                    </div>
                                    <p class="text-light mb-0 text-break">
                                        Thanks for the quick reply. It's still not there. I even tried logging out and back in.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reply Form -->
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="text-white mb-3">Post a Reply</h5>
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control bg-dark border-secondary text-white" rows="5" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input bg-dark border-secondary" type="checkbox" id="closeTicket">
                                <label class="form-check-label text-light" for="closeTicket">Mark as resolved</label>
                            </div>
                            <button type="button" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Send Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <!-- User Info Sidebar -->
            <div class="card bg-darker border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-secondary pt-4 pb-2">
                    <h5 class="text-white mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="avatar avatar-lg bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            U
                        </div>
                        <h6 class="text-white mb-0">User Name</h6>
                        <small class="text-muted">user@example.com</small>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Role:</span>
                            <span class="text-light small">Student</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Joined:</span>
                            <span class="text-light small">Jan 15, 2026</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="text-muted small">Total Courses:</span>
                            <span class="text-light small">3</span>
                        </li>
                    </ul>
                    <div class="mt-3 text-center">
                        <a href="{{ url('admin/users/1') }}" class="btn btn-sm btn-outline-secondary w-100">View Profile</a>
                    </div>
                </div>
            </div>
            
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-header bg-transparent border-secondary pt-4 pb-2">
                    <h5 class="text-white mb-0">Ticket Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <small class="text-muted d-block">Assigned To</small>
                            <select class="form-select form-select-sm bg-dark border-secondary text-white mt-1">
                                <option>Unassigned</option>
                                <option selected>Admin (You)</option>
                                <option>Support Staff 1</option>
                            </select>
                        </li>
                        <li>
                            <small class="text-muted d-block">Category</small>
                            <span class="text-light">Payment / Enrollment</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
