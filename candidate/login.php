<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Candidate Login</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm w-100">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fas fa-vote-yea me-2"></i>
                Online Voting System
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../login.php">
                    <i class="fas fa-user me-1"></i>User Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-vh-100 d-flex align-items-center bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-9">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <!-- Card Header -->
                        <div class="card-header bg-dark text-white text-center py-4">
                            <div class="admin-icon mb-3">
                                <i class="fas fa-user-shield fa-3x"></i>
                            </div>
                            <h3 class="font-weight-light mb-1">Candidate Access</h3>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-5">
                            <!-- Alert Messages -->
                            <div id="alertContainer">
                                <?php if (isset($massage)): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> <?php echo $massage; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <form id="adminLoginForm" method="POST" action="./is_login.php">
                                <!-- Username Field -->
                                <div class="form-floating mb-4">
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="username" 
                                        name="username" 
                                        placeholder="Username"
                                        required
                                        autocomplete="username"
                                    >
                                    <label for="username">
                                        <i class="fas fa-user me-2"></i>Username
                                    </label>
                                </div>

                                <!-- Password Field -->
                                <div class="form-floating mb-4">
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        id="password" 
                                        name="password" 
                                        placeholder="Password"
                                        required
                                        autocomplete="current-password"
                                    >
                                    <label for="password">
                                        <i class="fas fa-lock me-2"></i>Password
                                    </label>
                                    <div class="password-toggle">
                                        <button type="button" class="btn btn-link p-0" onclick="togglePassword()">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remember Me & Security -->
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                id="rememberMe" 
                                                name="rememberMe"
                                            >
                                            <label class="form-check-label" for="rememberMe">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" class="text-decoration-none small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-dark btn-lg">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        Login to Candidate Panel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .card {
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-bottom: none;
            background: linear-gradient(135deg, #2c3e50, #34495e) !important;
        }

        .admin-icon {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .form-floating {
            position: relative;
        }

        .form-floating .form-control {
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-floating .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            z-index: 5;
        }

        .password-toggle button {
            color: #6c757d;
            text-decoration: none;
        }

        .password-toggle button:hover {
            color: #495057;
        }

        .btn-dark {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .card-body {
                padding: 2rem 1.5rem !important;
            }
            
            .admin-icon i {
                font-size: 2rem !important;
            }
            
            .card-header h3 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 1rem;
            }
            
            .card-body {
                padding: 1.5rem 1rem !important;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous">
  
    </script>
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
