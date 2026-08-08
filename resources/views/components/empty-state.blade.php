@props([
    'icon' => 'fa-folder-open',
    'title' => 'No Data Found',
    'description' => 'There is currently no data to display here.',
    'actionUrl' => null,
    'actionLabel' => 'Go Back'
])

<div class="sv-empty-state text-center py-5">
    <div class="empty-icon-wrapper mb-4">
        <i class="fas {{ $icon }} empty-icon"></i>
        <div class="icon-backdrop"></div>
    </div>
    <h3 class="empty-title mb-3">{{ $title }}</h3>
    <p class="empty-description text-muted mb-4 mx-auto" style="max-width: 400px;">
        {{ $description }}
    </p>
    @if($actionUrl)
        <a href="{{ $actionUrl }}" class="btn sv-btn-primary px-4 py-2 rounded-pill">
            {{ $actionLabel }}
        </a>
    @endif
</div>

<style>
.sv-empty-state {
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.02);
    border-radius: 16px;
    border: 1px dashed rgba(255, 255, 255, 0.1);
}
.empty-icon-wrapper {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
}
.empty-icon {
    font-size: 48px;
    color: #6C63FF;
    z-index: 2;
}
.icon-backdrop {
    position: absolute;
    width: 80px;
    height: 80px;
    background: rgba(108, 99, 255, 0.1);
    border-radius: 50%;
    z-index: 1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.empty-title {
    color: #e0e0e0;
    font-weight: 700;
}
.sv-btn-primary {
    background: linear-gradient(135deg, #6C63FF, #FF6584);
    color: white;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.sv-btn-primary:hover {
    background: linear-gradient(135deg, #FF6584, #6C63FF);
    box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
    color: white;
}
</style>
