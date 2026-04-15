<?php
// Include configuration
require('../config/autoload.php');
include("header.php");
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'project'); // Use your actual DB credentials

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the `coid` from the URL
$coid = $_GET['coid'];

// Fetch existing data for the given `coid`
$sql = "SELECT * FROM joining WHERE coid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $coid); // 's' stands for string type
$stmt->execute();
$result = $stmt->get_result();

// Check if the record exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated values from the form
    $semail = $_POST['semail'];
    $coid = $_POST['coid']; // You should also include `coid` as it might be used for identification
    $cofee = $_POST['cofee'];
    $joindate = $_POST['joindate'];
    $bid = $_POST['bid'];
    $total = $_POST['total'];
    $coname = $_POST['coname'];
    $noofitems = $_POST['noofitems'];

    // Update the record in the database
    $updateSql = "UPDATE joining SET semail = ?, cofee = ?, joindate = ?, bid = ?, total = ?, coname = ?, noofitems = ? WHERE coid = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssssss", $semail, $cofee, $joindate, $bid, $total, $coname, $noofitems, $coid);
    
    if ($updateStmt->execute()) {
        // Redirect back to adminview.php after updating the record
        header("Location: adminview.php");
        exit; // Ensure that no further code is executed after redirection
    } else {
        echo "Error updating record: " . $updateStmt->error;
    }
    $updateStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit Joining Information</title>
</head>
<body>
    <h2>Edit Joining Information</h2>
    <form method="POST" action="editstd.php?coid=<?php echo $coid; ?>">
        <label for="semail">Email:</label><br>
        <input type="email" id="semail" name="semail" value="<?php echo $row['semail']; ?>" required><br><br>

        <label for="coid">Course ID:</label><br>
        <input type="text" id="coid" name="coid" value="<?php echo $row['coid']; ?>" readonly><br><br>

        <label for="cofee">Course Fee:</label><br>
        <input type="text" id="cofee" name="cofee" value="<?php echo $row['cofee']; ?>" required><br><br>

        <label for="joindate">Join Date:</label><br>
        <input type="date" id="joindate" name="joindate" value="<?php echo $row['joindate']; ?>" required><br><br>

        <label for="bid">Batch ID:</label><br>
        <input type="text" id="bid" name="bid" value="<?php echo $row['bid']; ?>" required><br><br>

        <label for="total">Total Amount:</label><br>
        <input type="text" id="total" name="total" value="<?php echo $row['total']; ?>" required><br><br>

        <label for="coname">Course Name:</label><br>
        <input type="text" id="coname" name="coname" value="<?php echo $row['coname']; ?>" required><br><br>

        <label for="noofitems">Number of Items:</label><br>
        <input type="number" id="noofitems" name="noofitems" value="<?php echo $row['noofitems']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
