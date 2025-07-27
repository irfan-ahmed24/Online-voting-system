

<?php 
include 'user_info.php';
include 'config.php';


$_SESSION['massage'] = "";

if(isset($_POST['username']) && isset($_POST['password'])){
    $password = $_POST['password'];
    $username = $_POST['username'];

    $sql = "SELECT * FROM all_users WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $user=mysqli_fetch_assoc($result);
        header("Location: ./users/userView.php");
        exit();
    } else {
       $_SESSION['massage'] = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
    <title>Login</title>
  </head>
  <body>
    <nav class="fixed-top">
      <?php
    include "./navbar.php";
    ?>
    </nav>

    <!-- Login Form Section -->
    <div
      class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-secondary bg-gradient mt-5"
    >
      <div class="row w-100 justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="card shadow-lg border-0 rounded-4 my-5">
            <div class="card-body py-4 px-5">
              <!-- Login Header -->
              <div class="text-center mb-4">
                <div class="mb-3">
                  <i class="fas fa-vote-yea fa-3x text-primary"></i>
                </div>
                <h2 class="fw-bold text-dark mb-2">Welcome Back!</h2>
                <p class="text-muted">Please sign in to give Vote</p>
                <p><?php echo $_SESSION['massage'] ?></p>
              </div>


              <!-- Login Form -->
              <form method="POST" action="" id="loginForm">
                <div class="mb-3">
                  <label for="username" class="form-label fw-semibold"
                    >Email or Username</label
                  >
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="fas fa-user text-muted"></i>
                    </span>
                    <input
                      type="text"
                      class="form-control border-start-0 ps-0"
                      id="username"
                      name="username"
                      placeholder="Email or username"
                      required
                    />
                  </div>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label fw-semibold"
                    >Password</label
                  >
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input
                      type="password"
                      class="form-control border-start-0 ps-0"
                      id="password"
                      name="password"
                      placeholder="Enter your password"
                      required
                    />
                    <button
                      class="btn btn-outline-secondary border-start-0"
                      type="button"
                      id="togglePassword"
                    >
                      <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                  </div>
                </div>

                <div class="d-grid mb-3">
                  <button
                    type="submit"
                    name="login"
                    class="btn btn-primary btn-lg rounded-3 fw-semibold"
                  >
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                  </button>
                </div>

                <div class="text-center">
                  <p class="text-muted mb-0">
                    Don't have an account?
                    <a
                      href="./SignUp.php"
                      class="text-decoration-none text-primary fw-semibold"
                      >Sign Up</a
                    >
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- Custom Styles -->
    <style>
      .input-group-text {
        background-color: #f8f9fa !important;
      }

      .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
      }

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

      .card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
      }

      @media (max-width: 576px) {
        .card-body {
          padding: 2rem !important;
        }

        .container-fluid {
          padding: 1rem;
        }
      }
    </style>

    <!-- Password Toggle Script -->
    <script>
      document
        .getElementById("togglePassword")
        .addEventListener("click", function () {
          const passwordInput = document.getElementById("password");
          const eyeIcon = document.getElementById("eyeIcon");

          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
          } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
          }
        });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
