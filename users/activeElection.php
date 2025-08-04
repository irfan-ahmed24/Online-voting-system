<?php
include "./../admin/fatchElection.php";
?>
<div class="col-12">
  <h4 class="mb-3">Active Elections</h4>
  <hr>
  <div class="row">

    <!-- Loop through each active election -->
    <?php foreach ($activeElections as $activeElection): ?>
    <div class="col-lg-6 mb-3">
      <div class="card election-card h-100">
        <div
          class="card-header bg-success text-white d-flex justify-content-between align-items-center"
        >
          <h6 class="mb-0"><?php echo htmlspecialchars($activeElection['election_name']) ?></h6>
          <span class="badge bg-light text-success"><?php echo htmlspecialchars($activeElection['status']) ?></span>
        </div>
        <div class="card-body">
          <p class="card-text">
            Choose the next <span><?php echo htmlspecialchars($activeElection['position']) ?></span>
          </p>
          <div class="d-flex justify-content-between text-muted small mb-3">
            <span><i class="fas fa-calendar me-1"></i>Ends: <?php echo htmlspecialchars($activeElection['ending_date']) ?></span>
            <span><i class="fas fa-users me-1"></i><?php echo htmlspecialchars($activeElection['total_votes']) ?> votes</span>
          </div>
          <button
            class="btn btn-success w-100"
            onclick="showSection('elections')"
          >
            <i class="fas fa-vote-yea me-2"></i>Vote Now
          </button>
        </div>
      </div>
    </div>
    <?php endforeach; ?> 
  </div>
</div>
