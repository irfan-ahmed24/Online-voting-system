<?php
include 'config.php';

// Fetch all elections
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
    <title>Elections and Candidates</title>
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <?php foreach($elections as $election): ?>
                <div class="card shadow-lg border-0 rounded-4 mb-4">
                    <!-- Election Header -->
                    <div class="card-header bg-gradient-primary text-white py-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="card-title mb-1 fw-bold">
                                    <i class="fas fa-trophy me-2"></i>
                                    <?php echo htmlspecialchars($election['election_name']); ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Election Details -->
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <i class="fas fa-calendar-alt text-success me-2"></i>
                                    <strong>Start Date:</strong> 
                                    <span class="text-muted">
                                        <?php echo date('M d, Y - g:i A', strtotime($election['starting_date'])); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <i class="fas fa-info-circle text-info me-2"></i>
                                    <strong>Status:</strong> 
                                    <span class="badge bg-success"><?php echo htmlspecialchars($election['status']); ?></span>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Participating Candidates Section -->
                        <h5 class="text-primary mb-3">
                            <i class="fas fa-users me-2"></i>Participating Candidates
                        </h5>

                        <?php
                        // Fetch candidates participating in this election
                        $election_id = $election['election_ID'];
                        $candidates_sql = "
                            SELECT 
                                c.ID,
                                c.firstName, 
                                c.lastName, 
                                c.email,
                                c.phone,
                                c.profilePic,
                                c.groupName,
                                c.massage,
                                c.gender,
                                vc.find_votes
                            FROM 
                                vote_counts vc
                            JOIN 
                                candidate c ON vc.candidate_ID = c.ID
                            WHERE 
                                vc.election_ID = ?
                            ORDER BY vc.find_votes DESC
                        ";
                        $stmt = mysqli_prepare($conn, $candidates_sql);
                        mysqli_stmt_bind_param($stmt, "s", $election_id);
                        mysqli_stmt_execute($stmt);
                        $candidates_result = mysqli_stmt_get_result($stmt);
                        $participating_candidates = [];
                        
                        while($candidate = mysqli_fetch_assoc($candidates_result)) {
                            $participating_candidates[] = $candidate;
                        }
                        ?>
                        <!-- <?php if(empty($participating_candidates)): ?>
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-user-slash fa-2x mb-3"></i>
                            <h6>No Candidates Participating</h6>
                            <p class="mb-0">No candidates have been added to this election yet.</p>
                        </div> -->
                        <!-- <?php else: ?> -->
                        <div class="row">
                            <?php foreach($participating_candidates as $candidate): ?>
                            <div class="col-lg-6 col-xl-4 mb-3">
                                <div class="card candidate-card h-100 border-0 shadow-sm">
                                    <div class="card-body p-3">
                                        <!-- Candidate Profile -->
                                        <div class="text-center mb-3">
                                            <div class="position-relative d-inline-block">
                                                <img
                                                    src="admin/candidateImage/<?php echo !empty($candidate['profilePic']) ? htmlspecialchars($candidate['profilePic']) : 'default-avatar.png'; ?>"
                                                    class="rounded-circle border border-3 border-white shadow"
                                                    width="60"
                                                    height="60"
                                                    alt="<?php echo htmlspecialchars($candidate['firstName'] . ' ' . $candidate['lastName']); ?>"
                                                    onerror="this.src='https://via.placeholder.com/60x60/6c757d/ffffff?text=No+Photo'"
                                                />
                                                <span class="position-absolute bottom-0 end-0 translate-middle badge rounded-pill bg-success">
                                                    <i class="fas fa-check fa-xs"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Candidate Information -->
                                        <div class="text-center">
                                            <h6 class="candidate-name mb-2 fw-bold">
                                                <?php echo htmlspecialchars($candidate['firstName'] . ' ' . $candidate['lastName']); ?>
                                            </h6>
                                            
                                            <div class="mb-2">
                                                <span class="badge bg-primary bg-gradient party-badge">
                                                    <?php echo htmlspecialchars($candidate['groupName']); ?>
                                                </span>
                                            </div>

                                            <div class="candidate-details small text-muted">
                                                <div class="mb-1">
                                                    <i class="fas fa-envelope me-1"></i>
                                                    <?php echo htmlspecialchars($candidate['email']); ?>
                                                </div>
                                                <div class="mb-1">
                                                    <i class="fas fa-phone me-1"></i>
                                                    <?php echo htmlspecialchars($candidate['phone']); ?>
                                                </div>
                                                <div class="mb-2">
                                                    <i class="fas fa-venus-mars me-1"></i>
                                                    <?php echo htmlspecialchars(ucfirst($candidate['gender'])); ?>
                                                </div>
                                            </div>

                                            <!-- Vote Count -->
                                            <div class="mt-2">
                                                <div class="bg-light p-2 rounded">
                                                    <i class="fas fa-chart-bar text-primary me-1"></i>
                                                    <strong>Votes: <?php echo $candidate['find_votes']; ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- <?php endif; ?> -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"
    ></script>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        .candidate-card {
            transition: all 0.3s ease;
        }

        .candidate-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
        }

        .party-badge {
            font-size: 0.7rem;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
        }

        .candidate-name {
            color: #2c3e50;
        }

        .candidate-details {
            line-height: 1.4;
        }

        .info-item {
            margin-bottom: 0.5rem;
        }

        .card {
            border-radius: 15px !important;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
        }

        @media (max-width: 768px) {
            .candidate-card {
                margin-bottom: 1rem;
            }
            
            .display-4 {
                font-size: 2rem;
            }
        }
    </style>
</body>
</html>
