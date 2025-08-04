<?php
include "./../user_info.php";
include "./../admin/fatchElection.php";
include "./giveVote.php";
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <title>User Dashboard - Online Voting System</title>
  </head>
  <body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="fas fa-vote-yea me-2"></i>
          Online Voting System
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a
                class="nav-link active"
                href="#"
                onclick="showSection('dashboard')"
              >
                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showSection('elections')">
                <i class="fas fa-vote-yea me-1"></i>Elections
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showSection('results')">
                <i class="fas fa-chart-bar me-1"></i>Results
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showSection('profile')">
                <i class="fas fa-user me-1"></i>Profile
              </a>
            </li>
          </ul>
          <div class="navbar-nav">
            <div class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
              >
                <img
                  src="./../images/<?php echo isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'Guest.png'; ?>"
                  class="rounded-circle me-2"
                  width="32"
                  height="32"
                />
                <?php echo isset($_SESSION['firstName']) ?$_SESSION['firstName']:"" ?>
                <?php echo isset($_SESSION['lastName']) ?$_SESSION['lastName']:"" ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    onclick="showSection('profile')"
                  >
                    <i class="fas fa-user me-2"></i>Profile
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cog me-2"></i>Settings
                  </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="../distroy_session.php">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <!-- Dashboard Section -->
      <div id="dashboard" class="content-section">
        <div class="container mt-4">
          <!-- Welcome Header -->
          <div class="row mb-4">
            <div class="col-12">
              <div
                class="welcome-card bg-gradient-primary text-white p-4 rounded"
              >
                <div class="row align-items-center">
                  <div class="col-md-8">
                    <h2 class="mb-1">Welcome back, 
                      <?php echo isset($_SESSION['firstName'])?$_SESSION['firstName']:"Guest" ?>
                    </h2>
                    <p class="mb-0 opacity-75">
                      Ready to participate in the democratic process? Check out
                      the latest elections below.
                    </p>
                  </div>
                  <div class="col-md-4 text-end">
                    <i class="fas fa-vote-yea fa-4x opacity-50"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Stats -->
          <div class="row mb-4">

            <div class="col-lg-4 col-md-6 mb-3">
              <div class="card stat-card text-center h-100">
                <div class="card-body">
                  <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                  <h4 class="card-title text-warning"><?php echo $activeElectionnumber ?></h4>
                  <p class="card-text text-muted">Active Elections</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
              <div class="card stat-card text-center h-100">
                <div class="card-body">
                  <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                  <h4 class="card-title text-success">0</h4>
                  <p class="card-text text-muted">Completed Elections</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
              <div class="card stat-card text-center h-100">
                <div class="card-body">
                  <i class="fas fa-trophy fa-2x text-info mb-2"></i>
                  <h4 class="card-title text-info">Active</h4>
                  <p class="card-text text-muted">Voter Status</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Active Elections -->
          <div class="row mb-4">
            <?php 
            include 'activeElection.php';
            ?>
          </div>
        </div>
      </div>

      <!-- Elections Section -->
      <div id="elections" class="content-section" style="display: none">
        <div class="container mt-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Available Elections</h2>
            <div class="btn-group" role="group">
              <input
                type="radio"
                class="btn-check"
                name="electionFilter"
                id="all"
                checked
              />
              <label class="btn btn-outline-primary" for="all">All</label>
              <input
                type="radio"
                class="btn-check"
                name="electionFilter"
                id="active"
              />
              <label class="btn btn-outline-success" for="active">Active</label>
              <input
                type="radio"
                class="btn-check"
                name="electionFilter"
                id="completed"
              />
              <label class="btn btn-outline-secondary" for="completed"
                >Completed</label
              >
            </div>
          </div>
          <hr>

          <!--Election section -->

          <?php
          include 'election.php';
          ?>
        </div>
      </div>

      <!-- Results Section -->
      <div id="results" class="content-section" style="display: none">
        <?php
        include 'result.php';
         ?>
      </div>

      <!-- Profile Section -->
      <div id="profile" class="content-section" style="display: none">
        <?php
       include 'profile.php';
       ?></div>
    </div>

    <!-- Vote Confirmation Modal -->
    <div class="modal fade" id="voteModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm Your Vote</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <div class="text-center mb-3">
              <i class="fas fa-vote-yea fa-3x text-primary mb-3"></i>
              <h5>Are you sure you want to vote for:</h5>
              <div class="candidate-info p-3 bg-light rounded">
                <img
                  id="selectedCandidateImg"
                  src=""
                  class="rounded-circle mb-2"
                  width="60"
                  height="60"
                />
                <h6 id="selectedCandidateName"></h6>
                <p id="selectedCandidateParty" class="text-muted small"></p>
              </div>
              <p class="text-warning small">
                <i class="fas fa-exclamation-triangle me-1"></i>
                This action cannot be undone!
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn btn-primary"
              onclick="confirmVote()"
            >
              <i class="fas fa-check me-2"></i>Confirm Vote
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Custom Styles -->
    <style>
      body {
        background-color: #f8f9fa;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
      }

      .welcome-card {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
      }

      .stat-card {
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      }

      .election-card,
      .election-detail-card,
      .candidate-card {
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .election-card:hover,
      .candidate-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      }

      .candidate-card {
        border: 2px solid transparent;
      }

      .candidate-card:hover {
        border-color: #007bff;
      }

      .candidate-card.selected {
        border-color: #28a745;
        background-color: #f8fff9;
      }

      .timeline {
        position: relative;
        padding: 1rem 0;
      }

      .timeline-item {
        position: relative;
        padding-left: 3rem;
        margin-bottom: 2rem;
      }

      .timeline-item:last-child {
        margin-bottom: 0;
      }

      .timeline-marker {
        position: absolute;
        left: 0;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 3px solid #fff;
        box-shadow: 0 0 0 3px #dee2e6;
      }

      .timeline-item:not(:last-child)::before {
        content: "";
        position: absolute;
        left: 5px;
        top: 15px;
        bottom: -2rem;
        width: 2px;
        background-color: #dee2e6;
      }

      .timeline-title {
        color: #495057;
        margin-bottom: 0.5rem;
      }

      .timeline-description {
        margin-bottom: 0.5rem;
      }

      .info-item {
        margin-bottom: 0.75rem;
      }

      .candidate-result {
        padding: 1rem;
        background-color: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      }

      .navbar-nav .nav-link {
        transition: background-color 0.2s ease;
        border-radius: 0.25rem;
        margin: 0 0.25rem;
      }

      .navbar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
      }

      .navbar-nav .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
      }

      .btn {
        transition: all 0.2s ease;
      }

      .btn:hover {
        transform: translateY(-1px);
      }

      /* Responsive adjustments */
      @media (max-width: 768px) {
        .container {
          padding: 1rem;
        }

        .welcome-card {
          text-align: center;
        }

        .welcome-card .col-md-4 {
          margin-top: 1rem;
        }

        .timeline-item {
          padding-left: 2rem;
        }

        .timeline-marker {
          left: -5px;
        }

        .timeline-item:not(:last-child)::before {
          left: 0;
        }
      }

      @media (max-width: 576px) {
        .stat-card .card-body {
          padding: 1rem;
        }

        .timeline-item {
          padding-left: 1.5rem;
        }
      }
    </style>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- Custom JavaScript -->
    <script>
      // Section navigation
      function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll(".content-section");
        sections.forEach((section) => {
          section.style.display = "none";
        });

        // Show selected section
        document.getElementById(sectionId).style.display = "block";

        // Update active nav link
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
        navLinks.forEach((link) => {
          link.classList.remove("active");
        });

        // Find and activate the corresponding nav link
        const activeLink = document.querySelector(
          `[onclick="showSection('${sectionId}')"]`
        );
        if (activeLink) {
          activeLink.classList.add("active");
        }
      }

      // Candidate selection
      let selectedCandidate = null;

      function selectCandidate(candidateId) {
        alert(`you Voted for ${candidateId}`);
      }
      function viewLocalCandidates() {
        alert(
          "Local candidates view would be implemented here with a detailed candidate listing."
        );
      }

      // Initialize dashboard on page load
      document.addEventListener("DOMContentLoaded", function () {
        showSection("dashboard");
      });
    </script>
  </body>
</html>
