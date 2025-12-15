<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis - Student Portal</title>
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
                <h2 class="welcome-title">Welcome to the Student Portal</h2>
                <p class="welcome-text">
                    Access your personalized student dashboard. View your results, track your progress, 
                    access e-learning resources, and stay updated with school announcements.
                </p>

                <div class="highlight-box">
                    <div class="highlight-title">One Platform, All Your Academic Needs</div>
                    <p>
                        Nexis provides a secure and easy-to-use platform for students to manage learning activities, 
                        check assignments, and communicate with teachers efficiently.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="login-panel">
            <div class="login-header">
                <h2 class="login-title">Secure Student Login</h2>
                <p class="login-subtitle">Enter your credentials to access your student dashboard</p>
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
                <h3 class="features-title">Student Portal Features</h3>
                <div class="features-list">
                    <div class="feature-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Track Your Progress</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-book-open"></i>
                        <span>Access Learning Materials</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-bullhorn"></i>
                        <span>Stay Updated with Announcements</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-chart-line"></i>
                        <span>View Your Results & Analytics</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>

</html>
