<?php	
include("dbcon.php");
$item_id = $_GET['id'];
$sql = "update faculty set status=2 where fid=".$item_id;

$conn->query($sql);

 header('location:viewfaculty.php');



?>