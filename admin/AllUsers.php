<?php 
include './fatchUsers.php';
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
      <h1 class="h2">User Management</h1>
    </div>

    <div class="card shadow">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
           <thead>
          <tr>
            <th>SI</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ragistration date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach ($users as $user): ?>
            <tr>
              <td><?php echo ++$i; ?></td>
              <td>
              <?php echo htmlspecialchars($user['firstName']); ?>
              <?php echo htmlspecialchars($user['lastName']); ?>
              </td>
              <td><?php echo htmlspecialchars($user['email']); ?></td>
              
              <td><?php echo htmlspecialchars($user['reg_date']); ?></td>
              <td>
              <a href="deleteUser.php?id=<?php echo $user['ID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
            </tr>
            
          <?php endforeach; ?>
        </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
