<?php 
include './../config.php';
include './fatchElection.php';
//fatch total elections
$sql1 = "SELECT * FROM elections WHERE status = 'active'";
$result1 = mysqli_query($conn, $sql1);
$elections = [];
if ($result1) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $elections[] = $row;
    }
}
$totalElections = mysqli_num_rows($result1);
//fatch total Users
$sql2 = "SELECT * FROM all_users";
$result2 = mysqli_query($conn, $sql2);
$totalUsers = mysqli_num_rows($result2);
// Fetch total candidates
$sql = "SELECT * FROM candidate";
$result = mysqli_query($conn, $sql);
$totalCandidates = mysqli_num_rows($result);
$candidates = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $candidates[] = $row;
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
    <title>Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-secondary bg-gradient fixed-top">
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

    <!-- Admin Dashboard Content -->
    <div class="container-fluid mt-5 pt-3">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
          <div class="position-sticky pt-3">
            <div class="text-center mb-4">
              <div class="admin-avatar mb-3">
                <i class="fas fa-user-shield fa-3x text-primary"></i>
              </div>
              <h5 class="text-light">Admin Panel</h5>
              <p class="text-muted small">Election Management System</p>
            </div>

            <ul class="nav flex-column">
              <li class="nav-item">
                <a
                  class="nav-link active text-light"
                  href="#"
                  onclick="showSection('dashboard')"
                >
                  <i class="fas fa-tachometer-alt me-2"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('users')"
                >
                  <i class="fas fa-users me-2"></i>
                  User Management
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('elections')"
                >
                  <i class="fas fa-vote-yea me-2"></i>
                  Elections
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('candidates')"
                >
                  <i class="fas fa-user-tie me-2"></i>
                  Candidates
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('results')"
                >
                  <i class="fas fa-chart-bar me-2"></i>
                  Results
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('reports')"
                >
                  <i class="fas fa-file-alt me-2"></i>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-light"
                  href="#"
                  onclick="showSection('settings')"
                >
                  <i class="fas fa-cog me-2"></i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <!-- Dashboard Section -->
          <div id="dashboard" class="admin-section">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
              <h1 class="h2">Dashboard Overview</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
              <div class="col-xl-3 col-md-6 mb-4">
                <div
                  class="card border-start border-primary border-4 shadow h-100 py-2"
                >
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                        >
                          Total Users
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $totalUsers; ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div
                  class="card border-start border-success border-4 shadow h-100 py-2"
                >
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-success text-uppercase mb-1"
                        >
                          Active Elections
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $totalElections; ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div
                  class="card border-start border-info border-4 shadow h-100 py-2"
                >
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-info text-uppercase mb-1"
                        >
                          Total Votes
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          0
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div
                  class="card border-start border-warning border-4 shadow h-100 py-2"
                >
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                        >
                          Candidates
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $totalCandidates; ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Activity & Quick Actions -->
            <div class="row">
              <div class="col-lg-8 mb-4">
                <div class="card shadow">
                  <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                  >
                    <h4 class="m-0 font-weight-bold text-primary">
                      Active Elections Result
                    </h4>
                  </div>
                  <?php foreach($elections as $election): ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <h6 class="m-0 font-weight-bold text-primary text-center">
                      <?php echo htmlspecialchars($election['election_name']); ?>
                    </h6>
                    <hr>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Political Party</th>
                            <th>Find Votes</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          <?php
                            $election_id = $election['election_ID'];
                            $candidates_sql = "
                              SELECT 
                                c.ID,
                                c.firstName, 
                                c.lastName, 
                                c.email,
                                c.phone,
                                c.profilePic,
                                c.groupName,
                                c.massage,
                                c.gender,
                                vc.find_votes
                              FROM 
                                vote_counts vc
                              JOIN 
                                candidate c ON vc.candidate_ID = c.ID
                              WHERE 
                                vc.election_ID = ?
                              ORDER BY vc.find_votes DESC
                              ";
                              $stmt = mysqli_prepare($conn, $candidates_sql);
                              mysqli_stmt_bind_param($stmt, "s", $election_id);
                              mysqli_stmt_execute($stmt);
                              $candidates_result = mysqli_stmt_get_result($stmt);
                              $participating_candidates = [];
                        
                              while($candidate = mysqli_fetch_assoc($candidates_result)) {
                              $participating_candidates[] = $candidate;
                              }
                            ?>
                          <?php $i = 0; foreach ($participating_candidates as $candidate): ?>
                          <tr>
                            <td><?php echo ++$i; ?></td>
                            <td>
                              <?php echo htmlspecialchars($candidate['firstName']); ?>
                              <?php echo htmlspecialchars($candidate['lastName']); ?>
                            </td>
                            <td>
                              <?php echo htmlspecialchars($candidate['groupName']); ?>
                            </td>
                            <td><?php echo htmlspecialchars($candidate['find_votes']); ?></td> 
                          </tr>

                          <?php endforeach; ?>
                        </tbody>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 mb-4">
                <div class="card shadow">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Quick Actions
                    </h6>
                  </div>
                  <div class="card-body">
                    <div class="d-grid gap-2">
                      <button
                        class="btn btn-primary"
                        onclick="showSection('elections')"
                      >
                        <i class="fas fa-plus me-2"></i>Create Election
                      </button>

                      <button
                        class="btn btn-info"
                        onclick="showSection('users')"
                      >
                        <i class="fas fa-users me-2"></i>Manage Users
                      </button>
                      <button
                        class="btn btn-warning"
                        onclick="showSection('results')"
                      >
                        <i class="fas fa-chart-line me-2"></i>View Results
                      </button>
                      <button
                        class="btn btn-danger"
                        onclick="showSection('reports')"
                      >
                        <i class="fas fa-chart-line me-2"></i>View Reports
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- User Management Section -->
          <div id="users" class="admin-section" style="display: none">
            <?php 
           include 'AllUsers.php';
           ?></div>

          <!-- Elections Section -->
          <div id="elections" class="admin-section" style="display: none">
            <?php 
           include 'elections.php'; // Include the elections management code
           ?></div>

          <!-- Other sections would follow similar pattern -->
          <?php
           include 'can_res_rep_set.php';
           ?>
        </main>
      </div>
    </div>

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- Custom Admin Styles -->
    <style>
      body {
        font-size: 0.875rem;
      }
      .navbar {
        z-index: 1030;
      }

      .sidebar {
        position: fixed;
        top: 56px;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
      }

      .sidebar .nav-link {
        font-weight: 500;
        color: #6c757d;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
      }

      .sidebar .nav-link:hover {
        color: #007bff !important;
        background-color: rgba(0, 123, 255, 0.1);
      }

      .sidebar .nav-link.active {
        color: #007bff !important;
        background-color: rgba(0, 123, 255, 0.1);
      }

      .sidebar .nav-link i {
        font-size: 16px;
      }

      main {
        margin-top: 48px;
      }

      .card {
        border: none;
        border-radius: 0.5rem;
      }

      .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
      }

      .admin-section {
        min-height: calc(100vh - 120px);
      }

      .border-start {
        border-left-width: 0.25rem !important;
      }

      .text-xs {
        font-size: 0.75rem;
      }

      .text-gray-300 {
        color: #d1d3e2 !important;
      }

      .text-gray-800 {
        color: #5a5c69 !important;
      }

      /* Responsive adjustments */
      @media (max-width: 767.98px) {
        .sidebar {
          top: 0;
          position: relative;
          height: auto;
          padding: 1rem 0;
        }

        main {
          margin-top: 0;
        }

        .admin-section {
          min-height: auto;
          padding: 1rem;
        }
      }

      /* Mobile sidebar toggle */
      @media (max-width: 767.98px) {
        .sidebar {
          display: none;
        }

        .sidebar.show {
          display: block;
          position: fixed;
          top: 56px;
          left: 0;
          right: 0;
          z-index: 1050;
          background: #343a40;
        }
      }
    </style>

    <!-- Admin Panel JavaScript -->
    <script>
      function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll(".admin-section");
        sections.forEach((section) => {
          section.style.display = "none";
        });

        // Show selected section
        document.getElementById(sectionId).style.display = "block";

        // Update active nav link
        const navLinks = document.querySelectorAll(".sidebar .nav-link");
        navLinks.forEach((link) => {
          link.classList.remove("active");
        });

        // Find and activate the clicked nav link
        event.target.classList.add("active");
      }

      // Mobile sidebar toggle
      function toggleSidebar() {
        const sidebar = document.querySelector(".sidebar");
        sidebar.classList.toggle("show");
      }

      // Add mobile toggle button for smaller screens
      if (window.innerWidth <= 767) {
        const navbar = document.querySelector(".navbar");
        const toggleBtn = document.createElement("button");
        toggleBtn.className = "btn btn-outline-light me-2";
        toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
        toggleBtn.onclick = toggleSidebar;
        navbar
          .querySelector(".container-fluid")
          .insertBefore(toggleBtn, navbar.querySelector(".navbar-brand"));
      }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
