<?php
include "./../admin/fatchElection.php";
include "./../admin/fatchCandidate.php";
?>
<?php foreach
 ($elections as $election): 
$remainingTime = strtotime($election['ending_date']) - time();
if ($remainingTime > 0) {
  $remainingDays = floor($remainingTime / (60 * 60 * 24));
  $remainingHours = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60));
  $remainingMinutes = floor(($remainingTime % (60 * 60)) / 60);
  $timeRemainingText = "{$remainingDays} days, {$remainingHours} hours, {$remainingMinutes} minutes";
  $statusCalcolate=1;
} else {
  $timeRemainingText = "Election ended";
  $statusCalcolate=0;
}
?>
<div class="card mb-4 election-detail-card">
  <div class="card-header bg-success text-white">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h4 class="mb-1">
          <?php echo htmlspecialchars($election['election_name']) ?>
        </h4>
        <p class="mb-0 opacity-75">
          Choose the next
          <?php echo htmlspecialchars($election['position']) ?>
        </p>
      </div>
      <div class="col-md-4 text-end">
        <span class="badge bg-light text-success fs-6"
          ><?php echo htmlspecialchars($election['status']) ?></span
        >
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="info-item">
          <i class="fas fa-calendar-alt text-primary me-2"></i>
          <strong>Election Period:</strong>
          <?php echo htmlspecialchars($election['starting_date']) ?>
          -
          <?php echo htmlspecialchars($election['ending_date']) ?>
        </div>
        <div class="info-item">
          <i class="fas fa-users text-info me-2"></i>
          <strong>Total Votes:</strong>
          <?php echo htmlspecialchars($election['total_votes']) ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info-item">
          <i class="fas fa-clock text-warning me-2"></i>
          <strong>Time Remaining:</strong><?php echo $timeRemainingText; ?>
        </div>
        <div class="info-item">
          <i class="fas fa-user-tie text-secondary me-2"></i>
          <strong>Candidates:</strong>
          <?php echo $election['candidateParticipate'] ?>
        </div>
      </div>
    </div>

    <h5 class="mb-3">Candidates</h5>
    <div class="row">
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
        ?>
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="card candidate-card h-100">
          <div class="card-body text-center">
            <img
              src="./../admin/candidateImage/<?php echo htmlspecialchars($candidate['profilePic']) ?>"
              class="rounded-circle mb-3"
              width="80"
              height="80"
            />
            <h6 class="card-title">
              <?php echo htmlspecialchars($candidate['firstName']) ?>
              <?php echo htmlspecialchars($candidate['lastName']) ?>
            </h6>
            <p class="text-muted small">
              <?php echo htmlspecialchars($candidate['groupName']) ?>
            </p>
            <p class="card-text small">
              <?php echo htmlspecialchars($candidate['massage']) ?>
            </p>
            <button
              class="btn btn-outline-primary btn-sm w-100 <?php echo $statusCalcolate ? '' : 'disabled'; ?>"
              onclick="selectCandidate('alice')"
            >
              <i class="fas fa-vote-yea me-1"></i>Vote
            </button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endforeach; ?>
