<?php include('db.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('styles.php'); ?>
	 <style>
		.panel-body a{
			margin-bottom : 15px !important;
		}
		 
	 </style>
</head>
<body>
    <div id="wrapper">
      
		<?php include('sidebar.php'); ?>
		
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Products </h1>
						 <div class="panel-body">
							<span id="response">
                                 
                            </span>
                            <button class="btn btn-primary btn-lg pull-right" id="addbutton" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus"></i> Add Product
                            </button>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="post" id="insert_form">
										<input type="hidden" name="product_id" id="product_id" />
										<div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add Product</h4>
                                        </div>
                                        <div class="modal-body">
												<div class="form-group required">
													<label class="control-label">Product Name</label>
													<input class="form-control" type="text" name="product_name" id="product_name" maxlength="150" placeholder="Enter Product Name" required>
												</div>
												<div class="form-group required">
													<label class="control-label">Category</label>
													<select class="form-control" name="cat_id" id="cat_id" required>
														<option value="">--Select Category--</option>
														<?php
												$s = mysqli_query($db->connection, "select * from category_details where isactive = 1");
												while ($row = mysqli_fetch_array($s)) {
														
												?>
													<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category_name']; ?></option>
												<?php } ?>	
													</select>
												</div>
												<div class="form-group required">
													<label class="control-label">Original Price</label>
													<input class="form-control float" type="text" name="o_price" id="o_price" placeholder="Enter Original Price" required>
												</div>
												<div class="form-group required">
													<label class="control-label">Selling Price</label>
													<input class="form-control float" type="text" name="price" id="price" placeholder="Enter Selling Price" required>
												</div>
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" id="insert" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"> </i> Save  </button>
                                        </div>
										</form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
			 <div class="content">
        <div class="container">
               <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Original Price</th>
                                     <th>Selling Price</th>
                                     <th>Action(s)</th>
                                </tr>
                            </thead>
                            <tbody id="products_data">
								<?php
								$i=0;
								$s = mysqli_query($db->connection, "select * from products where isactive = 1");
								while ($row = mysqli_fetch_array($s)) {
										$i++; 
								?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row['product_name'];?></td>
                                    <td><?=$db->get_title('category_details','category_name','cat_id',$row['cat_id']);?></td>
                                    <td><?=$row['o_price'];?></td>
                                    <td><?=$row['price'];?></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['product_id'];?>"><i class="fa fa-pencil-square-o"></i></a> 
									&nbsp; <a href="javascript:void(0);" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['product_id'];?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
								<?php } ?>
                            </tbody>
                        </table>
               </div>
             
         </div>
     </div>
    
           </div>
    </div>
			
			   
			
			 
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  --> 

	<?php include('footer.php'); ?>
	
	<script>
	$(document).ready(function() {
	$('#addbutton').click(function(){  
           $('#insert').html("<i class='fa fa-save'></i> Save");
		   $('#myModalLabel').html("<i class='fa fa-save'></i> Add Product");  
           $('#insert_form')[0].reset();  
    });
	$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            $.ajax({  
                     url:"insert_product.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').html("<i class='fa fa-save'></i> Processing..");  
                     },  
                     success:function(data){  
						  $("#response").show();
						  $('html, body').animate({
							scrollTop: $("#response").offset().top
							}, 1000);
						  $("#response").html('<div class="alert alert-success">Data has been saved successfully.</div>');
                          $('#insert_form')[0].reset(); 
                          $('#addModal').modal('hide');
						  $("#products_data").load('fetch_products.php');
						  console.log($("#products_data").load('fetch_products.php'));	
						  setTimeout(function() 
							{	
								$("#response").hide();
							}, 3000);
                     }  
                });  
    });   
	$(document).on('click', '.edit_data', function(){ 
           var product_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch_products.php",  
                method:"POST",  
                data:{product_id:product_id},  
                dataType:"json",  
                success:function(data){  
                     $('#product_id').val(data.product_id);  
                     $('#product_name').val(data.product_name);  
                     $('#cat_id').val(data.cat_id);  
                     $('#o_price').val(data.o_price);  
                     $('#price').val(data.price);  
                     $('#insert').html("<i class='fa fa-pencil-square-o'></i> Update");  
                     $('#myModalLabel').html("<i class='fa fa-pencil-square-o'></i> Edit Product");  
                     $('#addModal').modal('show'); 
										 
                }  
            });  
    });
	$(document).on('click', '.del_data', function(){ 
		   var product_id = $(this).attr("id");  
		   $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:product_id,cond:1},  
                dataType:"text",  
                success:function(data){  
                     $("#response").show();
						  $('html, body').animate({
							scrollTop: $("#response").offset().top
							}, 1000);
						  $("#response").html('<div class="alert alert-danger">Data has been deleted successfully.</div>');
						  $("#products_data").load('fetch_products.php');
						  setTimeout(function() 
							{	
								$("#response").hide();
							}, 3000);
                },
				error: function(jq,status,message) {
					alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
				}
            });  
    });  
    });  
	</script>
 

</body>
</html>
