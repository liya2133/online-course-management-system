<?php	
include("dbcon.php");
$item_id = $_GET['id'];
$sql = "update course set status=2 where coid=".$item_id;

$conn->query($sql);

 header('location:viewcourse.php');



?>