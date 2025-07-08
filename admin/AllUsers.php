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
      <h1 class="h2">User Management</h1>
      <button type="button" class="btn btn-primary">
        <i class="fas fa-user-plus me-1"></i>Add User
      </button>
    </div>

    <div class="card shadow">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary">Edit</button>
                          <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                      </tr> -->
              <!-- More rows would be populated from database -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
