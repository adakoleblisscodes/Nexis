<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis - Parent Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
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
            height: 600px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }
        
        /* Left Panel - Parent Focused */
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
        
        /* Parent benefits */
        .parent-benefits {
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
        
        /* Right Panel - Parent Login */
        .login-panel {
            flex: 1;
            padding: 35px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            margin-bottom: 25px;
            text-align: center;
        }
        
        .login-title {
            font-size: 26px;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 8px;
        }
        
        .login-subtitle {
            font-size: 15px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .parent-id-note {
            font-size: 12px;
            color: #888;
            font-style: italic;
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
        
        /* Parent portal features */
        .portal-features {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }
        
        .features-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 15px;
            text-align: center;
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
        
        /* Child selection option */
        .child-selection {
            margin-top: 15px;
            display: none; /* Hidden by default, shown after login */
        }
        
        .child-select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            color: var(--navy-blue);
            background-color: white;
            cursor: pointer;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
                max-width: 450px;
            }
            
            .brand-panel, .login-panel {
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
        <!-- Left Panel - Parent Focused -->
        <div class="brand-panel">
            <div class="brand-header">
                <div class="logo-container">
                    <img src="assets/images/Nexis logo.png" alt="logo" height="65">
                </div>
                <h1 class="platform-name">Nexis</h1>
            </div>

            <div class="welcome-content">
                <h2 class="welcome-title">Parent Engagement Portal</h2>
                <p class="welcome-text">
                    Stay connected with your child's education journey. Monitor academic progress, 
                    communicate with teachers, and stay informed about school activities and events.
                </p>

                <div class="highlight-box">
                    <div class="highlight-title">Your Child's Progress at Your Fingertips</div>
                    <p>Real-time access to academic performance, attendance records, and school communications.</p>
                </div>
                
                <div class="parent-benefits">
                    <div class="benefit-item">
                        <i class="fas fa-chart-line benefit-icon"></i>
                        <span>Track Academic Performance & Grades</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-calendar-check benefit-icon"></i>
                        <span>Monitor Attendance & School Events</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-comments benefit-icon"></i>
                        <span>Direct Communication with Teachers</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-file-invoice-dollar benefit-icon"></i>
                        <span>View Fee Statements & Payments</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Parent Login -->
        <div class="login-panel">
            <div class="login-header">
                <h2 class="login-title">Parent Portal Login</h2>
                <p class="login-subtitle">Access your child's academic information</p>
                <p class="parent-id-note">Use your registered parent email or phone number</p>
            </div>

            <form id="loginForm">
                <div class="form-group">
                    <label class="form-label" for="parentId">
                        <i class="fas fa-user-parent"></i> Parent Email / Phone
                    </label>
                    <input type="text" id="parentId" class="form-input" 
                           placeholder="Enter your registered email or phone" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <div class="password-container">
                        <input type="password" id="password" class="form-input" 
                               placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Remember my login</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="login-button">
                    <span>Access Parent Portal</span>
                    <i class="fas fa-home"></i>
                </button>
            </form>

            <!-- Child Selection (shown after login) -->
            <div class="child-selection" id="childSelection">
                <div class="form-group">
                    <label class="form-label" for="childSelect">
                        <i class="fas fa-child"></i> Select Child
                    </label>
                    <select class="child-select" id="childSelect">
                        <option value="" disabled selected>Select your child</option>
                        <option value="john">John Smith - Grade 5</option>
                        <option value="sarah">Sarah Smith - Grade 8</option>
                    </select>
                </div>
            </div>

            <div class="portal-features">
                <h3 class="features-title">Parent Portal Features</h3>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Grade Reports</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Attendance Tracking</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-envelope"></i>
                        <span>School Notifications</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-receipt"></i>
                        <span>Fee Management</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        
        // Form submission - Parent specific
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const parentId = document.getElementById('parentId').value;
            const password = document.getElementById('password').value;
            
            if (!parentId || !password) {
                alert('Please enter both your email/phone and password');
                return;
            }
            
            const loginButton = this.querySelector('.login-button');
            const originalText = loginButton.innerHTML;
            
            loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
            loginButton.disabled = true;
            
            setTimeout(() => {
                // Show child selection after successful login
                document.getElementById('childSelection').style.display = 'block';
                loginButton.innerHTML = '<span>Continue to Dashboard</span><i class="fas fa-arrow-right"></i>';
                
                // Change form submission to handle child selection
                loginButton.addEventListener('click', function handleContinue() {
                    const childSelect = document.getElementById('childSelect');
                    if (!childSelect.value) {
                        alert('Please select your child first');
                        return;
                    }
                    
                    const childName = childSelect.options[childSelect.selectedIndex].text;
                    alert(`Welcome! Accessing ${childName}'s dashboard...`);
                    
                    // Remove the event listener after use
                    loginButton.removeEventListener('click', handleContinue);
                });
                
                // Simulate showing child selection
                document.getElementById('parentId').disabled = true;
                document.getElementById('password').disabled = true;
                document.getElementById('togglePassword').disabled = true;
                document.getElementById('rememberMe').disabled = true;
                
                loginButton.disabled = false;
            }, 1500);
        });
        
        // Focus on parent ID field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('parentId').focus();
            
            // Auto-select text in demo mode
            document.getElementById('parentId').addEventListener('click', function() {
                if(this.value === '') {
                    this.placeholder = 'e.g., parent@example.com or +1234567890';
                }
            });
        });
    </script>
</body>

</html>