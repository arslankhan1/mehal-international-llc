<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Mehal International</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #2c3e38 0%, #1a2620 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: 20px;
        }

        .register-header {
            background: #2c3e38;
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .register-header h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: 600;
        }

        .register-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .register-body {
            padding: 40px 30px;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e38;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #2c3e38;
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 56, 0.15);
        }

        .btn-register {
            background: #2c3e38;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #1a2620;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 56, 0.3);
        }

        .register-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e5e5e5;
        }

        .register-footer a {
            color: #2c3e38;
            text-decoration: none;
            font-weight: 600;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .logo-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .otp-container {
            display: none;
        }

        .otp-container.active {
            display: block;
        }

        .otp-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border: 2px solid #e5e5e5;
            border-radius: 10px;
        }

        .otp-input:focus {
            border-color: #2c3e38;
            outline: none;
        }

        .otp-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #2c3e38;
        }

        .otp-info strong {
            color: #2c3e38;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-header">
            <div class="logo-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2>Create Account</h2>
            <p>Join Mehal International</p>
        </div>

        <div class="register-body">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Registration Form -->
            <div id="registration-form">
                <form method="POST" action="{{ route('register.send.otp') }}" id="registerForm">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required autofocus
                            placeholder="Enter your full name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required placeholder="Create a password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock"></i> Confirm Password
                        </label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required placeholder="Confirm your password">
                    </div>

                    <button type="submit" class="btn btn-register">
                        <i class="fas fa-paper-plane"></i> Send OTP
                    </button>
                </form>
            </div>

            <!-- OTP Verification Form -->
            <div id="otp-verification" class="otp-container">
                <div class="otp-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>Your OTP: 123456</strong>
                    <p class="mb-0 mt-2">We've sent a verification code to your email. Please enter it below.</p>
                </div>

                <form method="POST" action="{{ route('register.verify.otp') }}" id="otpForm">
                    @csrf
                    <input type="hidden" name="name" id="otp_name">
                    <input type="hidden" name="email" id="otp_email">
                    <input type="hidden" name="password" id="otp_password">

                    <div class="mb-3">
                        <label class="form-label text-center d-block">
                            <i class="fas fa-key"></i> Enter OTP
                        </label>
                        <div class="otp-inputs">
                            <input type="text" class="otp-input" maxlength="1" name="otp1" required>
                            <input type="text" class="otp-input" maxlength="1" name="otp2" required>
                            <input type="text" class="otp-input" maxlength="1" name="otp3" required>
                            <input type="text" class="otp-input" maxlength="1" name="otp4" required>
                            <input type="text" class="otp-input" maxlength="1" name="otp5" required>
                            <input type="text" class="otp-input" maxlength="1" name="otp6" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register">
                        <i class="fas fa-check-circle"></i> Verify & Register
                    </button>

                    <div class="text-center mt-3">
                        <a href="javascript:void(0)" onclick="showRegistrationForm()" class="text-muted">
                            <i class="fas fa-arrow-left"></i> Back to registration
                        </a>
                    </div>
                </form>
            </div>

            <div class="register-footer">
                <p class="mb-2">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                <p><a href="{{ route('home') }}"><i class="fas fa-home"></i> Back to Home</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle registration form submission
        document.getElementById('registerForm')?.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const passwordConfirm = document.getElementById('password_confirmation').value;

            // Validate passwords match
            if (password !== passwordConfirm) {
                alert('Passwords do not match!');
                return;
            }

            // Store values for OTP form
            document.getElementById('otp_name').value = name;
            document.getElementById('otp_email').value = email;
            document.getElementById('otp_password').value = password;

            // Show OTP form
            document.getElementById('registration-form').style.display = 'none';
            document.getElementById('otp-verification').classList.add('active');

            // Focus first OTP input
            document.querySelector('.otp-input').focus();
        });

        // OTP Input Auto-focus
        const otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (this.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && this.value === '' && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });

        // Show registration form again
        function showRegistrationForm() {
            document.getElementById('registration-form').style.display = 'block';
            document.getElementById('otp-verification').classList.remove('active');
        }
    </script>
</body>

</html>
