<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SkillVerse - Auth')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #FF6584;
            --dark-bg: #1a1a2e;
            --darker-bg: #16213e;
            --card-bg: rgba(255, 255, 255, 0.05);
            --text-light: #f1f5f9;
        }

        .text-muted {
            color: #a0aec0 !important;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(45deg, var(--dark-bg), var(--darker-bg));
            overflow: hidden;
        }

        .bg-animation::before, .bg-animation::after {
            content: '';
            position: absolute;
            width: 40vw;
            height: 40vw;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            animation: float 10s infinite ease-in-out alternate;
        }

        .bg-animation::before {
            background: rgba(108, 99, 255, 0.2);
            top: -10%;
            left: -10%;
        }

        .bg-animation::after {
            background: rgba(255, 101, 132, 0.2);
            bottom: -10%;
            right: -10%;
            animation-delay: -5s;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(30px, 30px); }
        }

        /* Glassmorphism Card */
        .glass-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            margin: 2rem;
            transition: transform 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
        }

        .glass-card.register-card {
            max-width: 600px;
        }

        /* Logo Gradient */
        .logo-text {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        /* Form Controls */
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 8px;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: var(--primary-color);
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 4;
            display: flex;
            align-items: center;
            padding-left: 1rem;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Gradient Button */
        .btn-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-gradient:hover {
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
            transform: translateY(-2px);
            color: white;
        }

        /* Social Buttons */
        .btn-social {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 8px;
            padding: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .btn-social:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        /* Links */
        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
        }

        /* Custom Checkbox/Radio */
        .form-check-input {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Role Selection Radios */
        .role-option {
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .role-option:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .role-option.active {
            border-color: var(--primary-color);
            background: rgba(108, 99, 255, 0.1);
        }
        
        .form-check-input.role-radio {
            display: none;
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    @yield('content')

    <!-- Social Login Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="socialAuthToast" class="toast align-items-center text-white bg-dark border border-primary shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-3 fs-6">
                    <i class="fa-solid fa-shield-halved text-primary fs-3"></i>
                    <div>
                        <strong class="text-white" id="socialToastTitle">Social OAuth Login</strong>
                        <p class="mb-0 text-muted small" id="socialToastMsg">Authentication feature is coming soon! Please sign in using your email & password.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function triggerSocialToast(provider) {
        var toastEl = document.getElementById('socialAuthToast');
        var titleEl = document.getElementById('socialToastTitle');
        var msgEl = document.getElementById('socialToastMsg');
        
        if (titleEl && msgEl) {
            titleEl.textContent = provider + ' Login';
            msgEl.textContent = provider + ' OAuth login is coming soon! Please sign in using your email & password.';
        }
        
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 4000 });
            toast.show();
        } else {
            alert(provider + ' login is coming soon! Please sign in using your email & password.');
        }
    }
    </script>

    @yield('scripts')
</body>
</html>
