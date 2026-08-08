@extends('layouts.dashboard')
@section('title', 'Analytics')
@section('content')
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 24px; }
    .stat-val { font-size: 2rem; font-weight: 700; color: #fff; line-height: 1.2; }
    .chart-container { height: 300px; width: 100%; position: relative; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .pro-tip { background: linear-gradient(135deg, rgba(108, 99, 255, 0.1), rgba(255, 101, 132, 0.1)); border-left: 4px solid #6C63FF; }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white m-0">Analytics & Insights</h2>
        <select class="form-select w-auto bg-dark text-white border-secondary">
            <option>Last 30 Days</option>
            <option>Last 3 Months</option>
            <option>This Year</option>
            <option>All Time</option>
        </select>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="dashboard-card text-center h-100">
                <div class="text-muted text-uppercase small fw-bold mb-2">Enrollments</div>
                <div class="stat-val">342</div>
                <div class="text-success small mt-2"><i class="fa-solid fa-arrow-up me-1"></i> 12% vs last period</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-center h-100">
                <div class="text-muted text-uppercase small fw-bold mb-2">Revenue</div>
                <div class="stat-val">$4,250</div>
                <div class="text-success small mt-2"><i class="fa-solid fa-arrow-up me-1"></i> 8% vs last period</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-center h-100">
                <div class="text-muted text-uppercase small fw-bold mb-2">Course Views</div>
                <div class="stat-val">12.4k</div>
                <div class="text-danger small mt-2"><i class="fa-solid fa-arrow-down me-1"></i> 3% vs last period</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-center h-100">
                <div class="text-muted text-uppercase small fw-bold mb-2">Completion Rate</div>
                <div class="stat-val">42%</div>
                <div class="text-success small mt-2"><i class="fa-solid fa-arrow-up me-1"></i> 5% vs last period</div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Enrollment Trend</h5>
                <div class="chart-container">
                    <canvas id="enrollmentChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Revenue by Course</h5>
                <div class="chart-container">
                    <canvas id="revenueByCourse"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Top Countries</h5>
                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom mb-0">
                        <tbody>
                            <tr><td><i class="fa-solid fa-flag-usa me-2 text-muted"></i> United States</td><td class="text-end">45%</td></tr>
                            <tr><td><i class="fa-solid fa-globe me-2 text-muted"></i> United Kingdom</td><td class="text-end">15%</td></tr>
                            <tr><td><i class="fa-solid fa-globe me-2 text-muted"></i> India</td><td class="text-end">12%</td></tr>
                            <tr><td><i class="fa-solid fa-globe me-2 text-muted"></i> Canada</td><td class="text-end">8%</td></tr>
                            <tr><td><i class="fa-solid fa-globe me-2 text-muted"></i> Australia</td><td class="text-end">5%</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Most Engaging Lessons</h5>
                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom">
                        <thead>
                            <tr>
                                <th>Lesson Name</th>
                                <th>Course</th>
                                <th>Views</th>
                                <th>Avg. Watch Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-white">Setting up the Environment</td>
                                <td>Advanced Laravel Mastery</td>
                                <td>1,245</td>
                                <td>95%</td>
                            </tr>
                            <tr>
                                <td class="text-white">Understanding Eloquent</td>
                                <td>Advanced Laravel Mastery</td>
                                <td>1,102</td>
                                <td>88%</td>
                            </tr>
                            <tr>
                                <td class="text-white">Vue Router Basics</td>
                                <td>Vue.js for Beginners</td>
                                <td>890</td>
                                <td>92%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="dashboard-card pro-tip">
        <h5 class="text-white"><i class="fa-solid fa-lightbulb text-warning me-2"></i>Pro Tip</h5>
        <p class="text-muted mb-0">Your course "Advanced Laravel Mastery" has a high drop-off rate in Section 4. Consider splitting the long videos into shorter, 5-10 minute segments to improve student retention and completion rates.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enrollment Chart
        new Chart(document.getElementById('enrollmentChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['1st', '5th', '10th', '15th', '20th', '25th', '30th'],
                datasets: [{
                    label: 'Enrollments',
                    data: [12, 19, 15, 25, 22, 30, 28],
                    borderColor: '#6C63FF',
                    backgroundColor: 'rgba(108, 99, 255, 0.1)',
                    borderWidth: 2, tension: 0.4, fill: true
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#aaa' } },
                    x: { grid: { display: false }, ticks: { color: '#aaa' } }
                }
            }
        });

        // Doughnut Chart
        new Chart(document.getElementById('revenueByCourse').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Laravel', 'Vue.js', 'UI/UX'],
                datasets: [{
                    data: [55, 30, 15],
                    backgroundColor: ['#6C63FF', '#00C9A7', '#FF6584'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#aaa' } }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endsection
