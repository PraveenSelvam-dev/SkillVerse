@extends('layouts.dashboard')

@section('title', 'My Certificates')

@section('content')
@php
    $certificates = [
        ['course' => 'PHP 8 New Features', 'date' => 'Oct 15, 2023', 'id' => 'CERT-84729-A', 'color' => '#6C63FF'],
        ['course' => 'Tailwind CSS in Depth', 'date' => 'Sep 02, 2023', 'id' => 'CERT-39211-B', 'color' => '#00C9A7'],
        ['course' => 'MySQL Performance Tuning', 'date' => 'Jul 20, 2023', 'id' => 'CERT-10482-C', 'color' => '#FFB347']
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
    .cert-preview {
        height: 200px;
        background: linear-gradient(135deg, #1a1a2e, #16213e);
        border: 2px solid;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-align: center;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">My Certificates</h2>
    </div>

    <div class="row g-4">
        @foreach($certificates as $cert)
        <div class="col-md-6 col-lg-4">
            <div class="glass-card p-4 h-100">
                <div class="cert-preview mb-4" style="border-color: {{ $cert['color'] }};">
                    <i class="fa-solid fa-award mb-2" style="font-size: 3rem; color: {{ $cert['color'] }};"></i>
                    <h5 class="text-white mb-1">Certificate of Completion</h5>
                    <p class="text-muted small mb-0">{{ $cert['course'] }}</p>
                </div>
                
                <h5 class="text-white mb-2">{{ $cert['course'] }}</h5>
                <div class="d-flex justify-content-between text-muted small mb-4">
                    <span><i class="fa-regular fa-calendar me-1"></i> {{ $cert['date'] }}</span>
                    <span>ID: {{ $cert['id'] }}</span>
                </div>
                
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-light flex-grow-1"><i class="fa-solid fa-download me-2"></i>PDF</button>
                    <button class="btn btn-primary flex-grow-1" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fa-solid fa-share-nodes me-2"></i>Share</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
