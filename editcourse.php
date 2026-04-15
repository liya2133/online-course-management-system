<?php require('../config/autoload.php'); ?>
<?php
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','course','coid='.$_GET['id']);
//$file=new FileUpload();
$elements=array(
        "coname"=>$info[0]['coname'],"cid"=>$info[0]['cid'],"cofee"=>$info[0]['cofee'],"fid"=>$info[0]['fid'],"cdue"=>$info[0]['cdue']);

	$form = new FormAssist($elements,$_POST);

  $labels=array('coname'=>"Course Name",'cid'=>"Category id",'cofee'=>"Course fees",'fid'=>"faculty  id","cdue"=>"course duration");

$rules=array(
  "coname"=>array(),
    "cid"=>array(),
    "fid"=>array(),
    "cofee"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "cdue"=>array("required"=>true,"minlength"=>1,"maxlength"=>20)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

$data=array(

  'coname'=>$_POST['coname'],
  'cid'=>$_POST['cid'],
 
  'fid'=>$_POST['fid'],
  'cofee'=>$_POST['cofee'],
  'cdue'=>$_POST['cdue']
    );
  $condition='coid='.$_GET['id'];

if($dao->update($data,'course',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" >
 
  <div class="row">
                    <div class="col-md-6">
                    Course Name:

<?= $form->textBox('coname',array('class'=>'form-control')); ?>
<?= $validator->error('coname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Category ID:

<?php
                    $options = $dao->createOptions('cname','cid',"category");
                    echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>

</div>
</div>
Faculty ID:

<?php
                    $options = $dao->createOptions('fname','fid',"faculty");
                    echo $form->dropDownList('fid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('fid'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
 Course fee:

<?= $form->textBox('cofee',array('class'=>'form-control')); ?>
<?= $validator->error('cofee'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">

Course Duration:

<?= $form->textBox('cdue',array('class'=>'form-control')); ?>
<?= $validator->error('cdue'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">





<button type="submit" name="btn_insert"  >Submit</button>
</form>

