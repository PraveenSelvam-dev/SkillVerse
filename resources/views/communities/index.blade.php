@extends('layouts.app')
@section('title', 'Communities | SkillVerse')

@section('content')
<div class="bg-dark text-white border-bottom border-secondary border-opacity-25 py-5 text-center">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">SkillVerse Communities</h1>
        <p class="lead text-muted mx-auto mb-4" style="max-width: 600px;">Connect with like-minded learners and professionals. Share knowledge, ask questions, and grow together.</p>
        <a href="{{ url('/community-dashboard') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;">+ Create Community</a>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @forelse($communities as $comm)
        <div class="col-md-6 col-lg-3">
            <div class="card sv-card border-0 text-white h-100" style="background: #0f3460; border-radius: 16px;">
                <!-- Cover -->
                <div style="height: 80px; background: linear-gradient(135deg, #2563eb, #7c3aed); border-top-left-radius: 16px; border-top-right-radius: 16px;"></div>
                
                <div class="card-body text-center pt-0 position-relative">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 bg-dark border border-4 border-dark" style="width: 70px; height: 70px; margin-top: -35px;">
                        <i class="fa-solid fa-users fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-1">
                        <a href="{{ url('communities/' . ($comm->slug ?? 'community-1')) }}" class="text-white text-decoration-none hover-primary">
                            {{ $comm->name }}
                        </a>
                    </h5>
                    <p class="text-muted small mb-3">
                        <i class="fa-solid fa-users me-1"></i> {{ number_format($comm->members_count ?? rand(100, 5000)) }} members &bull; {{ ucfirst($comm->privacy ?? 'Public') }}
                    </p>
                    <p class="small text-light opacity-75 mb-4 px-2">{{ Str::limit($comm->description ?? 'Connect, share ideas, and build projects together with fellow SkillVerse members.', 80) }}</p>
                    <form action="{{ url('communities/' . ($comm->slug ?? 'community-1') . '/join') }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100 rounded-pill fw-medium">Join Community</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="fa-solid fa-users fa-3x mb-3 text-secondary"></i>
            <h5>No communities created yet</h5>
        </div>
        @endforelse
    </div>

    @if(method_exists($communities, 'links'))
    <div class="d-flex justify-content-center mt-5">
        {{ $communities->links() }}
    </div>
    @endif
</div>
@endsection
