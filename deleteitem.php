<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "delete from joining where bid=".$bid;

$conn->query($sql);

 header('location:viewcart.php');



?>