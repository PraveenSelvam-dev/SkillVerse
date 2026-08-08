@extends('layouts.app')
@section('title', 'Blog | SkillVerse')

@section('content')
<div class="bg-dark py-5 border-bottom border-secondary border-opacity-25 text-center">
    <div class="container">
        <h1 class="display-5 text-white fw-bold mb-3">SkillVerse Blog</h1>
        <p class="text-muted lead mx-auto" style="max-width: 600px;">Insights, tutorials, and stories from the community.</p>
    </div>
</div>

<div class="container py-5">
    @if(isset($posts) && $posts->count() > 0)
        @php $featured = $posts->first(); @endphp
        <!-- Featured Post -->
        <div class="card bg-dark border-0 text-white rounded-4 overflow-hidden mb-5" style="background: linear-gradient(135deg, #16213e, #0f3460);">
            <div class="row g-0 align-items-center">
                <div class="col-md-6 d-flex justify-content-center py-5">
                    <i class="fa-solid fa-rocket fa-6x text-primary opacity-75"></i>
                </div>
                <div class="col-md-6 p-5">
                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">Featured</span>
                    <h2 class="fw-bold mb-3">{{ $featured->title }}</h2>
                    <p class="text-light opacity-75 mb-4">{{ Str::limit($featured->summary ?? $featured->content ?? 'Discover the latest tutorials, technology insights, and career growth strategies on SkillVerse.', 160) }}</p>
                    <a href="{{ url('blog/' . $featured->slug) }}" class="btn btn-outline-light rounded-pill px-4 fw-bold">Read Article</a>
                </div>
            </div>
        </div>
    @endif

    <!-- Post Grid -->
    <div class="row g-4">
        @forelse($posts as $post)
        <div class="col-md-6 col-lg-4">
            <div class="card sv-card border-0 bg-dark h-100 rounded-4" style="background: #16213e !important;">
                <div class="d-flex justify-content-center align-items-center bg-secondary bg-opacity-25" style="height: 200px; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <i class="fa-solid fa-newspaper fa-4x text-light opacity-50"></i>
                </div>
                <div class="card-body p-4 text-white d-flex flex-column">
                    <div class="d-flex justify-content-between mb-3 small">
                        <span class="text-primary fw-bold">{{ is_string($post->category) ? $post->category : ($post->category->name ?? 'Development') }}</span>
                        <span class="text-muted">{{ $post->created_at ? $post->created_at->format('M d, Y') : 'Recent' }}</span>
                    </div>
                    <h5 class="fw-bold mb-3 flex-grow-1">
                        <a href="{{ url('blog/' . $post->slug) }}" class="text-white text-decoration-none hover-primary">
                            {{ $post->title }}
                        </a>
                    </h5>
                    <p class="text-light opacity-75 small mb-0">{{ Str::limit($post->summary ?? $post->content ?? 'Learn key skills and practices to grow your career.', 120) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="fa-solid fa-newspaper fa-3x mb-3 text-secondary"></i>
            <h5>No blog articles published yet</h5>
        </div>
        @endforelse
    </div>

    @if(method_exists($posts, 'links'))
    <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
