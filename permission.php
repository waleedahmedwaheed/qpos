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
                        <h1 class="page-head-line">Permissions </h1>
						 <div class="panel-body">
							<span id="response">
                                 
                            </span>
                            <button class="btn btn-primary btn-lg pull-right" id="addbutton" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus"></i> Add Permission
                            </button>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="post" id="insert_form">
										<input type="hidden" name="perm_id" id="perm_id" />
										<div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add Permission</h4>
                                        </div>
                                        <div class="modal-body">
												<div class="form-group required">
													<label class="control-label">Permission Name</label>
													<input class="form-control" type="text" name="perm_name" id="perm_name" maxlength="50" placeholder="Enter Permission Name" required>
												</div>  
												<div class="form-group required">
													<label class="control-label">Url</label>
													<input class="form-control" type="text" name="perm_url" id="perm_url" maxlength="50" placeholder="Enter Permission Url" required>
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
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>
                            <tbody id="data">
								<?php
								$i=0;
								$s = mysqli_query($db->connection, "select * from permission where isactive = 1");
								while ($row = mysqli_fetch_array($s)) {
										$i++; 
								?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row['perm_name'];?></td>
                                    <td><?=$row['perm_url'];?></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['perm_id'];?>"><i class="fa fa-pencil-square-o"></i></a> 
									&nbsp; <a href="javascript:void(0);" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['perm_id'];?>"><i class="fa fa-trash"></i></a></td>
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
		   $('#myModalLabel').html("<i class='fa fa-save'></i> Add Permission");  
           $('#insert_form')[0].reset();  
    });
	$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            $.ajax({  
                     url:"insert_permission.php",  
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
						  $("#data").load('fetch_permissions.php');
						  
						  setTimeout(function() 
							{	
								$("#response").hide();
							}, 3000);
                     }  
                });  
    });   
	$(document).on('click', '.edit_data', function(){ 
           var perm_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch_permissions.php",  
                method:"POST",  
                data:{perm_id:perm_id},  
                dataType:"json",  
                success:function(data){  
                     $('#perm_id').val(data.perm_id);  
                     $('#perm_name').val(data.perm_name);  
                     $('#perm_url').val(data.perm_url);  
                     $('#insert').html("<i class='fa fa-pencil-square-o'></i> Update");  
                     $('#myModalLabel').html("<i class='fa fa-pencil-square-o'></i> Edit Permission");  
                     $('#addModal').modal('show');  
                }  
            });  
    });
	$(document).on('click', '.del_data', function(){ 
		   var perm_id = $(this).attr("id");  
		   $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:perm_id,cond:5},  
                dataType:"text",  
                success:function(data){  
                     $("#response").show();
						  $('html, body').animate({
							scrollTop: $("#response").offset().top
							}, 1000);
						  $("#response").html('<div class="alert alert-danger">Data has been deleted successfully.</div>');
						  $("#data").load('fetch_permissions.php');
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
