<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container mt-4">
          <h2 class="mb-4">My Profile</h2>

          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card">
                <div class="card-body text-center">
                  <img
                    src="https://via.placeholder.com/120"
                    class="rounded-circle mb-3"
                    width="120"
                    height="120"
                  />
                  <h5 class="card-title">John Doe</h5>
                  <p class="text-muted">john.doe@example.com</p>
                  <span class="badge bg-success mb-3">Verified Voter</span>
                  <br />
                  <button class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-camera me-1"></i>Change Photo
                  </button>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-header">
                  <h6 class="mb-0">Voting Statistics</h6>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between mb-2">
                    <span>Elections Participated:</span>
                    <strong>5</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span>Votes Cast:</span>
                    <strong>8</strong>
                  </div>
                  <div class="d-flex justify-content-between">
                    <span>Member Since:</span>
                    <strong>Jan 2023</strong>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" value="John" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="Doe" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          value="john.doe@example.com"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input
                          type="tel"
                          class="form-control"
                          value="+1 234 567 8900"
                        />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input
                          type="date"
                          class="form-control"
                          value="1990-05-15"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select">
                          <option selected>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                          <option>Prefer not to say</option>
                        </select>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" rows="3">
123 Main Street, City, State 12345</textarea
                      >
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">National ID</label>
                        <input
                          type="text"
                          class="form-control"
                          value="ID123456789"
                          readonly
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Voter Registration</label>
                        <input
                          type="text"
                          class="form-control"
                          value="VR987654321"
                          readonly
                        />
                      </div>
                    </div>

                    <div class="d-flex gap-2">
                      <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Profile
                      </button>
                      <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-2"></i>Reset
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="card mt-4">
                <div class="card-header">
                  <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label class="form-label">Current Password</label>
                      <input type="password" class="form-control" />
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" />
                      </div>
                    </div>
                    <button type="submit" class="btn btn-warning">
                      <i class="fas fa-key me-2"></i>Change Password
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</body>
</html>