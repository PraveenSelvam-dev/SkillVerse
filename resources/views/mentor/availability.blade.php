@extends('layouts.dashboard')

@section('title', 'Availability - Mentor Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-light fw-bold m-0">Set Availability</h2>
        <button class="btn btn-primary px-4" style="background: linear-gradient(135deg, #6C63FF, #FF6584); border: none;"><i class="fas fa-save me-2"></i>Save Changes</button>
    </div>

    <div class="card bg-dark border-0 shadow-sm mb-4" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <label class="form-label text-light">Your Timezone</label>
                    <select class="form-select bg-dark text-light border-secondary">
                        <option value="UTC-8">Pacific Time (US & Canada)</option>
                        <option value="UTC-5" selected>Eastern Time (US & Canada)</option>
                        <option value="UTC+0">London</option>
                        <option value="UTC+5.5">India Standard Time</option>
                    </select>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <p class="text-muted small mb-0"><i class="fas fa-info-circle me-1"></i> Select the times you are available for mentoring sessions. Grey means unavailable.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-dark border-0 shadow-sm" style="background-color: #0f3460 !important; border-radius: 16px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-bordered border-secondary mb-0 text-center" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr>
                            <th class="py-3 text-muted">Time</th>
                            <th class="py-3 text-light">Mon</th>
                            <th class="py-3 text-light">Tue</th>
                            <th class="py-3 text-light">Wed</th>
                            <th class="py-3 text-light">Thu</th>
                            <th class="py-3 text-light">Fri</th>
                            <th class="py-3 text-muted">Sat</th>
                            <th class="py-3 text-muted">Sun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $times = ['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM'];
                        @endphp
                        @foreach($times as $time)
                        <tr>
                            <td class="text-muted align-middle py-3" style="width: 10%;">{{ $time }}</td>
                            @for($i=0; $i<7; $i++)
                                @php
                                    // Randomly mark some as available for dummy data
                                    $isAvailable = ($i < 5 && rand(0, 1) == 1) ? true : false;
                                @endphp
                                <td class="p-2" style="width: 12.8%;">
                                    <div class="w-100 rounded slot-toggle {{ $isAvailable ? 'bg-primary' : 'bg-secondary bg-opacity-25' }}" style="height: 40px; cursor: pointer; transition: all 0.2s;" data-available="{{ $isAvailable ? '1' : '0' }}">
                                        @if($isAvailable)
                                            <i class="fas fa-check text-white mt-2"></i>
                                        @endif
                                    </div>
                                </td>
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .slot-toggle:hover { opacity: 0.8; }
    .slot-toggle.bg-primary { background: linear-gradient(135deg, #6C63FF, #FF6584) !important; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.slot-toggle').forEach(slot => {
            slot.addEventListener('click', function() {
                let isAvail = this.getAttribute('data-available') === '1';
                if(isAvail) {
                    this.setAttribute('data-available', '0');
                    this.classList.remove('bg-primary');
                    this.classList.add('bg-secondary', 'bg-opacity-25');
                    this.innerHTML = '';
                } else {
                    this.setAttribute('data-available', '1');
                    this.classList.remove('bg-secondary', 'bg-opacity-25');
                    this.classList.add('bg-primary');
                    this.innerHTML = '<i class="fas fa-check text-white mt-2"></i>';
                }
            });
        });
    });
</script>
@endsection
