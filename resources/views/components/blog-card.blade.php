@props(['post'])

<div class="sv-blog-card">
    <div class="blog-image-wrapper">
        <img src="{{ $post->thumbnail ?? '/images/blog-default.jpg' }}" alt="{{ $post->title ?? 'Blog Post' }}" class="blog-image">
        <div class="blog-date-badge">
            <span class="date-day">{{ \Carbon\Carbon::parse($post->created_at ?? now())->format('d') }}</span>
            <span class="date-month">{{ \Carbon\Carbon::parse($post->created_at ?? now())->format('M') }}</span>
        </div>
    </div>
    
    <div class="blog-content">
        <div class="blog-category">{{ $post->category->name ?? 'Article' }}</div>
        <h4 class="blog-title">
            <a href="/blog/{{ $post->slug ?? '#' }}">{{ $post->title ?? 'Blog Post Title' }}</a>
        </h4>
        <p class="blog-excerpt">{{ Str::limit($post->excerpt ?? 'Read this insightful article to learn more about the topic.', 100) }}</p>
        
        <div class="blog-footer">
            <div class="blog-author">
                <img src="{{ $post->author->avatar ?? '/images/avatar-default.svg' }}" alt="Author" class="author-avatar">
                <span class="author-name">{{ $post->author->name ?? 'Author Name' }}</span>
            </div>
            <div class="blog-read-time">
                <i class="far fa-clock"></i> {{ $post->read_time ?? 5 }} min read
            </div>
        </div>
    </div>
</div>

<style>
.sv-blog-card {
    background: #0f3460;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.sv-blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
}
.blog-image-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
}
.blog-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.sv-blog-card:hover .blog-image {
    transform: scale(1.1);
}
.blog-date-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(26, 26, 46, 0.85);
    backdrop-filter: blur(8px);
    border-radius: 12px;
    padding: 8px 12px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    border: 1px solid rgba(255,255,255,0.1);
}
.date-day {
    display: block;
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    line-height: 1;
}
.date-month {
    display: block;
    font-size: 12px;
    color: #FF6584;
    text-transform: uppercase;
    font-weight: 600;
    margin-top: 2px;
}
.blog-content {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.blog-category {
    font-size: 13px;
    color: #6C63FF;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
}
.blog-title {
    font-size: 20px;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 12px;
}
.blog-title a {
    color: #fff;
    text-decoration: none;
    transition: color 0.2s ease;
}
.blog-title a:hover {
    color: #FF6584;
}
.blog-excerpt {
    font-size: 14px;
    color: #aaa;
    line-height: 1.6;
    margin-bottom: 24px;
    flex-grow: 1;
}
.blog-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.blog-author {
    display: flex;
    align-items: center;
    gap: 10px;
}
.author-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}
.author-name {
    font-size: 14px;
    color: #e0e0e0;
    font-weight: 500;
}
.blog-read-time {
    font-size: 13px;
    color: #888;
    display: flex;
    align-items: center;
    gap: 6px;
}
</style>
