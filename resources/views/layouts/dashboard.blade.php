@extends('layouts.app')

@section('content')
<div class="sv-dashboard-wrapper bg-darkest">
    
    <!-- Sidebar -->
    <aside class="sv-sidebar sv-glass">
        <div class="px-3 mb-4 mt-2 d-flex justify-content-between align-items-center d-lg-none">
            <h5 class="mb-0 text-white fw-bold">Menu</h5>
            <button id="sidebar-toggle-close" class="btn text-white p-0 shadow-none">
                <i class="fa-solid fa-xmark fs-4"></i>
            </button>
        </div>

        <ul class="nav flex-column mb-auto px-2">
            
            @php
                // Defaulting to student for display purposes if not logged in
                $role = auth()->check() ? auth()->user()->role : 'student';
            @endphp

            @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="px-3 mb-3">
                    <label class="text-muted text-uppercase small fw-bold mb-1" style="font-size:0.75rem;"><i class="fa-solid fa-crown text-warning me-1"></i> Admin View Switcher</label>
                    <select class="form-select form-select-sm bg-dark text-white border-primary" onchange="window.location.href=this.value">
                        <option value="{{ url('/admin') }}" {{ request()->is('admin*') ? 'selected' : '' }}>👑 Admin Control Panel</option>
                        <option value="{{ url('/dashboard') }}" {{ request()->is('dashboard*') || request()->is('my-learning*') || request()->is('wishlist*') ? 'selected' : '' }}>🎓 Student Dashboard</option>
                        <option value="{{ url('/instructor/dashboard') }}" {{ request()->is('instructor*') ? 'selected' : '' }}>👨‍🏫 Instructor Dashboard</option>
                        <option value="{{ url('/mentor/dashboard') }}" {{ request()->is('mentor*') ? 'selected' : '' }}>🧠 Mentor Dashboard</option>
                        <option value="{{ url('/freelancer/dashboard') }}" {{ request()->is('freelancer*') ? 'selected' : '' }}>💼 Freelancer Dashboard</option>
                        <option value="{{ url('/community-dashboard') }}" {{ request()->is('community*') ? 'selected' : '' }}>👥 Community Dashboard</option>
                    </select>
                </div>
                <hr class="border-secondary mx-3 my-2">
            @endif

            @if($role === 'student' || (!auth()->check() && !request()->is('instructor*') && !request()->is('mentor*') && !request()->is('freelancer*') && !request()->is('admin*')))
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-border-all"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/my-learning') }}" class="nav-link {{ request()->is('my-learning*') ? 'active' : '' }}">
                        <i class="fa-solid fa-graduation-cap"></i> My Learning
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/wishlist') }}" class="nav-link {{ request()->is('wishlist*') ? 'active' : '' }}">
                        <i class="fa-regular fa-heart"></i> Wishlist
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/messages') }}" class="nav-link {{ request()->is('messages*') ? 'active' : '' }}">
                        <i class="fa-regular fa-envelope"></i> Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/certificates') }}" class="nav-link {{ request()->is('certificates*') ? 'active' : '' }}">
                        <i class="fa-solid fa-certificate"></i> Certificates
                    </a>
                </li>
            @endif

            @if($role === 'instructor' || ($role === 'admin' && request()->is('instructor*')))
                <li class="nav-item">
                    <a href="{{ url('/instructor/dashboard') }}" class="nav-link {{ request()->is('instructor') || request()->is('instructor/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i> Overview
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/instructor/courses') }}" class="nav-link {{ request()->is('instructor/courses*') ? 'active' : '' }}">
                        <i class="fa-solid fa-book-open"></i> My Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/instructor/students') }}" class="nav-link {{ request()->is('instructor/students*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/instructor/revenue') }}" class="nav-link {{ request()->is('instructor/revenue*') ? 'active' : '' }}">
                        <i class="fa-solid fa-wallet"></i> Revenue
                    </a>
                </li>
            @endif
            
            @if($role === 'mentor' || ($role === 'admin' && request()->is('mentor*')))
                <li class="nav-item">
                    <a href="{{ url('/mentor/dashboard') }}" class="nav-link {{ request()->is('mentor-dashboard') || request()->is('mentor/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line"></i> Overview
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/mentor-dashboard/appointments') }}" class="nav-link {{ request()->is('mentor-dashboard/appointments*') ? 'active' : '' }}">
                        <i class="fa-regular fa-calendar-check"></i> Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/mentor-dashboard/availability') }}" class="nav-link {{ request()->is('mentor-dashboard/availability*') ? 'active' : '' }}">
                        <i class="fa-regular fa-clock"></i> Availability
                    </a>
                </li>
            @endif

            @if($role === 'freelancer' || ($role === 'admin' && request()->is('freelancer*')))
                <li class="nav-item">
                    <a href="{{ url('/freelancer/dashboard') }}" class="nav-link {{ request()->is('freelancer') || request()->is('freelancer/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-briefcase"></i> Overview
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/freelancer/services') }}" class="nav-link {{ request()->is('freelancer/services*') ? 'active' : '' }}">
                        <i class="fa-solid fa-list-check"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/freelancer/orders') }}" class="nav-link {{ request()->is('freelancer/orders*') ? 'active' : '' }}">
                        <i class="fa-solid fa-cart-shopping"></i> Orders
                    </a>
                </li>
            @endif

            @if($role === 'admin' && (request()->is('admin*') || (!request()->is('instructor*') && !request()->is('mentor*') && !request()->is('freelancer*') && !request()->is('dashboard*'))))
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge"></i> Admin Panel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/users') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users-gear"></i> Manage Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/courses') }}" class="nav-link {{ request()->is('admin/courses*') ? 'active' : '' }}">
                        <i class="fa-solid fa-photo-film"></i> Manage Content
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/payments') }}" class="nav-link {{ request()->is('admin/payments*') ? 'active' : '' }}">
                        <i class="fa-solid fa-money-bill-transfer"></i> Payments
                    </a>
                </li>
            @endif

            <hr class="border-secondary mx-3">
            
            <li class="nav-item">
                <a href="{{ url('/settings') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gear"></i> Settings
                </a>
            </li>
            
            <!-- Mobile Logout -->
            <li class="nav-item d-lg-none mt-3">
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-danger w-100 text-start bg-transparent border-0">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <div class="sv-dashboard-content">
        <!-- Top Header Breadcrumb area -->
        <div class="sv-dashboard-header d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-secondary sv-fade-in">
            <div class="d-flex align-items-center">
                <!-- Mobile Sidebar Toggle inside Content -->
                <button id="sidebar-toggle" class="btn btn-outline-secondary me-3 d-none d-lg-block border-0 shadow-none sv-glass">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>
                <button class="btn btn-outline-secondary me-3 d-lg-none border-0 shadow-none sv-glass" type="button" data-bs-toggle="collapse" data-bs-target=".sv-sidebar">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>

                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-decoration-none text-muted">Home</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                    <h2 class="h4 mb-0 fw-bold">@yield('page_title', 'Dashboard')</h2>
                </div>
            </div>
            
            <div class="d-flex">
                @yield('header_actions')
            </div>
        </div>

        <!-- Yield main dashboard content -->
        <div class="sv-slide-up">
            @yield('dashboard_content')
        </div>
    </div>
</div>
@endsection
