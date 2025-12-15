<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis - Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <!-- Left Panel - Branding & Welcome -->
        <div class="brand-panel">
            <div class="brand-header">

                <div class="logo-container">
                    <img src="assets/images/Nexis logo.png" alt="logo" height="90px">
                </div>
                <h1 class="platform-name">Nexis</h1>
            </div>

            <div class="welcome-content">
                <h2 class="welcome-title">Welcome to the Admin Portal</h2>
                <p class="welcome-text">
                    Welcome back! Log in to manage your school's operations - maintain records,
                    manage results, communicate with parents and students, and carry out other administrative actions.
                </p>

                <div class="highlight-box">
                    <div class="highlight-title">One Platform, Complete Control</div>
                    <p>Nexis provides integrated tools for academic management, communication, and administrative
                        operations in one secure environment.</p>
                </div>

                <div class="user-id-section">
                    <div class="section-label">
                        <i class="fas fa-user-tag"></i>
                        <span>User Identification</span>
                    </div>
                    <select class="role-select" id="userId">
                        <option value="" disabled selected>Select your role</option>
                        <option value="admin">Administrator</option>
                        <option value="head">Head of School</option>
                        <option value="teacher">Subject Teacher</option>
                        <option value="classteacher">Class Teacher</option>
                        <option value="parent">Parent</option>
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>


        </div>

        <!-- Right Panel - Login Form -->
        <div class="login-panel">
            <div class="login-header">
                <h2 class="login-title">Secure Access Portal</h2>
                <p class="login-subtitle">Enter your credentials to access the Nexis platform</p>
            </div>

            <form id="loginForm">
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user-circle"></i> Username
                    </label>
                    <input type="text" id="username" class="form-input" placeholder="Enter your username or email"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-key"></i> Password
                    </label>
                    <div class="password-container">
                        <input type="password" id="password" class="form-input" placeholder="Enter your secure password"
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

                <button type="submit" class="login-button button-gold">
                    <span>Access Platform</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="platform-features">
                <h3 class="features-title">Nexis Platform Features</h3>
                <div class="features-list">
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

    <script src="assets/js/main.js"></script>
</body>

</html>