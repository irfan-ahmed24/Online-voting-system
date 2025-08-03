<?php 
include './fatchCandidate.php';
include './fatchElection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <!-- candidate management section -->
    <div id="candidates" class="admin-section" style="display: none">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
      >
        <h1 class="h2">Candidate Management</h1>
        <a href="./addCandidate.php" class="btn btn-primary">
          <i class="fas fa-user-plus me-1"></i>Add Candidate
        </a>
      </div>
      <div class="alert alert-info">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
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
              <td><?php echo htmlspecialchars($candidate['email']); ?></td>
              <td>calculating...</td>
              <td><?php echo htmlspecialchars($candidate['groupName']); ?></td>
              <td>
              <a href="editCandidate.php?id=<?php echo $candidate['ID']; ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="deleteCandidate.php?id=<?php echo $candidate['ID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this candidate?');">Delete</a>
              </td>
            </tr>
            
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
    </div>

    <!-- result section start here -->

    <div id="results" class="admin-section" style="display: none">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
      >
        <h1 class="h2">Election Results</h1>
      </div>
      <div class="alert alert-info">
        <?php $i = 0; foreach ($elections as $election): ?>
          <?php 
          $totalVotes = $election['total_votes'];
            ?>
       <!-- all election result start here -->
        <div class="card mb-4">
            <div class="card-header bg-primary">
                <h5 class="mb-0 ">
                    <?php echo htmlspecialchars($election['election_name']); ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4 border-end border-3 border-danger p-3">
                        <h6>Election Timeline</h6>
                        <div class="timeline">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-play-circle text-success fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Election Started</h6>
                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($election['starting_date']); ?></p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-circle text-primary fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($election['status']); ?></h6>
                                    <p class="text-muted mb-0">Voting in Progress</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-stop-circle text-danger fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Election Ends</h6>
                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($election['ending_date']); ?></p>
                                </div>
                            </div>
                        </div>
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
                    <div class="col-md-8 br-1">
                        <h6>Vote Share Comparison</h6>
                        <!-- candidate vote share comparison will be displayed here. -->
                         <?php foreach($participating_candidates as $candidate): ?>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>
                                  <?php echo htmlspecialchars($candidate['firstName']); ?>
                                  <?php echo htmlspecialchars($candidate['lastName']); ?>
                              </span>
                                <span class="text-primary fw-bold"><?php echo htmlspecialchars($candidate['find_votes']); ?></span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-primary" style="width: 42.5%"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- all result election end here -->
      </div>
    </div>

    <!-- report section start here -->

    <div id="reports" class="admin-section" style="display: none">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
      >
        <h1 class="h2">Reports & Analytics</h1>
      </div>
      <div class="alert alert-info">
        <i class="fas fa-file-alt me-2"></i>
        Detailed reports and analytics will be available here.
      </div>
    </div>

    <!-- setting section start here -->

    <div id="settings" class="admin-section" style="display: none">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
      >
        <h1 class="h2">System Settings</h1>
      </div>
      <div class="alert alert-info">
        <i class="fas fa-cog me-2"></i>
        System configuration and settings will be managed here.
      </div>
    </div>
  </body>
</html>
