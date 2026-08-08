@props(['course'])

<div class="sv-course-card">
    <div class="course-card-image">
        <img src="{{ $course->thumbnail ?? '/images/course-default.jpg' }}" alt="{{ $course->title ?? 'Course' }}">
        <div class="course-card-overlay">
            <span class="course-level-badge">{{ ucfirst($course->level ?? 'All Levels') }}</span>
            @if($course->is_free ?? false)
                <span class="course-free-badge">FREE</span>
            @endif
        </div>
        <div class="course-card-wishlist"><i class="far fa-heart"></i></div>
    </div>
    <div class="course-card-body">
        <div class="course-card-category">{{ $course->category->name ?? 'General' }}</div>
        <h5 class="course-card-title"><a href="/courses/{{ $course->slug ?? '#' }}">{{ $course->title ?? 'Course Title' }}</a></h5>
        <div class="course-card-instructor">
            <img src="{{ $course->instructor->avatar ?? '/images/avatar-default.svg' }}" class="instructor-avatar-sm" alt="Instructor">
            <span>{{ $course->instructor->name ?? 'Instructor' }}</span>
        </div>
        <div class="course-card-meta">
            <span><i class="fas fa-star text-warning"></i> {{ number_format($course->average_rating ?? 0, 1) }}</span>
            <span><i class="fas fa-users"></i> {{ number_format($course->total_students ?? 0) }}</span>
            <span><i class="fas fa-clock"></i> {{ $course->duration_hours ?? 0 }}h</span>
        </div>
        <div class="course-card-footer">
            <div class="course-card-price">
                @if($course->discount_price ?? false)
                    <span class="price-current">${{ number_format($course->discount_price, 2) }}</span>
                    <span class="price-original text-muted text-decoration-line-through">${{ number_format($course->price ?? 0, 2) }}</span>
                @elseif($course->is_free ?? false)
                    <span class="price-free text-success">Free</span>
                @else
                    <span class="price-current">${{ number_format($course->price ?? 0, 2) }}</span>
                @endif
            </div>
            <a href="/courses/{{ $course->slug ?? '#' }}" class="sv-btn-primary btn-sm px-3 py-1 rounded-pill text-decoration-none">Enroll</a>
        </div>
    </div>
</div>

<style>
.sv-course-card {
    background: #0f3460;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    flex-direction: column;
    height: 100%;
}
.sv-course-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(108, 99, 255, 0.2);
    border-color: rgba(108, 99, 255, 0.3);
}
.course-card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}
.course-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.sv-course-card:hover .course-card-image img {
    transform: scale(1.05);
}
.course-card-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    display: flex;
    gap: 10px;
}
.course-level-badge, .course-free-badge {
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    color: #fff;
}
.course-free-badge {
    background: linear-gradient(135deg, #00C9A7, #00a88c);
}
.course-card-wishlist {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(26, 26, 46, 0.8);
    backdrop-filter: blur(10px);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #fff;
}
.course-card-wishlist:hover {
    background: #FF6584;
    color: #fff;
}
.course-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.course-card-category {
    font-size: 12px;
    color: #6C63FF;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}
.course-card-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.4;
    flex-grow: 1;
}
.course-card-title a {
    color: #e0e0e0;
    text-decoration: none;
    transition: color 0.2s ease;
}
.course-card-title a:hover {
    color: #6C63FF;
}
.course-card-instructor {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}
.instructor-avatar-sm {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    object-fit: cover;
}
.course-card-instructor span {
    font-size: 14px;
    color: #aaa;
}
.course-card-meta {
    display: flex;
    gap: 15px;
    font-size: 13px;
    color: #888;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
.course-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}
.course-card-price {
    display: flex;
    align-items: center;
    gap: 8px;
}
.price-current, .price-free {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
}
.price-free {
    color: #00C9A7;
}
.price-original {
    font-size: 14px;
}
.sv-btn-primary {
    background: linear-gradient(135deg, #6C63FF, #FF6584);
    color: white;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.sv-btn-primary:hover {
    background: linear-gradient(135deg, #FF6584, #6C63FF);
    box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
    color: white;
}
</style>
