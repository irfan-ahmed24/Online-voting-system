<?php 
// Fetch total candidates
$sql = "SELECT * FROM elections";
$result = mysqli_query($conn, $sql);

$elections = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $elections[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1 class="h2">Election Management</h1>
      <a href="createElection.php" type="button" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>Create Election
      </a>
    </div>

    <div class="row">
      <?php $i=1; foreach($elections as $election): ?>
      <div class="col-lg-6 mb-4">
        
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
              <?php echo htmlspecialchars($election['election_name']); ?>
            </h5>
          </div>
          <div class="card-body">
            <p><strong>Start Date:</strong><?php echo htmlspecialchars($election['starting_date']); ?> </p>
            <p><strong>End Date:</strong><?php echo htmlspecialchars($election['ending_date']); ?></p>
            <p>
              <strong>Status:</strong>
              <span class="badge bg-success"><?php echo htmlspecialchars($election['status']); ?></span>
            </p>
            <p><strong>Total Votes:</strong> <?php echo htmlspecialchars($election['total_votes']); ?></p>
            <div class="btn-group" role="group">
              <button class="btn btn-sm btn-outline-info" onclick="showSection('results')">View Results</button>
              <button class="btn btn-sm btn-outline-warning">Suspend</button>
            </div>
          </div>
        </div>
         
      </div>
      <?php endforeach; ?>
      <!-- More election cards would be here -->
    </div>
  </body>
</html>
