<?php include('db.php'); 
$db->getSessionStatus(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('styles.php'); ?>
	<style>
		.row
		{
			margin-right:0 !important;
		}
		/*.panel-primary
		{
			background: #37474f !important;
		}
		.panel-primary a,span
		{
			color: white !important;
		}*/
		.img-circle{
			    height: 70px !important;
				width: 100% !important;
		}
	</style>
	<script src="assets/js/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="wrapper">
         
        
		<?php include('sidebar.php'); ?>
		
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row" style="display:none;">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Create Order</h1>
                    </div>
                </div>
               
			<div class="row text-center pad-row" style="display:none;">
                <div class="col-md-3">
                    <div class="panel panel-success">
                        
                        <div class="panel-body">
                           <a href="#" class="btn btn-success btn-lg btn-block">Chicken</a>
                           <a href="#" class="btn btn-success btn-lg btn-block">Chicken</a>
                           <a href="#" class="btn btn-success btn-lg btn-block">Chicken</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel  panel-info active-plan-price">
                       
                        <div class="panel-body">
                            <a href="#" class="btn btn-info btn-lg btn-block">Salad</a>
                            <a href="#" class="btn btn-info btn-lg btn-block">Salad</a>
                            <a href="#" class="btn btn-info btn-lg btn-block">Salad</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel  panel-danger">
                         
                        <div class="panel-body">
                            <a href="#" class="btn btn-danger btn-lg btn-block">Onion</a>
                            <a href="#" class="btn btn-danger btn-lg btn-block">Garlic</a>
                            <a href="#" class="btn btn-danger btn-lg btn-block">Onion</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel  panel-primary">
                         
                        <div class="panel-body">
                           <a href="#" class="btn btn-primary btn-lg btn-block">Naan</a>
                           <a href="#" class="btn btn-primary btn-lg btn-block">Naan</a>
                           <a href="#" class="btn btn-primary btn-lg btn-block">Naan</a>
                        </div>

                    </div>
                </div>
				
			
			</div>
			
			 <div class="content">
        <div class="container">
             <div class="row">
                <!-- starter -->
				<?php
					if(!isset($_GET['cat_order'])){
						$cat_order = 1;
					} else {
						$cat_order = $_GET['cat_order'];	
					}
					$i=0;
					$next_cat = $cat_order+1;
					
					if(isset($_GET['pid'])){
						if(isset($_GET['products'])){
							$arr_values = explode("&", http_build_query(array('products' => $_GET['products'])));
							foreach($arr_values as $key=>$value){
								  $new_val = explode('=', $value);
								  array_push($_SESSION['products'], $new_val[1]);
							}
						}
						array_push($_SESSION['products'], $_GET['pid']);
					}
					$query = urldecode(http_build_query(array('products' => $_SESSION['products'])));

					$s = mysqli_query($db->connection, "select * from products where isactive = 1 AND cat_id IN (select cat_id from category_details where cat_order = $cat_order and isactive = 1)");
					if(mysqli_num_rows($s)==0){ ?>
						<script>
						$(document).ready(function (e) {
						var query = '<?=$query;?>';
						$.ajax({
						url: "insert_order.php?query=&"+query, // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$("#response").html(data);
						},
						error: function (jqXHR, status, err) {
							alert("Error : Connection to server failed");
						}
						});
						});
						</script>						
					<?php }
					while ($row = mysqli_fetch_array($s)) {
							$i++; 
				?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
					     <div class="menu-content">
					        <div class="row panel panel-primary">
								<a href="order.php?pid=<?=$row['product_id'];?>&cat_order=<?=$next_cat;?>&<?=$query;?>">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="dish-img"> <?php if($row['image']<>''){ ?> <img src="uploads/<?=$row['image'];?>" alt="POS" class="img-circle" /> <?php } else { ?> <img src="http://via.placeholder.com/70x70" alt="POS" class="img-circle"> <?php } ?> </div>
                                </div>
								</a>
								<a href="order.php?pid=<?=$row['product_id'];?>&cat_order=<?=$next_cat;?>&<?=$query;?>">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"> <?=$row['product_name'];?> </h5>
                                        <span class="dish-meta"><?=$db->get_title('category_details','category_description','cat_id',$row['cat_id']);?></span>
                                        <div class="dish-price">
                                    </div>
                                    </div>
                                 </div>
								 </a>
                            </div>
					    </div>
					</div>
				</div>
				<?php } ?>
                <!-- /.starter -->
                
            </div>  
			<span id="response"></span>
           </div>
    </div>
			
			   
			
			 
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

	<?php include('footer.php'); ?>
    


</body>
</html>
