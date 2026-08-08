@extends('layouts.dashboard')

@section('title', 'Order History')

@section('content')
@php
    $orders = [
        ['id' => '#ORD-2023-8492', 'date' => 'Oct 24, 2023', 'item' => 'Advanced Laravel Mastery', 'amount' => '$89.99', 'status' => 'Completed'],
        ['id' => '#ORD-2023-8410', 'date' => 'Oct 15, 2023', 'item' => 'Mentor Session: Code Review (1hr)', 'amount' => '$50.00', 'status' => 'Completed'],
        ['id' => '#ORD-2023-7922', 'date' => 'Sep 20, 2023', 'item' => 'Vue 3 Composition API', 'amount' => '$49.99', 'status' => 'Completed'],
        ['id' => '#ORD-2023-7850', 'date' => 'Sep 18, 2023', 'item' => 'Fullstack React & Node', 'amount' => '$89.99', 'status' => 'Refunded'],
        ['id' => '#ORD-2023-6401', 'date' => 'Aug 05, 2023', 'item' => 'Docker for Web Developers', 'amount' => '$29.99', 'status' => 'Completed'],
        ['id' => '#ORD-2023-5592', 'date' => 'Jul 01, 2023', 'item' => 'Tailwind CSS in Depth', 'amount' => '$19.99', 'status' => 'Completed'],
        ['id' => '#ORD-2023-4211', 'date' => 'May 15, 2023', 'item' => 'PHP 8 New Features', 'amount' => '$39.99', 'status' => 'Completed'],
        ['id' => '#ORD-2023-9982', 'date' => 'Today', 'item' => 'Mastering Nuxt 3', 'amount' => '$49.99', 'status' => 'Pending']
    ];
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .table-dark {
        background-color: transparent;
    }
    .table-dark th {
        border-bottom-color: rgba(255,255,255,0.1);
        color: #a0a0a0;
        font-weight: 500;
    }
    .table-dark td {
        border-bottom-color: rgba(255,255,255,0.05);
        vertical-align: middle;
        color: #e0e0e0;
    }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Order History</h2>

    <div class="glass-card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">Order ID</th>
                        <th class="py-3">Date</th>
                        <th class="py-3">Item / Service</th>
                        <th class="py-3">Amount</th>
                        <th class="py-3">Status</th>
                        <th class="text-end pe-4 py-3">Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="ps-4 py-3 text-white fw-bold">{{ $order['id'] }}</td>
                        <td class="py-3 text-muted">{{ $order['date'] }}</td>
                        <td class="py-3 text-white">{{ $order['item'] }}</td>
                        <td class="py-3 text-white">{{ $order['amount'] }}</td>
                        <td class="py-3">
                            @if($order['status'] == 'Completed')
                                <span class="badge bg-success bg-opacity-25 text-success border border-success px-2 py-1">Completed</span>
                            @elseif($order['status'] == 'Pending')
                                <span class="badge bg-warning bg-opacity-25 text-warning border border-warning px-2 py-1">Pending</span>
                            @elseif($order['status'] == 'Refunded')
                                <span class="badge bg-danger bg-opacity-25 text-danger border border-danger px-2 py-1">Refunded</span>
                            @endif
                        </td>
                        <td class="text-end pe-4 py-3">
                            @if($order['status'] == 'Completed')
                            <button class="btn btn-outline-secondary btn-sm" title="Download Receipt">
                                <i class="fa-solid fa-file-invoice"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
