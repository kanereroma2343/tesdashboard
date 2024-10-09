<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with Hover Effect</title>
    <link rel="stylesheet" href="dashstyle.css">
</head>
<body>

<?php
// Start session to retrieve logged-in user information
session_start();

// Assuming user data is stored in $_SESSION['username']
if (isset($_SESSION['username'])) {
    $current_user = $_SESSION['username'];
} else {
    // Redirect to login page if no session is found
    header("Location: index.php");
    exit();
}
?>

<!-- Overlay for blur effect -->
<div class="overlay"></div>

<!-- Header Section -->
<header>
    <div class="form-container">
        <div class="header-container">
            <h1>Information and Communication Technology Unit</h1>
            <p>Welcome to ICT Unit Database</p>
            <div class="user-info">
                <span>Logged in as: <?php echo htmlspecialchars($current_user); ?></span>
                <a href="../logout.php" class="logout-btn">Log Out</a>
            </div>
        </div>
    </div>
</header>
<!-- Menu Section -->
<div class="menu-container">
    <a href="planning.php" class="menu-option">PNSC</a>
    <a href="scholarship.php" class="menu-option">RSC</a>
    <a href="nttcmonitorv2/index.php" class="menu-option">TDU - NTTC</a>
</div>

<!-- Footer Section -->
<footer>
    <div class="footer-container">
        <p>&copy; 2024 TESDA ICT Unit. All rights reserved.</p>
        <p>Contact us: <a href="mailto:support@tesda.gov.ph">region7@tesda.gov.ph</a></p>
    </div>
</footer>

</body>
</html>
