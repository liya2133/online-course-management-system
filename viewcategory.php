

<!DOCTYPE html>
<html lang="en">
   


<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php /*?><?php


    $q="select * from category";

$info=$dao->query($q);

print_r($info);

 echo "<br/>";

$arrlength = count($info);
echo $arrlength;
 echo "<br/>";


$i=0;

while($i<count($info))
{
echo $info[$i]["sid"];
echo"   ";
echo $info[$i]["sname"];

echo "<br/>";
$i++;
}

foreach($info as $key=>$value)
{
    foreach($value as $key1=>$in)
    {
        echo $key1." --> ".$in;
    }
    echo "<br/>";
}

<a href="<?= BASE_URL ?>student/course.php?id=<?= $val['c_id'] ?>" class="button_outline">Details</a>

?>

<?php */?>
<head>
    <meta charset="utf-8">
    <title>Eduworld</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
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
       
<style>
.priceing-table-main {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap on smaller screens */
    gap: 20px; /* Space between category cards */
}

.price-grid {
    flex: 1 1 300px; /* Adjust width for responsive layout */
    max-width: 300px; /* Optional: Limit maximum width of each card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for better visuals */
    text-align: center;
}

.price-gd-top img {
    width: 100%;
    height: auto;
    border-radius: 8px; /* Optional: Add rounded corners */
}

.price-gd-bottom {
    padding: 15px;
}

.price-selet a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

.priceing-table-main {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap on smaller screens */
    gap: 20px; /* Space between category cards */
}

.price-grid {
    flex: 1 1 300px; /* Adjust width for responsive layout */
    max-width: 300px; /* Optional: Limit maximum width of each card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for better visuals */
    text-align: center;
}

.price-gd-top img {
    width: 100%;
    height: auto;
    border-radius: 8px; /* Optional: Add rounded corners */
}

.price-gd-bottom {
    padding: 15px;
}

.price-selet a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

    .priceing-table-main {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap on smaller screens */
    gap: 20px; /* Space between category cards */
}

.price-grid {
    flex: 1 1 300px; /* Adjust width for responsive layout */
    max-width: 300px; /* Optional: Limit maximum width of each card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for better visuals */
    text-align: center;
}

.price-gd-top img {
    width: 100%;
    height: auto;
    border-radius: 8px; /* Optional: Add rounded corners */
}

.price-gd-bottom {
    padding: 15px;
}

.price-selet a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}
    /* Star rating */
    .star-rating {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .star-rating .star {
            font-size: 18px;
            color: #ffc107;
        }
        .price-selet a {
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
            padding: 8px 20px;
            border: 1px solid #007bff;
            border-radius: 25px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .price-selet a:hover {
            background: #007bff;
            color: #fff;
        }

        /* Footer styles */
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
        /* Hover Effect for Category Cards */
.price-grid {
    flex: 1 1 300px;
    max-width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* On Hover, Change Background Color and Add Shadow */
.price-grid:hover {
    background-color: #f7f7f7;  /* Light grey background on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);  /* Increased shadow effect */
    transform: scale(1.05); /* Slight zoom effect */
}

/* Optional: Hover effect for the text and button */
.price-grid:hover .price-selet a {
    background-color:blue;  /* Change background color of the button */
    color: #fff;  /* Change text color to white */
}

.price-grid .price-gd-bottom h4 {
    color: #333;  /* Default text color */
    transition: color 0.3s ease;
}

/* Change text color when hovering over the category */
.price-grid:hover .price-gd-bottom h4 {
    color: blue;  /* Change text color to blue */
}

/* Global page margin */
body {
    padding-bottom: 50px; /* Adds space at the bottom of the page */
}

/* Add space below the container */
.container {
    margin-bottom: 50px;
}

/* Add space above the footer */
.footer {
    margin-top: 50px;
}
/* Add gap between categories */
.priceing-table-main {
    display: flex;
    flex-wrap: wrap;
    gap: 50px; /* Add space between the category cards (adjust as needed) */
}

/* Price grid (individual category) styling */
.price-grid {
    flex: 1 1 300px; /* Adjust width for responsive layout */
    max-width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover effect for categories */
.price-grid:hover {
    background-color: #f7f7f7;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    transform: scale(1.05);
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
                        <small>L street,Angamaly</small>
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
        <h3 class="display-4 text-white text-uppercase">Course category</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">course category</p>
        </div>
    </div>
</div>
</div>
  <!-- Courses Section -->
   
  <div class="container">
        <div class="text-center mt-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Category</h5>
            <h1>Our Popular Course Categories</h1>
        </div>
<br>
<br>
        <div class="priceing-table-main">
            <?php
            $query = "SELECT * FROM category";
            $categories = $dao->query($query);

            foreach ($categories as $category) {
                $imageSrc = BASE_URL . "uploads/" . $category["cimage"];
                $categoryName = $category["cname"];
                $categoryId = $category["cid"];
                ?>
                <div class="price-grid">
                    <div class="price-gd-top">
                        <img src="<?= $imageSrc ?>" alt="<?= $categoryName ?>" class="img-responsive" />
                    </div>
                    <div class="price-gd-bottom">
                        <h4><?= $categoryName ?></h4>
                        <div class="star-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <div class="price-selet">
                            <a href="viewcourse.php?id=<?= $categoryId ?>">VIEW</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    