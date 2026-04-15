<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update joining set status=5 where bid=".$bid;

$conn->query($sql);

 header('location:completedcourses.php');



?>