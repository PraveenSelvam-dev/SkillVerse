@props([
    'route' => '#',
    'icon' => 'fa-circle',
    'label' => 'Link',
    'badge' => null
])

@php
    $isActive = request()->url() == url($route) || request()->is(ltrim(parse_url($route, PHP_URL_PATH), '/') . '*');
@endphp

<a href="{{ $route }}" class="sv-sidebar-link {{ $isActive ? 'active' : '' }}">
    <div class="link-icon">
        <i class="fas {{ $icon }}"></i>
    </div>
    <span class="link-label">{{ $label }}</span>
    @if($badge)
        <span class="link-badge">{{ $badge }}</span>
    @endif
</a>

<style>
.sv-sidebar-link {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    color: #aaa;
    text-decoration: none;
    border-radius: 12px;
    margin-bottom: 8px;
    transition: all 0.3s ease;
    gap: 16px;
}
.sv-sidebar-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.05);
}
.sv-sidebar-link.active {
    background: linear-gradient(90deg, rgba(108, 99, 255, 0.15), transparent);
    color: #fff;
    border-left: 4px solid #6C63FF;
}
.link-icon {
    width: 24px;
    text-align: center;
    font-size: 18px;
    transition: color 0.3s ease;
}
.sv-sidebar-link.active .link-icon {
    color: #6C63FF;
}
.link-label {
    font-size: 15px;
    font-weight: 500;
    flex-grow: 1;
}
.link-badge {
    background: #FF6584;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
}
</style>
