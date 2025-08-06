<?php 
include 'candidateInfo.php';

// Check if candidate is logged in
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true || !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'candidate') {
    header("Location: login.php");
    exit();
}

include './../admin/fatchElection.php';
$sql2 = "SELECT * FROM elections WHERE status='active'";
$result2 = mysqli_query($conn, $sql2);
$activeElections = [];
if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $activeElections[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Profile - <?php echo isset($_SESSION['firstName']) && isset($_SESSION['lastName']) ? htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']) : 'Candidate Dashboard'; ?></title>
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
                Voting System - Candidate Portal
            </a>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-muted me-3">
                    <i class="fas fa-user me-1"></i>Welcome,<?php echo $_SESSION['firstName'] ?>
                </span>
                <img src="./../admin/candidateImage/<?php echo isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'Guest.png'; ?>" 
                    class="rounded-circle me-2"
                    width="32"
                    height="32">
                <a class="nav-link" href="can_session_distroy.php">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Candidate Profile Header -->
        <div class="card mb-4 gradient-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <div class="profile-image-container">
                            <img
                                src="./../admin/candidateImage/<?php echo isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'Guest.png'; ?>"
                                class="rounded-circle mb-2 profile-image"
                                width="120"
                                height="120"
                                alt="Profile Picture"
                            />
                            <div class="status-indicator online"></div>
                        </div>
                        <h5 class="mb-1 candidate-name">
                            <?php echo isset($_SESSION['firstName'])?$_SESSION['firstName']:"Guest" ?>
                            <?php echo isset($_SESSION['lastName'])?$_SESSION['lastName']:"" ?></h5>
                        <span class="badge bg-gradient-primary party-badge"><?php echo $_SESSION['politicalParty'] ?></span>
                        <!-- <div class="mt-2">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                Member since Jan 2020
                            </small>
                        </div> -->
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h3 class="text-primary mb-0">
                                <i class="fas fa-user-tie me-2"></i>Candidate Dashboard
                            </h3>
                           
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <strong>Email:</strong> 
                                    <span class="text-muted"><?php echo isset($_SESSION['email'])?$_SESSION['email']:"" ?></span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-phone text-success me-2"></i>
                                    <strong>Phone:</strong> 
                                    <span class="text-muted"><?php echo isset($_SESSION['phone'])?$_SESSION['phone']:"" ?></span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    <strong>Address:</strong> 
                                    <span class="text-muted"><?php echo isset($_SESSION['address'])?$_SESSION['address']:"" ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <i class="fas fa-birthday-cake text-warning me-2"></i>
                                    <strong>Date of Birth:</strong> 
                                    <span class="text-muted"><?php echo isset($_SESSION['dateOfBirth'])?$_SESSION['dateOfBirth']:"" ?></span>
                                </div>
                                <!-- <div class="info-item">
                                    <i class="fas fa-id-badge text-info me-2"></i>
                                    <strong>Candidate ID:</strong> 
                                    <span class="badge bg-light text-dark"><?php echo isset($_SESSION['candidateId'])?$_SESSION['candidateId']:"" ?></span>
                                </div> -->
                                <div class="info-item">
                                    <i class="fas fa-flag text-purple me-2"></i>
                                    <strong>Political Party:</strong> 
                                    <span class="text-muted"><?php echo $_SESSION['politicalParty'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Running Election Section -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-vote-yea me-2"></i>Current Running Election
                </h5>
            </div>
            <div class="card-body">
                <?php foreach($activeElections as $activeelection): ?>
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="text-success"><?php echo htmlspecialchars($activeelection['election_name']) ?></h4>
                        <p class="text-muted mb-2">
                            <i class="fas fa-calendar me-1"></i>
                            Election Period: 
                            <?php echo htmlspecialchars($activeelection['starting_date']) ?>
                             - 
                            <?php echo htmlspecialchars($activeelection['ending_date']) ?>
                        </p>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            Position:<?php echo htmlspecialchars($activeelection['position']) ?>
                        </p>
                        
                        <!-- Campaign Message -->
                        <div class="alert alert-light border">
                            <h6><i class="fas fa-bullhorn me-1"></i>Campaign Message:</h6>
                            <p class="mb-0"><?php echo $_SESSION['campaignMessage'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <div class="bg-light p-3 rounded mb-2">
                                <h2 class="text-danger mb-0">2</h2>
                                <small class="text-muted">Days Left</small>
                            </div>
                            <span class="badge bg-warning text-dark fs-6">Election Ending Soon!</span>
                        </div>
                    </div>
                </div>
                <hr />
               
            </div>
        </div>
        <!-- Election Progress section-->
        <?php
        // Get current candidate's ID from session (we'll need to fetch it from database)
        $current_candidate_email = $_SESSION['email'];
        $candidate_id_sql = "SELECT ID FROM candidate WHERE email = ?";
        $stmt = mysqli_prepare($conn, $candidate_id_sql);
        mysqli_stmt_bind_param($stmt, "s", $current_candidate_email);
        mysqli_stmt_execute($stmt);
        $candidate_result = mysqli_stmt_get_result($stmt);
        $current_candidate = mysqli_fetch_assoc($candidate_result);
        $current_candidate_id = $current_candidate['ID'];

        // Fetch elections where this candidate is participating
        $participating_elections_sql = "
            SELECT DISTINCT 
                e.election_ID,
                e.election_name,
                e.position,
                e.starting_date,
                e.ending_date,
                e.status,
                e.total_votes
            FROM 
                elections e
            JOIN 
                vote_counts vc ON e.election_ID = vc.election_ID
            WHERE 
                vc.candidate_ID = ?
            ORDER BY e.starting_date DESC
        ";
        
        $stmt = mysqli_prepare($conn, $participating_elections_sql);
        mysqli_stmt_bind_param($stmt, "i", $current_candidate_id);
        mysqli_stmt_execute($stmt);
        $participating_elections_result = mysqli_stmt_get_result($stmt);
        $participating_elections = [];
        
        while($election = mysqli_fetch_assoc($participating_elections_result)) {
            $participating_elections[] = $election;
        }
        ?>

        <?php if(!empty($participating_elections)): ?>
        <?php foreach($participating_elections as $election):
        $total_votes = $election['total_votes'];
        ?>
        <div class="card mb-4">
            <div class="card-header">
                
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>Election Progress - <?php echo htmlspecialchars($election['election_name']); ?>
                </h5>
                <small class="text-muted">
                    <i class="fas fa-user-tie me-1"></i>Position: <?php echo htmlspecialchars($election['position']); ?>
                </small>
            </div>
            <div class="card-body">
                <?php
                // Get all candidates participating in this specific election with their vote counts
                $election_id = $election['election_ID'];
                
                $election_candidates_sql = "
                    SELECT 
                        c.ID,
                        c.firstName,
                        c.lastName,
                        c.groupName,
                        vc.find_votes
                    FROM 
                        vote_counts vc
                    JOIN 
                        candidate c ON vc.candidate_ID = c.ID
                    WHERE 
                        vc.election_ID = ?
                    ORDER BY vc.find_votes DESC
                ";
                
                $stmt = mysqli_prepare($conn, $election_candidates_sql);
                mysqli_stmt_bind_param($stmt, "i", $election['election_ID']);
                mysqli_stmt_execute($stmt);
                $election_candidates_result = mysqli_stmt_get_result($stmt);
                $election_candidates = [];
                
                while($candidate = mysqli_fetch_assoc($election_candidates_result)) {
                    $election_candidates[] = $candidate;
                }
                
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <h6>Vote Share Comparison</h6>
                        <?php if(!empty($election_candidates)): ?>
                            <?php 
                            $colors = ['primary', 'success', 'warning', 'info', 'secondary', 'danger'];
                            $color_index = 0;
                            ?>
                            <?php foreach($election_candidates as $candidate): ?>
                                <?php
                                $is_current_candidate = ($candidate['ID'] == $current_candidate_id);
                                $parcentage = $total_votes > 0 ? ($candidate['find_votes'] / $total_votes) * 100 : 0;
                                ?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="<?php echo $is_current_candidate ? 'fw-bold' : ''; ?>">
                                            <?php echo htmlspecialchars($candidate['firstName'] . ' ' . $candidate['lastName']); ?>
                                            <?php if($is_current_candidate): ?>
                                                <span class="badge bg-primary badge-sm">You</span>
                                            <?php endif; ?>
                                            <small class="text-muted">(<?php echo htmlspecialchars($candidate['groupName']); ?>)</small>
                                        </span>
                                        <span class="text-<?php echo $color; ?> fw-bold">
                                            <small class="text-muted">(<?php echo $parcentage ?>% votes)</small>
                                        </span>
                                    </div>
                                    <div class="progress mb-2">
                                        <div class="progress-bar bg-blue" 
                                             style="width: <?php echo $parcentage ?>%"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                No votes have been cast yet in this election.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h6>Election Timeline</h6>
                        <div class="timeline">
                            <?php
                            $start_date = new DateTime($election['starting_date']);
                            $end_date = new DateTime($election['ending_date']);
                            $current_date = new DateTime();
                            $days_elapsed = $current_date->diff($start_date)->days;
                            $days_left = $end_date->diff($current_date)->days;
                            $has_started = $current_date >= $start_date;
                            $has_ended = $current_date > $end_date;
                            ?>
                            
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-play-circle <?php echo $has_started ? 'text-success' : 'text-muted'; ?> fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Election Started</h6>
                                    <p class="text-muted mb-0"><?php echo $start_date->format('M d, Y - g:i A'); ?></p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-circle <?php echo ($has_started && !$has_ended) ? 'text-primary' : 'text-muted'; ?> fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Current Status</h6>
                                    <p class="text-muted mb-0">
                                        <?php if($has_ended): ?>
                                            Election Completed
                                        <?php elseif($has_started): ?>
                                            Voting in Progress
                                            <?php if($days_elapsed > 0): ?>
                                                - Day <?php echo $days_elapsed + 1; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Not Started Yet
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-stop-circle <?php echo $has_ended ? 'text-danger' : ($days_left <= 2 ? 'text-warning' : 'text-muted'); ?> fa-lg"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Election Ends</h6>
                                    <p class="text-muted mb-0">
                                        <?php echo $end_date->format('M d, Y - g:i A'); ?>
                                        <?php if(!$has_ended && $has_started): ?>
                                            <span class="badge bg-<?php echo $days_left <= 2 ? 'warning' : 'info'; ?> ms-2">
                                                <?php echo $days_left; ?> day<?php echo $days_left != 1 ? 's' : ''; ?> left
                                            </span>
                                        <?php elseif($has_ended): ?>
                                            <span class="badge bg-secondary ms-2">Completed</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Election Statistics -->
                        <div class="mt-4">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="bg-light p-2 rounded">
                                        <h6 class="mb-0 text-primary"><?php echo count($election_candidates); ?></h6>
                                        <small class="text-muted">Candidates</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-light p-2 rounded">
                                        <h6 class="mb-0 text-success"><?php echo $total_votes; ?></h6>
                                        <small class="text-muted">Total Votes</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>Election Progress
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle fa-2x mb-3"></i>
                    <h6>No Election Participation</h6>
                    <p class="mb-0">You are not currently participating in any elections. Contact the administrator to be added to upcoming elections.</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
     <?php endforeach; ?>

    <!-- Enhanced Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        
        .gradient-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .profile-image-container {
            position: relative;
            display: inline-block;
        }
        
        .profile-image {
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .profile-image:hover {
            transform: scale(1.05);
        }
        
        .status-indicator {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid #fff;
        }
        
        .status-indicator.online {
            background-color: #28a745;
            animation: pulse-green 2s infinite;
        }
        
        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
        }
        
        .candidate-name {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .party-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
        }
        
        .info-item {
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .stats-card {
            border-radius: 15px !important;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            pointer-events: none;
        }
        
        .stats-icon {
            opacity: 0.8;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-bar {
            border-radius: 4px;
            transition: width 0.6s ease;
        }
        
        .timeline {
            position: relative;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #667eea, #764ba2);
        }
        
        .badge {
            font-size: 0.75em;
            padding: 6px 12px;
            border-radius: 12px;
        }
        
        .bg-light {
            background-color: #f8f9fa !important;
        }
        
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .btn-outline-primary {
            border-color: #667eea;
            color: #667eea;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            transform: translateY(-1px);
        }
        
        .dropdown-menu {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .text-purple {
            color: #764ba2 !important;
        }
        
        /* Animation for counters */
        .counter {
            animation: fadeInUp 1s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .info-item {
                font-size: 0.9rem;
            }
            
            .stats-card h3 {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"
    ></script>

    <!-- Enhanced JavaScript -->
    <script>
        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 20);
            });
        }
        
        // Real-time updates simulation
        function updateVoteCount() {
            const voteElement = document.querySelector('.counter[data-target="1847"]');
            const todayElement = document.querySelector('.counter[data-target="127"]');
            
            if (voteElement && todayElement) {
                let currentVotes = parseInt(voteElement.getAttribute('data-target'));
                let todayVotes = parseInt(todayElement.getAttribute('data-target'));
                
                // Simulate vote increase
                const randomIncrease = Math.floor(Math.random() * 3) + 1;
                currentVotes += randomIncrease;
                todayVotes += randomIncrease;
                
                // Update data attributes
                voteElement.setAttribute('data-target', currentVotes);
                todayElement.setAttribute('data-target', todayVotes);
                
                // Update display
                voteElement.textContent = currentVotes.toLocaleString();
                todayElement.textContent = todayVotes.toLocaleString();
                
                // Show notification
                showNotification(`+${randomIncrease} new vote${randomIncrease > 1 ? 's' : ''} received!`, 'success');
            }
        }
        
        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 3000);
        }
        
        // Days countdown
        function updateDaysLeft() {
            const endDate = new Date('July 31, 2025');
            const today = new Date();
            const timeDiff = endDate.getTime() - today.getTime();
            const daysLeft = Math.ceil(timeDiff / (1000 * 3600 * 24));
            
            const daysElement = document.querySelector('.text-danger');
            if (daysElement && daysLeft >= 0) {
                daysElement.textContent = daysLeft;
                
                // Change color based on days left
                if (daysLeft <= 1) {
                    daysElement.className = 'text-danger';
                } else if (daysLeft <= 3) {
                    daysElement.className = 'text-warning';
                } else {
                    daysElement.className = 'text-success';
                }
            }
        }
        
        // Smooth scroll for any internal links
        function smoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
        
        // Progress bar animations
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach((bar, index) => {
                setTimeout(() => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                }, index * 200);
            });
        }
        
        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Animate counters after a short delay
            setTimeout(animateCounters, 500);
            
            // Animate progress bars
            setTimeout(animateProgressBars, 1000);
            
            // Update days left
            updateDaysLeft();
            
            // Initialize smooth scrolling
            smoothScroll();
            
            // Show welcome notification
            setTimeout(() => {
                showNotification('Welcome to your candidate dashboard!', 'info');
            }, 1500);
            
            console.log('Candidate Dashboard - Enhanced Design Loaded');
        });
        
        // Update vote count every 30 seconds (for demo)
        setInterval(updateVoteCount, 30000);
        
        // Update days left every hour
        setInterval(updateDaysLeft, 3600000);
        
        // Add hover effects to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stats-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
