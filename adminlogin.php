<?
session_start(); // Start the session (make sure this is at the very top)?>
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Redirect to dashboard if already logged in
    exit();
}

$error = ''; // Variable to hold error messages

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project'); // Update with your database credentials

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query to fetch user data
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start the session
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];

            // Redirect to the dashboard
            header('Location: header.php');
            exit();
        } else {
            $error = 'Incorrect password.';
        }
    } else {
        $error = 'Username not found.';
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

/* Login Page */
.login-container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin: 10px 0 5px;
    font-size: 14px;
}

input {
    padding: 8px;
    margin-bottom: 15px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

/* Dashboard Page */
.dashboard-container {
    width: 80%;
    margin: 50px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.logout-btn {
    padding: 10px 20px;
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 20px;
}

.logout-btn:hover {
    background-color: #c82333;
}
</style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <?php if ($error): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
