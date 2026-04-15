<!DOCTYPE html>
<html lang="en">
<?php 
ob_start(); 
require('../config/autoload.php'); 
include("dbcon.php");

$coid = "";
$semail = "";
$total = "";
$status = 1;  // Default status
$joindate = date('Y-m-d', time());  // Current date
$dao = new DataAccess();

// Check if the form is submitted
if (isset($_POST["btn_insert"])) {
    // Check if the user is logged in
    if (!isset($_SESSION['semail'])) {
        header('location:login.php');
        exit();
    } else {
        // Get session email and course ID
        $semail = $_SESSION['semail'];
        $coid = $_GET['id'];  // Get course ID from URL

        // Query to get course details
        $q1 = "SELECT * FROM course WHERE coid = $coid";  // Correct SQL query
        $info1 = $dao->query($q1);
        
        // Check if course data exists
        if (isset($info1[0])) {
            $total = $info1[0]["cofee"];  // Get course fee
            $iname = $info1[0]["coname"]; // Get course name
        } else {
            die("Error: Course not found.");
        }

        // Define the number of items (can be dynamic depending on your needs)
        $noofitems = 1;  // Default value, adjust as needed

        // Insert data into the 'joining' table using a prepared statement
        $sql = "INSERT INTO joining (semail, coid, cofee, status, joindate, coname, total, noofitems) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters and execute
            $stmt->bind_param("siiissdi", $semail, $coid, $total, $status, $joindate, $iname, $total, $noofitems);
            if ($stmt->execute()) {
                $_SESSION['cofee'] = $total;  // Store course fee in session
                header('location:viewcart.php');  // Redirect to view cart page
                exit();
            } else {
                die("Error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Error: " . $conn->error);
        }
    }
}

// Handle cancel action
if (isset($_POST["cancel"])) {
    header('location:displayitemss.php');
    exit();
}
?>

<head>
    <meta charset="utf-8">
    <title>Eduworld</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .upper {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
            margin-bottom: 30px; /* Space below the course details section */
        }

        .upper h3 {
            margin-bottom: 20px;
            color: #002147;
        }

        .content label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .content input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .btn-grp {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px; /* Added space below the buttons */
        }

        .buttons {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buttons#btn-1 {
            background-color: #007bff;
            color: white;
        }

        .buttons#btn-2 {
            background-color: #dc3545;
            color: white;
        }

        .buttons:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0"><span class="text-primary">EDU</span>world</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                        <small>L street, Angamaly</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>info@eduworld.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>+012 345 6789</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="plans-section" id="rooms">
        <div class="container">
            <div class="container-fluid page-header" style="margin-bottom: 90px;">
                <div class="container">
                    <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                        <h3 class="display-4 text-white text-uppercase">Course Booking</h3>
                        <div class="d-inline-flex text-white">
                            <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                            <i class="fa fa-angle-double-right pt-1 px-3"></i>
                            <p class="m-0 text-uppercase">Course Booking</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $coid = $_GET['id']; // Get course ID from URL
            
            // Query to fetch course details
            $q = "SELECT * FROM course WHERE coid = $coid";
            $info = $dao->query($q);
            
            if (isset($info[0])) {
                $iname = $info[0]["coname"];
            } else {
                die("Error: Course not found.");
            }
            ?>

            <!-- Course booking form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="upper">
                    <h3>Course Details</h3><br>
                    <div class="content">
                        <label for="name">Course Name:</label>
                        <label for="name"><?php echo $info[0]["coname"]; ?></label><br><br>

                        <label for="price">Course Fee:</label><br>
                        <input id="price" name="cfee" type="text" value="<?php echo $info[0]["cofee"]; ?>" readonly style="margin-top: 8px;"><br>
                    </div>
                </div>

                <div class="lower">
                    <div class="btn-grp">
                        <button class="buttons" name="btn_insert" id="btn-1">Payment</button>
                        <button class="buttons" name="cancel" id="btn-2">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
