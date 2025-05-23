<?php
// dashboard.php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'includes/header.php';
?>

<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    <p>This is your personalized dashboard. You can add more content here for logged-in users, such as:</p>
    <ul>
        <li>Order history</li>
        <li>Prescriptions</li>
        <li>Saved addresses</li>
        <li>Profile settings</li>
        <li>Exclusive offers</li>
    </ul>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</div>

<?php include 'includes/footer.php'; ?>