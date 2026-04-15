<?php  
// session_start(); 
include("dbcon.php");
require('../config/autoload.php');
$dao = new DataAccess();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Stylish Table for Bill and Payments">
    <title>Bill Summary</title>

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Include custom CSS -->
    <style>
        /* Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            overflow: hidden; /* Prevents scrollbars */
        }

        /* Full-page background image with blur effect */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://i.ytimg.com/vi/_j3VG3g6sT4/maxresdefault.jpg'); /* Path to your image */
            background-size: cover;
            background-position: center;
            filter: blur(10px); /* Blur effect */
            z-index: -1; /* Ensure the content is above the image */
        }

        /* Title Styling */
        h1 {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: BLACK;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            margin-top: 10px;
            color: BLACK;
        }

        .table-header {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-top: 30px;
        }

        /* Table Styling */
        table {
            width: 80%;
            max-width: 1000px;
            border-collapse: collapse;
            margin-bottom: 30px;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background for table */
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: ORANGE;
            color: white;
        }

        table td {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styling */
        .btn {
            background-color: ORANGE;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn:hover {
            background-color: #45a049;
        }

       

        /* Footer Styling */
        .footer {
            text-align: center;
            font-size: 14px;
            color: BLACK;
            margin-top: 30px;
        }

        .footer a {
            color: BLACK;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Background Image with Blur -->
    <div class="background-image"></div>

    <!-- Title -->
    <h1>Payment Bill Summary</h1>
    <h2>EDUWIN ACADEMY </h2>

    <!-- Table -->
    <div class="table-header">Bill Details - Date: <?php echo date("Y/m/d"); ?></div>
    <table id="printTable">
        <thead>
            <tr>
                <th style="text-align:left;">Bill No.</th>
                <th style="text-align:left;">Course Id</th>
                <th style="text-align:left;">Course Fee</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $name = $_SESSION['semail'];
            $sql = "SELECT * FROM joining WHERE status=1 AND semail='$name'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['bid']}</td><td>{$row['coid']}</td><td>{$row['cofee']}</td></tr>";
                }
            }
            ?>

            <?php

$sql = "update joining set status=2 WHERE status=1 AND semail='$name'";
$result = $conn->query($sql);

            $sql123 = "SELECT SUM(cofee) AS total FROM joining WHERE status=1 AND semail='$name'";
            $result123 = $conn->query($sql123);
            $row = $result123->fetch_assoc();
            $total = $row["total"];
            echo "<tr><td colspan='2' style='text-align:right;'>Total:</td><td>{$total}</td></tr>";
            ?>
        </tbody>
    </table>

    <!-- Print Button -->
    <button class="btn" onclick="printData();"><i class="fas fa-print"></i> Print</button>

    <!-- Home Button -->
    <a href="newindex.php" class="btn-secondary">Go to Home</a>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Star Angamaly. All Rights Reserved.</p>
    </div>

    <!-- JavaScript for Printing -->
    <script>
        function printData() {
            var divToPrint = document.getElementById("printTable");
            var newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>

</body>

</html>
