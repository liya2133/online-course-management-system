<?php 
require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "fname"=>"","fimage"=>"","femail"=>"","fphone"=>"","coid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('fname'=>"Faculty Name",'fimage'=>"faculty image",'femail'=>"Email",'fphone'=>"Phone no",'course name'=>"course name");
$rules=array(
    
    "fname"=>array("required"=>true,"minlength"=>3,"maxlength"=>100),
    "fimage"=> array(),
         "femail"=>array("required"=>true,"minlength"=>1,"maxlength"=>100),
        "fphone"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),
        "coname"=>array(),
);

    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
    if($fileName=$file->doUploadRandom($_FILES['fimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
    {



$data=array(
    'fname'=>$_POST['fname'],
     'fimage'=>$fileName,
     'femail'=>$_POST['femail'],
        'fphone'=>$_POST['fphone'],
        'coname'=>$_POST['coname']
    );
  
    if($dao->insert($data,"faculty"))
    {
        echo "<script> alert('New record created successfully');</script> ";
    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}
}

?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
 

<div class="row">
                    <div class="col-md-6">
Faculty Name:

<?= $form->textBox('fname',array('class'=>'form-control')); ?>
<?= $validator->error('fname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
faculty Image:

<?= $form->fileField('fimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('fimage'); ?>
</div>
</div>

<div class="row">
                    <div class="col-md-6">

Email Id:

<?= $form->textBox('femail',array('class'=>'form-control')); ?>
<?= $validator->error('femail'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Phone No.:

<?= $form->textBox('fphone',array('class'=>'form-control')); ?>
<?= $validator->error('fphone'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Course Name:

<?php
                    $options = $dao->createOptions('coname','coid',"course");
                    echo $form->dropDownList('coid',array('class'=>'form-control'),$options); ?>


</div>
</div>
<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
