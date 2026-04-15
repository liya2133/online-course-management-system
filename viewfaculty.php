<?php require('../config/autoload.php'); ?>

<?php
$dao = new DataAccess();
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
        #faculty_info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        #faculty_info h2 {
            font-weight: bold;
            color: #0056b3;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        .table {
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 15px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f9ff;
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }

        .faculty-image {
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .table-background {
            position: relative;
            padding: 30px;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
        }

       

        .section-title h5 {
            color: #0056b3;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .section-title h4 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
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

    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Our Faculties</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="newindex.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Our Faculties</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container_gray_bg" id="home_feat_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Meet Our Faculties</h5>
                        <h4>Highly Qualified and Experienced Teachers</h4>
                    </div>
                    <table class="table table-background table-hover">
                        <?php
                            $actions = array();
                            $config = array(
                                'srno' => true,
                                'hiddenfields' => array('fid'),
                                'actions_td' => false,
                                'images' => array(
                                    'field' => 'fimage',
                                    'path' => '../uploads/',
                                    'attributes' => array('class' => 'faculty-image')
                                )
                            );
                            $join = array();
                            $fields = array('fname', 'fimage', 'coname');
                            $users = $dao->selectAsTable($fields, 'faculty as s', 'status=1', $join, $actions, $config);
                            echo $users;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
