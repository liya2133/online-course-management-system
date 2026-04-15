<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-20">
            <div class="row-md-20">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Course id</th>
                        <th>Course Name</th>
                        <th>Category id</th>
                        <th>Faculty id </th>
                        <th>course Fee</th>
                        <th>course duration</th>
                        <th>EDIT/DELETE</th>
			<th></th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editcourse.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletecourse.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('coid'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'simg',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
    );

   
   $join=array();

   $fields=array('coid','coname','cid','fid','cofee','cdue');

    $users=$dao->selectAsTable($fields,'course as s','status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
