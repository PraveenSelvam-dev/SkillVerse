@extends('layouts.dashboard')

@section('title', 'Withdrawal Management')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Withdrawals</h1>
            <p class="text-muted mb-0">Manage and process payout requests from instructors, mentors, and freelancers.</p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="card bg-darker border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-secondary pt-3 pb-0">
            <ul class="nav nav-tabs border-0" id="withdrawalTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active bg-transparent border-0 text-white pb-3" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" style="border-bottom: 2px solid #6C63FF !important;">
                        Pending <span class="badge bg-warning ms-1">4</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent border-0 text-muted pb-3" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">Approved</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent border-0 text-muted pb-3" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">Rejected</button>
                </li>
            </ul>
        </div>
        <div class="card-body p-0">
            <div class="tab-content" id="withdrawalTabsContent">
                <div class="tab-pane fade show active" id="pending" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0 align-middle">
                            <thead class="text-muted small">
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Requested Date</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $withdrawals = [
                                    ['id' => 'WD-1024', 'user' => 'Jane Smith', 'amount' => '$450.00', 'method' => 'PayPal', 'date' => 'Oct 12, 2026', 'status' => 'pending'],
                                    ['id' => 'WD-1025', 'user' => 'Michael Wilson', 'amount' => '$1,200.00', 'method' => 'Bank Transfer', 'date' => 'Oct 13, 2026', 'status' => 'pending'],
                                    ['id' => 'WD-1026', 'user' => 'Sarah Brown', 'amount' => '$80.00', 'method' => 'PayPal', 'date' => 'Oct 14, 2026', 'status' => 'pending'],
                                    ['id' => 'WD-1027', 'user' => 'David Taylor', 'amount' => '$320.50', 'method' => 'Stripe Connect', 'date' => 'Oct 14, 2026', 'status' => 'pending'],
                                ];
                                @endphp
                                @foreach($withdrawals as $wd)
                                <tr>
                                    <td class="ps-4 text-muted"><small>{{ $wd['id'] }}</small></td>
                                    <td>
                                        <h6 class="mb-0 text-white small">{{ $wd['user'] }}</h6>
                                    </td>
                                    <td><span class="text-white fw-bold">{{ $wd['amount'] }}</span></td>
                                    <td><small class="text-light"><i class="fab fa-{{ strtolower(str_replace(' ', '', $wd['method'])) }} text-muted me-1"></i> {{ $wd['method'] }}</small></td>
                                    <td><small class="text-muted">{{ $wd['date'] }}</small></td>
                                    <td>
                                        <span class="badge bg-warning bg-opacity-20 text-warning px-2 py-1 rounded-pill">Pending</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-success me-1" title="Approve"><i class="fas fa-check"></i></button>
                                        <button class="btn btn-sm btn-danger" title="Reject"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="approved" role="tabpanel">
                    <div class="p-5 text-center">
                        <p class="text-muted">Approved withdrawals table here...</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="rejected" role="tabpanel">
                    <div class="p-5 text-center">
                        <p class="text-muted">Rejected withdrawals table here...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Tab switching logic for styles
    document.querySelectorAll('#withdrawalTabs button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('#withdrawalTabs button').forEach(btn => {
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
