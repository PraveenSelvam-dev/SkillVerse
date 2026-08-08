@props(['mentor'])

<div class="sv-mentor-card">
    <div class="mentor-card-header">
        <div class="mentor-avatar-container">
            <img src="{{ $mentor->avatar ?? '/images/avatar-default.svg' }}" alt="{{ $mentor->name ?? 'Mentor' }}" class="mentor-avatar">
            @if($mentor->is_online ?? false)
                <span class="online-indicator"></span>
            @endif
        </div>
        <h5 class="mentor-name">{{ $mentor->name ?? 'Mentor Name' }}</h5>
        <div class="mentor-title">{{ $mentor->title ?? 'Professional Title' }}</div>
    </div>
    
    <div class="mentor-card-body">
        <div class="mentor-stats">
            <div class="stat-item">
                <i class="fas fa-star text-warning"></i>
                <span>{{ number_format($mentor->rating ?? 0, 1) }}</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-briefcase text-primary"></i>
                <span>{{ $mentor->experience_years ?? 0 }} Yrs</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-comment-dots text-info"></i>
                <span>{{ $mentor->reviews_count ?? 0 }} Reviews</span>
            </div>
        </div>
        
        <div class="mentor-skills">
            @forelse($mentor->skills ?? [] as $skill)
                <span class="skill-tag">{{ $skill }}</span>
            @empty
                <span class="skill-tag">Mentoring</span>
            @endforelse
        </div>
    </div>
    
    <div class="mentor-card-footer">
        <div class="mentor-rate">
            <span class="rate-amount">${{ number_format($mentor->hourly_rate ?? 0, 2) }}</span>
            <span class="rate-period">/ hr</span>
        </div>
        <a href="/mentors/{{ $mentor->username ?? '#' }}" class="sv-btn-outline-primary btn-sm px-4 py-2 rounded-pill text-decoration-none">Book Session</a>
    </div>
</div>

<style>
.sv-mentor-card {
    background: #0f3460;
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.sv-mentor-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    border-radius: 16px;
    padding: 2px;
    background: linear-gradient(135deg, #6C63FF, #FF6584);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.sv-mentor-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(108, 99, 255, 0.2);
}
.sv-mentor-card:hover::before {
    opacity: 1;
}
.mentor-card-header {
    text-align: center;
    margin-bottom: 20px;
}
.mentor-avatar-container {
    position: relative;
    width: 96px;
    height: 96px;
    margin: 0 auto 16px;
}
.mentor-avatar {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #1a1a2e;
}
.online-indicator {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 16px;
    height: 16px;
    background: #00C9A7;
    border-radius: 50%;
    border: 3px solid #0f3460;
}
.mentor-name {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 4px;
}
.mentor-title {
    font-size: 14px;
    color: #aaa;
}
.mentor-card-body {
    flex-grow: 1;
}
.mentor-stats {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
.stat-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: #e0e0e0;
}
.mentor-skills {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
    margin-bottom: 24px;
}
.skill-tag {
    background: rgba(108, 99, 255, 0.1);
    color: #6C63FF;
    font-size: 12px;
    padding: 4px 12px;
    border-radius: 12px;
    border: 1px solid rgba(108, 99, 255, 0.2);
}
.mentor-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}
.mentor-rate {
    display: flex;
    align-items: baseline;
    gap: 4px;
}
.rate-amount {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
}
.rate-period {
    font-size: 13px;
    color: #aaa;
}
.sv-btn-outline-primary {
    color: #6C63FF;
    border: 1px solid #6C63FF;
    background: transparent;
    font-weight: 600;
    transition: all 0.3s ease;
}
.sv-btn-outline-primary:hover {
    background: #6C63FF;
    color: #fff;
    box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
}
</style>
