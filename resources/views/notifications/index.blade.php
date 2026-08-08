@extends('layouts.dashboard')

@section('title', 'Notifications')

@section('content')
@php
    $notifications = [
        ['type' => 'enrollment', 'icon' => 'fa-graduation-cap', 'color' => '#00C9A7', 'title' => 'Successfully enrolled', 'desc' => 'You have been successfully enrolled in Advanced Laravel Mastery.', 'time' => '10 mins ago', 'unread' => true],
        ['type' => 'message', 'icon' => 'fa-envelope', 'color' => '#6C63FF', 'title' => 'New message from Sarah', 'desc' => 'Looking forward to our session tomorrow!', 'time' => '1 hour ago', 'unread' => true],
        ['type' => 'review', 'icon' => 'fa-star', 'color' => '#FFB347', 'title' => 'Leave a review', 'desc' => 'You recently completed Vue 3 Composition API. Share your thoughts!', 'time' => '5 hours ago', 'unread' => false],
        ['type' => 'system', 'icon' => 'fa-bell', 'color' => '#FF6584', 'title' => 'Platform Update', 'desc' => 'We have added new features to the learning environment.', 'time' => 'Yesterday', 'unread' => false],
        ['type' => 'payment', 'icon' => 'fa-credit-card', 'color' => '#2496ed', 'title' => 'Payment successful', 'desc' => 'Your payment for Mentor Session was successful.', 'time' => 'Oct 15', 'unread' => false],
        ['type' => 'system', 'icon' => 'fa-shield-halved', 'color' => '#a0a0a0', 'title' => 'Security Alert', 'desc' => 'New login from Chrome on Windows.', 'time' => 'Oct 10', 'unread' => false]
    ];
    
    // Expand to 15 items for realistic dummy data
    for($i=0; $i<9; $i++) {
        $notifications[] = $notifications[array_rand($notifications)];
        $notifications[count($notifications)-1]['unread'] = false; // older ones read
    }
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
    .notification-item {
        padding: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background 0.2s;
        display: flex;
        align-items: flex-start;
    }
    .notification-item:hover {
        background: rgba(255,255,255,0.02);
    }
    .notification-item:last-child {
        border-bottom: none;
    }
    .notification-item.unread {
        background: rgba(108, 99, 255, 0.05);
    }
    .noti-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .unread-dot {
        width: 10px;
        height: 10px;
        background-color: #FF6584;
        border-radius: 50%;
        margin-top: 19px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white mb-0">Notifications</h2>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-check-double me-2"></i>Mark all as read</button>
            </div>

            <div class="glass-card overflow-hidden">
                @foreach($notifications as $noti)
                <div class="notification-item {{ $noti['unread'] ? 'unread' : '' }}">
                    <div class="noti-icon me-3 flex-shrink-0" style="background: {{ $noti['color'] }}20; color: {{ $noti['color'] }}">
                        <i class="fa-solid {{ $noti['icon'] }}"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-white mb-0 {{ $noti['unread'] ? 'fw-bold' : '' }}">{{ $noti['title'] }}</h6>
                            <span class="text-muted small">{{ $noti['time'] }}</span>
                        </div>
                        <p class="text-muted mb-0">{{ $noti['desc'] }}</p>
                    </div>
                    @if($noti['unread'])
                        <div class="unread-dot ms-3"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
