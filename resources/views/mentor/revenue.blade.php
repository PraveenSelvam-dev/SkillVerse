@extends('layouts.dashboard')

@section('title', 'Revenue - Mentor Dashboard')

@php
    $transactions = [
        ['id' => 'TRX-9082', 'date' => 'Oct 15, 2023', 'student' => 'Diana Prince', 'amount' => 75.00, 'status' => 'Completed'],
        ['id' => 'TRX-9081', 'date' => 'Oct 14, 2023', 'student' => 'Evan Wright', 'amount' => 25.00, 'status' => 'Completed'],
        ['id' => 'TRX-9080', 'date' => 'Oct 12, 2023', 'student' => 'Fiona Gallagher', 'amount' => 50.00, 'status' => 'Completed'],
        ['id' => 'TRX-9079', 'date' => 'Oct 10, 2023', 'student' => 'Platform Fee', 'amount' => -15.00, 'status' => 'Deducted'],
        ['id' => 'TRX-9078', 'date' => 'Oct 05, 2023', 'student' => 'Withdrawal', 'amount' => -500.00, 'status' => 'Processed'],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Revenue & Earnings</h2>
        <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#withdrawModal" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">
            <i class="fas fa-money-bill-wave me-2"></i>Withdraw Funds
        </button>
    </div>

    <!-- Revenue Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <p class="text-muted mb-1">Available Balance</p>
                    <h2 class="text-light fw-bold mb-0">$1,250.00</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <p class="text-muted mb-1">Pending Clearance</p>
                    <h2 class="text-light fw-bold mb-0">$350.00</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <p class="text-muted mb-1">Earned in October</p>
                    <h2 class="text-light fw-bold mb-0">$840.00</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Lifetime Earnings</p>
                    <h2 class="text-light fw-bold mb-0" style="color: #6C63FF !important;">$12,450.00</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary py-3">
                    <h5 class="text-light mb-0">Earnings Overview</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <!-- Placeholder for Chart -->
                    <canvas id="revenueChart" width="400" height="200" style="max-height: 300px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-header bg-transparent border-bottom border-secondary py-3">
                    <h5 class="text-light mb-0">Payout Methods</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between p-3 mb-3 rounded border border-secondary border-opacity-50">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-paypal fs-2 me-3" style="color: #00457C;"></i>
                            <div>
                                <h6 class="text-light mb-0">PayPal</h6>
                                <small class="text-muted">john.doe@example.com</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Default</span>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between p-3 mb-4 rounded border border-secondary border-opacity-50">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-university fs-2 me-3 text-secondary"></i>
                            <div>
                                <h6 class="text-light mb-0">Bank Transfer</h6>
                                <small class="text-muted">**** 1234</small>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-outline-light w-100"><i class="fas fa-plus me-2"></i>Add Payout Method</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-0 shadow-sm mt-4" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-header bg-transparent border-bottom border-secondary py-3">
            <h5 class="text-light mb-0">Transaction History</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 border-bottom border-secondary text-muted">ID</th>
                            <th class="py-3 border-bottom border-secondary text-muted">Date</th>
                            <th class="py-3 border-bottom border-secondary text-muted">Description</th>
                            <th class="py-3 border-bottom border-secondary text-muted">Amount</th>
                            <th class="py-3 border-bottom border-secondary text-muted">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $trx)
                        <tr>
                            <td class="py-3 px-4 border-bottom border-secondary border-opacity-25 text-light">{{ $trx['id'] }}</td>
                            <td class="py-3 border-bottom border-secondary border-opacity-25 text-light">{{ $trx['date'] }}</td>
                            <td class="py-3 border-bottom border-secondary border-opacity-25 text-light">{{ $trx['student'] }}</td>
                            <td class="py-3 border-bottom border-secondary border-opacity-25 fw-bold {{ $trx['amount'] > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $trx['amount'] > 0 ? '+' : '' }}${{ number_format(abs($trx['amount']), 2) }}
                            </td>
                            <td class="py-3 border-bottom border-secondary border-opacity-25">
                                @if($trx['status'] == 'Completed' || $trx['status'] == 'Processed')
                                    <span class="badge bg-success bg-opacity-25 text-success">{{ $trx['status'] }}</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-25 text-light">{{ $trx['status'] }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-0" style="background-color: #1a1a2e !important; border-radius: 16px;">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title text-light">Withdraw Funds</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                    <span class="text-muted">Available Balance:</span>
                    <span class="text-light fw-bold">$1,250.00</span>
                </div>
                <form>
                    <div class="mb-4">
                        <label class="form-label text-light">Amount to Withdraw ($)</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" placeholder="0.00" max="1250">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-light">Withdraw to</label>
                        <select class="form-select bg-dark text-light border-secondary">
                            <option value="paypal">PayPal (john.doe@example.com)</option>
                            <option value="bank">Bank Transfer (**** 1234)</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary w-100 py-2" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">Confirm Withdrawal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Dummy Chart Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(108, 99, 255, 0.5)');
        gradient.addColorStop(1, 'rgba(108, 99, 255, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [450, 600, 800, 750, 1100, 840],
                    borderColor: '#6C63FF',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    pointBackgroundColor: '#FF6584',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
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
                        grid: { color: 'rgba(255,255,255,0.05)', drawBorder: false },
                        ticks: { color: '#aaa' }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { color: '#aaa' }
                    }
                }
            }
        });
    });
</script>
@endsection
