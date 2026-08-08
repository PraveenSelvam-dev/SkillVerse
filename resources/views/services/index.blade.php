@extends('layouts.app')
@section('title', 'Freelance Services | SkillVerse')

@section('content')
<div class="bg-dark text-white border-bottom border-secondary border-opacity-25 py-5 text-center">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">Hire Top Freelance Talent</h1>
        <p class="lead text-muted mx-auto mb-4" style="max-width: 600px;">Get your projects done by vetted professionals. From development to design and marketing.</p>
        
        <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">
            @foreach(['Web Development', 'Mobile Apps', 'UI/UX Design', 'SEO', 'Video Editing', 'Copywriting'] as $cat)
                <button class="btn btn-outline-light rounded-pill px-4">{{ $cat }}</button>
            @endforeach
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h4 class="fw-bold mb-0">Explore Services</h4>
        <select class="form-select bg-dark text-white border-secondary w-auto">
            <option>Sort by: Recommended</option>
            <option>Sort by: Best Selling</option>
            <option>Sort by: Newest Arrivals</option>
        </select>
    </div>

    <div class="row g-4">
        @forelse($services as $service)
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-dark border-0 sv-card h-100" style="border-radius: 12px; overflow: hidden; background: #0f3460;">
                <div class="d-flex justify-content-center align-items-center" style="height: 180px; background: linear-gradient(135deg, #2563eb, #7c3aed);">
                    <i class="fa-solid fa-briefcase fa-4x text-white opacity-75"></i>
                </div>
                <div class="card-body p-3 text-white d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center small fw-bold" style="width: 28px; height: 28px;">
                            {{ substr($service->user->name ?? 'F', 0, 1) }}
                        </div>
                        <span class="small text-muted">{{ $service->user->name ?? 'Freelancer' }}</span>
                    </div>
                    
                    <h6 class="fw-bold mb-3 flex-grow-1">
                        <a href="{{ url('services/' . ($service->slug ?? 'service-1')) }}" class="text-white text-decoration-none hover-primary">
                            {{ $service->title ?? 'Professional Service' }}
                        </a>
                    </h6>
                    
                    <div class="d-flex align-items-center mb-3 text-warning small fw-bold">
                        <i class="fa-solid fa-star me-1"></i> {{ number_format($service->average_rating ?? 4.9, 1) }} 
                        <span class="text-muted fw-normal ms-1">({{ $service->total_reviews ?? 24 }})</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-end border-top border-secondary border-opacity-25 pt-3 mt-auto">
                        <span class="text-muted small"><i class="fa-regular fa-clock me-1"></i> {{ $service->delivery_days ?? 3 }} Days</span>
                        <div class="text-end">
                            <small class="text-muted d-block" style="font-size: 0.7rem;">STARTING AT</small>
                            <span class="fw-bold text-success fs-5">${{ number_format($service->starting_price ?? $service->price ?? 150, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="fa-solid fa-briefcase fa-3x mb-3 text-secondary"></i>
            <h5>No services available yet</h5>
        </div>
        @endforelse
    </div>

    @if(method_exists($services, 'links'))
    <div class="d-flex justify-content-center mt-5">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection
