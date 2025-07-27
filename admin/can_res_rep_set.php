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
        <i class="fas fa-info-circle me-2"></i>
        Candidate management features will be implemented here.
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
