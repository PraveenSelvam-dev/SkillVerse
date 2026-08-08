@extends('layouts.dashboard')

@section('title', 'Reports & Analytics')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Reports</h1>
            <p class="text-muted mb-0">Platform performance and statistics.</p>
        </div>
        <div class="d-flex gap-2">
            <select class="form-select bg-dark border-secondary text-white" style="width: auto;">
                <option value="week">This Week</option>
                <option value="month" selected>This Month</option>
                <option value="quarter">This Quarter</option>
                <option value="year">This Year</option>
            </select>
            <button class="btn btn-outline-primary"><i class="fas fa-download me-2"></i>PDF</button>
            <button class="btn btn-outline-success"><i class="fas fa-download me-2"></i>CSV</button>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Revenue Report -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-secondary pt-4 pb-2">
                    <h5 class="text-white mb-0">Revenue Breakdown</h5>
                </div>
                <div class="card-body">
                    <h3 class="text-white mb-4">$89,500 <span class="fs-6 text-success"><i class="fas fa-arrow-up"></i> 12%</span></h3>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-light small mb-1">
                            <span>Courses</span>
                            <span>$53,700 (60%)</span>
                        </div>
                        <div class="progress bg-dark" style="height: 6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-light small mb-1">
                            <span>Mentoring</span>
                            <span>$17,900 (20%)</span>
                        </div>
                        <div class="progress bg-dark" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-light small mb-1">
                            <span>Services</span>
                            <span>$13,425 (15%)</span>
                        </div>
                        <div class="progress bg-dark" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between text-light small mb-1">
                            <span>Subscriptions</span>
                            <span>$4,475 (5%)</span>
                        </div>
                        <div class="progress bg-dark" style="height: 6px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Report -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-secondary pt-4 pb-2">
                    <h5 class="text-white mb-0">User Metrics</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <canvas id="userRolesChart" height="200" class="mb-3"></canvas>
                    <div class="row w-100 mt-3">
                        <div class="col-4">
                            <h5 class="text-white mb-0">345</h5>
                            <small class="text-muted">New Signups</small>
                        </div>
                        <div class="col-4 border-start border-end border-secondary">
                            <h5 class="text-white mb-0">1.2k</h5>
                            <small class="text-muted">Active Users</small>
                        </div>
                        <div class="col-4">
                            <h5 class="text-danger mb-0">2.4%</h5>
                            <small class="text-muted">Churn Rate</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Report -->
        <div class="col-xl-4 col-md-12">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-secondary pt-4 pb-2">
                    <h5 class="text-white mb-0">Course Insights</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent border-secondary px-0 d-flex justify-content-between align-items-center">
                            <span class="text-light">New Courses Published</span>
                            <span class="badge bg-primary rounded-pill">24</span>
                        </li>
                        <li class="list-group-item bg-transparent border-secondary px-0 d-flex justify-content-between align-items-center">
                            <span class="text-light">Avg Completion Rate</span>
                            <span class="badge bg-success rounded-pill">68%</span>
                        </li>
                        <li class="list-group-item bg-transparent border-secondary px-0 d-flex justify-content-between align-items-center">
                            <span class="text-light">Total Enrollments</span>
                            <span class="badge bg-info rounded-pill">3,450</span>
                        </li>
                        <li class="list-group-item bg-transparent border-0 px-0 mt-3">
                            <h6 class="text-white mb-2">Popular Categories</h6>
                            <canvas id="topCategoriesChart" height="120"></canvas>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Big Chart -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-header bg-transparent border-secondary pt-4 pb-2">
            <h5 class="text-white mb-0">Revenue Trend</h5>
        </div>
        <div class="card-body">
            <canvas id="revenueTrendChart" height="100"></canvas>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // User Roles Doughnut Chart
        new Chart(document.getElementById('userRolesChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Students', 'Instructors', 'Mentors', 'Freelancers'],
                datasets: [{
                    data: [1890, 156, 85, 319],
                    backgroundColor: ['#6C63FF', '#00C9A7', '#FF6584', '#FFB347'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Top Categories Bar Chart
        new Chart(document.getElementById('topCategoriesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Programming', 'Design', 'Business'],
                datasets: [{
                    data: [1240, 850, 420],
                    backgroundColor: 'rgba(108, 99, 255, 0.7)',
                    borderRadius: 4
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: { grid: { display: false }, ticks: { color: '#a0a0a0', font: {size: 10} } }
                }
            }
        });

        // Revenue Trend Line Chart
        new Chart(document.getElementById('revenueTrendChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Revenue',
                    data: [15000, 22000, 18000, 34500],
                    borderColor: '#00C9A7',
                    backgroundColor: 'rgba(0, 201, 167, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: 'rgba(255, 255, 255, 0.05)' }, ticks: { color: '#a0a0a0' } },
                    x: { grid: { display: false }, ticks: { color: '#a0a0a0' } }
                }
            }
        });
    });
</script>
@endsection
@endsection
