@props(['community'])

<div class="sv-community-card">
    <div class="community-cover" style="background-image: url('{{ $community->cover_image ?? '' }}'); {{ empty($community->cover_image) ? 'background: linear-gradient(135deg, #6C63FF, #0f3460);' : '' }}">
        <div class="community-type-badge">
            <i class="fas {{ ($community->is_private ?? false) ? 'fa-lock' : 'fa-globe' }}"></i>
            {{ ($community->is_private ?? false) ? 'Private' : 'Public' }}
        </div>
    </div>
    
    <div class="community-card-body">
        <h5 class="community-name">{{ $community->name ?? 'Community Name' }}</h5>
        <p class="community-desc">{{ Str::limit($community->description ?? 'Join this vibrant community to learn, share, and grow together.', 80) }}</p>
        
        <div class="community-stats">
            <div class="member-stack">
                @foreach(array_slice($community->recent_members ?? [[],[],[]], 0, 4) as $member)
                    <img src="{{ $member->avatar ?? '/images/avatar-default.svg' }}" class="stack-avatar" alt="Member">
                @endforeach
                @if(($community->members_count ?? 0) > 4)
                    <div class="stack-avatar more-count">+{{ ($community->members_count ?? 0) - 4 }}</div>
                @endif
            </div>
            <div class="member-count text-muted">
                {{ number_format($community->members_count ?? 0) }} members
            </div>
        </div>
    </div>
    
    <div class="community-card-footer">
        <a href="/communities/{{ $community->slug ?? '#' }}" class="sv-btn-outline-primary w-100 rounded-pill text-decoration-none text-center py-2">Join Community</a>
    </div>
</div>

<style>
.sv-community-card {
    background: #0f3460;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    flex-direction: column;
    height: 100%;
}
.sv-community-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(108, 99, 255, 0.15);
}
.community-cover {
    height: 120px;
    background-size: cover;
    background-position: center;
    position: relative;
}
.community-type-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(5px);
    color: #fff;
    font-size: 11px;
    padding: 4px 10px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.community-card-body {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}
.community-name {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}
.community-desc {
    font-size: 13px;
    color: #aaa;
    line-height: 1.5;
    margin-bottom: 20px;
    flex-grow: 1;
}
.community-stats {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.member-stack {
    display: flex;
    align-items: center;
}
.stack-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #0f3460;
    margin-left: -10px;
    object-fit: cover;
}
.stack-avatar:first-child {
    margin-left: 0;
}
.more-count {
    background: #1a1a2e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 600;
}
.member-count {
    font-size: 13px;
}
.community-card-footer {
    padding: 0 20px 20px;
}
.sv-btn-outline-primary {
    display: block;
    color: #6C63FF;
    border: 1px solid #6C63FF;
    background: transparent;
    font-weight: 600;
    transition: all 0.3s ease;
}
.sv-btn-outline-primary:hover {
    background: #6C63FF;
    color: #fff;
}
</style>
