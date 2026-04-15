<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .certificate {
            background-color: white;
            width: 800px;
            padding: 30px;
            border: 10px solid #5d8c2e;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .certificate h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #2e6c1f;
        }
        .certificate p {
            font-size: 18px;
            margin: 20px 0;
        }
        .certificate .recipient {
            font-size: 24px;
            font-weight: bold;
            color: #2e6c1f;
        }
        .certificate .details {
            font-size: 20px;
            margin-top: 40px;
        }
        .certificate .signature {
            margin-top: 60px;
            font-size: 18px;
            font-style: italic;
        }
        .certificate .date {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php

// session_start(); 
include("dbcon.php");
require('../config/autoload.php');
$dao = new DataAccess();


$id = $_GET['id'];
            $name = $_SESSION['semail'];
            $sql = "SELECT * FROM joining j,student s WHERE j.semail=s.semail and  bid=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  //  echo "<tr><td>{$row['bid']}</td><td>{$row['coid']}</td><td>{$row['cofee']}</td></tr>";
              
            ?>

<div class="certificate">
    <h1>Certificate of Completion</h1>
    <p>This is to certify that</p>
    <p class="recipient"> <?php echo $row["sname"]; ?></p>
    <p>has successfully completed the course</p>
    <p class="details"><?php echo $row["coname"]; ?></p>
    <p>on</p>
    <p class="date">[""]</p>
    <div class="signature">
        <p>_________________________</p>
        <p>Instructor Name</p>
        <p>Course Instructor</p>
    </div>
</div>
<?php

}
            }
            ?>         
</body>
</html>