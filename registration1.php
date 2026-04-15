<?php
require('../config/autoload.php'); 

$dao = new DataAccess();
$elements = array(
    "sname" => "", "ssex" => "", "sage" => "", "sphn" => "", "semail" => "", "spassword" => "", "pincode" => ""
);

$form = new FormAssist($elements, $_POST);
$labels = array("sname" => "Student Name", "ssex" => "Gender", "sage" => "Student Age", "sphn" => "Phone Number", "semail" => "Email Id", "spassword" => "Password", "pincode" => "Pincode");

$rules = array(
    "sname" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaspaceonly" => true),
    "ssex" => array("required" => true),
    "sage" => array("required" => true, "minlength" => 1, "maxlength" => 30, "integeronly" => true),
    "sphn" => array("required" => true, "integeronly" => true, "minlength" => 10, "maxlength" => 10),
    "semail" => array("required" => true, "email" => true, "unique" => array("field" => "semail", "table" => "student")),
    "spassword" => array("required" => true),
    "pincode" => array("required" => true),
);

$validator = new FormValidator($rules, $labels);

if (isset($_POST['register'])) {
    if ($validator->validate($_POST)) {
        // Code for insertion
        $data = array(
            'sname' => $_POST['sname'],
            'ssex' => $_POST['ssex'],
            'sage' => $_POST['sage'],
            'sphn' => $_POST['sphn'],
            'semail' => $_POST['semail'],
            'spassword' => $_POST['spassword'],
            'pincode' => $_POST['pincode'],
        );
        if ($dao->insert($data, 'student')) {
            $msg = "Inserted Successfully";
        } else {
            $msg = "Insertion failed";
        }
    }
}

if (isset($_POST['home'])) {
    echo "<script> location.replace('index.php'); </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="reg/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="reg/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="reg/css/main.css" rel="stylesheet" media="all">

    <style>
        /* General body styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f7;
        }

        /* Container to hold the form and GIF side-by-side */
        

        /* Form Section */
        .form-container {
            width: 35%; /* Reduced width for a more compact form */
            padding: 20px 25px; /* Less padding for a more compact look */
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align content from the top */
            box-sizing: border-box; /* Include padding in width/height */
        }


        /* Right Section (GIF) */
        .right-container {
            width: 50%;
            background: url("https://cdn.dribbble.com/users/1517013/screenshots/7835196/media/6619eacd59d6824d1f969bb33c734f88.png?resize=1000x750&vertical=center") no-repeat center center;
            background-size: cover;
            height: 100vh;
            border-radius: 10px;
            
        }

        h2.title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafafa;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #ff7f50;
        }

        .btn {
            width: 100%;
            padding: 14px;
            font-size: 18px;
            font-weight: 600;
            background-color: #ff7f50;
            color: white;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            border: none;
        }

        .btn:hover {
            background-color: #ff5722;
        }

        .valErr {
            color: #e74c3c;
            font-size: 14px;
            font-weight: 500;
            margin-top: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .form-container,
            .right-container {
                width: 90%;
                margin-bottom: 20px;
            }

            .right-container {
                height: 250px;
                background-size: contain;
            }
        }
    </style>

</head>

<body>

  
        <!-- Form Section -->
        <div class="form-container">
            <br><br><br><br><br><h2 class="title">Register Now!</h2>
            <form method="POST">
                <p><?php if (isset($msg)) echo $msg; ?></p>

                <div class="input-group">
                    <?= $form->textBox('sname', array("placeholder" => "Student Name")); ?>
                    <span class="valErr"><?= $validator->error('sname'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->textBox('ssex', array("placeholder" => "Gender")); ?>
                    <span class="valErr"><?= $validator->error('ssex'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->textBox('sage', array("placeholder" => "Student Age")); ?>
                    <span class="valErr"><?= $validator->error('sage'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->textBox('sphn', array("placeholder" => "Phone Number")); ?>
                    <span class="valErr"><?= $validator->error('sphn'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->textbox('semail', array("placeholder" => "Email")); ?>
                    <span class="valErr"><?= $validator->error('semail'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->passwordbox('spassword', array("placeholder" => "Password")); ?>
                    <span class="valErr"><?= $validator->error('spassword'); ?></span>
                </div>
                <div class="input-group">
                    <?= $form->textbox('pincode', array("placeholder" => "Pincode")); ?>
                    <span class="valErr"><?= $validator->error('pincode'); ?></span>
                </div>
                <div class="p-t-10">
                    <button class="btn" name="register" type="submit">Register</button>
                </div>
                <div class="p-t-10">
                    <button class="btn" name="home" type="submit">Home</button>
                </div>
            </form>
        </div>

        <!-- Right Section (GIF) -->
        <div class="right-container"></div>
   

</body>

</html>
