
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-secondary bg-gradient">
      <div class="container-fluid">
        <a class="navbar-brand mx-3 text-light" href="#"
          >Online Voting System</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a class="nav-link active text-light" aria-current="page" href="./index.php"
                >Dashboard</a
              >
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link active text-light" aria-current="page" href="./SignUp.php"
                >Sign Up</a
              >
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link active text-light" aria-current="page" href="./Is_login.php"
                >Login</a
              >
            </li> 
          </ul>
          <a class="btn btn-primary mx-3" href="./candidate/login.php"> Candidate login </a>
          <a class="btn btn-primary mx-3" href="./admin/admin_login.php"> Admin Penel </a>
        </div>
      </div>
    </nav>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
