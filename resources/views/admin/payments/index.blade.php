@extends('layouts.dashboard')

@section('title', 'Payment Management')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Financial Transactions</h1>
            <p class="text-muted mb-0">Overview of all platform payments and earnings.</p>
        </div>
        <div>
            <button class="btn btn-outline-primary"><i class="fas fa-file-export me-2"></i>Export CSV</button>
        </div>
    </div>

    <!-- Revenue Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Revenue</h6>
                        <div class="icon-shape bg-success bg-opacity-10 text-success rounded-circle p-2">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-0">$89,500</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Platform Commission</h6>
                        <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-circle p-2">
                            <i class="fas fa-percentage"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-0">$17,900</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Instructor Earnings</h6>
                        <div class="icon-shape bg-info bg-opacity-10 text-info rounded-circle p-2">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-0">$71,600</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Pending Payouts</h6>
                        <div class="icon-shape bg-warning bg-opacity-10 text-warning rounded-circle p-2">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-0">$4,200</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Table -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-header bg-transparent border-secondary pt-4 pb-3">
            <form class="row g-3">
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Types</option>
                        <option value="purchase">Purchase</option>
                        <option value="earning">Earning</option>
                        <option value="withdrawal">Withdrawal</option>
                        <option value="refund">Refund</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Statuses</option>
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>User</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $types = ['purchase', 'earning', 'withdrawal', 'refund', 'commission'];
                        $typeColors = [
                            'purchase' => 'info',
                            'earning' => 'success',
                            'withdrawal' => 'warning',
                            'refund' => 'danger',
                            'commission' => 'primary'
                        ];
                        $statuses = ['completed', 'pending', 'failed'];
                        $statusColors = [
                            'completed' => 'success',
                            'pending' => 'warning',
                            'failed' => 'danger'
                        ];
                        
                        $transactions = [];
                        for($i=1; $i<=25; $i++) {
                            $type = $types[array_rand($types)];
                            $status = $statuses[array_rand($statuses)];
                            
                            $amount = match($type) {
                                'purchase' => rand(15, 150) . '.99',
                                'withdrawal' => rand(50, 500) . '.00',
                                'refund' => rand(15, 50) . '.99',
                                default => rand(10, 100) . '.00'
                            };
                            
                            $prefix = in_array($type, ['earning', 'commission']) ? '+' : '-';
                            if($type == 'purchase') $prefix = '';
                            
                            $transactions[] = [
                                'id' => 'TXN-' . rand(10000, 99999),
                                'user' => 'User ' . $i,
                                'type' => $type,
                                'desc' => ucfirst($type) . ' detail goes here',
                                'amount' => $prefix . '$' . $amount,
                                'status' => $status,
                                'date' => rand(1, 30) . ' days ago'
                            ];
                        }
                        @endphp
                        
                        @foreach($transactions as $tx)
                        <tr>
                            <td class="ps-4 text-muted"><small>{{ $tx['id'] }}</small></td>
                            <td><h6 class="mb-0 text-white small">{{ $tx['user'] }}</h6></td>
                            <td>
                                <span class="badge bg-{{ $typeColors[$tx['type']] }} bg-opacity-20 text-{{ $typeColors[$tx['type']] }} px-2 py-1 rounded-pill" style="font-size: 0.7rem;">
                                    {{ ucfirst($tx['type']) }}
                                </span>
                            </td>
                            <td><small class="text-light">{{ $tx['desc'] }}</small></td>
                            <td>
                                <span class="fw-bold {{ str_starts_with($tx['amount'], '+') ? 'text-success' : (str_starts_with($tx['amount'], '-') ? 'text-danger' : 'text-white') }}">
                                    {{ $tx['amount'] }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $statusColors[$tx['status']] }} bg-opacity-20 text-{{ $statusColors[$tx['status']] }} px-2 py-1 rounded-pill" style="font-size: 0.7rem;">
                                    {{ ucfirst($tx['status']) }}
                                </span>
                            </td>
                            <td class="text-end pe-4"><small class="text-muted">{{ $tx['date'] }}</small></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 py-3">
             <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-center mb-0" data-bs-theme="dark">
                    <li class="page-item disabled"><a class="page-link bg-darker border-secondary text-muted" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link bg-primary border-primary text-white" href="#">1</a></li>
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">2</a></li>
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
