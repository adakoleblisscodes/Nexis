<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis - Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-image: radial-gradient(circle at 10% 20%, rgba(10, 26, 58, 0.05) 0%, transparent 20%),
                            radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 20%);
        }
        
        .container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            height: 650px; /* Slightly taller */
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }
        
        /* Left Panel - Slightly bigger */
        .brand-panel {
            flex: 1;
            background: linear-gradient(145deg, var(--navy-blue) 0%, #152a57 100%);
            color: white;
            padding: 35px 30px;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        .brand-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 40%);
        }
        
        .brand-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
            position: relative;
            z-index: 1;
        }
        
        .logo-container img {
            height: 65px;
            width: auto;
        }
        
        .platform-name {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }
        
        .welcome-content {
            position: relative;
            z-index: 1;
        }
        
        .welcome-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .welcome-text {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 25px;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .highlight-box {
            background: rgba(212, 175, 55, 0.1);
            border-left: 4px solid var(--gold-primary);
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 25px;
        }
        
        .highlight-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--gold-secondary);
            margin-bottom: 8px;
        }
        
        .highlight-box p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.4;
        }
        
        /* Quick benefits */
        .quick-benefits {
            margin-top: 15px;
        }
        
        .benefit-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .benefit-icon {
            color: var(--gold-primary);
            font-size: 14px;
            min-width: 20px;
        }
        
        /* Right Panel - Slightly bigger */
        .login-panel {
            flex: 1;
            padding: 35px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            margin-bottom: 10px;
        }
        
        .login-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 8px;
        }
        
        .login-subtitle {
            font-size: 14px;
            color: #666;
        }
        
        .user-id-section {
            margin-bottom: 25px;
        }
        
        .section-label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--navy-blue);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .role-select {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            color: var(--navy-blue);
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .role-select:focus {
            outline: none;
            border-color: var(--navy-blue);
            box-shadow: 0 0 0 3px rgba(10, 26, 58, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--navy-blue);
        }
        
        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            color: #333;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--navy-blue);
            box-shadow: 0 0 0 3px rgba(10, 26, 58, 0.1);
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s;
        }
        
        .password-toggle:hover {
            color: var(--navy-blue);
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 14px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input {
            accent-color: var(--navy-blue);
        }
        
        .forgot-password {
            color: var(--navy-blue);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
            color: var(--gold-primary);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-secondary) 100%);
            color: var(--navy-blue);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        }
        
        /* Features grid */
        .platform-features {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }
        
        .features-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 15px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #555;
        }
        
        .feature-item i {
            color: var(--gold-primary);
            font-size: 14px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
    .container {
        flex-direction: column;
        height: auto;
        max-width: 450px;
    }

    .brand-panel {
        display: none; /* Hide the left panel on mobile */
    }

    .login-panel {
        flex: 1 1 100%; /* Full width on mobile */
        padding: 25px;
    }

    .brand-header {
        margin-bottom: 25px;
    }
}

    </style>
</head>

<body>
    <div class="container">
        <!-- Left Panel -->
        <div class="brand-panel">
            <div class="brand-header">
                <div class="logo-container">
                    <img src="assets/images/Nexis logo.png" alt="logo" height="65">
                </div>
                <h1 class="platform-name">Nexis</h1>
            </div>

            <div class="welcome-content">
                <h2 class="welcome-title">Welcome to Admin Portal</h2>
                <p class="welcome-text">
                    Access the comprehensive school management system. Manage student records, academic results, communication, and administrative operations securely.
                </p>

                <div class="highlight-box">
                    <div class="highlight-title">Unified Platform</div>
                    <p>Integrated solution for academic management, communication, and administrative tasks in one secure environment.</p>
                </div>
                
                <div class="quick-benefits">
                    <div class="benefit-item">
                        <i class="fas fa-chart-line benefit-icon"></i>
                        <span>Comprehensive Analytics & Reporting</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-shield-alt benefit-icon"></i>
                        <span>Enterprise-grade Security & Encryption</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-sync-alt benefit-icon"></i>
                        <span>Automated Workflows & Processes</span>
                    </div>
                    <div class="benefit-item mb-3">
                        <i class="fas fa-users benefit-icon"></i>
                        <span>Integrated Communication Tools</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="login-panel">
            <div class="login-header">
                <h3 class="login-title">Secure Access Portal</h3>
                <p class="login-subtitle">Enter your credentials to access the platform</p>
            </div>

            <div class="user-id-section">
                <div class="section-label">
                    <i class="fas fa-user-tag"></i>
                    <span>User Role Selection</span>
                </div>
                <select class="role-select" id="userId">
                    <option value="" disabled selected>Select your role</option>
                    <option value="admin">Administrator</option>
                    <option value="head">Head of School</option>
                    <option value="teacher">Subject Teacher</option>
                    <option value="classteacher">Class Teacher</option>
                </select>
            </div>

            <form id="loginForm">
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user-circle"></i> Username or Email
                    </label>
                    <input type="text" id="username" class="form-input" placeholder="Enter username or email address"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <div class="password-container">
                        <input type="password" id="password" class="form-input" placeholder="Enter your password"
                            required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Keep me logged in</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="login-button">
                    <span>Access Platform</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="platform-features">
                <h3 class="features-title">Platform Features</h3>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure Data Encryption</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Real-time Analytics</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-comments"></i>
                        <span>Parent-Teacher Communication</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Student Progress Tracking</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
<script>
    // Password toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
</script>

</html>