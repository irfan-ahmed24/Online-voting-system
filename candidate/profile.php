<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Profile</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
</head>
<body>
    <!-- Simple Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-vote-yea text-primary me-2"></i>
                Voting System
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Profile Header -->
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                <img
                    src="https://via.placeholder.com/150"
                    class="rounded-circle mb-3"
                    width="150"
                    height="150"
                    alt="Profile Picture"
                />
                <h4>John Doe</h4>
                <p class="text-muted">Democratic Party</p>
                <button class="btn btn-outline-primary btn-sm" disabled>
                    <i class="fas fa-camera me-1"></i>Profile View Only
                </button>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Campaign Message</h5>
                        <p class="card-text">
                            Experienced leader committed to bringing positive change 
                            and representing the voice of the people in government.
                        </p>
                        <div class="row text-center">
                            <div class="col-3">
                                <h5 class="text-primary">5</h5>
                                <small class="text-muted">Campaigns</small>
                            </div>
                            <div class="col-3">
                                <h5 class="text-success">1,247</h5>
                                <small class="text-muted">Total Votes</small>
                            </div>
                            <div class="col-3">
                                <h5 class="text-info">3</h5>
                                <small class="text-muted">Elections Won</small>
                            </div>
                            <div class="col-3">
                                <h5 class="text-warning">89%</h5>
                                <small class="text-muted">Approval</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simple Tabs -->
        <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">
                    <i class="fas fa-user me-1"></i>My Information
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="elections-tab" data-bs-toggle="tab" data-bs-target="#elections" type="button">
                    <i class="fas fa-vote-yea me-1"></i>My Elections & Votes
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="profileTabsContent">
            <!-- Personal Info Tab -->
            <div class="tab-pane fade show active" id="info" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">My Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Full Name:</strong>
                                <p class="text-muted">John Doe</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Political Party:</strong>
                                <p class="text-muted">Democratic Party</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Email:</strong>
                                <p class="text-muted">john.doe@example.com</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Phone:</strong>
                                <p class="text-muted">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Date of Birth:</strong>
                                <p class="text-muted">May 15, 1980</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Member Since:</strong>
                                <p class="text-muted">January 2020</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong>Address:</strong>
                            <p class="text-muted">123 Main Street, City, State 12345</p>
                        </div>
                        <div class="mb-3">
                            <strong>Campaign Message:</strong>
                            <p class="text-muted">Experienced leader committed to bringing positive change and representing the voice of the people in government.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Elections Tab -->
            <div class="tab-pane fade" id="elections" role="tabpanel">
                <div class="row">
                    <!-- Summary Stats -->
                    <div class="col-12 mb-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-chart-bar me-2"></i>My Election Summary
                                </h5>
                                <div class="row text-center">
                                    <div class="col-3">
                                        <h4>4</h4>
                                        <small>Total Elections</small>
                                    </div>
                                    <div class="col-3">
                                        <h4>10,168</h4>
                                        <small>Total Votes Received</small>
                                    </div>
                                    <div class="col-3">
                                        <h4>2</h4>
                                        <small>Elections Won</small>
                                    </div>
                                    <div class="col-3">
                                        <h4>50%</h4>
                                        <small>Win Rate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Election -->
                    <div class="col-md-12 mb-3">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-circle me-2"></i>Currently Active
                                </h6>
                            </div>
                            <div class="card-body">
                                <h5>Presidential Election 2024</h5>
                                <p class="text-muted">Position: President</p>
                                <p class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    Started: July 1, 2024 | Ends: July 30, 2024
                                </p>
                                
                                <div class="alert alert-info">
                                    <strong>Current Status:</strong> Election is ongoing
                                </div>

                                <div class="row text-center mb-3">
                                    <div class="col-4">
                                        <div class="border-end">
                                            <h5 class="text-success mb-0">1,247</h5>
                                            <small class="text-muted">Votes Received</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-end">
                                            <h5 class="text-info mb-0">34%</h5>
                                            <small class="text-muted">Vote Share</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="text-warning mb-0">5</h5>
                                        <small class="text-muted">Days Left</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
        }
        
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        
        .badge {
            cursor: pointer;
        }
        
        .btn {
            border-radius: 5px;
        }
    </style>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"
    ></script>

    <!-- Simple JavaScript -->
    <script>
        // No form submission needed - view only
        // No editing capabilities
        console.log('Candidate Profile - View Only Mode');
    </script>
</body>
</html>
