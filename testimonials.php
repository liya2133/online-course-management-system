<?php
include("dbcon.php"); // Include your database connection

// Fetch reviews for display
$sql = "SELECT review, semail, rating FROM reviews";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
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
        /* General page styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
            width: 50%;
            background: url("") no-repeat center center;
            background-size: cover;
            height: 100vh;
            border-radius: 10px;
            
    
        }

        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        /* Testimonials container */
        .testimonial-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Testimonial card style */
        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Rating stars */
        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rating .star {
            font-size: 20px;
            color: #FFD700; /* Gold color */
        }

        /* Review text */
        .testimonial-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        /* Reviewer information */
        .reviewer-info {
            text-align: center;
            margin-top: 15px;
            font-style: italic;
            font-size: 0.9rem;
            color: #777;
        }

        /* Style for "No reviews" message */
        .no-reviews {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
            padding: 20px;
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
    <!-- Topbar End -->
	<div class="plans-section" id="rooms">
				 <div class="container">

    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Our Faculties</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Our Faculties</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="text-center mt-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Category</h5>
            <h1>Our Popular Course Categories</h1>
        </div>
<!-- Page Title -->
<h1>Customer Testimonials</h1>

<!-- Testimonials Grid Container -->
<div class="testimonial-container">

    <?php
    if ($result->num_rows > 0) {
        // Loop through all the reviews and display them in cards
        while ($row = $result->fetch_assoc()) {
            // Generate star rating
            $stars = str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']);
            ?>

            <!-- Testimonial Card -->
            <div class="testimonial-card">
                <!-- Rating Stars -->
                <div class="rating">
                    <?php echo str_repeat('<span class="star">★</span>', $row['rating']); ?>
                    <?php echo str_repeat('<span class="star">☆</span>', 5 - $row['rating']); ?>
                </div>

                <!-- Review Text -->
                <p class="testimonial-text"><?php echo htmlspecialchars($row['review']); ?></p>

                <!-- Reviewer Information (can be modified to show email or name) -->
                <div class="reviewer-info">
                    <strong>Review by:</strong> <span><?php echo htmlspecialchars($row['semail']); ?></span>
                </div>
            </div>

        <?php
        }
    } else {
        // Message when there are no reviews
        echo '<div class="no-reviews">No reviews available at the moment. Be the first to share your feedback!</div>';
    }
    ?>

</div></div>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>
