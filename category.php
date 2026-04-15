<?php 
require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array("cname"=>"","cimage"=>"");
$form=new FormAssist($elements,$_POST);
$dao=new DataAccess();
$labels=array('cname'=>"Category Name","cimage"=>"Category Image");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
     "cimage"=> array()
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
    {

$data=array(

    'cname'=>$_POST['cname'],
  'cimage'=>$fileName
    
);

    
  
    if($dao->insert($data,"category"))
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
Category:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>

IMAGE:

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>
</div>
</div>

<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


