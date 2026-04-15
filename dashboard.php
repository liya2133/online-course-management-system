<?php
require('../config/autoload.php'); // Autoload already starts the session
$dao = new DataAccess();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: adminlogin.php'); // Redirect to login page if not logged in
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session
    header('Location: adminlogin.php'); // Redirect to login page after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Confirm Logout</p>
        <a href="dashboard.php?logout=true" class="logout-btn">Logout</a>
    </div>
</body>
</html>
