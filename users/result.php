<?php
include "./../admin/fatchElection.php";
include "./../admin/fatchCandidate.php";
include "./../admin/fatchUsers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
          <h2 class="mb-4">Election Results</h2>
          <?php 
          foreach ($elections as $election): 
            $totalVotes = $election['total_votes'];
            $percentageOfGivenVote= $totalVotes > 0 ? ($totalVotes / $totalUsers) * 100 : 0;
            ?>
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0"><?php echo htmlspecialchars($election['election_name']) ?></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">

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
                    ORDER BY vc.find_votes DESC";
                $stmt = mysqli_prepare($conn, $candidates_sql);
                mysqli_stmt_bind_param($stmt, "s", $election_id);
                mysqli_stmt_execute($stmt);
                $candidates_result = mysqli_stmt_get_result($stmt);
                $participating_candidates = [];
                        
                while($candidate = mysqli_fetch_assoc($candidates_result)) {
                    $participating_candidates[] = $candidate;
                }
                ?>
                <?php 
                    foreach($participating_candidates as $candidate): 
                    $parcentageVotes = $totalVotes > 0 ? ($candidate['find_votes'] / $totalVotes) * 100 : 0;

                  ?>

                  <div class="candidate-result mb-3">
                    <div class="d-flex align-items-center mb-2">
                      <img
                        src="./../admin/candidateImage/<?php echo htmlspecialchars($candidate['profilePic']) ?>"
                        class="rounded-circle me-3"
                        width="40"
                        height="40"
                      />
                      <div class="flex-grow-1">
                        <h6 class="mb-0">
                          <?php echo htmlspecialchars($candidate['firstName']) ?>
                          <?php echo htmlspecialchars($candidate['lastName']) ?>
                        </h6>
                        <small class="text-muted"><?php echo htmlspecialchars($candidate['groupName']) ?></small>
                      </div>
                      <div class="text-end">
                        <strong class="text-success"><?php echo htmlspecialchars($candidate['find_votes'])?> votes</strong>
                        <br />
                        <small class="text-muted"><?php echo $parcentageVotes;?>%</small>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar bg-success"
                        style="width: <?php echo $parcentageVotes;?>%"
                      ></div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>


                <!-- total vite ciunter section -->
                <div class="col-lg-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <h4>Total Votes</h4>
                      <p class="text-muted">Out of <?php echo $totalUsers;?> registered</p>
                      <div class="progress mb-2">
                        <div class="progress-bar" style="width: <?php echo $percentageOfGivenVote;?>%"></div>
                      </div>
                      <small><?php echo $percentageOfGivenVote;?>% turnout</small>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
</body>
</html>