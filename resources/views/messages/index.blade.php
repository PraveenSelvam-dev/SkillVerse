@extends('layouts.dashboard')

@section('title', 'Messages')

@section('content')
@php
    $conversations = [
        ['name' => 'Sarah Johnson (Mentor)', 'avatar' => 'https://ui-avatars.com/api/?name=SJ&background=00C9A7&color=fff', 'preview' => 'Looking forward to our session tomorrow!', 'time' => '10:30 AM', 'unread' => 2, 'active' => true],
        ['name' => 'John Smith (Instructor)', 'avatar' => 'https://ui-avatars.com/api/?name=JS&background=6C63FF&color=fff', 'preview' => 'I have updated the lesson you asked about.', 'time' => 'Yesterday', 'unread' => 0, 'active' => false],
        ['name' => 'Emily Chen', 'avatar' => 'https://ui-avatars.com/api/?name=EC&background=FFB347&color=fff', 'preview' => 'Did you finish the assignment for Module 3?', 'time' => 'Mon', 'unread' => 0, 'active' => false],
        ['name' => 'SkillVerse Support', 'avatar' => 'https://ui-avatars.com/api/?name=SV&background=FF6584&color=fff', 'preview' => 'Your refund request has been processed.', 'time' => 'Oct 15', 'unread' => 0, 'active' => false],
        ['name' => 'Mike Brown', 'avatar' => 'https://ui-avatars.com/api/?name=MB&background=2496ed&color=fff', 'preview' => 'Thanks for the help with Docker!', 'time' => 'Oct 10', 'unread' => 0, 'active' => false]
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
    .conversation-item {
        padding: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        cursor: pointer;
        transition: background 0.2s;
    }
    .conversation-item:hover {
        background: rgba(255,255,255,0.05);
    }
    .conversation-item.active {
        background: rgba(108, 99, 255, 0.15);
        border-left: 3px solid #6C63FF;
    }
    .chat-area {
        height: 600px;
        display: flex;
        flex-direction: column;
    }
    .chat-messages {
        flex-grow: 1;
        overflow-y: auto;
        padding: 20px;
    }
    .message-bubble {
        max-width: 75%;
        padding: 12px 18px;
        border-radius: 18px;
        margin-bottom: 15px;
        position: relative;
    }
    .message-received {
        background: #1a1a2e;
        border: 1px solid rgba(255,255,255,0.1);
        color: #e0e0e0;
        border-bottom-left-radius: 4px;
        align-self: flex-start;
    }
    .message-sent {
        background: linear-gradient(135deg, #6C63FF, #FF6584);
        color: white;
        border-bottom-right-radius: 4px;
        align-self: flex-end;
    }
    .chat-input-area {
        padding: 15px;
        border-top: 1px solid rgba(255,255,255,0.1);
        background: rgba(0,0,0,0.2);
    }
    .chat-input {
        background: #1a1a2e;
        border: 1px solid rgba(255,255,255,0.1);
        color: white;
        border-radius: 20px;
    }
    .chat-input:focus {
        background: #16213e;
        color: white;
        box-shadow: none;
        border-color: #6C63FF;
    }
</style>

<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-md-4 col-lg-3">
            <div class="glass-card h-100 overflow-hidden d-flex flex-column" style="max-height: 700px;">
                <div class="p-3 border-bottom border-secondary">
                    <h5 class="text-white mb-3">Messages</h5>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-muted"><i class="fa-solid fa-search"></i></span>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search...">
                    </div>
                </div>
                
                <div class="overflow-y-auto flex-grow-1">
                    @foreach($conversations as $conv)
                    <div class="conversation-item {{ $conv['active'] ? 'active' : '' }}">
                        <div class="d-flex align-items-center">
                            <img src="{{ $conv['avatar'] }}" class="rounded-circle me-3" width="45" height="45">
                            <div class="flex-grow-1 min-vw-0">
                                <div class="d-flex justify-content-between align-items-baseline mb-1">
                                    <h6 class="text-white mb-0 text-truncate" style="max-width: 120px;">{{ $conv['name'] }}</h6>
                                    <span class="text-muted" style="font-size: 0.75rem;">{{ $conv['time'] }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted small mb-0 text-truncate" style="max-width: 150px;">{{ $conv['preview'] }}</p>
                                    @if($conv['unread'] > 0)
                                        <span class="badge bg-danger rounded-pill">{{ $conv['unread'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-md-8 col-lg-9">
            <div class="glass-card chat-area">
                <!-- Chat Header -->
                <div class="p-3 border-bottom border-secondary d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name=SJ&background=00C9A7&color=fff" class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <h6 class="text-white mb-0">Sarah Johnson</h6>
                            <span class="text-success small"><i class="fa-solid fa-circle" style="font-size: 8px;"></i> Online</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-link text-muted"><i class="fa-solid fa-phone"></i></button>
                        <button class="btn btn-link text-muted"><i class="fa-solid fa-video"></i></button>
                        <button class="btn btn-link text-muted"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                </div>

                <!-- Messages -->
                <div class="chat-messages d-flex flex-column">
                    <div class="text-center mb-4">
                        <span class="badge bg-dark text-muted">Today</span>
                    </div>

                    <div class="message-bubble message-received">
                        <p class="mb-1">Hi Alex! I reviewed your code for the latest project.</p>
                        <span class="text-muted float-end" style="font-size: 0.7rem;">09:15 AM</span>
                    </div>
                    
                    <div class="message-bubble message-received">
                        <p class="mb-1">You did a great job on the controllers, but we should discuss the service layer implementation.</p>
                        <span class="text-muted float-end" style="font-size: 0.7rem;">09:16 AM</span>
                    </div>

                    <div class="message-bubble message-sent">
                        <p class="mb-1">Thanks Sarah! Yes, I was a bit confused about where to put the external API calls.</p>
                        <span class="text-light float-end" style="font-size: 0.7rem;">09:20 AM <i class="fa-solid fa-check-double ms-1"></i></span>
                    </div>

                    <div class="message-bubble message-received">
                        <p class="mb-1">No worries, that's exactly what we'll cover. Looking forward to our session tomorrow!</p>
                        <span class="text-muted float-end" style="font-size: 0.7rem;">10:30 AM</span>
                    </div>
                </div>

                <!-- Input -->
                <div class="chat-input-area">
                    <div class="input-group align-items-center">
                        <button class="btn btn-link text-muted"><i class="fa-solid fa-paperclip fs-5"></i></button>
                        <input type="text" class="form-control chat-input mx-2" placeholder="Type a message...">
                        <button class="btn btn-link text-warning"><i class="fa-regular fa-face-smile fs-5"></i></button>
                        <button class="btn btn-primary rounded-circle ms-2" style="width: 40px; height: 40px; background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">
                            <i class="fa-solid fa-paper-plane ms-reverse"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
