@props(['conversation'])

<div class="sv-message-item {{ ($conversation->unread_count ?? 0) > 0 ? 'unread' : '' }}">
    <div class="message-avatar-container">
        <img src="{{ $conversation->user->avatar ?? '/images/avatar-default.svg' }}" alt="User" class="message-avatar">
        @if($conversation->user->is_online ?? false)
            <span class="online-status"></span>
        @endif
    </div>
    
    <div class="message-content">
        <div class="message-header">
            <h6 class="message-sender">{{ $conversation->user->name ?? 'User Name' }}</h6>
            <span class="message-time">{{ \Carbon\Carbon::parse($conversation->last_message_at ?? now())->format('H:i') }}</span>
        </div>
        
        <div class="message-body">
            <p class="message-preview">{{ Str::limit($conversation->last_message ?? 'No messages yet.', 40) }}</p>
            @if(($conversation->unread_count ?? 0) > 0)
                <span class="unread-badge">{{ $conversation->unread_count }}</span>
            @endif
        </div>
    </div>
</div>

<style>
.sv-message-item {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    gap: 16px;
    border-radius: 12px;
    transition: all 0.2s ease;
    cursor: pointer;
    margin-bottom: 4px;
}
.sv-message-item:hover {
    background: rgba(255, 255, 255, 0.05);
}
.sv-message-item.unread {
    background: rgba(108, 99, 255, 0.1);
}
.message-avatar-container {
    position: relative;
    flex-shrink: 0;
}
.message-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}
.online-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    background: #00C9A7;
    border-radius: 50%;
    border: 2px solid #1a1a2e;
}
.message-content {
    flex-grow: 1;
    overflow: hidden;
}
.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}
.message-sender {
    margin: 0;
    font-size: 15px;
    font-weight: 600;
    color: #e0e0e0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.message-time {
    font-size: 12px;
    color: #888;
}
.sv-message-item.unread .message-time {
    color: #6C63FF;
    font-weight: 600;
}
.message-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.message-preview {
    margin: 0;
    font-size: 13px;
    color: #aaa;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.sv-message-item.unread .message-preview {
    color: #e0e0e0;
    font-weight: 500;
}
.unread-badge {
    background: #FF6584;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
    min-width: 20px;
    text-align: center;
}
</style>
