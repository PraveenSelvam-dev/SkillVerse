@extends('layouts.dashboard')
@section('title', 'Withdraw Funds')
@section('content')
@php
    $withdrawals = [
        ['date' => '2023-10-15', 'amount' => '$500.00', 'method' => 'Bank Transfer', 'status' => 'Pending', 'processed' => '-'],
        ['date' => '2023-09-01', 'amount' => '$1,200.00', 'method' => 'PayPal', 'status' => 'Approved', 'processed' => '2023-09-03'],
        ['date' => '2023-08-15', 'amount' => '$800.00', 'method' => 'Bank Transfer', 'status' => 'Approved', 'processed' => '2023-08-18'],
        ['date' => '2023-07-01', 'amount' => '$450.00', 'method' => 'Stripe', 'status' => 'Approved', 'processed' => '2023-07-02'],
        ['date' => '2023-06-15', 'amount' => '$100.00', 'method' => 'PayPal', 'status' => 'Rejected', 'processed' => '2023-06-16'],
    ];
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 30px; }
    .form-control, .form-select { background: #16213e; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px 15px; }
    .form-control:focus, .form-select:focus { background: #16213e; border-color: #00C9A7; color: #fff; box-shadow: 0 0 0 0.25rem rgba(0, 201, 167, 0.25); }
    .form-label { color: #e0e0e0; font-weight: 500; }
    .btn-success-gradient { background: linear-gradient(135deg, #00C9A7, #009980); color: white; border: none; padding: 12px 20px; font-weight: 600; border-radius: 8px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; padding-top: 15px; padding-bottom: 15px; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; padding-top: 15px; padding-bottom: 15px; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Withdraw Funds</h2>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="dashboard-card h-100" style="background: linear-gradient(135deg, rgba(0, 201, 167, 0.1), rgba(15, 52, 96, 1)); border-color: rgba(0, 201, 167, 0.3);">
                <div class="text-center mb-4">
                    <div class="text-muted text-uppercase small fw-bold mb-2">Available Balance</div>
                    <div class="text-white" style="font-size: 3.5rem; font-weight: 700; line-height: 1;">$1,200.00</div>
                    <div class="text-success small mt-2"><i class="fa-solid fa-circle-check me-1"></i> Ready for withdrawal</div>
                </div>

                <hr style="border-color: rgba(255,255,255,0.1);">

                <form class="mt-4">
                    <div class="mb-3">
                        <label class="form-label">Withdrawal Amount ($)</label>
                        <input type="number" class="form-control" placeholder="0.00" value="1200.00" min="50">
                        <div class="form-text text-muted mt-1">Minimum withdrawal amount is $50.00</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Payout Method</label>
                        <select class="form-select">
                            <option>Bank Transfer (Ends in 4567)</option>
                            <option>PayPal (instructor@example.com)</option>
                            <option>Stripe Connect</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-success-gradient w-100"><i class="fa-solid fa-paper-plane me-2"></i>Submit Withdrawal Request</button>
                </form>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="dashboard-card h-100">
                <h5 class="text-white mb-4">Withdrawal History</h5>
                <div class="table-responsive">
                    <table class="table table-borderless table-dark-custom">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Processed On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $wd)
                            <tr>
                                <td class="text-muted">{{ $wd['date'] }}</td>
                                <td class="text-white fw-bold">{{ $wd['amount'] }}</td>
                                <td class="text-muted">{{ $wd['method'] }}</td>
                                <td>
                                    @if($wd['status'] == 'Approved')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">{{ $wd['status'] }}</span>
                                    @elseif($wd['status'] == 'Pending')
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">{{ $wd['status'] }}</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">{{ $wd['status'] }}</span>
                                    @endif
                                </td>
                                <td class="text-muted">{{ $wd['processed'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
