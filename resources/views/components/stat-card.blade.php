@props([
    'icon' => 'fa-chart-bar',
    'value' => '0',
    'label' => 'Statistic',
    'color' => 'primary', // primary, success, warning, danger, info
    'trend' => null // e.g., '+5.4%' or '-2.1%'
])

@php
    $colorClass = match($color) {
        'primary' => 'text-primary bg-primary bg-opacity-10',
        'success' => 'text-success bg-success bg-opacity-10',
        'warning' => 'text-warning bg-warning bg-opacity-10',
        'danger' => 'text-danger bg-danger bg-opacity-10',
        'info' => 'text-info bg-info bg-opacity-10',
        default => 'text-primary bg-primary bg-opacity-10',
    };
    
    $isPositiveTrend = $trend && str_starts_with($trend, '+');
    $isNegativeTrend = $trend && str_starts_with($trend, '-');
@endphp

<div class="sv-stat-card">
    <div class="stat-icon-wrapper {{ $colorClass }}">
        <i class="fas {{ $icon }}"></i>
    </div>
    
    <div class="stat-content">
        <h3 class="stat-value">{{ $value }}</h3>
        <p class="stat-label">{{ $label }}</p>
    </div>
    
    @if($trend)
        <div class="stat-trend {{ $isPositiveTrend ? 'text-success' : ($isNegativeTrend ? 'text-danger' : 'text-muted') }}">
            <i class="fas {{ $isPositiveTrend ? 'fa-arrow-up' : ($isNegativeTrend ? 'fa-arrow-down' : 'fa-minus') }}"></i>
            {{ ltrim($trend, '+-') }}
        </div>
    @endif
</div>

<style>
.sv-stat-card {
    background: #1a1a2e;
    border-radius: 12px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}
.sv-stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    border-color: rgba(255, 255, 255, 0.1);
}
.stat-icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}
.stat-content {
    flex-grow: 1;
}
.stat-value {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 4px;
    line-height: 1.2;
}
.stat-label {
    font-size: 14px;
    color: #aaa;
    margin: 0;
}
.stat-trend {
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    background: rgba(255, 255, 255, 0.03);
    padding: 4px 8px;
    border-radius: 8px;
}
</style>
