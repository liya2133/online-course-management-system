<?php
// Database connection
$servername = "localhost";
$username = "root"; // replace with your username
$password = ""; // replace with your password
$dbname = "project"; // replace with your database name

include("header.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch data from the 'joining' table where status is not 2
$query = "SELECT semail, coid, cofee, joindate, bid, total, coname, noofitems FROM joining WHERE status != 2";
$result = mysqli_query($conn, $query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Joining Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> <!-- Include your CSS file here -->
    <style>
        /* Basic styles for the joining table */
        .table-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f9ff;
        }

        /* Button styles */
        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Joining Information</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Course ID</th>
                    <th>Course Fee</th>
                    <th>Join Date</th>
                    <th>Batch ID</th>
                    <th>Total Amount</th>
                    <th>Course Name</th>
                    <th>Number of Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data row by row
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['semail']}</td>";
                        echo "<td>{$row['coid']}</td>";
                        echo "<td>{$row['cofee']}</td>";
                        echo "<td>{$row['joindate']}</td>";
                        echo "<td>{$row['bid']}</td>";
                        echo "<td>{$row['total']}</td>";
                        echo "<td>{$row['coname']}</td>";
                        echo "<td>{$row['noofitems']}</td>";
                        echo "<td>
                                <a href='editstd.php?coid={$row['coid']}' class='btn btn-edit'>Edit</a>
                                <a href='deletestd.php?coid={$row['coid']}' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
