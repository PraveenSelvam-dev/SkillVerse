@props(['service'])

<div class="sv-service-card">
    <div class="service-card-image">
        <img src="{{ $service->thumbnail ?? '/images/service-default.jpg' }}" alt="{{ $service->title ?? 'Service' }}">
        <div class="service-card-wishlist"><i class="far fa-heart"></i></div>
    </div>
    
    <div class="service-card-body">
        <div class="service-provider">
            <img src="{{ $service->freelancer->avatar ?? '/images/avatar-default.svg' }}" class="provider-avatar" alt="Freelancer">
            <span class="provider-name">{{ $service->freelancer->name ?? 'Freelancer Name' }}</span>
        </div>
        
        <h5 class="service-card-title">
            <a href="/services/{{ $service->slug ?? '#' }}">{{ $service->title ?? 'Professional Freelance Service' }}</a>
        </h5>
        
        <div class="service-meta">
            <div class="service-rating">
                <i class="fas fa-star text-warning"></i>
                <span>{{ number_format($service->rating ?? 0, 1) }}</span>
                <span class="text-muted">({{ $service->reviews_count ?? 0 }})</span>
            </div>
            <div class="service-delivery">
                <i class="fas fa-clock text-info"></i>
                <span>{{ $service->delivery_days ?? 1 }} Days</span>
            </div>
        </div>
    </div>
    
    <div class="service-card-footer">
        <div class="service-price">
            <span class="price-label">Starting at</span>
            <span class="price-amount">${{ number_format($service->starting_price ?? 0, 2) }}</span>
        </div>
        <a href="/services/{{ $service->slug ?? '#' }}" class="sv-btn-primary btn-sm px-3 py-1 rounded-pill text-decoration-none">Order Now</a>
    </div>
</div>

<style>
.sv-service-card {
    background: #0f3460;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    flex-direction: column;
    height: 100%;
}
.sv-service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(108, 99, 255, 0.15);
    border-color: rgba(108, 99, 255, 0.2);
}
.service-card-image {
    position: relative;
    height: 180px;
    overflow: hidden;
}
.service-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.sv-service-card:hover .service-card-image img {
    transform: scale(1.05);
}
.service-card-wishlist {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(26, 26, 46, 0.7);
    backdrop-filter: blur(10px);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #fff;
}
.service-card-wishlist:hover {
    background: #FF6584;
}
.service-card-body {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}
.service-provider {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}
.provider-avatar {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    object-fit: cover;
}
.provider-name {
    font-size: 13px;
    color: #aaa;
}
.service-card-title {
    font-size: 16px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 16px;
    flex-grow: 1;
}
.service-card-title a {
    color: #e0e0e0;
    text-decoration: none;
    transition: color 0.2s ease;
}
.service-card-title a:hover {
    color: #6C63FF;
}
.service-meta {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #e0e0e0;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
.service-rating, .service-delivery {
    display: flex;
    align-items: center;
    gap: 6px;
}
.service-card-footer {
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(0, 0, 0, 0.1);
}
.service-price {
    display: flex;
    flex-direction: column;
}
.price-label {
    font-size: 11px;
    text-transform: uppercase;
    color: #aaa;
    letter-spacing: 0.5px;
}
.price-amount {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
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
