@extends('layouts.auth')

@section('title', 'Register - SkillVerse')

@section('content')
<div class="glass-card register-card text-center">
    <div class="mb-4">
        <a href="{{ url('/home') }}" class="text-decoration-none d-inline-block">
            <h1 class="logo-text">SkillVerse</h1>
        </a>
        <p class="text-muted">Join SkillVerse to learn, teach, and grow.</p>
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

    <form method="POST" action="{{ route('register') }}" class="text-start" id="registerForm">
        @csrf
        
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0 position-relative">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
            </div>
            <div class="col-md-6 position-relative">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0 position-relative">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control pe-5" name="password" id="password" placeholder="Password" required minlength="8">
                <div class="progress mt-1" style="height: 4px; background: rgba(255,255,255,0.1); display: none;" id="strengthBarContainer">
                    <div class="progress-bar" id="strengthBar" role="progressbar" style="width: 0%;"></div>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
        </div>

        <label class="form-label text-muted d-block mb-2">I want to join as a:</label>
        <div class="row g-3 mb-4">
            <div class="col-4">
                <label class="role-option active d-block" for="role-student">
                    <i class="fas fa-user-graduate fs-4 mb-2 d-block text-primary"></i>
                    <span>Student</span>
                    <input class="form-check-input role-radio" type="radio" name="role" id="role-student" value="student" checked>
                </label>
            </div>
            <div class="col-4">
                <label class="role-option d-block" for="role-instructor">
                    <i class="fas fa-chalkboard-teacher fs-4 mb-2 d-block text-success"></i>
                    <span>Instructor</span>
                    <input class="form-check-input role-radio" type="radio" name="role" id="role-instructor" value="instructor">
                </label>
            </div>
            <div class="col-4">
                <label class="role-option d-block" for="role-mentor">
                    <i class="fas fa-hands-helping fs-4 mb-2 d-block text-warning"></i>
                    <span>Mentor</span>
                    <input class="form-check-input role-radio" type="radio" name="role" id="role-mentor" value="mentor">
                </label>
            </div>
        </div>
        
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="terms" required>
            <label class="form-check-label text-muted" style="font-size: 0.9rem;" for="terms">
                I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
            </label>
        </div>
        
        <button type="submit" class="btn btn-gradient mb-4">
            Create Account <i class="fas fa-user-plus ms-2"></i>
        </button>
    </form>

    <div class="text-muted mb-3" style="font-size: 0.85rem; position: relative;">
        <hr style="border-color: rgba(255,255,255,0.1); margin-top: 1.5rem;">
        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background: var(--card-bg); padding: 0 10px; border-radius: 4px;">Or sign up with</span>
    </div>

    <div class="row g-2 justify-content-center mb-4">
        <div class="col-2">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('Google')"><i class="fab fa-google"></i></button>
        </div>
        <div class="col-2">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('GitHub')"><i class="fab fa-github"></i></button>
        </div>
        <div class="col-2">
            <button class="btn btn-social w-100" type="button" onclick="triggerSocialToast('Facebook')"><i class="fab fa-facebook-f"></i></button>
        </div>
    </div>

    <p class="mb-0 text-muted">
        Already have an account? <a href="{{ route('login') }}" class="fw-bold">Login</a>
    </p>
</div>
@endsection

@section('scripts')
<script>
    // Role selection styling
    document.querySelectorAll('.role-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.role-option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Password strength indicator
    const password = document.getElementById('password');
    const strengthBarContainer = document.getElementById('strengthBarContainer');
    const strengthBar = document.getElementById('strengthBar');

    password.addEventListener('input', function() {
        const val = this.value;
        if(val.length > 0) {
            strengthBarContainer.style.display = 'flex';
        } else {
            strengthBarContainer.style.display = 'none';
        }
        
        let strength = 0;
        if (val.length >= 8) strength += 1;
        if (val.match(/[a-z]+/)) strength += 1;
        if (val.match(/[A-Z]+/)) strength += 1;
        if (val.match(/[0-9]+/)) strength += 1;
        if (val.match(/[$@#&!]+/)) strength += 1;

        let pct = (strength / 5) * 100;
        strengthBar.style.width = pct + '%';
        
        if(pct <= 20) {
            strengthBar.className = 'progress-bar bg-danger';
        } else if(pct <= 60) {
            strengthBar.className = 'progress-bar bg-warning';
        } else {
            strengthBar.className = 'progress-bar bg-success';
        }
    });
</script>
@endsection
