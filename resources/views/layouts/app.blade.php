<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SkillVerse - Learn, Teach & Grow')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/css/skillverse.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/skillverse.css') }}">
    @endif
    
    <!-- Custom Page Styles -->
    @yield('styles')
</head>
<body class="sv-darkest-bg">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top sv-navbar">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand text-gradient" href="{{ url('/home') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i>SkillVerse
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-white fs-4"></i>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                
                <!-- Search Bar -->
                <form class="d-flex mx-lg-4 my-2 my-lg-0 flex-grow-1 sv-search-bar" style="max-width: 400px;" action="{{ url('/search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" name="q" type="search" placeholder="Search for courses, skills, mentors..." aria-label="Search">
                        <button class="btn sv-btn-glass" type="submit"><i class="fa-solid fa-search"></i></button>
                    </div>
                </form>

                <!-- Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') || request()->is('home*') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tutorials*') ? 'active' : '' }}" href="{{ url('/tutorials') }}"><i class="fa-solid fa-code text-warning me-1"></i> Tutorials</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('courses*') || request()->is('mentors*') || request()->is('services*') || request()->is('communities*') || request()->is('blog*') ? 'active' : '' }}" href="#" id="exploreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Explore
                        </a>
                        <ul class="dropdown-menu shadow-lg sv-glass" aria-labelledby="exploreDropdown">
                            <li><a class="dropdown-item {{ request()->is('courses*') ? 'active' : '' }}" href="{{ url('/courses') }}"><i class="fa-solid fa-book-open text-primary me-2"></i>Courses</a></li>
                            <li><a class="dropdown-item {{ request()->is('mentors*') ? 'active' : '' }}" href="{{ url('/mentors') }}"><i class="fa-solid fa-chalkboard-user text-info me-2"></i>Mentors</a></li>
                            <li><a class="dropdown-item {{ request()->is('services*') ? 'active' : '' }}" href="{{ url('/services') }}"><i class="fa-solid fa-briefcase text-success me-2"></i>Freelance Services</a></li>
                            <li><a class="dropdown-item {{ request()->is('communities*') ? 'active' : '' }}" href="{{ url('/communities') }}"><i class="fa-solid fa-users text-warning me-2"></i>Communities</a></li>
                            <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                            <li><a class="dropdown-item {{ request()->is('blog*') ? 'active' : '' }}" href="{{ url('/blog') }}"><i class="fa-solid fa-newspaper text-danger me-2"></i>Blog</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="triggerLiveToast(event)"><i class="fa-solid fa-video text-danger me-1"></i> Live</a>
                    </li>
                </ul>

                <!-- Auth/Profile Links -->
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn sv-btn-primary rounded-pill px-4" href="{{ url('/register') }}">Join Free</a>
                        </li>
                    @else
                        <!-- Notifications -->
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link position-relative" href="{{ url('/notifications') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-bell fs-5"></i>
                                <span class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                                    3
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg sv-glass" style="width: 320px;">
                                <li class="px-3 py-2 d-flex justify-content-between align-items-center">
                                    <h6 class="dropdown-header p-0 m-0 text-white fw-bold">Notifications</h6>
                                    <span class="badge bg-primary rounded-pill">3 New</span>
                                </li>
                                <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-start py-2" href="{{ url('/notifications') }}">
                                        <div class="icon-box bg-primary rounded-circle p-2 me-2 text-white"><i class="fa-solid fa-award"></i></div>
                                        <div>
                                            <p class="mb-0 text-sm fw-medium text-white">Course Certificate Available!</p>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-start py-2" href="{{ url('/notifications') }}">
                                        <div class="icon-box bg-success rounded-circle p-2 me-2 text-white"><i class="fa-solid fa-check-circle"></i></div>
                                        <div>
                                            <p class="mb-0 text-sm fw-medium text-white">Mentorship Booking Confirmed</p>
                                            <small class="text-muted">5 hours ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-start py-2" href="{{ url('/notifications') }}">
                                        <div class="icon-box bg-warning rounded-circle p-2 me-2 text-white"><i class="fa-solid fa-briefcase"></i></div>
                                        <div>
                                            <p class="mb-0 text-sm fw-medium text-white">New Service Order Received</p>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                                <li><a class="dropdown-item text-center text-primary fw-bold" href="{{ url('/notifications') }}">View All Notifications</a></li>
                            </ul>
                        </li>
                        
                        <!-- Messages -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link position-relative" href="{{ url('/messages') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-envelope fs-5"></i>
                                <span class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-primary" style="font-size: 0.6rem;">
                                    1
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg sv-glass" style="width: 320px;">
                                <li class="px-3 py-2 d-flex justify-content-between align-items-center">
                                    <h6 class="dropdown-header p-0 m-0 text-white fw-bold">Messages</h6>
                                    <span class="badge bg-success rounded-pill">1 Unread</span>
                                </li>
                                <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2" href="{{ url('/messages') }}">
                                        <div class="avatar avatar-sm me-3 bg-secondary rounded-circle text-center text-white d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                                            J
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-0 text-white small fw-bold">John Instructor</h6>
                                                <small class="text-muted" style="font-size: 0.7rem;">10m ago</small>
                                            </div>
                                            <p class="mb-0 text-muted small text-truncate">Hey, thanks for joining the course!</p>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                                <li><a class="dropdown-item text-center text-primary fw-bold" href="{{ url('/messages') }}">Open Messages Inbox</a></li>
                            </ul>
                        </li>

                        <!-- Profile Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=6C63FF&color=fff" alt="Avatar" class="rounded-circle me-2 border border-2 border-primary" width="32" height="32">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg sv-glass">
                                <li><h6 class="dropdown-header">{{ auth()->user()->name ?? 'User Name' }}</h6></li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                        <i class="fa-solid fa-border-all me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('/my-learning') }}"><i class="fa-solid fa-graduation-cap me-2"></i>My Learning</a></li>
                                <li><a class="dropdown-item" href="{{ url('/wishlist') }}"><i class="fa-regular fa-heart me-2"></i>Wishlist</a></li>
                                <li><a class="dropdown-item" href="{{ url('/settings') }}"><i class="fa-solid fa-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ url('/logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="sv-footer">
        <div class="container">
            <div class="row">
                <!-- Brand Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <a class="navbar-brand text-gradient fs-3 fw-bold mb-3 d-block" href="{{ url('/home') }}">
                        <i class="fa-solid fa-graduation-cap me-2"></i>SkillVerse
                    </a>
                    <p class="text-muted mb-4">Empowering learners, mentors, and creators globally. Build your skills, share your knowledge, and shape your future.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                
                <!-- Links Columns -->
                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <h5 class="sv-footer-title">Company</h5>
                    <ul class="sv-footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <h5 class="sv-footer-title">Explore</h5>
                    <ul class="sv-footer-links">
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Find Mentors</a></li>
                        <li><a href="#">Freelance Services</a></li>
                        <li><a href="#">Communities</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="sv-footer-title">Subscribe to Newsletter</h5>
                    <p class="text-muted">Get the latest news and updates right in your inbox.</p>
                    <form class="d-flex mt-3">
                        <input type="email" class="form-control me-2 sv-glass text-white" placeholder="Email address" style="background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.1);">
                        <button class="btn sv-btn-primary" type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="sv-footer-bottom">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-0">&copy; {{ date('Y') }} SkillVerse. All rights reserved.</p>
                <div class="mt-2 mt-md-0">
                    <a href="#" class="text-muted me-3 text-decoration-none hover-primary">Terms of Service</a>
                    <a href="#" class="text-muted text-decoration-none hover-primary">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Live Feature Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="liveFeatureToast" class="toast align-items-center text-white bg-dark border border-primary shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-3 fs-6">
                    <i class="fa-solid fa-video text-danger fs-3"></i>
                    <div>
                        <strong class="text-white">Live Classes Feature</strong>
                        <p class="mb-0 text-muted small">Coming soon! Real-time interactive streams & workshops are currently in development.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    function triggerLiveToast(e) {
        if (e) e.preventDefault();
        var toastEl = document.getElementById('liveFeatureToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 4000 });
            toast.show();
        } else {
            alert('Live Classes Feature: Coming soon! Stay tuned for real-time interactive workshops.');
        }
    }
    </script>

    <!-- Custom Page Scripts -->
    @yield('scripts')
</body>
</html>
