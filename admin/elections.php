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
      <button type="button" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>Create Election
      </button>
    </div>

    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Presidential Election 2025</h5>
          </div>
          <div class="card-body">
            <p><strong>Start Date:</strong></p>
            <p><strong>End Date:</strong></p>
            <p>
              <strong>Status:</strong>
              <span class="badge bg-success"></span>
            </p>
            <p><strong>Total Votes:</strong> 0</p>
            <div class="btn-group" role="group">
              <button class="btn btn-sm btn-outline-primary">Edit</button>
              <button class="btn btn-sm btn-outline-info">View Results</button>
              <button class="btn btn-sm btn-outline-warning">Suspend</button>
            </div>
          </div>
        </div>
      </div>
      <!-- More election cards would be here -->
    </div>
  </body>
</html>
