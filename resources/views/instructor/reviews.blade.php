@extends('layouts.dashboard')
@section('title', 'Reviews')
@section('content')
@php
    $reviews = [];
    $names = ['Alice J.', 'Bob S.', 'Charlie B.', 'Diana P.', 'Evan W.', 'Fiona G.', 'George L.', 'Hannah A.', 'Ian M.', 'Julia R.', 'Kevin H.', 'Luna L.'];
    $courses = ['Advanced Laravel Mastery', 'Vue.js for Beginners', 'Full-Stack Web Dev'];
    $comments = [
        'This course is amazing! I learned so much.',
        'Great content, but the pace is a bit fast.',
        'Exactly what I was looking for. Highly recommended.',
        'Good overview, could use more advanced examples.',
        'The instructor explains things very clearly.'
    ];
    
    foreach($names as $name) {
        $rating = rand(3, 5);
        $reviews[] = [
            'name' => $name,
            'avatar' => 'https://ui-avatars.com/api/?name='.urlencode($name).'&background=random',
            'course' => $courses[array_rand($courses)],
            'rating' => $rating,
            'comment' => $comments[array_rand($comments)],
            'date' => '2023-10-'.str_pad(rand(1,28), 2, '0', STR_PAD_LEFT)
        ];
    }
@endphp
<style>
    .dashboard-card { background: #0f3460; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 24px; }
    .rating-large { font-size: 4rem; font-weight: 700; color: #fff; line-height: 1; margin-bottom: 10px; }
    .progress { height: 8px; background-color: rgba(255,255,255,0.1); border-radius: 4px; margin-bottom: 5px; }
    .progress-bar { background-color: #FFB347; }
    .review-item { border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 20px; margin-bottom: 20px; }
    .review-item:last-child { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
    .nav-pills-custom .nav-link { color: #aaa; border-radius: 20px; margin-right: 10px; padding: 6px 16px; font-size: 0.9rem; }
    .nav-pills-custom .nav-link.active { background: rgba(255, 179, 71, 0.2); color: #FFB347; font-weight: 600; border: 1px solid #FFB347; }
</style>

<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Student Reviews</h2>

    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="dashboard-card text-center h-100 d-flex flex-column justify-content-center">
                <div class="rating-large">4.8</div>
                <div class="text-warning fs-4 mb-2">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <div class="text-muted">Course Rating (based on 345 reviews)</div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="dashboard-card h-100">
                <h6 class="text-white mb-3">Rating Distribution</h6>
                
                @foreach([5 => 75, 4 => 15, 3 => 7, 2 => 2, 1 => 1] as $stars => $percent)
                <div class="d-flex align-items-center mb-2">
                    <div class="text-muted small me-3" style="width: 50px;">{{ $stars }} Stars</div>
                    <div class="progress flex-grow-1 me-3">
                        <div class="progress-bar" style="width: {{ $percent }}%"></div>
                    </div>
                    <div class="text-muted small" style="width: 40px; text-align: right;">{{ $percent }}%</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <ul class="nav nav-pills nav-pills-custom m-0">
                <li class="nav-item"><a class="nav-link active" href="#">All Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="#">5 Stars</a></li>
                <li class="nav-item"><a class="nav-link" href="#">4 Stars</a></li>
                <li class="nav-item"><a class="nav-link" href="#">3 Stars</a></li>
            </ul>
            <select class="form-select w-auto bg-dark text-white border-secondary">
                <option>All Courses</option>
                <option>Advanced Laravel Mastery</option>
                <option>Vue.js for Beginners</option>
            </select>
        </div>

        <div>
            @foreach($reviews as $review)
            <div class="review-item">
                <div class="d-flex align-items-start">
                    <img src="{{ $review['avatar'] }}" class="rounded-circle me-3 mt-1" width="48" height="48" alt="Avatar">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="text-white m-0">{{ $review['name'] }}</h6>
                            <span class="text-muted small">{{ $review['date'] }}</span>
                        </div>
                        <div class="mb-1 text-muted small">Course: <span class="text-white">{{ $review['course'] }}</span></div>
                        <div class="text-warning mb-2" style="font-size: 0.85rem;">
                            @for($i=0; $i<5; $i++)
                                @if($i < $review['rating']) <i class="fa-solid fa-star"></i>
                                @else <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="text-light" style="font-size: 0.95rem;">"{{ $review['comment'] }}"</p>
                        <button class="btn btn-sm btn-outline-light"><i class="fa-solid fa-reply me-1"></i>Reply</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
