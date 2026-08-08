@extends('layouts.dashboard')

@section('title', 'Reviews - Mentor Dashboard')

@php
    $averageRating = 4.9;
    $totalReviews = 124;
    
    $reviews = [
        ['name' => 'John Doe', 'avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=random', 'rating' => 5, 'comment' => 'Amazing session! Really helped me understand the concepts clearly.', 'date' => '2 days ago', 'type' => 'Deep Dive (60m)'],
        ['name' => 'Sarah Smith', 'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Smith&background=random', 'rating' => 5, 'comment' => 'Very knowledgeable and patient mentor.', 'date' => '1 week ago', 'type' => 'Quick Chat (30m)'],
        ['name' => 'Mike Johnson', 'avatar' => 'https://ui-avatars.com/api/?name=Mike+Johnson&background=random', 'rating' => 4, 'comment' => 'Good advice, but we ran out of time slightly.', 'date' => '2 weeks ago', 'type' => 'Quick Chat (30m)'],
        ['name' => 'Emily Davis', 'avatar' => 'https://ui-avatars.com/api/?name=Emily+Davis&background=random', 'rating' => 5, 'comment' => 'Best mentor on the platform! Highly recommended.', 'date' => '3 weeks ago', 'type' => 'Monthly Mentoring'],
        ['name' => 'Alex Turner', 'avatar' => 'https://ui-avatars.com/api/?name=Alex+Turner&background=random', 'rating' => 5, 'comment' => 'Solved my bug in 10 minutes. Will book again.', 'date' => '1 month ago', 'type' => 'Quick Chat (30m)'],
        ['name' => 'Jessica Alba', 'avatar' => 'https://ui-avatars.com/api/?name=Jessica+Alba&background=random', 'rating' => 4, 'comment' => 'Great insights into the industry.', 'date' => '1 month ago', 'type' => 'Deep Dive (60m)'],
        ['name' => 'Ryan Gosling', 'avatar' => 'https://ui-avatars.com/api/?name=Ryan+Gosling&background=random', 'rating' => 5, 'comment' => 'Exceptional code review. Caught things I totally missed.', 'date' => '2 months ago', 'type' => 'Deep Dive (60m)'],
        ['name' => 'Emma Stone', 'avatar' => 'https://ui-avatars.com/api/?name=Emma+Stone&background=random', 'rating' => 5, 'comment' => 'Very encouraging and provided a clear learning path.', 'date' => '2 months ago', 'type' => 'Monthly Mentoring'],
    ];
@endphp

@section('content')
<div class="container-fluid py-4">
    <h2 class="text-light fw-bold mb-4">Student Reviews</h2>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body text-center d-flex flex-column justify-content-center py-5">
                    <h1 class="display-1 text-light fw-bold mb-0">{{ $averageRating }}</h1>
                    <div class="text-warning mb-2 fs-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-muted mb-0">Based on {{ $totalReviews }} reviews</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-sm h-100" style="background-color: #0f3460 !important; border-radius: 16px;">
                <div class="card-body py-4">
                    <h5 class="text-light mb-4">Rating Breakdown</h5>
                    
                    @foreach([5 => 85, 4 => 10, 3 => 4, 2 => 1, 1 => 0] as $stars => $percent)
                    <div class="d-flex align-items-center mb-3">
                        <span class="text-muted me-3" style="width: 50px;">{{ $stars }} Stars</span>
                        <div class="progress flex-grow-1 bg-secondary bg-opacity-25" style="height: 8px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted ms-3" style="width: 40px; text-align: right;">{{ $percent }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-body p-0">
            <div class="list-group list-group-flush rounded-3">
                @foreach($reviews as $review)
                <div class="list-group-item bg-transparent border-bottom border-secondary border-opacity-50 p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center">
                            <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="rounded-circle me-3" width="48">
                            <div>
                                <h6 class="text-light mb-1">{{ $review['name'] }}</h6>
                                <div class="text-warning small">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < $review['rating'])
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted ms-2">{{ $review['date'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="badge bg-secondary bg-opacity-25 text-light">{{ $review['type'] }}</span>
                    </div>
                    <p class="text-muted mb-0 mt-3" style="font-size: 0.95rem;">"{{ $review['comment'] }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
