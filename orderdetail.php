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
		.ttl-amts
		{
			text-align:right;
		}
	 </style>
	 <script type="text/javascript">
var okToPrint=false;
function isIE()
{
return (navigator.appName.toUpperCase() == 'MICROSOFT INTERNET EXPLORER');
}
function doPrint()
{ window.printFrame.location.href="order_print.php?order_id=<?=$_GET['order_id'];?>";
okToPrint=true;
}
function printIt()
{if (okToPrint)
{ if ( isIE() )
{ document.printFrame.focus();
document.printFrame.print();
}
else
{ window.frames['printFrame'].focus();
window.frames['printFrame'].print();
}
}
}
</script>
</head>
<body>
    <div id="wrapper">
      
		<?php include('sidebar.php'); ?>
		
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Order Detail</h1>
                    </div>
                </div>
               
			 <div class="content">
        <div class="container">
               <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
		 <button class="pull-right" onclick="doPrint(); blur(this);"><img src="assets/img/print.png" title="Print" width='25'></button>
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                     <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$i = $grand_total=0;
								$s = mysqli_query($db->connection, "select * from order_details where isactive = 1 and order_id = '".$_GET['order_id']."' order by od_id");
								while ($row = mysqli_fetch_array($s)) {
										$i++; 
									$price = $db->get_title('products','price','product_id',$row['product_id']);
									$sub_total = $price * $row['qty'];
									$grand_total += $sub_total;
								?>
                                <tr>
                                    <td><?=$row['product_id'];?></td>
                                    <td><?=$db->get_title('products','product_name','product_id',$row['product_id']);?></td>
                                    <td><?=$row['qty'];?></td>
                                    <td><?=number_format($price,2);?> USD</td>
                                    <td><?=number_format($sub_total,2);?> USD</td>
                                </tr>
								<?php } ?>                                 
                            </tbody>
                        </table>
               </div>
             <hr />
			 <div class="list-group" id="cust_info">
				<a href="javascript:void" class="list-group-item">
					<i class="fa fa-user fa-fw"></i><?php if($db->get_title('orders','cust_name','order_id',$_GET['order_id']) <> '' ){ 
					echo $db->get_title('orders','cust_name','order_id',$_GET['order_id']);
					} else { 
						echo 'Generic Customer'; 
					} ?>
				<span class="pull-right text-muted small"><em><?=$db->get_title('orders','cust_contact','order_id',$_GET['order_id']);?></em>
				</span>
				</a>
			 </div>	
			<?php if($db->get_title('orders','isactive','order_id',$_GET['order_id']) == 1){ ?>			 
			 <form class="form-inline" id="userForm">
				<input type="hidden" name="order_id" value="<?=$_GET['order_id'];?>" />
				<input type="hidden" name="subtotal" value="<?=$grand_total;?>" />
				<input type="hidden" name="total" value="<?=$grand_total;?>" />
				<div class="form-group">
				  <label for="cust_name">Customer Name:</label>
				  <input type="text" class="form-control" id="cust_name" placeholder="Enter Customer Name" name="cust_name" maxlength="100">
				</div>
				<div class="form-group">
				  <label for="pwd">Customer Contact:</label>
				  <input type="text" class="form-control" id="cust_contact" placeholder="Enter Customer Contact" name="cust_contact" maxlength="50">
				</div>
			    <button type="submit" onclick="return confirm('Are you sure to want to conform order?');" class="btn btn-success btn-lg pull-right">Confirm</button>
             <hr /> 
			 </form> 
			<?php } ?>
			 <span id="response"></span>
			 <div class="ttl-amts">
               <h5>  Total Amount : <?=number_format($grand_total,2);?> USD </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : <?=number_format($grand_total,2);?> USD</strong> </h4>
             </div>
			 <hr />
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
 
<iframe width="0" height="0" name ="printFrame" id="printFrame" onload="printIt()"></iframe>

<script>
$(document).ready(function (e) {
<?php if($db->get_title('orders','isactive','order_id',$_GET['order_id']) == 1){ ?>			 	
$("#cust_info").hide();
<?php } else { ?>
$("#cust_info").show();
<?php } ?>
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "insert_order.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#response").html(data);
	
	if(data==1){
         var url = 'orderdetail.php?order_id=<?=$_GET['order_id'];?>'; 
		 $("#response").html('<div class="alert alert-success">Order has been completed successfully</div>');
		 $("#userForm").hide();
		 $('#cust_info').show(); 
		 $('#cust_info').load(url + ' #cust_info'); 
		 doPrint(); blur(this);
	}
	setTimeout(function(){	
		$("#response").hide();	
	}, 3000);
},
error: function (jqXHR, status, err) {
    alert("Error : Connection to server failed");
}
});
}));
});
</script> 




</body>
</html>
