<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','faculty','fid='.$_GET['id']);
//$file=new FileUpload();
$elements=array(
        "fname"=>$info[0]['fname'],"fimage"=>"","femail"=>$info[0]['femail'],"fphone"=>$info[0]['fphone'],"coname"=>$info[0]['coname']);

	$form = new FormAssist($elements,$_POST);

    $labels=array('fname'=>"Faculty Name",'fimage'=>"faculty image",'femail'=>"Email",'fphone'=>"Phone no",'coname'=>"course iname");

$rules=array(
    "fname"=>array("required"=>true,"minlength"=>3,"maxlength"=>10,"alphaonly"=>true),
    "fimage"=> array(),
         "femail"=>array("required"=>true,"minlength"=>1,"maxlength"=>20),
        "fphone"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),
    "coname"=>array("required"=>true,"minlength"=>1,"maxlength"=>100),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
//if($validator->validate($_POST))
{

if(isset($_FILES['fimage']['fname'])){
			if($fileName=$file->doUploadRandom($_FILES['fimage'],array('.jpg','.png','.jpeg'),100000,5,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

    'fname'=>$_POST['fname'],
        'fimage'=>$fileName,
        'femail'=>$_POST['femail'],
        'fphone'=>$_POST['fphone'],
    'coname'=>$_POST['coname']
    );
  $condition='fid='.$_GET['fid'];
if(isset($flag))
			{	$data['fimage']=$fileName;
		
			}
    

if($dao->update($data,'faculty',$condition))
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
Course name:
<?php
                    $options = $dao->createOptions('cname','coname',"course");
                    echo $form->dropDownList('coname',array('class'=>'form-control'),$options); ?>
<?= $validator->error('coname'); ?>

</div>
</div>

<button type="submit" name="btn_insert"  >Submit</button>
</form>
                     
</body>
</html>