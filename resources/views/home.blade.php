@extends('layouts.app')
@section('title', 'SkillVerse | Learn Anything. Teach Anyone. Earn Everywhere.')

@section('content')
@php
    $skills = ['Python', 'JavaScript', 'React', 'Laravel', 'AI/ML', 'Cloud Computing', 'Cybersecurity', 'UI/UX Design', 'Data Science', 'Flutter', 'Docker', 'Blockchain', 'Web3', 'TypeScript', 'Node.js', 'Go', 'Rust'];
    
    $courses = [
        ['title' => 'Complete Python Bootcamp 2024', 'slug' => 'complete-python-bootcamp-2024', 'instructor' => 'Sarah Johnson', 'rating' => 4.9, 'students' => '50K', 'price' => '$19.99', 'level' => 'Beginner', 'icon' => 'fa-brands fa-python', 'color' => '#3776AB'],
        ['title' => 'Laravel 12 Masterclass', 'slug' => 'laravel-12-masterclass', 'instructor' => 'Taylor Otwell', 'rating' => 4.9, 'students' => '30K', 'price' => '$29.99', 'level' => 'Advanced', 'icon' => 'fa-brands fa-laravel', 'color' => '#FF2D20'],
        ['title' => 'AI & Machine Learning A-Z', 'slug' => 'ai-machine-learning-a-z', 'instructor' => 'Michael Chen', 'rating' => 4.8, 'students' => '45K', 'price' => '$24.99', 'level' => 'Intermediate', 'icon' => 'fa-solid fa-robot', 'color' => '#6C63FF'],
        ['title' => 'React & Next.js Full Course', 'slug' => 'react-nextjs-full-course', 'instructor' => 'Dan Abramov', 'rating' => 4.9, 'students' => '60K', 'price' => 'FREE', 'level' => 'Beginner', 'icon' => 'fa-brands fa-react', 'color' => '#61DAFB'],
    ];
    $courses = array_merge($courses, [
        ['title' => 'AWS Cloud Practitioner', 'slug' => 'aws-cloud-practitioner', 'instructor' => 'David Kim', 'rating' => 4.7, 'students' => '25K', 'price' => '$14.99', 'level' => 'Beginner', 'icon' => 'fa-brands fa-aws', 'color' => '#FF9900'],
        ['title' => 'UI/UX Design with Figma', 'slug' => 'ui-ux-design-with-figma', 'instructor' => 'Emily Rodriguez', 'rating' => 4.9, 'students' => '20K', 'price' => '$19.99', 'level' => 'All Levels', 'icon' => 'fa-brands fa-figma', 'color' => '#F24E1E'],
        ['title' => 'Cybersecurity Fundamentals', 'slug' => 'cybersecurity-fundamentals', 'instructor' => 'Alex Hacker', 'rating' => 4.8, 'students' => '15K', 'price' => '$39.99', 'level' => 'Intermediate', 'icon' => 'fa-solid fa-shield-halved', 'color' => '#00C9A7'],
        ['title' => 'Flutter Mobile Development', 'slug' => 'flutter-mobile-development', 'instructor' => 'Google Devs', 'rating' => 4.8, 'students' => '40K', 'price' => '$22.99', 'level' => 'Beginner', 'icon' => 'fa-brands fa-envira', 'color' => '#02569B'],
    ]);

    $mentors = [
        ['id' => 1, 'name' => 'Dr. Alan Turing', 'expertise' => 'AI & Algorithms', 'exp' => '10 Yrs', 'rate' => '$150/hr', 'rating' => 5.0],
        ['id' => 2, 'name' => 'Ada Lovelace', 'expertise' => 'Systems Architecture', 'exp' => '12 Yrs', 'rate' => '$120/hr', 'rating' => 4.9],
        ['id' => 3, 'name' => 'Steve Wozniak', 'expertise' => 'Hardware & IoT', 'exp' => '20 Yrs', 'rate' => '$200/hr', 'rating' => 4.8],
        ['id' => 4, 'name' => 'Grace Hopper', 'expertise' => 'Compiler Design', 'exp' => '15 Yrs', 'rate' => '$180/hr', 'rating' => 4.9],
    ];

    $services = [
        ['slug' => 'full-stack-laravel-development', 'title' => 'Laravel Development', 'freelancer' => 'John Doe', 'price' => '$500', 'days' => '7 Days', 'rating' => 4.9],
        ['slug' => 'professional-logo-design', 'title' => 'Logo Design', 'freelancer' => 'Jane Smith', 'price' => '$150', 'days' => '3 Days', 'rating' => 4.8],
        ['slug' => 'technical-seo-audit', 'title' => 'SEO Optimization', 'freelancer' => 'Mike Johnson', 'price' => '$300', 'days' => '5 Days', 'rating' => 4.7],
        ['slug' => 'cross-platform-mobile-app', 'title' => 'Mobile App Development', 'freelancer' => 'Sarah Williams', 'price' => '$1500', 'days' => '30 Days', 'rating' => 5.0],
    ];

    $communities = [
        ['slug' => 'laravel-developers', 'name' => 'Laravel Developers', 'members' => '12.5K', 'desc' => 'Discuss all things Laravel, PHP, and web dev.', 'type' => 'Public'],
        ['slug' => 'python-engineers', 'name' => 'Python Engineers', 'members' => '18K', 'desc' => 'From basic scripts to advanced machine learning.', 'type' => 'Public'],
        ['slug' => 'ai-innovators', 'name' => 'AI Innovators', 'members' => '8K', 'desc' => 'Pushing the boundaries of artificial intelligence.', 'type' => 'Private'],
        ['slug' => 'design-masters', 'name' => 'Design Masters', 'members' => '6K', 'desc' => 'UI/UX critiques, inspiration, and resources.', 'type' => 'Public'],
    ];

    $categories = [
        ['name' => 'Programming', 'icon' => 'fa-code', 'count' => '1,200+'],
        ['name' => 'AI/ML', 'icon' => 'fa-brain', 'count' => '850+'],
        ['name' => 'Cloud', 'icon' => 'fa-cloud', 'count' => '600+'],
        ['name' => 'Cybersecurity', 'icon' => 'fa-shield-halved', 'count' => '450+'],
        ['name' => 'Web Dev', 'icon' => 'fa-laptop-code', 'count' => '2,100+'],
        ['name' => 'Mobile Dev', 'icon' => 'fa-mobile-screen', 'count' => '900+'],
        ['name' => 'UI/UX', 'icon' => 'fa-pen-nib', 'count' => '750+'],
        ['name' => 'Business', 'icon' => 'fa-chart-line', 'count' => '1,500+'],
    ];
@endphp

<!-- Hero Section -->
<section class="sv-hero position-relative overflow-hidden text-center text-white py-5 d-flex align-items-center" style="min-height: 80vh; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 50%, rgba(108, 99, 255, 0.15) 0%, transparent 60%); pointer-events: none;"></div>
    <div class="container position-relative z-1 py-5">
        <h1 class="display-3 fw-bold mb-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Learn Anything. Teach Anyone. Earn Everywhere.</h1>
        <p class="lead mb-5 mx-auto" style="max-width: 700px; color: #e0e0e0;">Join 50,000+ learners and instructors on the world's most versatile skill platform. Elevate your career today.</p>
        
        <!-- Search Form -->
        <form action="{{ url('/search') }}" method="GET" class="mx-auto mb-4" style="max-width: 600px;">
            <div class="input-group input-group-lg shadow-lg" style="border-radius: 50px; overflow: hidden;">
                <input type="text" name="q" class="form-control border-0 bg-white text-dark" placeholder="Search courses, mentors, services..." style="padding-left: 25px;">
                <button class="btn btn-primary px-4" type="submit" style="background-color: #6C63FF; border-color: #6C63FF;"><i class="fa-solid fa-search"></i></button>
            </div>
        </form>

        <!-- Category Pills (Clickable) -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            @foreach(['Programming', 'AI', 'Design', 'Business', 'Marketing', 'Photography'] as $pill)
                <a href="{{ url('/courses?search=' . urlencode($pill)) }}" class="badge rounded-pill bg-dark border border-secondary px-3 py-2 text-decoration-none text-white hover-primary" style="background-color: rgba(255,255,255,0.05) !important; backdrop-filter: blur(10px);">
                    {{ $pill }}
                </a>
            @endforeach
        </div>

        <!-- Action CTAs -->
        <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
            <a href="{{ url('/courses') }}" class="btn btn-lg px-4 py-2 text-white shadow" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none; border-radius: 8px;">Start Learning</a>
            <a href="{{ url('/register') }}" class="btn btn-lg btn-outline-light px-4 py-2" style="border-radius: 8px;">Become Instructor</a>
            <a href="{{ url('/communities') }}" class="btn btn-lg btn-outline-light px-4 py-2" style="border-radius: 8px;">Join Community</a>
        </div>

        <!-- Interactive Dynamic Stats Row -->
        <div class="row text-center mt-5 pt-4 border-top border-secondary border-opacity-25 w-75 mx-auto">
            <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('/courses') }}" class="text-decoration-none">
                    <h3 class="fw-bold text-white mb-0">{{ isset($stats->total_students) && $stats->total_students > 0 ? number_format($stats->total_students) . '+' : '50K+' }}</h3>
                    <small class="text-muted">Students</small>
                </a>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('/courses') }}" class="text-decoration-none">
                    <h3 class="fw-bold text-white mb-0">{{ isset($stats->total_courses) && $stats->total_courses > 0 ? number_format($stats->total_courses) . '+' : '2,500+' }}</h3>
                    <small class="text-muted">Courses</small>
                </a>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('/mentors') }}" class="text-decoration-none">
                    <h3 class="fw-bold text-white mb-0">{{ isset($stats->total_instructors) && $stats->total_instructors > 0 ? number_format($stats->total_instructors) . '+' : '500+' }}</h3>
                    <small class="text-muted">Instructors</small>
                </a>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <a href="{{ url('/communities') }}" class="text-decoration-none">
                    <h3 class="fw-bold text-white mb-0">{{ isset($stats->total_communities) && $stats->total_communities > 0 ? number_format($stats->total_communities) . '+' : '100+' }}</h3>
                    <small class="text-muted">Communities</small>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Trending Skills (Clickable Links) -->
<section class="sv-section py-4 bg-dark border-bottom border-secondary border-opacity-25">
    <div class="container overflow-hidden">
        <div class="d-flex gap-3 animate-scroll overflow-auto pb-2" style="white-space: nowrap; scrollbar-width: none;">
            @foreach($skills as $skill)
                <a href="{{ url('/courses?search=' . urlencode($skill)) }}" class="px-4 py-2 rounded-pill text-white fw-medium text-decoration-none hover-primary" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                    <i class="fa-solid fa-fire text-warning me-2"></i>{{ $skill }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Popular Courses -->
<section class="sv-section py-5 bg-dark">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="text-white fw-bold mb-0">Popular Courses</h2>
                <div style="height: 4px; width: 60px; background: linear-gradient(135deg, #6C63FF, #FF6584); border-radius: 2px; margin-top: 8px;"></div>
            </div>
            <a href="{{ url('/courses') }}" class="btn btn-outline-secondary btn-sm rounded-pill text-white">View All Courses <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>

        <div class="row g-4">
            @foreach($courses as $course)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 sv-card border-0 text-white" style="background: #0f3460; border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <a href="{{ url('courses/' . $course['slug']) }}" class="text-decoration-none text-white">
                        <div class="position-relative d-flex align-items-center justify-content-center" style="height: 160px; background: {{ $course['color'] }}; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                            <i class="{{ $course['icon'] }} fa-4x text-white opacity-75"></i>
                            <span class="badge bg-dark position-absolute top-0 end-0 m-2">{{ $course['level'] }}</span>
                        </div>
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold fs-6 mb-2">
                            <a href="{{ url('courses/' . $course['slug']) }}" class="text-white text-decoration-none hover-primary">
                                {{ $course['title'] }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small mb-2"><i class="fa-solid fa-user-tie me-1"></i> {{ $course['instructor'] }}</p>
                        <div class="d-flex align-items-center mb-3">
                            <span class="text-warning small me-1"><i class="fa-solid fa-star"></i> {{ $course['rating'] }}</span>
                            <span class="text-muted small">({{ $course['students'] }})</span>
                        </div>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5 {{ $course['price'] == 'FREE' ? 'text-success' : 'text-white' }}">{{ $course['price'] }}</span>
                            <a href="{{ url('courses/' . $course['slug'] . '/learn') }}" class="btn btn-sm text-white px-3 fw-medium" style="background: #6C63FF; border-radius: 6px;">Enroll</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Top Categories -->
<section class="sv-section py-5" style="background: #16213e;">
    <div class="container">
        <h2 class="text-white fw-bold text-center mb-5">Explore Top Categories</h2>
        <div class="row g-4">
            @foreach($categories as $cat)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ url('/courses?search=' . urlencode($cat['name'])) }}" class="text-decoration-none">
                    <div class="card sv-card border-0 text-center py-4" style="background: rgba(255,255,255,0.03); border-radius: 16px; transition: all 0.3s;">
                        <i class="fa-solid {{ $cat['icon'] }} fa-2x mb-3" style="color: #6C63FF;"></i>
                        <h6 class="text-white fw-bold mb-1">{{ $cat['name'] }}</h6>
                        <small class="text-muted">{{ $cat['count'] }} Courses</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Mentors & Services Split -->
<section class="sv-section py-5 bg-dark">
    <div class="container">
        <div class="row g-5">
            <!-- Mentors -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 class="text-white fw-bold mb-0">Featured Mentors</h3>
                    <a href="{{ url('/mentors') }}" class="text-decoration-none text-primary small">See All</a>
                </div>
                <div class="row g-3">
                    @foreach($mentors as $mentor)
                    <div class="col-12 col-sm-6">
                        <div class="card sv-card border-0 p-3 h-100" style="background: #0f3460; border-radius: 12px;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-white fw-bold me-3" style="width: 50px; height: 50px;">{{ substr($mentor['name'], 0, 1) }}</div>
                                <div>
                                    <h6 class="text-white fw-bold mb-0"><a href="{{ url('/mentors/' . $mentor['id']) }}" class="text-white text-decoration-none hover-primary">{{ $mentor['name'] }}</a></h6>
                                    <small class="text-muted">{{ $mentor['expertise'] }}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small mb-3">
                                <span><i class="fa-solid fa-briefcase me-1"></i>{{ $mentor['exp'] }}</span>
                                <span><i class="fa-solid fa-star text-warning me-1"></i>{{ $mentor['rating'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="fw-bold text-white">{{ $mentor['rate'] }}</span>
                                <a href="{{ url('/mentors/' . $mentor['id']) }}" class="btn btn-sm btn-outline-light rounded-pill">Book</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Freelance Services -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 class="text-white fw-bold mb-0">Top Services</h3>
                    <a href="{{ url('/services') }}" class="text-decoration-none text-primary small">See All</a>
                </div>
                <div class="row g-3">
                    @foreach($services as $service)
                    <div class="col-12 col-sm-6">
                        <div class="card sv-card border-0 p-3 h-100" style="background: #0f3460; border-radius: 12px;">
                            <h6 class="text-white fw-bold mb-2"><a href="{{ url('services/' . $service['slug']) }}" class="text-white text-decoration-none hover-primary">{{ $service['title'] }}</a></h6>
                            <p class="text-muted small mb-3">By {{ $service['freelancer'] }}</p>
                            <div class="d-flex justify-content-between text-muted small mb-3">
                                <span><i class="fa-regular fa-clock me-1"></i>{{ $service['days'] }}</span>
                                <span><i class="fa-solid fa-star text-warning me-1"></i>{{ $service['rating'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="fw-bold text-success">{{ $service['price'] }}</span>
                                <a href="{{ url('services/' . $service['slug']) }}" class="btn btn-sm btn-outline-light rounded-pill">Hire</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Communities -->
<section class="sv-section py-5" style="background: #16213e;">
    <div class="container">
        <h2 class="text-white fw-bold mb-4">Active Communities</h2>
        <div class="row g-4">
            @foreach($communities as $comm)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card sv-card border-0 text-white h-100" style="background: #0f3460; border-radius: 16px;">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6C63FF, #FF6584);">
                            <i class="fa-solid fa-users fa-xl"></i>
                        </div>
                        <h5 class="fw-bold mb-1"><a href="{{ url('communities/' . $comm['slug']) }}" class="text-white text-decoration-none hover-primary">{{ $comm['name'] }}</a></h5>
                        <p class="text-muted small mb-3">{{ $comm['members'] }} Members &bull; {{ $comm['type'] }}</p>
                        <p class="small text-light opacity-75 mb-4">{{ $comm['desc'] }}</p>
                        <a href="{{ url('communities/' . $comm['slug']) }}" class="btn btn-outline-light w-100 rounded-pill mt-auto">Join Community</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA & Newsletter -->
<section class="sv-section py-5 text-white position-relative" style="background: linear-gradient(135deg, #6C63FF, #FF6584);">
    <div class="container py-4 text-center">
        <h2 class="fw-bold mb-3">Ready to start your journey?</h2>
        <p class="lead mb-4">Join SkillVerse today and unlock your potential.</p>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 col-lg-4">
                <form action="#" method="GET" class="input-group">
                    <input type="email" class="form-control text-dark" placeholder="Enter your email to stay updated" aria-label="Email">
                    <button class="btn btn-dark px-4" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/courses') }}" class="btn btn-light btn-lg px-5 text-dark fw-bold rounded-pill">Start Learning</a>
            <a href="{{ url('/register') }}" class="btn btn-outline-light btn-lg px-5 fw-bold rounded-pill">Become an Instructor</a>
        </div>
    </div>
</section>

<style>
    .sv-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.3) !important;
    }
</style>
@endsection
