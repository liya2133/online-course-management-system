<!DOCTYPE html>
<html lang="en">

<?php require('../config/autoload.php'); ?>

<?php
$dao = new DataAccess();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eduworld</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Inline CSS for Course Display -->
    <style>
        /* Course Grid Layout */
        .priceing-table-main {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* Space between course cards */
            justify-content: center;
            margin-bottom: 50px; /* Ensure space below the grid */
        }

        /* Individual Course Card */
        .price-grid {
            flex: 1 1 300px;
            max-width: 300px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        /* On hover, change background and apply zoom effect */
        .price-grid:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        /* Image Styling */
        .price-gd-top img {
            width: 100%;
            height: auto;
            max-width: 300px;
            max-height: 200px;
            border-radius: 8px;
        }

        /* Course Title Styling */
        .course-title h4 {
            color: #333;
            background-color: #ffc107; /* Yellow background for the course title */
            padding: 10px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        /* Course Details */
        .price-gd-bottom {
            padding: 15px;
        }

        /* Course Fee and Duration Styling */
        .price-gd-bottom h5 {
            margin: 10px 0;
        }

        /* Star Rating */
        .star-rating {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .star-rating .star {
            font-size: 20px;
            color: #ffc107; /* Yellow stars */
        }

        /* Button Styling */
        .price-gd-bottom a {
            background-color: #ffc107;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px; /* Space above the button */
        }

        .price-gd-bottom a:hover {
            background-color: #ff9800;
            color: #fff;
        }

        /* Media Query for Mobile */
        @media (max-width: 768px) {
            .priceing-table-main {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Footer Styling */
        .footer {
            background: #343a40;
            color: #ccc;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #ccc;
            text-decoration: none;
            padding: 0 10px;
        }

        .footer a:hover {
            color: #fff;
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
    <!-- Topbar End --><div class="plans-section" id="rooms">
				 <div class="container">

<div class="container-fluid page-header" style="margin-bottom: 90px;">
<div class="container">
    <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
        <h3 class="display-4 text-white text-uppercase">Courses</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Courses</p>
        </div>
    </div>
</div>
</div>
  <!-- Courses Section -->
   
  <div class="container">
        <div class="text-center mt-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
            <h1>Choose Your Desired Course</h1><br><br>
        </div>

    <div class="plans-section" id="rooms">
        <div class="container">
            <?php
            if (isset($_SESSION['semail'])) {
                $sname = $_SESSION['semail'];
            ?>
                <h7 class="title-w3-agileits title-black-wthree"><?php echo $sname ?></h7>
            <?php } ?>

           

            <div class="priceing-table-main">
                <?php
                $cid = $_GET['id'];
                $q = "SELECT course.*, faculty.fimage, faculty.fname 
                      FROM course 
                      JOIN faculty ON course.fid = faculty.fid 
                      WHERE course.cid = " . $cid;

                $info = $dao->query($q);

                $i = 0;
                while ($i < count($info)) {
                    $s = $info[$i]; // Using $s as in your original code
                ?>
                    <div class="price-grid">
                        <div class="price-block agile">
                            <div class="price-gd-top">
                                <!-- Course Title with Highlight -->
                                <div class="course-title">
                                    <h4><?php echo $s["coname"]; ?></h4>
                                </div>
                                <img src="<?php echo BASE_URL . "uploads/" . $s["fimage"]; ?>" alt="Faculty Image" class="img-responsive" />
                            </div>
                            
                            <!-- Book Now Button Below Title -->
                            <div class="price-gd-bottom">
                                <a href="singleitem.php?id=<?= $s["coid"]; ?>" class="btn btn-warning">BOOK NOW</a>
                            </div>

                            <!-- Course Details Below the Button -->
                            <h5>Course Fee</h5>
                            Rs.<?php echo $s["cofee"]; ?>
                            <h5>Course Duration</h5>
                            <?php echo $s["cdue"]; ?> days

                            <div class="star-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                            </div>
                            <h5>Faculty Name:</h5> <?php echo $s["fname"]; ?>
                            <br><br><br>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Eduworld. All Rights Reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></p>
    </div>
</body>

</html>
