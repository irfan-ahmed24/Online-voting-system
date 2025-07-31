<?php 
include 'fatchCandidate.php';
include './../config.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM candidate WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $candidate = mysqli_fetch_assoc($result);
            $firstName = htmlspecialchars($candidate['firstName']);
            $lastName = htmlspecialchars($candidate['lastName']);
            $email = htmlspecialchars($candidate['email']);
            $phone = htmlspecialchars($candidate['phone']);
            $username = htmlspecialchars($candidate['username']);
            $politicalParty = htmlspecialchars($candidate['groupName']);
            $campaignMessage = htmlspecialchars($candidate['massage']);
        } else {
            echo "No candidate found with ID: $id";
        }
    } else {
        echo "Error fetching candidate: " . mysqli_error($conn);
    }
    if(isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $politicalParty = $_POST['politicalParty'];
        $campaignMessage = $_POST['campaignMessage'];

        // Update candidate in the database
        $updateSql = "UPDATE candidate SET firstName='$firstName', lastName='$lastName', email='$email', phone='$phone', username='$username', groupName='$politicalParty', massage='$campaignMessage' WHERE id=$id";
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>
                alert('candidate info updated successfully');
                window.location.href = 'Admin.php';
              </script>";
            exit();
        } else {
            echo "Error updating candidate: " . mysqli_error($conn);
        }
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
    <title>Edit Candidate</title>
  </head>
  <body>
    <!-- Sign Up Form Section -->
    <div
      class="container-fluid d-flex align-items-center justify-content-center bg-info bg-gradient"
    >
      <div class="row w-100 justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-12 col-xl-10">
          <div class="card shadow-lg border-0 rounded-4 my-5">
            <div class="card-body py-3 px-5">
              <!-- Sign Up Header -->
              <div class="text-center mb-4">
                <h2 class="fw-bold text-dark mb-2">Edit Candidate</h2>
              </div>

              <!-- Sign Up Form -->
              <form
                method="POST"
                action=""
                id="signUpForm"
                enctype="multipart/form-data"
                novalidate
              >
<!-- first name section -->
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
                        value="<?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $firstName; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid first name.
                      </div>
                    </div>
                  </div>
<!-- last name section -->
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
                        value="<?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $lastName; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid last name.
                      </div>
                    </div>
                  </div>
                </div>
<!-- emain section -->
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
                        value="<?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $email; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid email address.
                      </div>
                    </div>
                  </div>
<!-- phone section -->
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
                        value="<?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $phone; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid phone number.
                      </div>
                    </div>
                  </div>
                </div>


            <div class="row">
<!-- username section -->
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label fw-semibold"
                      >username</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-user text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 rounded ps-0"
                        id="username"
                        name="username"
                        placeholder="Enter username"
                        value="<?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $username; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid username.
                      </div>
                    </div>
                  </div>
<!-- politicalParty section -->
                  <div class="col-md-6 mb-3">
                    <label for="politicalParty" class="form-label fw-semibold"
                      >Political Party</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-flag text-muted"></i>
                      </span>
                      <select
                        class="form-control border-start-0 ps-2"
                        id="politicalParty"
                        name="politicalParty"
                        required
                      >
                        <option value=""><?php echo  $politicalParty ?? ''; ?></option>
                        <option value="Democratic Party" <?php echo (isset($_POST['politicalParty']) && $_POST['politicalParty'] == 'Democratic Party') ? 'selected' : ''; ?>>Democratic Party</option>
                        <option value="Republican Party" <?php echo (isset($_POST['politicalParty']) && $_POST['politicalParty'] == 'Republican Party') ? 'selected' : ''; ?>>Republican Party</option>
                        <option value="Green Party" <?php echo (isset($_POST['politicalParty']) && $_POST['politicalParty'] == 'Green Party') ? 'selected' : ''; ?>>Green Party</option>
                        <option value="Independent" <?php echo (isset($_POST['politicalParty']) && $_POST['politicalParty'] == 'Independent') ? 'selected' : ''; ?>>Independent</option>
                        <option value="Other" <?php echo (isset($_POST['politicalParty']) && $_POST['politicalParty'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a political party.
                      </div>
                    </div>
                  </div>
<!-- Campaign Message section -->
                  <div class="col-md-12 mb-3">
                    <label for="campaignMessage" class="form-label fw-semibold"
                      >Campaign Message</label
                    >
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-bullhorn text-muted"></i>
                      </span>
                      <textarea 
                        name="campaignMessage" 
                        id="campaignMessage" 
                        class="form-control border-start-0 rounded ps-2" 
                        rows="4"
                        placeholder="Tell voters about your vision and goals..."
                        required
                      ><?php echo isset($_POST['campaignMessage']) ? htmlspecialchars($_POST['campaignMessage']) : $campaignMessage; ?></textarea>
                      <div class="invalid-feedback">
                        Please provide a campaign message.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-grid mb-3">
                  <button
                    type="submit"
                    name="submit"
                    class="btn btn-primary btn-lg rounded-3 fw-semibold"
                  >Update Candidate
                  </button>
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