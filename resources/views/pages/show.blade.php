@extends('layouts.app')
@section('title', 'Page Title | SkillVerse')

@section('content')
<div class="bg-dark py-5 border-bottom border-secondary border-opacity-25">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold mb-3">{{ $pageTitle ?? 'Terms of Service' }}</h1>
        <p class="text-muted lead">Last updated: {{ $lastUpdated ?? 'October 15, 2024' }}</p>
    </div>
</div>

<div class="container py-5 text-white">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark border-secondary border-opacity-25 rounded-4 p-4 p-md-5 text-light opacity-75 fs-6" style="line-height: 1.8;">
                
                @if(isset($content))
                    {!! $content !!}
                @else
                    <!-- Dummy Content -->
                    <h3 class="text-white fw-bold mb-4">1. Acceptance of Terms</h3>
                    <p>By accessing and using SkillVerse, you accept and agree to be bound by the terms and provision of this agreement. In addition, when using these particular services, you shall be subject to any posted guidelines or rules applicable to such services.</p>
                    
                    <h3 class="text-white fw-bold mt-5 mb-4">2. User Accounts</h3>
                    <p>To access certain features of the platform, you must register for an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</p>
                    <ul>
                        <li>You are responsible for safeguarding your password.</li>
                        <li>You agree that you will not disclose your password to any third party.</li>
                        <li>You will notify us immediately of any unauthorized use of your account.</li>
                    </ul>
                    
                    <h3 class="text-white fw-bold mt-5 mb-4">3. Content Ownership and Licenses</h3>
                    <p>Instructors retain ownership of the content they post on SkillVerse. By posting content, instructors grant SkillVerse a worldwide, non-exclusive, royalty-free license to use, copy, reproduce, process, adapt, modify, publish, transmit, display, and distribute such content.</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
