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

// Calculate total votes across all elections
$totalVotesSql = "SELECT SUM(find_votes) as total_votes FROM vote_counts";
$totalVotesResult = mysqli_query($conn, $totalVotesSql);
$totalVotesRow = mysqli_fetch_assoc($totalVotesResult);
$totalVotes = $totalVotesRow['total_votes'] ? $totalVotesRow['total_votes'] : 0;
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
                          <?php echo $totalVotes; ?>
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
                  <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                      Active Elections Results
                    </h4>
                  </div>
                  <div class="card-body">
                    <?php if(empty($elections)): ?>
                    <div class="alert alert-info text-center">
                      <i class="fas fa-info-circle fa-2x mb-3"></i>
                      <h5>No Active Elections</h5>
                      <p class="mb-0">There are no active elections at the moment.</p>
                    </div>
                    <?php else: ?>
                    <?php foreach($elections as $election): ?>
                    <div class="election-section mb-4">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                          <i class="fas fa-vote-yea me-2"></i>
                          <?php echo htmlspecialchars($election['election_name']); ?>
                        </h6>
                        <span class="badge bg-success"><?php echo htmlspecialchars($election['status']); ?></span>
                      </div>
                      
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
                      
                      <?php if(empty($participating_candidates)): ?>
                      <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No candidates participating in this election yet.
                      </div>
                      <?php else: ?>
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="table-light">
                            <tr>
                              <th width="10%">Rank</th>
                              <th width="30%">Candidate Name</th>
                              <th width="25%">Political Party</th>
                              <th width="15%">Votes</th>
                              <th width="20%">Vote Share</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $total_election_votes = array_sum(array_column($participating_candidates, 'find_votes'));
                            if($total_election_votes == 0) $total_election_votes = 1; // Prevent division by zero
                            ?>
                            <?php $rank = 1; foreach ($participating_candidates as $candidate): ?>
                            <?php $vote_percentage = ($candidate['find_votes'] / $total_election_votes) * 100; ?>
                            <tr>
                              <td>
                                <span class="badge bg-<?php echo $rank == 1 ? 'warning' : ($rank == 2 ? 'secondary' : 'light'); ?> text-dark">
                                  <?php if($rank == 1): ?>
                                    <i class="fas fa-trophy"></i>
                                  <?php elseif($rank == 2): ?>
                                    <i class="fas fa-medal"></i>
                                  <?php else: ?>
                                    <?php echo $rank; ?>
                                  <?php endif; ?>
                                </span>
                              </td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <img src="candidateImage/<?php echo !empty($candidate['profilePic']) ? htmlspecialchars($candidate['profilePic']) : 'default.png'; ?>" 
                                       class="rounded-circle me-2" width="32" height="32"
                                       onerror="this.src='https://via.placeholder.com/32x32/6c757d/ffffff?text=?'">
                                  <div>
                                    <div class="fw-bold">
                                      <?php echo htmlspecialchars($candidate['firstName'] . ' ' . $candidate['lastName']); ?>
                                    </div>
                                    <small class="text-muted"><?php echo htmlspecialchars($candidate['email']); ?></small>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="badge bg-primary bg-gradient">
                                  <?php echo htmlspecialchars($candidate['groupName']); ?>
                                </span>
                              </td>
                              <td>
                                <span class="fw-bold text-success">
                                  <?php echo number_format($candidate['find_votes']); ?>
                                </span>
                              </td>
                              <td>
                                <div class="progress" style="height: 20px;">
                                  <div class="progress-bar bg-<?php echo $rank == 1 ? 'success' : 'primary'; ?>" 
                                       style="width: <?php echo $vote_percentage; ?>%">
                                    <?php echo number_format($vote_percentage, 1); ?>%
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php $rank++; endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      
                      <!-- Election Summary -->
                      <div class="row mt-3">
                        <div class="col-md-4">
                          <div class="text-center p-2 bg-light rounded">
                            <i class="fas fa-users text-primary"></i>
                            <div class="fw-bold"><?php echo count($participating_candidates); ?></div>
                            <small class="text-muted">Candidates</small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center p-2 bg-light rounded">
                            <i class="fas fa-vote-yea text-success"></i>
                            <div class="fw-bold"><?php echo number_format($total_election_votes); ?></div>
                            <small class="text-muted">Total Votes</small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center p-2 bg-light rounded">
                            <i class="fas fa-calendar text-info"></i>
                            <div class="fw-bold">
                              <?php 
                              $end_date = new DateTime($election['ending_date']);
                              $current_date = new DateTime();
                              $days_left = $end_date->diff($current_date)->days;
                              echo $days_left;
                              ?>
                            </div>
                            <small class="text-muted">Days Left</small>
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>
                      
                      <?php if($election !== end($elections)): ?>
                      <hr class="my-4">
                      <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 mb-4">
                <div class="card shadow">
                  <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                      <i class="fas fa-tools me-2"></i>
                      Quick Actions
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="d-grid gap-2">
                      <a href="createElection.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>
                        Create New Election
                      </a>
                      <a href="#" 
                      onclick="showSection('elections')" 
                      class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-list me-2"></i>
                        Manage Elections
                      </a>
                      <a href="#"
                      onclick="showSection('users')"
                       class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-users me-2"></i>
                        View All Users
                      </a>
                      <a href="#"
                      onclick="showSection('reports')"
                       class="btn btn-outline-info btn-lg">
                        <i class="fas fa-user-plus me-2"></i>
                        Candidate Reports
                      </a>
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
        .activity-icon {
          transition: all 0.3s ease;
        }
        
        .activity-icon:hover {
          transform: scale(1.1);
        }
        
        .badge {
          font-size: 0.85em;
        }
        
        .progress {
          background-color: #f8f9fa;
        }
        
        .progress-bar {
          transition: width 0.6s ease;
        }
        
        .table-hover tbody tr:hover {
          background-color: rgba(0,123,255,0.1);
        }
        
        .election-section {
          transition: all 0.3s ease;
          border-radius: 8px;
          padding: 1rem;
          margin-bottom: 1.5rem;
        }
        
        .election-section:hover {
          background-color: rgba(248, 249, 250, 0.5);
        }
        
        .card {
          transition: box-shadow 0.3s ease;
        }
        
        .card:hover {
          box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
        }
        
        .system-status .status-item {
          transition: all 0.2s ease;
          padding: 0.5rem;
          border-radius: 4px;
        }
        
        .system-status .status-item:hover {
          background-color: rgba(0,123,255,0.05);
        }
      </style>    <!-- Admin Panel JavaScript -->
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
