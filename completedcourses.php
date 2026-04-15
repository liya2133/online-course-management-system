<?php require('../config/autoload.php'); 
include("dbcon.php");
include("header.php");
?>

<?php
$dao = new DataAccess();
//$name = $_SESSION['semail'];
if (isset($_POST["payment"])) {

    header('location:payment.php');
}
if (isset($_POST["purchase"])) {
    header('location:category.php');
}
if (!isset($_SESSION['semail'])) {
    header('location:login.php');
} else {
    $sql = "select sum(total) as t from joining where status=4";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row["t"];
    $_SESSION['amount'] = $total;
?>
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
    </head>

<body>
    <!-- Topbar Start -->
    
	
	<div class="plans-section" id="rooms">
				 <div class="container">

<div class="container-fluid page-header" style="margin-bottom: 90px;">
<div class="container">
    <div class="d-flex flex-column justify-content-center" style="min-height: 300px">

        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>

        </div>
    </div>
</div>
</div>
  <!-- Courses Section -->
   
  <div class="container">
        <div class="text-center mt-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">COMPLETED COURSE</h5>
        </div>
<!-- HTML with CSS Applied -->
<div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Course Name</th>
                            <th>Certificate</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $actions = array(
                        'delete' => array('label' => 'Certificate', 'link' => 'certiitem.php', 'params' => array('id' => 'bid'), 'attributes' => array())
                    );

                    $config = array(
                        'srno' => true,
                        'hiddenfields' => array('coid', 'bid')
                    );

                    $condition = "status=4";

                    $join = array();

                    $fields = array('bid', 'coid', 'coname','noofitems','cofee', 'total');

                    $users = $dao->selectAsTable($fields, 'joining as c', $condition, $join, $actions, $config);

                    echo $users;
                    ?>
                    </tbody>
                </table>
            </div> <!-- End col-md-12 -->
        </div> <!-- End row -->

      
    </div> <!-- End container -->
</div> <!-- End container_gray_bg -->

<?php } ?>

<!-- CSS Styles -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 0;
    }

    .container_gray_bg {
        background-color: #f0f0f0;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-title {
        text-align: center;
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 30px;
        font-weight: bold;
    }

    table {
        width: 100%;
        margin-top: 30px;
        border-collapse: collapse;
    }

    th, td {
        text-align: center;
        padding: 12px 15px;
        font-size: 1rem;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    td {
        background-color: #ffffff;
        border-bottom: 1px solid #ddd;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .total-coffee {
        margin-top: 15px;
    }

    .form-group button {
        font-size: 1.1rem;
        padding: 12px 20px;
        border-radius: 5px;
        width: auto;
        cursor: pointer;
    }

    .btn-success {
       
        border-color:ORANGE;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .col-md-3, .col-md-9 {
        margin-bottom: 20px;
    }

    .form-control {
        font-size: 1rem;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }

    .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
