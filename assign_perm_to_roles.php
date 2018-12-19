<?php include('db.php'); 
$db->getSessionStatus(); ?>
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
                        <h1 class="page-head-line">Assign Permissions to Roles </h1>
						 <div class="panel-body">
							<span id="response">
                                 
                            </span>
                            <button class="btn btn-primary btn-lg pull-right" id="addbutton" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus"></i> Assign Permissions to Roles 
                            </button>
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="post" id="insert_form">
										<input type="hidden" name="pr_id" id="pr_id" />
										<div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Assign Permissions to Roles </h4>
                                        </div>
                                        <div class="modal-body">
											<div class="form-group required">
													<label class="control-label">Permissions</label>
													<select class="form-control" name="perm_id" id="perm_id" required>
														<option value="">--Select Permission--</option>
														<?php
												$s = mysqli_query($db->connection, "select * from permission where isactive = 1");
												while ($row = mysqli_fetch_array($s)) {
														
												?>
													<option value="<?php echo $row['perm_id']; ?>"><?php echo $row['perm_name']; ?></option>
												<?php } ?>	
													</select>
												</div>
									 
											<div class="form-group required">
													<label class="control-label">Roles</label>
													<select class="form-control" name="role_id" id="role_id" required>
														<option value="">--Select Role--</option>
														<?php
												$s = mysqli_query($db->connection, "select * from roles where isactive = 1");
												while ($row = mysqli_fetch_array($s)) {
														
												?>
													<option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
												<?php } ?>	
													</select>
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
                                    <th>Permission </th>
                                    <th>Role</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>
                            <tbody id="data">
								<?php
								$i=0;
								$s = mysqli_query($db->connection, "select * from assign_perm_to_roles where isactive = 1");
								while ($row = mysqli_fetch_array($s)) {
										$i++; 
								?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$db->get_title('permission','perm_name','perm_id',$row['perm_id']);?></td>
                                    <td><?=$db->get_title('roles','role_name','role_id',$row['role_id']);?></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['pr_id'];?>"><i class="fa fa-pencil-square-o"></i></a> 
									&nbsp; <a href="javascript:void(0);" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['pr_id'];?>"><i class="fa fa-trash"></i></a></td>
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
		   $('#myModalLabel').html("<i class='fa fa-save'></i> Add Permission to Role");  
           $('#insert_form')[0].reset();  
    });
	$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            $.ajax({  
                     url:"insert_perm_role.php",  
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
							if(data==0){
						  $("#response").html('<div class="alert alert-danger">Permission has already been added to Role.</div>');
							} else {
						  $("#response").html('<div class="alert alert-success">Data has been saved successfully.</div>');
							}
						  $('#insert_form')[0].reset(); 
                          $('#addModal').modal('hide');
						  $("#data").load('fetch_perm_role.php');
						  
						  setTimeout(function() 
							{	
								$("#response").hide();
							}, 3000);
                     }  
                });  
    });   
	$(document).on('click', '.edit_data', function(){ 
           var pr_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch_perm_role.php",  
                method:"POST",  
                data:{pr_id:pr_id},  
                dataType:"json",  
                success:function(data){  
                     $('#pr_id').val(data.pr_id);  
                     $('#perm_id').val(data.perm_id);  
                     $('#role_id').val(data.role_id);  
                     $('#insert').html("<i class='fa fa-pencil-square-o'></i> Update");  
                     $('#myModalLabel').html("<i class='fa fa-pencil-square-o'></i> Edit Permission to Role");  
                     $('#addModal').modal('show');  
                }  
            });  
    });
	$(document).on('click', '.del_data', function(){ 
		   var pr_id = $(this).attr("id");  
		   $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:pr_id,cond:6},  
                dataType:"text",  
                success:function(data){  
                     $("#response").show();
						  $('html, body').animate({
							scrollTop: $("#response").offset().top
							}, 1000);
						  $("#response").html('<div class="alert alert-danger">Data has been deleted successfully.</div>');
						  $("#data").load('fetch_perm_role.php');
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
