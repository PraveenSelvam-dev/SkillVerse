@props([
    'rating' => 0,
    'readonly' => true,
    'size' => 'md', // sm, md, lg
    'inputName' => 'rating'
])

@php
    $sizeClass = match($size) {
        'sm' => 'fs-6',
        'lg' => 'fs-4',
        default => 'fs-5',
    };
    $ratingValue = floatval($rating);
@endphp

<div class="sv-rating-stars {{ $readonly ? 'readonly' : 'interactive' }} {{ $sizeClass }}">
    @if(!$readonly)
        <input type="hidden" name="{{ $inputName }}" id="{{ $inputName }}-input" value="{{ $ratingValue }}">
    @endif
    
    <div class="stars-container">
        @for($i = 1; $i <= 5; $i++)
            @php
                $starClass = 'far fa-star text-muted';
                if ($ratingValue >= $i) {
                    $starClass = 'fas fa-star text-warning';
                } elseif ($ratingValue >= $i - 0.5) {
                    $starClass = 'fas fa-star-half-alt text-warning';
                }
            @endphp
            
            <i class="{{ $starClass }} star-icon" data-value="{{ $i }}"></i>
        @endfor
    </div>
</div>

<style>
.sv-rating-stars {
    display: inline-block;
}
.stars-container {
    display: flex;
    gap: 4px;
}
.sv-rating-stars.interactive .star-icon {
    cursor: pointer;
    transition: transform 0.2s ease, color 0.2s ease;
}
.sv-rating-stars.interactive .star-icon:hover {
    transform: scale(1.2);
}
</style>

@if(!$readonly)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const interactiveStars = document.querySelectorAll('.sv-rating-stars.interactive');
        
        interactiveStars.forEach(container => {
            const stars = container.querySelectorAll('.star-icon');
            const input = container.querySelector('input[type="hidden"]');
            
            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    const val = parseInt(this.getAttribute('data-value'));
                    stars.forEach((s, index) => {
                        if (index < val) {
                            s.className = 'fas fa-star text-warning star-icon';
                        } else {
                            s.className = 'far fa-star text-muted star-icon';
                        }
                    });
                });
                
                star.addEventListener('click', function() {
                    const val = parseInt(this.getAttribute('data-value'));
                    input.value = val;
                    container.setAttribute('data-current-rating', val);
                });
            });
            
            container.querySelector('.stars-container').addEventListener('mouseleave', function() {
                const currentRating = parseFloat(input.value) || 0;
                stars.forEach((s, index) => {
                    const val = index + 1;
                    if (currentRating >= val) {
                        s.className = 'fas fa-star text-warning star-icon';
                    } else if (currentRating >= val - 0.5) {
                        s.className = 'fas fa-star-half-alt text-warning star-icon';
                    } else {
                        s.className = 'far fa-star text-muted star-icon';
                    }
                });
            });
        });
    });
</script>
@endif
