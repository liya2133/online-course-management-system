<?php

session_start();
include("header.php");
// Initialize variables to hold error messages
$error = '';
$successMessage = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate the form data
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'project'); // Change database credentials accordingly

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = 'Username is already taken. Please choose another one.';
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new admin into the database
            $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $hashedPassword);

            if ($stmt->execute()) {
                $successMessage = 'Admin registered successfully. You can now log in.';
            } else {
                $error = 'An error occurred while registering. Please try again.';
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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

/* Registration Page */
.registration-container {
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

.success {
    color: green;
    font-size: 14px;
    margin-bottom: 15px;
}

.error {
    color: red;
    font-size: 14px;
    margin-bottom: 15px;
}
</style>
</head>
<body>
    <div class="registration-container">
        <h2>Register New Admin</h2>
        
        <?php if ($successMessage): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
