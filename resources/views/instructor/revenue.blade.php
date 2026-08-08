@extends('layouts.dashboard')
@section('title', 'Revenue & Payouts')
@section('content')
@php
    $transactions = [];
    $courses = ['Advanced Laravel Mastery', 'Vue.js for Beginners', 'Full-Stack Web Dev'];
    for($i=1; $i<=20; $i++) {
        $amount = rand(39, 99) . '.00';
        $transactions[] = [
            'date' => '2023-10-'.str_pad(rand(1,28), 2, '0', STR_PAD_LEFT),
            'desc' => 'Course Enrollment',
            'course' => $courses[array_rand($courses)],
            'amount' => '$'.$amount,
            'status' => 'Completed',
            'type' => 'Sale'
        ];
    }
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 24px; }
    .amount-large { font-size: 2.5rem; font-weight: 700; color: #fff; line-height: 1; margin-bottom: 5px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; padding-top: 15px; padding-bottom: 15px; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; padding-top: 15px; padding-bottom: 15px; }
    .chart-container { height: 300px; width: 100%; position: relative; }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white m-0">Revenue & Payouts</h2>
        <a href="#" class="btn" style="background: linear-gradient(135deg, #00C9A7, #009980); color: white; border: none; border-radius: 8px; padding: 10px 20px;"><i class="fa-solid fa-money-bill-transfer me-2"></i>Withdraw Funds</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="dashboard-card h-100" style="background: linear-gradient(135deg, rgba(108, 99, 255, 0.2), rgba(15, 52, 96, 1)); border-color: rgba(108, 99, 255, 0.3);">
                <div class="text-muted text-uppercase small fw-bold mb-3">Total Earnings</div>
                <div class="amount-large">$12,450.00</div>
                <div class="text-success small"><i class="fa-solid fa-arrow-trend-up me-1"></i> Lifetime</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">This Month</div>
                <div class="amount-large">$2,850.50</div>
                <div class="text-success small"><i class="fa-solid fa-arrow-trend-up me-1"></i> +12.5% from last month</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">Pending Clearance</div>
                <div class="amount-large text-warning">$450.00</div>
                <div class="text-muted small">Clears in 14 days</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card h-100">
                <div class="text-muted text-uppercase small fw-bold mb-3">Available for Withdrawal</div>
                <div class="amount-large text-success">$1,200.00</div>
                <div class="text-muted small">Minimum $50</div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Revenue Over Time</h5>
                <div class="chart-container">
                    <canvas id="revLineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Earnings by Course</h5>
                <div class="chart-container">
                    <canvas id="revBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <h5 class="text-white mb-4">Transaction History</h5>
        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Course</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $tx)
                    <tr>
                        <td class="text-muted">{{ $tx['date'] }}</td>
                        <td class="text-white">{{ $tx['desc'] }}</td>
                        <td><span class="text-truncate d-inline-block" style="max-width: 200px; color: #aaa;">{{ $tx['course'] }}</span></td>
                        <td><span class="badge bg-secondary">{{ $tx['type'] }}</span></td>
                        <td class="text-success fw-bold">{{ $tx['amount'] }}</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">{{ $tx['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Line Chart
        new Chart(document.getElementById('revLineChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Revenue',
                    data: [500, 800, 600, 950],
                    borderColor: '#00C9A7',
                    backgroundColor: 'rgba(0, 201, 167, 0.1)',
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

        // Bar Chart
        new Chart(document.getElementById('revBarChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Laravel', 'Vue.js', 'Full-Stack'],
                datasets: [{
                    data: [6500, 3200, 2750],
                    backgroundColor: ['#6C63FF', '#00C9A7', '#FF6584'],
                    borderRadius: 4
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#aaa' } },
                    y: { grid: { display: false }, ticks: { color: '#aaa' } }
                }
            }
        });
    });
</script>
@endsection
