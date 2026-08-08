@extends('layouts.dashboard')
@section('title', 'Coupons')
@section('content')
@php
    $coupons = [
        ['code' => 'LAUNCH50', 'type' => 'Percentage', 'value' => '50%', 'used' => 45, 'max' => 100, 'expiry' => '2023-12-31', 'status' => 'Active'],
        ['code' => 'SPRING20', 'type' => 'Percentage', 'value' => '20%', 'used' => 120, 'max' => 200, 'expiry' => '2023-05-31', 'status' => 'Expired'],
        ['code' => 'FLAT10', 'type' => 'Fixed Amount', 'value' => '$10.00', 'used' => 15, 'max' => 50, 'expiry' => '2023-11-30', 'status' => 'Active'],
        ['code' => 'VIPONLY', 'type' => 'Percentage', 'value' => '100%', 'used' => 5, 'max' => 5, 'expiry' => '2024-01-01', 'status' => 'Depleted'],
        ['code' => 'EARLYBIRD', 'type' => 'Fixed Amount', 'value' => '$25.00', 'used' => 0, 'max' => 20, 'expiry' => '2023-10-31', 'status' => 'Active'],
    ];
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 24px; }
    .table-dark-custom { color: #e0e0e0; }
    .table-dark-custom th { border-bottom: 2px solid rgba(255,255,255,0.1); color: #fff; font-weight: 600; }
    .table-dark-custom td { border-bottom: 1px solid rgba(255,255,255,0.05); vertical-align: middle; }
    .coupon-code { background: rgba(255,255,255,0.1); padding: 4px 10px; border-radius: 6px; font-family: monospace; font-weight: bold; letter-spacing: 1px; color: #fff; }
    .btn-gradient { background: linear-gradient(135deg, #6C63FF, #FF6584); color: white; border: none; }
    .modal-content { background: #16213e; border: 1px solid rgba(255,255,255,0.1); }
    .modal-header { border-bottom: 1px solid rgba(255,255,255,0.05); }
    .modal-footer { border-top: 1px solid rgba(255,255,255,0.05); }
    .form-control, .form-select { background: #0f3460; border: 1px solid rgba(255,255,255,0.1); color: #fff; }
    .form-control:focus, .form-select:focus { background: #0f3460; border-color: #6C63FF; color: #fff; box-shadow: none; }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white m-0">Coupons</h2>
        <button class="btn btn-gradient px-4" data-bs-toggle="modal" data-bs-target="#createCouponModal"><i class="fa-solid fa-ticket me-2"></i>Create Coupon</button>
    </div>

    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="table table-borderless table-dark-custom">
                <thead>
                    <tr>
                        <th>Coupon Code</th>
                        <th>Type & Value</th>
                        <th>Usage</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                        <td><span class="coupon-code">{{ $coupon['code'] }}</span></td>
                        <td>
                            <div class="text-white fw-bold">{{ $coupon['value'] }}</div>
                            <div class="text-muted small">{{ $coupon['type'] }}</div>
                        </td>
                        <td>
                            <div class="text-white">{{ $coupon['used'] }} / {{ $coupon['max'] }}</div>
                            <div class="progress mt-1" style="height: 4px; background: rgba(255,255,255,0.1);">
                                <div class="progress-bar bg-info" style="width: {{ ($coupon['used'] / $coupon['max']) * 100 }}%"></div>
                            </div>
                        </td>
                        <td class="text-muted">{{ $coupon['expiry'] }}</td>
                        <td>
                            @if($coupon['status'] == 'Active')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
                            @elseif($coupon['status'] == 'Expired')
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Expired</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">Depleted</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-light me-1"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Coupon Modal -->
<div class="modal fade" id="createCouponModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white">Create New Coupon</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-light">Coupon Code</label>
                        <input type="text" class="form-control" placeholder="e.g. SUMMER2024">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label text-light">Discount Type</label>
                            <select class="form-select">
                                <option>Percentage (%)</option>
                                <option>Fixed Amount ($)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-light">Value</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Apply To</label>
                        <select class="form-select">
                            <option>All Courses</option>
                            <option>Advanced Laravel Mastery</option>
                            <option>Vue.js for Beginners</option>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label text-light">Max Uses</label>
                            <input type="number" class="form-control" placeholder="100">
                        </div>
                        <div class="col-6">
                            <label class="form-label text-light">Expiry Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-gradient">Create Coupon</button>
            </div>
        </div>
    </div>
</div>
@endsection
