@props(['review'])

<div class="sv-review-card">
    <div class="review-header">
        <div class="reviewer-info">
            <img src="{{ $review->user->avatar ?? '/images/avatar-default.svg' }}" class="reviewer-avatar" alt="Reviewer">
            <div>
                <h6 class="reviewer-name">{{ $review->user->name ?? 'User Name' }}</h6>
                <div class="review-date">{{ \Carbon\Carbon::parse($review->created_at ?? now())->diffForHumans() }}</div>
            </div>
        </div>
        <div class="review-rating">
            @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star {{ $i <= ($review->rating ?? 5) ? 'text-warning' : 'text-muted' }}"></i>
            @endfor
        </div>
    </div>
    
    <div class="review-content">
        <i class="fas fa-quote-left quote-icon"></i>
        <p>{{ $review->comment ?? 'No comment provided.' }}</p>
    </div>
</div>

<style>
.sv-review-card {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    padding: 24px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}
.sv-review-card:hover {
    background: rgba(255, 255, 255, 0.06);
    transform: translateY(-3px);
}
.review-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
}
.reviewer-info {
    display: flex;
    align-items: center;
    gap: 12px;
}
.reviewer-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}
.reviewer-name {
    margin: 0 0 4px;
    font-size: 15px;
    font-weight: 600;
    color: #e0e0e0;
}
.review-date {
    font-size: 12px;
    color: #888;
}
.review-rating {
    font-size: 12px;
}
.review-content {
    position: relative;
    z-index: 1;
}
.review-content p {
    font-size: 14px;
    line-height: 1.6;
    color: #ccc;
    margin: 0;
    font-style: italic;
}
.quote-icon {
    position: absolute;
    top: -10px;
    left: -10px;
    font-size: 60px;
    color: rgba(108, 99, 255, 0.05);
    z-index: -1;
}
</style>
