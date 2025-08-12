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
    <title>Online voting system</title>
</head>
<body>
    <nav class="fixed-top">
        <?php 
    include "./navbar.php";
    ?>
    </nav>
    
    
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container-fluid p-0">
        <div class="hero-content d-flex align-items-center justify-content-center text-center text-white">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="hero-text">
                  <h1 class="display-3 fw-bold mb-4 animate-fade-in">
                    Secure Digital Voting
                  </h1>
                  <p class="lead mb-4 animate-fade-in-delay">
                    Experience the future of democratic participation with our secure, transparent, and user-friendly online voting platform.
                  </p>
                  <div class="hero-buttons animate-fade-in-delay-2">
                    <a href="./Is_login.php" class="btn btn-primary btn-lg me-3 mb-3">
                      <i class="fas fa-sign-in-alt me-2"></i>Start Voting
                    </a>
                    <a href="./SignUp.php" class="btn btn-outline-light btn-lg mb-3">
                      <i class="fas fa-user-plus me-2"></i>Register Now
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-12">
            <h2 class="display-5 fw-bold text-dark mb-3">Why Choose Our Platform?</h2>
            <p class="lead text-muted">Cutting-edge technology meets democratic values</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-shield-alt fa-3x text-primary"></i>
              </div>
              <h4 class="fw-bold mb-3">Secure & Encrypted</h4>
              <p class="text-muted">
                Advanced encryption and security protocols ensure your vote remains private and tamper-proof.
              </p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-mobile-alt fa-3x text-success"></i>
              </div>
              <h4 class="fw-bold mb-3">Mobile Friendly</h4>
              <p class="text-muted">
                Vote from anywhere, anytime with our responsive design that works perfectly on all devices.
              </p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-chart-line fa-3x text-warning"></i>
              </div>
              <h4 class="fw-bold mb-3">Real-time Results</h4>
              <p class="text-muted">
                Watch election results update in real-time with transparent and verifiable counting systems.
              </p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-users fa-3x text-info"></i>
              </div>
              <h4 class="fw-bold mb-3">User Friendly</h4>
              <p class="text-muted">
                Intuitive interface designed for voters of all ages and technical backgrounds.
              </p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-clock fa-3x text-danger"></i>
              </div>
              <h4 class="fw-bold mb-3">24/7 Availability</h4>
              <p class="text-muted">
                Our platform is available round the clock during election periods for maximum accessibility.
              </p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100 p-4 text-center bg-white rounded-4 shadow-sm border-0">
              <div class="feature-icon mb-3">
                <i class="fas fa-check-circle fa-3x text-secondary"></i>
              </div>
              <h4 class="fw-bold mb-3">Verified Results</h4>
              <p class="text-muted">
                Every vote is verified and auditable, ensuring complete transparency in the democratic process.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-5 bg-gradient">
      <div class="container">
        <div class="row text-center text-white">
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-item">
              <h2 class="display-4 fw-bold mb-2">10K+</h2>
              <p class="lead">Active Voters</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-item">
              <h2 class="display-4 fw-bold mb-2">500+</h2>
              <p class="lead">Elections Conducted</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-item">
              <h2 class="display-4 fw-bold mb-2">99.9%</h2>
              <p class="lead">Uptime Guarantee</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-item">
              <h2 class="display-4 fw-bold mb-2">100%</h2>
              <p class="lead">Secure Voting</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works py-5">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col-12">
            <h2 class="display-5 fw-bold text-dark mb-3">How It Works</h2>
            <p class="lead text-muted">Simple steps to participate in democratic process</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <div class="step-card text-center">
              <div class="step-number mb-3">
                <span class="badge bg-primary rounded-circle p-3 fs-4">1</span>
              </div>
              <h4 class="fw-bold mb-3">Register</h4>
              <p class="text-muted">Create your secure account with valid credentials and verification.</p>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="step-card text-center">
              <div class="step-number mb-3">
                <span class="badge bg-success rounded-circle p-3 fs-4">2</span>
              </div>
              <h4 class="fw-bold mb-3">Verify</h4>
              <p class="text-muted">Complete identity verification to ensure election integrity.</p>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="step-card text-center">
              <div class="step-number mb-3">
                <span class="badge bg-warning rounded-circle p-3 fs-4">3</span>
              </div>
              <h4 class="fw-bold mb-3">Vote</h4>
              <p class="text-muted">Cast your vote securely during the election period.</p>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="step-card text-center">
              <div class="step-number mb-3">
                <span class="badge bg-info rounded-circle p-3 fs-4">4</span>
              </div>
              <h4 class="fw-bold mb-3">Results</h4>
              <p class="text-muted">View real-time results and election outcomes transparently.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section py-5 bg-primary text-white">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4">Ready to Make Your Voice Heard?</h2>
            <p class="lead mb-4">
              Join thousands of citizens who trust our platform for secure and transparent voting.
            </p>
            <div class="cta-buttons">
              <a href="./SignUp.php" class="btn btn-light btn-lg me-3 mb-3">
                <i class="fas fa-user-plus me-2"></i>Get Started Today
              </a>
              <a href="./admin/Admin_login.php" class="btn btn-outline-light btn-lg mb-3">
                <i class="fas fa-cog me-2"></i>Admin Portal
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4 bg-dark text-white">
      <div class="container">
        <div class="row">
            <h3 class="fw-bold mb-3 text-center">Online Voting System</h3>
        </div>
      </div>
    </footer>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
      /* Hero Section */
      .hero-section {
        height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
      }
      
      .hero-content {
        height: 100vh;
        position: relative;
        z-index: 2;
      }
      
      .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        z-index: 1;
      }
      
      /* Animations */
      .animate-fade-in {
        animation: fadeInUp 1s ease-out;
      }
      
      .animate-fade-in-delay {
        animation: fadeInUp 1s ease-out 0.3s both;
      }
      
      .animate-fade-in-delay-2 {
        animation: fadeInUp 1s ease-out 0.6s both;
      }
      
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      
      /* Features Section */
      .features-section {
        background-color: #f8f9fa;
      }
      
      .feature-card {
        transition: all 0.3s ease;
        border: 1px solid transparent;
      }
      
      .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        border-color: #667eea;
      }
      
      /* Stats Section */
      .stats-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      }
      
      /* Buttons */
      .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
      }
      
      .btn-primary:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
      }
      
      .btn-outline-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
      }
      
      /* Step Cards */
      .step-card {
        padding: 2rem 1rem;
      }
      
      .step-number .badge {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      /* Responsive Design */
      @media (max-width: 768px) {
        .hero-section {
          height: 80vh;
        }
        
        .hero-content {
          height: 80vh;
          padding: 2rem 1rem;
        }
        
        .display-3 {
          font-size: 2.5rem;
        }
        
        .feature-card, .step-card {
          margin-bottom: 2rem;
        }
      }
      
      @media (max-width: 576px) {
        .hero-buttons .btn {
          display: block;
          width: 100%;
          margin-bottom: 1rem;
        }
        
        .cta-buttons .btn {
          display: block;
          width: 100%;
          margin-bottom: 1rem;
        }
      }
    </style>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
</body>
</html>