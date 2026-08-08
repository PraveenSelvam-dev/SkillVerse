@extends('layouts.app')
@section('title', 'Service Details | SkillVerse')

@section('content')
<div class="container py-5 text-white">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-muted text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/services" class="text-muted text-decoration-none">Services</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-muted text-decoration-none">Web Development</a></li>
            <li class="breadcrumb-item active text-light">Laravel Web App</li>
        </ol>
    </nav>

    <div class="row g-5">
        <!-- Main Content -->
        <div class="col-lg-8">
            <h2 class="fw-bold mb-4">I will build a Full-Stack Laravel Web Application for your business</h2>
            
            <div class="d-flex align-items-center gap-3 mb-4 border-bottom border-secondary border-opacity-25 pb-4">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=random&color=fff" class="rounded-circle" width="50" height="50">
                <div>
                    <h6 class="mb-0 fw-bold">John Doe <span class="badge bg-primary ms-2">Top Rated</span></h6>
                    <div class="text-warning small mt-1">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 
                        <span class="text-muted ms-1">4.9 (45 reviews)</span>
                    </div>
                </div>
            </div>

            <!-- Gallery Placeholder -->
            <div class="bg-secondary rounded mb-5 d-flex align-items-center justify-content-center" style="height: 400px; background: linear-gradient(135deg, #16213e, #6C63FF);">
                <i class="fa-solid fa-laptop-code fa-5x text-white opacity-50"></i>
            </div>

            <h4 class="fw-bold mb-3">About This Service</h4>
            <div class="text-light opacity-75 mb-5" style="line-height: 1.8;">
                <p>Are you looking for a robust, secure, and scalable web application? I specialize in building custom web applications using the powerful Laravel PHP framework.</p>
                <p><strong>What you get:</strong></p>
                <ul>
                    <li>Custom Laravel 10/11 Development</li>
                    <li>Responsive UI with Bootstrap 5 or Tailwind CSS</li>
                    <li>Secure Authentication (Roles & Permissions)</li>
                    <li>RESTful API integration</li>
                    <li>Database Design & Optimization (MySQL/PostgreSQL)</li>
                    <li>Deployment on VPS (DigitalOcean, AWS, etc.)</li>
                </ul>
                <p>Please contact me before placing an order to discuss your exact requirements.</p>
            </div>
            
            <!-- Freelancer Info -->
            <h4 class="fw-bold mb-4">About the Freelancer</h4>
            <div class="card bg-dark border-secondary border-opacity-25" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-4 mb-3">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" class="rounded-circle" width="80" height="80">
                        <div>
                            <h5 class="fw-bold mb-1">John Doe</h5>
                            <p class="text-muted mb-0">Full-Stack PHP/Laravel Developer</p>
                            <button class="btn btn-outline-light btn-sm rounded-pill mt-2">Contact Me</button>
                        </div>
                    </div>
                    <p class="small text-light opacity-75 mb-0">Hi, I'm John. I have over 5 years of experience building web applications for startups and enterprises. I pride myself on clean code, clear communication, and delivering on time.</p>
                </div>
            </div>
        </div>

        <!-- Sticky Sidebar Pricing -->
        <div class="col-lg-4">
            <div class="card bg-dark border-secondary border-opacity-50 sticky-top" style="top: 20px; border-radius: 12px;">
                <!-- Tabs for tiers -->
                <ul class="nav nav-pills nav-justified border-bottom border-secondary border-opacity-25" id="pricingTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active bg-transparent text-white rounded-0 py-3 fw-bold border-bottom border-primary border-3" data-bs-toggle="tab" data-bs-target="#basic">Basic</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-transparent text-muted rounded-0 py-3 fw-bold" data-bs-toggle="tab" data-bs-target="#standard">Standard</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link bg-transparent text-muted rounded-0 py-3 fw-bold" data-bs-toggle="tab" data-bs-target="#premium">Premium</button>
                    </li>
                </ul>

                <div class="tab-content p-4" id="pricingTabsContent">
                    <div class="tab-pane fade show active" id="basic">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">MVP Application</h5>
                            <h4 class="fw-bold text-success mb-0">$500</h4>
                        </div>
                        <p class="text-light opacity-75 small mb-4">Basic Laravel application with up to 5 pages, authentication, and simple database structure.</p>
                        
                        <div class="d-flex justify-content-between text-muted small fw-bold mb-4">
                            <span><i class="fa-regular fa-clock me-1"></i> 7 Days Delivery</span>
                            <span><i class="fa-solid fa-rotate me-1"></i> 2 Revisions</span>
                        </div>
                        
                        <ul class="list-unstyled small text-light opacity-75 mb-4">
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Functional Website</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Responsive Design</li>
                            <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Source Code</li>
                            <li class="mb-2 text-muted"><i class="fa-solid fa-xmark me-2"></i> Admin Panel</li>
                        </ul>
                        
                        <button class="btn btn-primary w-100 fw-bold py-2 rounded-pill" style="background: #6C63FF; border: none;">Continue ($500)</button>
                    </div>
                    <!-- Other tabs omitted for brevity -->
                </div>
                
                <div class="card-footer bg-transparent border-0 text-center pb-4">
                    <a href="#" class="text-muted text-decoration-none small">Compare Packages</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
