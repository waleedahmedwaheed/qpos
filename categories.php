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
                        <h1 class="page-head-line">Categories </h1>
						 <div class="panel-body">
							<span id="response">
                                 
                            </span>
                            <button class="btn btn-primary btn-lg pull-right" id="addbutton" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus"></i> Add Category
                            </button>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="post" id="insert_form">
										<input type="hidden" name="cat_id" id="cat_id" />
										<div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add Category</h4>
                                        </div>
                                        <div class="modal-body">
												<div class="form-group required">
													<label class="control-label">Category Name</label>
													<input class="form-control" type="text" name="category_name" id="category_name" maxlength="150" placeholder="Enter Category Name" required>
												</div>
												<div class="form-group required">
													<label class="control-label">Category Description</label>
													<input class="form-control" type="text" name="category_description" maxlength="250" id="category_description" placeholder="Enter Category Description" required>
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
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                     <th>Action(s)</th>
                                </tr>
                            </thead>
                            <tbody id="products_data">
								<?php
								$i=0;
								$s = mysqli_query($db->connection, "select * from category_details where isactive = 1");
								while ($row = mysqli_fetch_array($s)) {
										$i++; 
								?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row['category_name'];?></td>
                                    <td><?=$row['category_description'];?></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['cat_id'];?>"><i class="fa fa-pencil-square-o"></i></a> 
									&nbsp; <a href="javascript:void(0);" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['cat_id'];?>"><i class="fa fa-trash"></i></a></td>
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
		   $('#myModalLabel').html("<i class='fa fa-save'></i> Add Category");  
           $('#insert_form')[0].reset();  
    });
	$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            $.ajax({  
                     url:"insert_category.php",  
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
						  $("#products_data").load('fetch_categories.php');
						  
						  setTimeout(function() 
							{	
								$("#response").hide();
							}, 3000);
                     }  
                });  
    });   
	$(document).on('click', '.edit_data', function(){ 
           var cat_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch_categories.php",  
                method:"POST",  
                data:{cat_id:cat_id},  
                dataType:"json",  
                success:function(data){  
                     $('#cat_id').val(data.cat_id);  
                     $('#category_name').val(data.category_name);  
                     $('#category_description').val(data.category_description); 
                     $('#insert').html("<i class='fa fa-pencil-square-o'></i> Update");  
                     $('#myModalLabel').html("<i class='fa fa-pencil-square-o'></i> Edit Category");  
                     $('#addModal').modal('show');  
                }  
            });  
    });
	$(document).on('click', '.del_data', function(){ 
		   var cat_id = $(this).attr("id");  
		   $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:cat_id,cond:2},  
                dataType:"text",  
                success:function(data){  
                     $("#response").show();
						  $('html, body').animate({
							scrollTop: $("#response").offset().top
							}, 1000);
						  $("#response").html('<div class="alert alert-danger">Data has been deleted successfully.</div>');
						  $("#products_data").load('fetch_categories.php');
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
