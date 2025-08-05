<?php 
include './../config.php';
include 'fatchCandidate.php';
session_start();
if (!isset($_SESSION['selected_candidates_id'])) {
    $_SESSION['selected_candidates_id'] = [];
}
$selected_candidates = [];
$error_message = "";
$displayError = "d-none";
if (isset($_GET['id'])) {
    $candidate_id = $_GET['id'];
    if (in_array($candidate_id, $_SESSION['selected_candidates_id'])) {
        $error_message = "Candidate already selected for this election.";
    } else {
         $_SESSION['selected_candidates_id'][] = $candidate_id;
         $error_message = "Candidate added successfully.";
    }
    $displayError = "d-block";
}


if (!empty( $_SESSION['selected_candidates_id'])) {
    foreach ( $_SESSION['selected_candidates_id'] as $selected_candidate_id) {
      $candidate_count = count($_SESSION['selected_candidates_id']);
    
      $sql = "SELECT * FROM candidate WHERE ID = '$selected_candidate_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $selected_candidates[] = $row;
        } else {
            $error_message = "Candidate not found.";
        }
    }
}
if (isset($_POST['submit'])) {
    $election_id = uniqid('election_', true);
    $election_name = $_POST['election_name'];
    $position = $_POST['position'];
    $starting_date = $_POST['starting_date'];
    $ending_date = $_POST['ending_date'];
    $now = date('Y-m-d H:i:s');
    if ($now >= $starting_date && $now <= $ending_date) {
      $status = 'active';
    } elseif ($now <= $starting_date) {
      $status = 'upcoming';
    } else {
      $status = 'completed';
    }
    if (empty($election_name) || empty($position) || empty($starting_date) || empty($ending_date)) {
        $error_message = "All fields are required.";
        $displayError = "d-block";
    } else {
        $sql = "INSERT INTO elections (election_ID,election_name, position, starting_date, ending_date,status,candidateParticipate) VALUES ('$election_id','$election_name', '$position', '$starting_date', '$ending_date','$status','$candidate_count')";
        if (!mysqli_query($conn, $sql)) {
            $error_message = "Error creating election: " . mysqli_error($conn);
            $displayError = "d-block";
        } else {
            if (!empty( $_SESSION['selected_candidates_id'])) {
                foreach ( $_SESSION['selected_candidates_id'] as $selected_candidate_id) {
                  $sql="INSERT INTO vote_counts (election_ID, candidate_ID) VALUES ('$election_id', '$selected_candidate_id')";
                    if (!mysqli_query($conn, $sql)) {
                        $error_message = "Error adding candidates to election: " . mysqli_error($conn);
                        $displayError = "d-block";
                        break;
                    }
                } 
            }
            $_SESSION['selected_candidates_id'] = [];
            $_SESSION['candidate_count'] = 0;
            
            $error_message = "Election created successfully!";
            $displayError = "d-block";
            header("Location: Admin.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Election - Online Voting System</title>
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
  </head>
  <body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
      <div class="container">
        <a class="navbar-brand fw-bold" href="Admin.php">
          <i class="fas fa-vote-yea me-2"></i>
          Online Voting System - Admin
        </a>
        <div class="navbar-nav ms-auto">
          <a class="nav-link" href="Admin.php">
            <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
          </a>
        </div>
      </div>
    </nav>

    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <!-- Page Header -->
          <div class="text-center mb-5">
            <div class="mb-3">
              <i class="fas fa-plus-circle fa-4x text-primary"></i>
            </div>
            <h1 class="display-5 fw-bold text-dark">Create New Election</h1>
            <p class="lead text-muted">
              Set up a new democratic election process
            </p>
          </div>

          <!-- Error Message -->
          <?php if(isset($error_message)): ?>
          <div
            class="alert alert-danger alert-dismissible fade show <?php echo $displayError; ?>"
            role="alert"
          >
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?php echo $error_message; ?>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="alert"
            ></button>
          </div>
          <?php endif; ?>

          <!-- Election Form -->
          <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white py-4">
              <h3 class="card-title mb-0">
                <i class="fas fa-ballot-check me-2"></i>Election Details
              </h3>
            </div>
            <div class="card-body p-5">
              <form method="POST" action="" id="electionForm" novalidate>
                <!-- Election Basic Information -->
                <div class="row mb-4">
                  <div class="col-md-6 mb-3">
                    <label for="election_name" class="form-label fw-semibold">
                      <i class="fas fa-poll me-1 text-primary"></i>Election Name
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-tag text-muted"></i>
                      </span>
                      <input
                        type="text"
                        class="form-control border-start-0 ps-0"
                        id="election_name"
                        name="election_name"
                        placeholder="e.g., Presidential Election 2025"
                        value="<?php echo isset($_POST['election_name']) ? htmlspecialchars($_POST['election_name']) : ''; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid election name.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="position" class="form-label fw-semibold">
                      <i class="fas fa-user-tie me-1 text-primary"></i>Position
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-crown text-muted"></i>
                      </span>
                      <select
                        class="form-control border-start-0 ps-2"
                        id="position"
                        name="position"
                        required
                      >
                        <option value="">Select Position</option>
                            <option value="President" <?php echo (isset($_POST['position']) && $_POST['position'] == 'President') ? 'selected' : ''; ?>>President</option>
                            <option value="Vice President" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Vice President') ? 'selected' : ''; ?>>Vice President</option>
                            <option value="Mayor" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Mayor') ? 'selected' : ''; ?>>Mayor</option>
                            <option value="Governor" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Governor') ? 'selected' : ''; ?>>Governor</option>
                            <option value="Senator" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Senator') ? 'selected' : ''; ?>>Senator</option>
                            <option value="Representative" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Representative') ? 'selected' : ''; ?>>Representative</option>
                            <option value="Student President" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Student President') ? 'selected' : ''; ?>>Student President</option>
                            <option value="Class Representative" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Class Representative') ? 'selected' : ''; ?>>Class Representative</option>
                            <option value="Other" <?php echo (isset($_POST['position']) && $_POST['position'] == 'Other') ? 'selected' : ''; ?>>Other</option>                
                      </select>
                      <div class="invalid-feedback">
                        Please select a position.
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Election Dates -->
                <div class="row mb-4">
                  <div class="col-md-6 mb-3">
                    <label for="starting_date" class="form-label fw-semibold">
                      <i class="fas fa-play-circle me-1 text-success"></i
                      >Starting Date
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-calendar-alt text-muted"></i>
                      </span>
                      <input
                        type="datetime-local"
                        class="form-control border-start-0 ps-0"
                        id="starting_date"
                        name="starting_date"
                        value="<?php echo isset($_POST['starting_date']) ? htmlspecialchars($_POST['starting_date']) : ''; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid starting date.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="ending_date" class="form-label fw-semibold">
                      <i class="fas fa-stop-circle me-1 text-danger"></i>Ending
                      Date
                    </label>
                    <div class="input-group">
                      <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-calendar-times text-muted"></i>
                      </span>
                      <input
                        type="datetime-local"
                        class="form-control border-start-0 ps-0"
                        id="ending_date"
                        name="ending_date"
                        value="<?php echo isset($_POST['ending_date']) ? htmlspecialchars($_POST['ending_date']) : ''; ?>"
                        required
                      />
                      <div class="invalid-feedback">
                        Please provide a valid ending date.
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Election Duration Display -->
                           <!-- Candidate List -->
                  <div class="row" id="candidateList">
                    <div class="alert alert-info">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Group Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0; foreach ($selected_candidates as $selected_candidate): ?>
                          <tr>
                            <td><?php echo ++$i; ?></td>
                            <td>
                              <?php echo htmlspecialchars($selected_candidate['firstName']); ?>
                              <?php echo htmlspecialchars($selected_candidate['lastName']); ?>
                            </td> 
                            <td>
                              <?php echo htmlspecialchars($selected_candidate['groupName']); ?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                <hr class="my-5" />

                <!-- Candidate Selection Section -->
                <div class="mb-4">
                  <div
                    class="d-flex justify-content-between align-items-center mb-4"
                  >
                    <div>
                      <h4 class="text-primary mb-2">
                        <i class="fas fa-users me-2"></i>Select Candidates
                      </h4>
                      <p class="text-muted mb-0">
                        Choose candidates who can participate in this election
                      </p>
                    </div>
                    <div class="text-end">
                      <button
                        type="button"
                        class="btn btn-outline-primary btn-sm"
                        onclick="selectAllCandidates()"
                      >
                        <i class="fas fa-check-double me-1"></i>Select All
                      </button>
                      <a
                        type="button"
                        class="btn btn-outline-secondary btn-sm ms-2"
                        href="clearSelection.php"
                      >
                        <i class="fas fa-times me-1"></i>Clear All
                      </a>
                    </div>
                  </div>

                  <!-- Search and Filter -->
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                          <i class="fas fa-search text-muted"></i>
                        </span>
                        <input
                          type="text"
                          class="form-control border-start-0 ps-0"
                          id="candidateSearch"
                          placeholder="Search candidates by name, party, or email..."
                          onkeyup="filterCandidates()"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <select
                        class="form-select"
                        id="partyFilter"
                        onchange="filterCandidates()"
                      >
                        <option value="">All Political Parties</option>
                        <option value="Democratic Party">
                          Democratic Party
                        </option>
                        <option value="Republican Party">
                          Republican Party
                        </option>
                        <option value="Green Party">Green Party</option>
                        <option value="Independent">Independent</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>

                  <!-- Candidate List -->
                  <div class="row" id="candidateList">
                    <div class="alert alert-info">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Group Name</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0; foreach ($candidates as $candidate): ?>
                          <tr>
                            <td><?php echo ++$i; ?></td>
                            <td>
                              <?php echo htmlspecialchars($candidate['firstName']); ?>
                              <?php echo htmlspecialchars($candidate['lastName']); ?>
                            </td>
                            <td>
                              <?php echo htmlspecialchars($candidate['email']); ?>
                            </td>
                            <td>
                              <?php echo htmlspecialchars($candidate['groupName']); ?>
                            </td>
                            <td>
                              <a
                                href="?id=<?php echo $candidate['ID']; ?>"
                                class="btn btn-sm btn-warning w-100"
                                >Add</a
                              >
                            </td>
                          </tr>

                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Selected Candidates Summary -->
                  <div class="mt-4">
                    <div
                      class="alert alert-success border-0"
                      id="selectedSummary"
                      style="display: none"
                    >
                      <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x me-3"></i>
                        <div>
                          <h6 class="mb-1">
                            <span id="selectedCount">0</span> Candidate(s)
                            Selected
                          </h6>
                          <small class="text-muted"
                            >These candidates will participate in the
                            election</small
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Form Actions -->
                <div class="row mt-5">
                  <div class="col-12">
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                      <a
                        href="Admin.php"
                        class="btn btn-outline-secondary btn-lg"
                      >
                        <i class="fas fa-times me-2"></i>Cancel
                      </a>

                      <div class="text-end">
                        <button
                          type="submit"
                          name="submit"
                          class="btn btn-success btn-lg"
                        >
                          <i class="fas fa-rocket me-2"></i>Create Election
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- Custom Styles -->
    <style>
      .bg-gradient-primary {
        background: linear-gradient(
          135deg,
          #667eea 0%,
          #764ba2 100%
        ) !important;
      }

      .candidate-card {
        transition: all 0.3s ease;
        cursor: pointer;
      }

      .candidate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
      }

      .candidate-card.selected {
        border: 2px solid #28a745 !important;
        background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
      }

      .party-badge {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
      }

      .candidate-name {
        color: #2c3e50;
      }

      .add-candidate-btn {
        transition: all 0.3s ease;
      }

      .add-candidate-btn.active {
        background-color: #28a745 !important;
        border-color: #28a745 !important;
        color: white !important;
      }

      .input-group-text {
        background-color: #f8f9fa !important;
      }

      .form-control:focus,
      .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
      }

      .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        transition: all 0.3s ease;
      }

      .btn-success:hover {
        background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
      }

      .candidate-details {
        line-height: 1.6;
      }

      @media (max-width: 768px) {
        .candidate-card {
          margin-bottom: 1rem;
        }

        .btn-lg {
          padding: 0.75rem 1.5rem;
          font-size: 1rem;
        }
      }
    </style>

    <!-- Custom JavaScript -->
    <!-- <script>
        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Calculate and display election duration
        function updateDuration() {
            const startDate = document.getElementById('starting_date').value;
            const endDate = document.getElementById('ending_date').value;
            
            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                if (end > start) {
                    document.getElementById('durationText').textContent = `${diffDays} day(s)`;
                    document.getElementById('durationAlert').style.display = 'block';
                    document.getElementById('durationAlert').className = 'alert alert-info border-0';
                } else {
                    document.getElementById('durationText').textContent = 'Invalid date range';
                    document.getElementById('durationAlert').style.display = 'block';
                    document.getElementById('durationAlert').className = 'alert alert-danger border-0';
                }
            } else {
                document.getElementById('durationAlert').style.display = 'none';
            }
        }

        // Event listeners for date inputs
        document.getElementById('starting_date').addEventListener('change', updateDuration);
        document.getElementById('ending_date').addEventListener('change', updateDuration);

        // Candidate selection functions
        function toggleCandidate(candidateId) {
            const checkbox = document.getElementById(`candidate_${candidateId}`);
            const card = checkbox.closest('.candidate-card');
            const button = card.querySelector('.add-candidate-btn');
            
            checkbox.checked = !checkbox.checked;
            
            if (checkbox.checked) {
                card.classList.add('selected');
                button.classList.add('active');
                button.innerHTML = '<i class="fas fa-check me-1"></i>Added to Election';
            } else {
                card.classList.remove('selected');
                button.classList.remove('active');
                button.innerHTML = '<i class="fas fa-plus me-1"></i>Add to Election';
            }
            
            updateSelectedCount();
        }

        function updateSelectedCount() {
            const selectedCheckboxes = document.querySelectorAll('.candidate-checkbox:checked');
            const count = selectedCheckboxes.length;
            
            document.getElementById('selectedCount').textContent = count;
            
            if (count > 0) {
                document.getElementById('selectedSummary').style.display = 'block';
            } else {
                document.getElementById('selectedSummary').style.display = 'none';
            }
        }

        function selectAllCandidates() {
            const checkboxes = document.querySelectorAll('.candidate-checkbox:not(:checked)');
            checkboxes.forEach(checkbox => {
                checkbox.click();
            });
        }

        function clearAllCandidates() {
            const checkboxes = document.querySelectorAll('.candidate-checkbox:checked');
            checkboxes.forEach(checkbox => {
                checkbox.click();
            });
        }

        // Filter candidates
        function filterCandidates() {
            const searchTerm = document.getElementById('candidateSearch').value.toLowerCase();
            const partyFilter = document.getElementById('partyFilter').value.toLowerCase();
            const candidates = document.querySelectorAll('.candidate-item');
            
            candidates.forEach(candidate => {
                const name = candidate.getAttribute('data-name');
                const party = candidate.getAttribute('data-party');
                const email = candidate.getAttribute('data-email');
                
                const matchesSearch = name.includes(searchTerm) || 
                                    party.includes(searchTerm) || 
                                    email.includes(searchTerm);
                const matchesParty = partyFilter === '' || party.includes(partyFilter);
                
                if (matchesSearch && matchesParty) {
                    candidate.style.display = 'block';
                } else {
                    candidate.style.display = 'none';
                }
            });
        }

        // Preview election
        function previewElection() {
            const electionName = document.getElementById('election_name').value;
            const position = document.getElementById('position').value;
            const startDate = document.getElementById('starting_date').value;
            const endDate = document.getElementById('ending_date').value;
            const selectedCandidates = document.querySelectorAll('.candidate-checkbox:checked');
            
            let candidatesList = '';
            selectedCandidates.forEach(checkbox => {
                const card = checkbox.closest('.candidate-card');
                const name = card.querySelector('.candidate-name').textContent;
                const party = card.querySelector('.party-badge').textContent;
                candidatesList += `
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-user-tie me-2 text-primary"></i>
                        <strong>${name}</strong> - ${party}
                    </div>
                `;
            });
            
            const previewContent = `
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-primary">Election Details</h6>
                        <p><strong>Name:</strong> ${electionName || 'Not specified'}</p>
                        <p><strong>Position:</strong> ${position || 'Not specified'}</p>
                        <p><strong>Start Date:</strong> ${startDate ? new Date(startDate).toLocaleString() : 'Not specified'}</p>
                        <p><strong>End Date:</strong> ${endDate ? new Date(endDate).toLocaleString() : 'Not specified'}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary">Selected Candidates (${selectedCandidates.length})</h6>
                        ${candidatesList || '<p class="text-muted">No candidates selected</p>'}
                    </div>
                </div>
            `;
            
            document.getElementById('previewContent').innerHTML = previewContent;
            new bootstrap.Modal(document.getElementById('previewModal')).show();
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date to today
            const today = new Date().toISOString().slice(0, 16);
            document.getElementById('starting_date').min = today;
            document.getElementById('ending_date').min = today;
            
            console.log('Create Election Form - Enhanced Design Loaded');
        });
    </script> -->
  </body>
</html>
