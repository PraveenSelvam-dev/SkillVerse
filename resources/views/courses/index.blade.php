@extends('layouts.app')
@section('title', 'Courses | SkillVerse')

@section('content')
<div class="container py-5">
    <!-- Header & Search Info -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="text-white fw-bold mb-1">
                @if(request('search') || request('q'))
                    Search Results for "{{ request('search') ?? request('q') }}"
                @elseif(request('category'))
                    Category Filter: {{ request('category') }}
                @else
                    Explore Courses
                @endif
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-muted text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>
        
        <div class="col-md-6 d-flex justify-content-md-end mt-3 mt-md-0 gap-2">
            <form action="{{ url('/courses') }}" method="GET" class="d-flex align-items-center gap-2">
                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                @if(request('level')) <input type="hidden" name="level" value="{{ request('level') }}"> @endif
                @if(request('price')) <input type="hidden" name="price" value="{{ request('price') }}"> @endif

                <select name="sort" class="form-select bg-dark text-white border-secondary w-auto" onchange="this.form.submit()">
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Sort by: Popular</option>
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Sort by: Newest</option>
                    <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar Filters Form -->
        <div class="col-lg-3 mb-4">
            <form action="{{ url('/courses') }}" method="GET" id="courseFilterForm">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif

                <div class="card bg-dark border-secondary border-opacity-25 text-white" style="border-radius: 12px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Filters</h5>
                            @if(request()->hasAny(['category', 'level', 'price', 'search']))
                                <a href="{{ url('/courses') }}" class="small text-danger text-decoration-none">Reset All</a>
                            @endif
                        </div>
                        
                        <!-- Categories -->
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-2">Category</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="category" value="" id="cat-all" onchange="this.form.submit()" {{ !request('category') ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="cat-all">All Categories</label>
                            </div>
                            @foreach($categories ?? [] as $cat)
                            @php $catVal = $cat->id ?? $cat->name; @endphp
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="category" value="{{ $catVal }}" id="cat-{{ $loop->index }}" onchange="this.form.submit()" {{ request('category') == $catVal ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="cat-{{ $loop->index }}">
                                    {{ $cat->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Level -->
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-2">Level</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="level" value="all" id="lvl-all" onchange="this.form.submit()" {{ !request('level') || request('level') == 'all' ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="lvl-all">All Levels</label>
                            </div>
                            @foreach(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'] as $lvlKey => $lvlName)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="level" value="{{ $lvlKey }}" id="lvl-{{ $lvlKey }}" onchange="this.form.submit()" {{ request('level') == $lvlKey ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="lvl-{{ $lvlKey }}">
                                    {{ $lvlName }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase small fw-bold mb-2">Price</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price" value="" id="price-all" onchange="this.form.submit()" {{ !request('price') ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="price-all">All Prices</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price" value="paid" id="price-paid" onchange="this.form.submit()" {{ request('price') == 'paid' ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="price-paid">Paid Courses</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price" value="free" id="price-free" onchange="this.form.submit()" {{ request('price') == 'free' ? 'checked' : '' }}>
                                <label class="form-check-label text-light small" for="price-free">Free Courses</label>
                            </div>
                        </div>

                        <button type="submit" class="btn w-100 text-white mt-2" style="background: #6C63FF;">Apply Filters</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Course Grid -->
        <div class="col-lg-9">
            <div class="row g-4">
                @forelse($courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="card sv-card border-0 bg-dark text-white h-100" style="border-radius: 12px; overflow: hidden; background: #16213e !important;">
                        <div class="d-flex justify-content-center align-items-center bg-primary bg-opacity-20" style="height: 160px; background: linear-gradient(135deg, #2563eb, #7c3aed);">
                            <i class="fa-solid fa-graduation-cap fa-4x text-white opacity-75"></i>
                        </div>
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary rounded-pill small">{{ ucfirst($course->level ?? 'All Levels') }}</span>
                                <span class="text-warning small fw-bold"><i class="fa-solid fa-star me-1"></i> {{ number_format($course->average_rating ?? 4.9, 1) }}</span>
                            </div>
                            
                            <h6 class="fw-bold mb-2 flex-grow-1">
                                <a href="{{ url('courses/' . $course->slug) }}" class="text-white text-decoration-none hover-primary">
                                    {{ $course->title }}
                                </a>
                            </h6>
                            
                            <p class="text-muted small mb-3"><i class="fa-solid fa-user me-1"></i> {{ $course->instructor->name ?? 'SkillVerse Instructor' }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center border-top border-secondary border-opacity-25 pt-3 mt-auto">
                                <span class="fw-bold text-success fs-5">{{ $course->price == 0 ? 'FREE' : '$' . number_format($course->price ?? 49.99, 2) }}</span>
                                <a href="{{ url('courses/' . $course->slug . '/learn') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    Start Learning
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="fa-solid fa-graduation-cap fa-3x mb-3 text-secondary"></i>
                    <h5>No courses match your filter criteria</h5>
                    <a href="{{ url('/courses') }}" class="btn btn-sm btn-outline-primary mt-2">Clear Filters</a>
                </div>
                @endforelse
            </div>

            @if(method_exists($courses, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $courses->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
