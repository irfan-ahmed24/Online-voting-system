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

          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">Presidential Election 2024 - Live Results</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">


                <?php 
                $val=0;
                ?>


                  <div class="candidate-result mb-3">
                    <div class="d-flex align-items-center mb-2">
                      <img
                        src="https://via.placeholder.com/40"
                        class="rounded-circle me-3"
                        width="40"
                        height="40"
                      />
                      <div class="flex-grow-1">
                        <h6 class="mb-0">Alice Johnson</h6>
                        <small class="text-muted">Democratic Party</small>
                      </div>
                      <div class="text-end">
                        <strong class="text-success"><?php $val?> votes</strong>
                        <br />
                        <small class="text-muted"><?php $val?>%</small>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar bg-success"
                        style="width: <?php $val?>%"
                      ></div>
                    </div>
                  </div>





                </div>


                <!-- total vite ciunter section -->
                <div class="col-lg-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <h4>Total Votes</h4>
                      <h2 class="text-primary"><?php $val?></h2>
                      <p class="text-muted">Out of <?php $val?> registered</p>
                      <div class="progress mb-2">
                        <div class="progress-bar" style="width: <?php $val?>%"></div>
                      </div>
                      <small><?php $val?>% turnout</small>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
</body>
</html>