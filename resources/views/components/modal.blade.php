@props([
    'id',
    'title' => 'Modal Title',
    'size' => 'md' // sm, md, lg, xl
])

<div class="modal fade sv-modal" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-{{ $size }}">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                {{ $body ?? $slot }}
            </div>
            @isset($footer)
                <div class="modal-footer border-top-0 pt-0">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>

<style>
.sv-modal .modal-content {
    background: #1a1a2e;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    color: #e0e0e0;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
}
.sv-modal .modal-header {
    padding: 24px 24px 0;
}
.sv-modal .modal-title {
    color: #fff;
    font-size: 20px;
}
.sv-modal .modal-body {
    padding: 24px;
}
.sv-modal .modal-footer {
    padding: 0 24px 24px;
}
.sv-modal .btn-close:focus {
    box-shadow: none;
}
.modal-backdrop.show {
    opacity: 0.7;
    backdrop-filter: blur(5px);
}
</style>
