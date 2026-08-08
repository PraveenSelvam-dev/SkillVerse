@extends('layouts.auth')

@section('title', 'Forgot Password - SkillVerse')

@section('content')
<div class="glass-card text-center">
    <div class="mb-4">
        <div class="d-inline-flex align-items-center justify-content-center bg-gradient p-3 rounded-circle mb-3" style="background: linear-gradient(135deg, rgba(108, 99, 255, 0.2), rgba(255, 101, 132, 0.2)); width: 80px; height: 80px;">
            <i class="fas fa-lock fs-1" style="color: var(--primary-color);"></i>
        </div>
        <h2 class="fw-bold mb-2">Forgot Password?</h2>
        <p class="text-muted" style="font-size: 0.95rem;">No worries, we'll send you reset instructions.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="background: rgba(0, 201, 167, 0.1); border-color: rgba(0, 201, 167, 0.2); color: #00C9A7; text-align: left;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.2); color: #ff6b6b; text-align: left;">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="text-start">
        @csrf
        
        <div class="mb-4 position-relative">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
        </div>
        
        <button type="submit" class="btn btn-gradient mb-4">
            Send Reset Link <i class="fas fa-paper-plane ms-2"></i>
        </button>
    </form>

    <div class="mt-2">
        <a href="{{ route('login') }}" class="text-muted text-decoration-none">
            <i class="fas fa-arrow-left me-2"></i> Back to Login
        </a>
    </div>
</div>
@endsection
