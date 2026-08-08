@props(['notification'])

@php
    $typeInfo = match($notification->type ?? 'default') {
        'message' => ['icon' => 'fa-envelope', 'color' => 'bg-primary'],
        'alert' => ['icon' => 'fa-exclamation-circle', 'color' => 'bg-warning text-dark'],
        'success' => ['icon' => 'fa-check-circle', 'color' => 'bg-success'],
        'system' => ['icon' => 'fa-cog', 'color' => 'bg-info'],
        default => ['icon' => 'fa-bell', 'color' => 'bg-secondary'],
    };
    $isUnread = !($notification->read_at ?? false);
@endphp

<div class="sv-notification-item {{ $isUnread ? 'unread' : '' }}">
    <div class="notification-icon {{ $typeInfo['color'] }}">
        <i class="fas {{ $typeInfo['icon'] }}"></i>
    </div>
    
    <div class="notification-content">
        <p class="notification-text">{{ $notification->message ?? 'You have a new notification.' }}</p>
        <span class="notification-time">{{ \Carbon\Carbon::parse($notification->created_at ?? now())->diffForHumans() }}</span>
    </div>
    
    @if($isUnread)
        <div class="notification-indicator"></div>
    @endif
</div>

<style>
.sv-notification-item {
    display: flex;
    align-items: flex-start;
    padding: 16px;
    gap: 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    transition: background 0.2s ease;
    cursor: pointer;
    position: relative;
}
.sv-notification-item:hover {
    background: rgba(255, 255, 255, 0.03);
}
.sv-notification-item.unread {
    background: rgba(108, 99, 255, 0.05);
}
.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    color: #fff;
}
.notification-content {
    flex-grow: 1;
}
.notification-text {
    font-size: 14px;
    color: #e0e0e0;
    margin: 0 0 6px;
    line-height: 1.4;
}
.sv-notification-item.unread .notification-text {
    font-weight: 600;
}
.notification-time {
    font-size: 12px;
    color: #888;
}
.notification-indicator {
    width: 8px;
    height: 8px;
    background: #6C63FF;
    border-radius: 50%;
    flex-shrink: 0;
    margin-top: 6px;
}
</style>
