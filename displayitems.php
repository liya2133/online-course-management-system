

<?php include("userheader2.php");	?>



<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php				 

if(isset($_SESSION['semail']))
{ 

	$name=$_SESSION['semail'];
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php } ?>
<h3 class="title-w3-agileits title-black-wthree">COURSES</h3>
						<div class="priceing-table-main">
            <?php
			$catid=$_GET['id']; 
			 $q="select * from course where catid=".$catid ;

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["cname"]?></h4> 
                              
                             
						</div>
                        <h4>Course Fee</h4>
                              <h4> <?php echo $info[$i]["cfee"]?></h4>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul>
							</div>
							<div class="price-selet">
                            
			<a href="singleitem.php?id=<?= $info[$i]["cid"]?>" >BOOK NOW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


	
	<?php include("userfooter.php");	?>
	