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
    <title>Sign Up</title>
  </head>
  <body>
    <nav class="fixed-top navbar navbar-expand-lg bg-secondary bg-gradient">
      <div class="container-fluid">
        <a class="navbar-brand mx-3 text-light" href="#"
          >Online Voting System</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a
                class="nav-link active text-light"
                aria-current="page"
                href="./Admin.php"
                >Dashboard</a
              >
            </li>
          </ul>
          <a class="btn btn-primary mx-3" href="./Admin.php"> Admin Penel </a>
           <a class="btn btn-success mx-3" href="./../index.php"> Sign Out </a>
        </div>
      </div>
      
    </nav>
    <!-- Sign Up Form Section -->
    <div
      class="container-fluid d-flex align-items-center justify-content-center bg-info bg-gradient mt-5"
    >
      <div class="row w-100 justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-12 col-xl-10">
          <div class="card shadow-lg border-0 rounded-4 my-5">
            <div class="card-body py-3 px-5">
              <!-- Sign Up Header -->
              <div class="text-center mb-4">
                <div class="mb-3">
                  <i class="fas fa-user-plus fa-3x text-primary"></i>
                </div>
                <h2 class="fw-bold text-dark mb-2">Add Candidate</h2>
              </div>

              <!-- Sign Up Form -->
              <form
                method="POST"
                action="SignUp.php"
                id="signUpForm"
                enctype="multipart/form-data"
                novalidate
              >
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label fw-semibold"
                      >First Name</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-user text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 ps-0"
                        id="firstName"
                        name="firstName"
                        placeholder="Enter first name"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid first name.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label fw-semibold"
                      >Last Name</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-user text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 ps-0"
                        id="lastName"
                        name="lastName"
                        placeholder="Enter last name"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid last name.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label fw-semibold"
                      >Email Address</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-envelope text-muted"></i>
                      </span>
                      <input
                        type="email"
                        class="form-control border-start-0 ps-0"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid email address.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label fw-semibold"
                      >Phone Number</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-phone text-muted"></i>
                      </span>
                      <input
                        type="tel"
                        class="form-control border-start-0 ps-0"
                        id="phone"
                        name="phone"
                        placeholder="Enter phone number"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid phone number.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="dateOfBirth" class="form-label fw-semibold"
                      >Date of Birth</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-calendar text-muted"></i>
                      </span>
                      <input
                        type="date"
                        class="form-control border-start-0 ps-0"
                        id="dateOfBirth"
                        name="dateOfBirth"
                        required
                      />
                      <div class="invalid-feedback">
                        You must be 18 or older to register.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label fw-semibold"
                      >Gender</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-venus-mars text-muted"></i>
                      </span>
                      <select
                        class="form-control border-start-0 ps-2"
                        id="gender"
                        name="gender"
                        required
                      >
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="prefer-not-to-say">
                          Prefer not to say
                        </option>
                      </select>
                      <div class="invalid-feedback">
                        Please select your gender.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="nationalId" class="form-label fw-semibold"
                      >National ID Number</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-id-card text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 ps-0"
                        id="nationalId"
                        name="nationalId"
                        placeholder="Enter national ID"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid national ID number.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="address" class="form-label fw-semibold"
                      >Address</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-map-marker-alt text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 ps-0"
                        id="address"
                        name="address"
                        placeholder="Enter your address"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid address.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="profilePicture" class="form-label fw-semibold"
                      >Profile Picture</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-camera text-muted"></i>
                      </span>
                      <input
                        type="file"
                        class="form-control border-start-0 ps-2"
                        id="profilePicture"
                        name="profilePicture"
                        accept="image/*"
                        required
                      />
                      <div class="invalid-feedback">
                        Please upload a valid profile picture.
                      </div>
                    </div>
                    <div class="mt-2">
                      <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Upload a clear photo. Max size: 5MB.
                      </small>
                    </div>
                    <div class="mt-2" id="imagePreview" style="display: none">
                      <img
                        id="previewImg"
                        src=""
                        alt="Profile Preview"
                        class="img-thumbnail"
                        style="max-width: 100px; max-height: 100px"
                      />
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label fw-semibold"
                      >Group Name</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-venus-mars text-muted"></i>
                      </span>
                      <select
                        class="form-control border-start-0 ps-2"
                        id="gender"
                        name="gender"
                        required
                      >
                        <option value="">Select Group</option>
                        <option value="Democratic Party">Democratic Party</option>
                        <option value="Republican Party">Republican Party</option>
                        <option value="Green Party">Green Party</option>
                        <option value="other">other</option>
                      </select>
                      <div class="invalid-feedback">
                        Please select your gender.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="address" class="form-label fw-semibold"
                      >Say something to Voters</label
                    >
                    <div class="input-group">
                      <textarea name="comment" id="comment" class="form-control border-start-0 ps-0"></textarea>
                      <div class="invalid-feedback">
                        Please provide a valid address.
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
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
                        placeholder="Create a password"
                        required
                        minlength="8"
                      />
                      <button
                        class="btn btn-outline-secondary border-start-0"
                        type="button"
                        id="togglePassword"
                      >
                        <i class="fas fa-eye" id="eyeIcon"></i>
                      </button>
                      <!-- <div class="invalid-feedback">
                        Password must be at least 8 characters long.
                      </div> -->
                    </div>
                    <!-- <div class="password-strength mt-2">
                      <div class="progress" style="height: 5px">
                        <div
                          class="progress-bar"
                          id="passwordStrength"
                          role="progressbar"
                          style="width: 0%"
                        ></div>
                      </div>
                      <small class="text-muted" id="passwordHelp"
                        >Password should contain uppercase, lowercase, numbers,
                        and special characters.</small
                      >
                    </div> -->
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword" class="form-label fw-semibold"
                      >Confirm Password</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                      </span>
                      <input
                        type="password"
                        class="form-control border-start-0 ps-0"
                        id="confirmPassword"
                        name="confirmPassword"
                        placeholder="Confirm your password"
                        required
                      />
                      <div id="passNotMatch" class="invalid-feedback">
                        
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="agreeTerms"
                      name="agreeTerms"
                      required
                    />
                    <label class="form-check-label text-sm" for="agreeTerms">
                      I agree to the
                      <a href="#" class="text-decoration-none text-primary"
                        >Terms of Service</a
                      >
                      and
                      <a href="#" class="text-decoration-none text-primary"
                        >Privacy Policy</a
                      >
                    </label>
                    <div class="invalid-feedback">
                      You must agree to the terms and conditions.
                    </div>
                  </div>

                  <div class="form-check mt-2">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="ageConfirm"
                      name="ageConfirm"
                      required
                    />
                    <label class="form-check-label text-sm" for="ageConfirm">
                      I confirm that I am 18 years or older and eligible to vote
                    </label>
                    <div class="invalid-feedback">
                      You must be 18 or older to register.
                    </div>
                  </div>
                </div>

                <div class="d-grid mb-3">
                  <button
                    type="submit"
                    name="submit"
                    class="btn btn-primary btn-lg rounded-3 fw-semibold"
                  >
                    <i class="fas fa-user-plus me-2"></i>Create Account
                  </button>
                </div>

                <div class="text-center">
                  <p class="text-muted mb-0">
                    Already have an account?
                    <a
                      href="./login.php"
                      class="text-decoration-none text-primary fw-semibold"
                      >Sign In</a
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

      .password-strength .progress-bar {
        transition: all 0.3s ease;
      }

      .strength-weak {
        background-color: #dc3545 !important;
      }
      .strength-medium {
        background-color: #ffc107 !important;
      }
      .strength-strong {
        background-color: #28a745 !important;
      }

      .is-invalid {
        border-color: #dc3545;
      }

      .is-valid {
        border-color: #28a745;
      }

      @media (max-width: 768px) {
        .card-body {
          padding: 2rem !important;
        }

        .container-fluid {
          padding: 1rem;
        }

        .col-md-6 {
          margin-bottom: 1rem !important;
        }
      }

      @media (max-width: 576px) {
        .card-body {
          padding: 1.5rem !important;
        }
      }
    </style>

    <!-- Form Validation and Password Strength Script -->
    <script>
      // Password visibility toggle
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
        document.getElementById("signUpForm").addEventListener("submit", function (event) {
          event.preventDefault();
          var password = document.getElementById("password").value;
          var confirmPassword = document.getElementById("confirmPassword").value;
          var passNotMatch = document.getElementById("passNotMatch");

          if (password !== confirmPassword) {
            passNotMatch.textContent = "Passwords do not match.";
            passNotMatch.classList.add("d-block");
            passNotMatch.classList.remove("d-none");
            document.getElementById("confirmPassword").classList.add("is-invalid");
          } 
          else {
            passNotMatch.classList.add("d-none");
            document.getElementById("confirmPassword").classList.remove("is-invalid");
            this.removeEventListener("submit", arguments.callee);
            this.submit();
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
