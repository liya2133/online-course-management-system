<?php
// Include configuration
require('../config/autoload.php');

// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'project'); // Update your DB credentials

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the `coid` from the URL
$coid = $_GET['coid'];

// Check if `coid` is provided
if (isset($coid)) {
    // Update status to 2 (deleted) for the record
    $sql = "UPDATE joining SET status = 2 WHERE coid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $coid); // 's' stands for string type for coid

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Redirect after deleting the record
    header("Location: adminview.php"); // Redirect to your table view page
    exit;
} else {
    echo "Invalid request.";
}
?>
