<?php 
include './fatchCandidate.php';
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
        <i class="fas fa-chart-bar me-2"></i>
        Election results and analytics will be displayed here.
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
