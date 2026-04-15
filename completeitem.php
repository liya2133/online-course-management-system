<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update joining set status=4 issuedate='$doc' where bid=".$bid;
$doc=date('Y-m-d',time());

$conn->query($sql);

 header('location:viewjoining.php');



?>