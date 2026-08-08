@extends('layouts.auth')

@section('title', 'Login - SkillVerse')

@section('content')
<div class="glass-card text-center">
    <div class="mb-4">
        <a href="{{ url('/home') }}" class="text-decoration-none d-inline-block">
            <h1 class="logo-text">SkillVerse</h1>
        </a>
        <p class="text-muted">Welcome back! Please login to your account.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.2); color: #ff6b6b; text-align: left;">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.2); color: #ff6b6b; text-align: left;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="text-start">
        @csrf
        
        <div class="mb-3 position-relative">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
        </div>
        
        <div class="mb-3 position-relative">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control pe-5" name="password" id="password" placeholder="Password" required>
            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-muted" style="font-size: 0.9rem;" for="remember">
                    Remember me
                </label>
            </div>
            <a href="{{ route('password.request') }}" style="font-size: 0.9rem;">Forgot password?</a>
        </div>
        
        <button type="submit" class="btn btn-gradient mb-4">
            Sign In <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>

    <div class="text-muted mb-3" style="font-size: 0.85rem; position: relative;">
        <hr style="border-color: rgba(255,255,255,0.15); margin-top: 1.5rem;">
        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background: #1e1e38; color: #cbd5e1; padding: 0 12px; border-radius: 4px; font-weight: 500;">Or continue with</span>
    </div>

    <div class="row g-2 mb-4">
        <div class="col-4">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('Google')"><i class="fab fa-google"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('GitHub')"><i class="fab fa-github"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('Facebook')"><i class="fab fa-facebook-f"></i></button>
        </div>
    </div>

    <p class="mb-0 text-muted">
        Don't have an account? <a href="{{ route('register') }}" class="fw-bold">Register</a>
    </p>
</div>
@endsection

@section('scripts')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection
