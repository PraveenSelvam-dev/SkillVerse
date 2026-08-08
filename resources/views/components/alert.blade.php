@props([
    'type' => 'info', // success, error, warning, info
    'message'
])

@php
    $alertConfig = match($type) {
        'success' => ['icon' => 'fa-check-circle', 'colorClass' => 'sv-alert-success'],
        'error' => ['icon' => 'fa-exclamation-circle', 'colorClass' => 'sv-alert-danger'],
        'warning' => ['icon' => 'fa-exclamation-triangle', 'colorClass' => 'sv-alert-warning'],
        default => ['icon' => 'fa-info-circle', 'colorClass' => 'sv-alert-info'],
    };
@endphp

<div class="alert sv-alert {{ $alertConfig['colorClass'] }} alert-dismissible fade show d-flex align-items-center" role="alert" data-auto-dismiss="5000">
    <i class="fas {{ $alertConfig['icon'] }} alert-icon me-3"></i>
    <div class="alert-message flex-grow-1">
        {{ $message }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<style>
.sv-alert {
    border: none;
    border-radius: 12px;
    padding: 16px 20px;
    color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.sv-alert .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
    opacity: 0.6;
}
.sv-alert .btn-close:focus {
    box-shadow: none;
}
.alert-icon {
    font-size: 20px;
}
.alert-message {
    font-weight: 500;
    font-size: 14px;
}
.sv-alert-success {
    background: linear-gradient(135deg, #00C9A7, #00967a);
}
.sv-alert-danger {
    background: linear-gradient(135deg, #FF6584, #e63956);
}
.sv-alert-warning {
    background: linear-gradient(135deg, #FFB347, #d98f26);
    color: #1a1a2e;
}
.sv-alert-warning .btn-close {
    filter: none;
    opacity: 0.5;
}
.sv-alert-info {
    background: linear-gradient(135deg, #6C63FF, #4b42d1);
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.sv-alert[data-auto-dismiss]');
        alerts.forEach(alert => {
            const delay = parseInt(alert.getAttribute('data-auto-dismiss'));
            if (delay > 0) {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, delay);
            }
        });
    });
</script>
