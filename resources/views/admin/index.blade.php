@extends('layouts.dashboard')

@section('title', 'Admin Dashboard Overview')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Welcome back, Admin</h1>
            <p class="text-muted mb-0">Here's what's happening on SkillVerse today.</p>
        </div>
        <div>
            <a href="#" class="btn btn-primary"><i class="fas fa-download me-2"></i>Download Report</a>
        </div>
    </div>

    <!-- Stats Row 1 -->
    <div class="row g-4 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Users</h6>
                        <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                            <i class="fas fa-users fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">2,450</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 12.5% since last month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Students</h6>
                        <div class="icon-shape bg-info bg-opacity-10 text-info rounded-circle p-3">
                            <i class="fas fa-user-graduate fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">1,890</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 8.2% since last month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Instructors</h6>
                        <div class="icon-shape bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                            <i class="fas fa-chalkboard-teacher fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">156</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 4.1% since last month</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Row 2 -->
    <div class="row g-4 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Revenue</h6>
                        <div class="icon-shape bg-success bg-opacity-10 text-success rounded-circle p-3">
                            <i class="fas fa-dollar-sign fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">$89,500</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 18.2% since last month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Active Courses</h6>
                        <div class="icon-shape bg-danger bg-opacity-10 text-danger rounded-circle p-3">
                            <i class="fas fa-video fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">245</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 12 new this month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Support Tickets</h6>
                        <div class="icon-shape bg-secondary bg-opacity-10 text-secondary rounded-circle p-3">
                            <i class="fas fa-ticket-alt fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">12 <span class="fs-6 text-muted">open</span></h3>
                    <p class="text-danger mb-0 small"><i class="fas fa-arrow-down me-1"></i> 5 urgent tickets</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 pb-0">
                    <h5 class="text-white mb-0">Platform Revenue</h5>
                </div>
                <div class="card-body">
                    <canvas id="platformRevenueChart" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 pb-0">
                    <h5 class="text-white mb-0">User Growth</h5>
                </div>
                <div class="card-body">
                    <canvas id="userGrowthChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Row -->
    <div class="row g-4 mb-4">
        <!-- Recent Registrations -->
        <div class="col-xl-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                    <h5 class="text-white mb-0">Recent Registrations</h5>
                    <a href="{{ url('admin/users') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0 align-middle">
                            <thead class="text-muted small">
                                <tr>
                                    <th class="ps-4">User</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $recentUsers = [
                                    ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'student', 'date' => '2 mins ago'],
                                    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'instructor', 'date' => '1 hour ago'],
                                    ['name' => 'Robert Johnson', 'email' => 'robert@example.com', 'role' => 'student', 'date' => '3 hours ago'],
                                    ['name' => 'Emily Davis', 'email' => 'emily@example.com', 'role' => 'mentor', 'date' => '5 hours ago'],
                                    ['name' => 'Michael Wilson', 'email' => 'michael@example.com', 'role' => 'freelancer', 'date' => '1 day ago'],
                                    ['name' => 'Sarah Brown', 'email' => 'sarah@example.com', 'role' => 'student', 'date' => '1 day ago'],
                                    ['name' => 'David Taylor', 'email' => 'david@example.com', 'role' => 'student', 'date' => '2 days ago'],
                                    ['name' => 'Jessica Anderson', 'email' => 'jessica@example.com', 'role' => 'instructor', 'date' => '2 days ago'],
                                    ['name' => 'William Thomas', 'email' => 'william@example.com', 'role' => 'student', 'date' => '3 days ago'],
                                    ['name' => 'Ashley Jackson', 'email' => 'ashley@example.com', 'role' => 'student', 'date' => '3 days ago'],
                                ];
                                $roleColors = [
                                    'student' => 'primary',
                                    'instructor' => 'purple',
                                    'mentor' => 'success',
                                    'freelancer' => 'warning',
                                    'admin' => 'danger'
                                ];
                                @endphp
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3 bg-secondary rounded-circle text-center text-white" style="width:32px; height:32px; line-height:32px;">
                                                {{ substr($user['name'], 0, 1) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-white">{{ $user['name'] }}</h6>
                                                <small class="text-muted">{{ $user['email'] }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $roleColors[$user['role']] ?? 'secondary' }} text-white px-3 py-1 rounded-pill">
                                            {{ ucfirst($user['role']) }}
                                        </span>
                                    </td>
                                    <td><small class="text-muted">{{ $user['date'] }}</small></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="col-xl-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                    <h5 class="text-white mb-0">Recent Transactions</h5>
                    <a href="{{ url('admin/payments') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0 align-middle">
                            <thead class="text-muted small">
                                <tr>
                                    <th class="ps-4">User</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $transactions = [
                                    ['user' => 'John Doe', 'type' => 'Course Purchase', 'amount' => '$49.99', 'status' => 'completed', 'date' => 'Today'],
                                    ['user' => 'Jane Smith', 'type' => 'Withdrawal', 'amount' => '$250.00', 'status' => 'pending', 'date' => 'Today'],
                                    ['user' => 'Robert Johnson', 'type' => 'Mentoring Session', 'amount' => '$75.00', 'status' => 'completed', 'date' => 'Yesterday'],
                                    ['user' => 'Emily Davis', 'type' => 'Course Purchase', 'amount' => '$19.99', 'status' => 'completed', 'date' => 'Yesterday'],
                                    ['user' => 'Michael Wilson', 'type' => 'Freelance Milestone', 'amount' => '$500.00', 'status' => 'processing', 'date' => 'Yesterday'],
                                    ['user' => 'Sarah Brown', 'type' => 'Course Purchase', 'amount' => '$29.99', 'status' => 'completed', 'date' => '2 days ago'],
                                    ['user' => 'David Taylor', 'type' => 'Withdrawal', 'amount' => '$1,200.00', 'status' => 'completed', 'date' => '2 days ago'],
                                    ['user' => 'Jessica Anderson', 'type' => 'Course Purchase', 'amount' => '$89.99', 'status' => 'refunded', 'date' => '3 days ago'],
                                    ['user' => 'William Thomas', 'type' => 'Subscription', 'amount' => '$15.00', 'status' => 'completed', 'date' => '3 days ago'],
                                    ['user' => 'Ashley Jackson', 'type' => 'Course Purchase', 'amount' => '$49.99', 'status' => 'completed', 'date' => '4 days ago'],
                                ];
                                $statusColors = [
                                    'completed' => 'success',
                                    'pending' => 'warning',
                                    'processing' => 'info',
                                    'refunded' => 'danger'
                                ];
                                @endphp
                                @foreach($transactions as $tx)
                                <tr>
                                    <td class="ps-4">
                                        <h6 class="mb-0 text-white small">{{ $tx['user'] }}</h6>
                                        <small class="text-muted" style="font-size: 0.75rem;">{{ $tx['date'] }}</small>
                                    </td>
                                    <td><small class="text-light">{{ $tx['type'] }}</small></td>
                                    <td><span class="text-white fw-bold">{{ $tx['amount'] }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $statusColors[$tx['status']] }} text-white px-3 py-1 rounded-pill" style="font-size: 0.7rem;">
                                            {{ ucfirst($tx['status']) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & System Health -->
    <div class="row g-4">
        <div class="col-xl-6">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 pt-4 pb-2">
                    <h5 class="text-white mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ url('admin/users') }}" class="btn btn-outline-primary"><i class="fas fa-users me-2"></i>Manage Users</a>
                        <a href="{{ url('admin/courses') }}" class="btn btn-outline-info"><i class="fas fa-video me-2"></i>Manage Courses</a>
                        <a href="{{ url('admin/withdrawals') }}" class="btn btn-outline-warning"><i class="fas fa-money-bill-wave me-2"></i>Review Withdrawals</a>
                        <a href="{{ url('admin/support') }}" class="btn btn-outline-danger"><i class="fas fa-life-ring me-2"></i>Support Tickets</a>
                        <a href="{{ url('admin/settings') }}" class="btn btn-outline-secondary"><i class="fas fa-cog me-2"></i>Settings</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card bg-darker border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 pt-4 pb-2">
                    <h5 class="text-white mb-0">System Health</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-server text-muted fs-4 me-3"></i>
                            <div>
                                <h6 class="text-white mb-0">Server Status</h6>
                                <small class="text-muted">Uptime: 99.9%</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Operational</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-database text-muted fs-4 me-3"></i>
                            <div>
                                <h6 class="text-white mb-0">Database</h6>
                                <small class="text-muted">Load: 12%</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Healthy</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-hdd text-muted fs-4 me-3"></i>
                            <div>
                                <h6 class="text-white mb-0">Storage</h6>
                                <small class="text-muted">Used: 450GB / 1TB</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Good</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Platform Revenue Chart
        const ctxRevenue = document.getElementById('platformRevenueChart').getContext('2d');
        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 42000, 38000, 45000, 52000],
                    borderColor: '#6C63FF',
                    backgroundColor: 'rgba(108, 99, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#a0a0a0' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#a0a0a0' }
                    }
                }
            }
        });

        // User Growth Chart
        const ctxUsers = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(ctxUsers, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'New Users',
                    data: [45, 62, 38, 75, 52, 95, 110],
                    backgroundColor: '#00C9A7',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#a0a0a0' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#a0a0a0' }
                    }
                }
            }
        });
    });
</script>
@endsection
