@extends('layouts.app')
@section('title', 'Find Mentors | SkillVerse')

@section('content')
<div class="bg-dark py-5 border-bottom border-secondary border-opacity-25 position-relative overflow-hidden">
    <div class="position-absolute top-0 end-0 w-50 h-100" style="background: radial-gradient(circle at 80% 50%, rgba(108, 99, 255, 0.15) 0%, transparent 70%); pointer-events: none;"></div>
    
    <div class="container position-relative z-1 text-center">
        <h1 class="display-5 text-white fw-bold mb-3">Find Your Perfect Mentor</h1>
        <p class="text-muted lead mb-4 mx-auto" style="max-width: 600px;">1-on-1 guidance from world-class experts to help you achieve your career goals faster.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ url('/mentors') }}" method="GET">
                    <div class="input-group input-group-lg shadow-sm" style="border-radius: 50px; overflow: hidden;">
                        <span class="input-group-text bg-white border-0 text-muted ps-4"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="search" class="form-control border-0 bg-white text-dark" value="{{ request('search') ?? request('q') }}" placeholder="Search by skill, company, or name...">
                        <button type="submit" class="btn text-white px-4 fw-bold" style="background: #6C63FF; border-color: #6C63FF;">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Filter Form -->
        <div class="col-lg-3">
            <form action="{{ url('/mentors') }}" method="GET" id="mentorFilterForm">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <div class="card bg-dark border-secondary border-opacity-25 text-white" style="border-radius: 12px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Filters</h5>
                            @if(request()->hasAny(['expertise', 'max_rate', 'search']))
                                <a href="{{ url('/mentors') }}" class="small text-danger text-decoration-none">Reset All</a>
                            @endif
                        </div>
                        
                        <!-- Expertise Checkboxes -->
                        <div class="mb-4">
                            <h6 class="text-muted small fw-bold text-uppercase mb-3">Expertise</h6>
                            @php
                                $selectedExp = (array) request('expertise', []);
                                $skillsList = ['Frontend', 'Backend', 'Full Stack', 'Data Science', 'Mobile', 'DevOps', 'Cybersecurity', 'UI/UX Design'];
                            @endphp
                            @foreach($skillsList as $skill)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="expertise[]" value="{{ $skill }}" id="ex-{{ $loop->index }}" onchange="document.getElementById('mentorFilterForm').submit()" {{ in_array($skill, $selectedExp) ? 'checked' : '' }}>
                                <label class="form-check-label small text-light" for="ex-{{ $loop->index }}">{{ $skill }}</label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Hourly Rate Slider -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="text-muted small fw-bold text-uppercase mb-0">Max Hourly Rate</h6>
                                <span class="text-primary fw-bold small" id="rateDisplay">${{ request('max_rate', 300) }}/hr</span>
                            </div>
                            <input type="range" class="form-range" name="max_rate" min="20" max="300" step="10" value="{{ request('max_rate', 300) }}" id="rateRange" oninput="document.getElementById('rateDisplay').textContent = '$' + this.value + '/hr'" onchange="document.getElementById('mentorFilterForm').submit()">
                            <div class="d-flex justify-content-between text-muted small mt-1">
                                <span>$20</span>
                                <span>$300+</span>
                            </div>
                        </div>

                        <button type="submit" class="btn w-100 text-white fw-medium" style="background: #6C63FF;">Apply Filters</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Mentors Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                @php
                    $demoMentors = [
                        ['id' => 1, 'name' => 'Dr. Alan Turing', 'title' => 'AI & Machine Learning Specialist', 'rate' => 150, 'exp' => '10 Yrs', 'rating' => 5.0, 'reviews' => 120, 'company' => 'Google', 'skills' => ['Frontend', 'Python', 'TensorFlow']],
                        ['id' => 2, 'name' => 'Ada Lovelace', 'title' => 'Systems Architecture & Backend Lead', 'rate' => 120, 'exp' => '12 Yrs', 'rating' => 4.9, 'reviews' => 85, 'company' => 'Amazon', 'skills' => ['Backend', 'AWS', 'Microservices']],
                        ['id' => 3, 'name' => 'Steve Wozniak', 'title' => 'Hardware & Full Stack Engineer', 'rate' => 200, 'exp' => '20 Yrs', 'rating' => 4.8, 'reviews' => 200, 'company' => 'Apple', 'skills' => ['Full Stack', 'C++', 'IoT']],
                        ['id' => 4, 'name' => 'Grace Hopper', 'title' => 'DevOps & Compiler Specialist', 'rate' => 180, 'exp' => '15 Yrs', 'rating' => 4.9, 'reviews' => 150, 'company' => 'Microsoft', 'skills' => ['DevOps', 'C#', '.NET']],
                        ['id' => 5, 'name' => 'Sarah Johnson', 'title' => 'Frontend & React Master', 'rate' => 95, 'exp' => '8 Yrs', 'rating' => 4.9, 'reviews' => 95, 'company' => 'Meta', 'skills' => ['Frontend', 'React', 'JavaScript']],
                        ['id' => 6, 'name' => 'Michael Chen', 'title' => 'Data Science & Analytics Expert', 'rate' => 140, 'exp' => '9 Yrs', 'rating' => 4.8, 'reviews' => 110, 'company' => 'Netflix', 'skills' => ['Data Science', 'Python', 'SQL']],
                    ];

                    // Filter fallback items if database is empty or filtered
                    $filteredMentors = collect($demoMentors)->filter(function($m) use ($selectedExp) {
                        if (empty($selectedExp)) return true;
                        foreach ($selectedExp as $exp) {
                            if (in_array($exp, $m['skills']) || str_contains(strtolower($m['title']), strtolower($exp))) return true;
                        }
                        return false;
                    })->filter(function($m) {
                        $maxRate = request('max_rate');
                        return !$maxRate || $m['rate'] <= $maxRate;
                    });
                @endphp

                @forelse($mentors->count() > 0 ? $mentors : $filteredMentors as $mentor)
                @php
                    $mName = is_array($mentor) ? $mentor['name'] : ($mentor->user->name ?? 'Mentor Name');
                    $mTitle = is_array($mentor) ? $mentor['title'] : ($mentor->title ?? 'Industry Specialist');
                    $mRate = is_array($mentor) ? $mentor['rate'] : ($mentor->hourly_rate ?? 100);
                    $mRating = is_array($mentor) ? $mentor['rating'] : ($mentor->average_rating ?? 4.9);
                    $mReviews = is_array($mentor) ? $mentor['reviews'] : ($mentor->total_reviews ?? 45);
                    $mId = is_array($mentor) ? $mentor['id'] : ($mentor->id ?? 1);
                    $mSkills = is_array($mentor) ? $mentor['skills'] : ['Frontend', 'Backend', 'Full Stack'];
                @endphp
                <div class="col-md-6">
                    <div class="card bg-dark border-secondary border-opacity-25 h-100 sv-card" style="border-radius: 16px;">
                        <div class="card-body p-4 text-white d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold fs-4" style="width: 55px; height: 55px; background: linear-gradient(135deg, #6C63FF, #FF6584);">
                                        {{ substr($mName, 0, 1) }}
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">
                                            <a href="{{ url('mentors/' . $mId) }}" class="text-white text-decoration-none hover-primary">
                                                {{ $mName }}
                                            </a>
                                        </h5>
                                        <p class="text-primary small mb-1">{{ $mTitle }}</p>
                                        <div class="d-flex gap-2 text-muted small">
                                            <span><i class="fa-solid fa-star text-warning me-1"></i>{{ $mRating }} ({{ $mReviews }} reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                @foreach($mSkills as $s)
                                <span class="badge bg-secondary bg-opacity-25 text-light border border-secondary border-opacity-25 rounded-pill me-1 fw-normal">{{ $s }}</span>
                                @endforeach
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top border-secondary border-opacity-25">
                                <span class="fw-bold fs-5 text-white">${{ number_format($mRate) }}/hr</span>
                                <a href="{{ url('mentors/' . $mId) }}" class="btn btn-primary fw-medium px-4 rounded-pill" style="background: #6C63FF; border: none;">Book</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="fa-solid fa-chalkboard-user fa-3x mb-3 text-secondary"></i>
                    <h5>No mentors match your filter criteria</h5>
                    <a href="{{ url('/mentors') }}" class="btn btn-sm btn-outline-primary mt-2">Clear Filters</a>
                </div>
                @endforelse
            </div>

            @if(method_exists($mentors, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $mentors->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
