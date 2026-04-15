<?php	
include("dbcon.php");
$item_id = $_GET['id'];
$sql = "update category set status=2 where cid=".$item_id;

$conn->query($sql);

 header('location:viewcategory.php');



?>