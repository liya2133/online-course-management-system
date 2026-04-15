<?php 



require('../config/autoload.php'); 
include("dbcon.php");


session_start();
$elements=array(
        "joindate"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("joindate"=>"join Date");

$rules=array(
    
    "joindate"=>array('required'=>true,'date'=>array('from'=>'today','to'=>'+30 days 12 am')),
    
 

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
 $_SESSION['joindate']=$_POST['joindate'];



header('location:rptbookingdateview.php');
       
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 


<div class="row">
                    <div class="col-md-6">
From Date:
<?= $form->inputBox('fdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('fdate'); ?></span>


</div>
</div>





<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>