<?php include('db.php');  ?>
<style>
@media print{    
  font-size:xx-small
}
</style>
<?php 

 $order_id = $_GET["order_id"]; 
				
				
				$selectSQL = "SELECT * FROM `orders` where `order_id` = '$order_id'";
				$s = mysqli_query($db->connection, $selectSQL); 
				$rowo = mysqli_fetch_array($s);
				
				$date		 = $rowo["order_date"];
				$subtotal	 = $rowo["subtotal"];
				$total		 = $rowo["total"];
				$cust_name	 = $rowo["cust_name"];
				$cust_contact = $rowo["cust_contact"];
						
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <?php include('styles.php'); ?>
<style>
table {
    font-family: arial, sans-serif;
	font-size: 10px;
    border-collapse: collapse;
    width: 45%;
	margin-left:auto; 
    margin-right:auto;
}
td {
    text-align: left;
    padding: 4px;
}
th {
    text-align: center;
    padding: 0px;
}
tr:nth-child(even) {
    background-color: #dddddd;
	line-height: 14px;
}
h3{
	font-size: 14px;
}
h4{
	font-size: 11px;
}
</style>
	
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	 <script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
</head>
<body>
<table width="45%" style="margin-left:auto;margin-right:auto;">
<tr><td>
<button style="float:right;"  onclick="printDiv('printableArea')"><img src="assets/img/print.png" title="Print" width='25'></button>	
</td></tr>
</table>
<div id="printableArea">
<table width="45%" style="margin-left:auto;margin-right:auto;">
<thead>
	<tr>
	<th align="center"> <h3> Restaurant POS </h3> </th>
	</tr>
	<tr>
	<th align="center"> <h4> Telephone #: 1234567   </h4>
	<span style="float:right;padding-bottom:2px;padding-right: 2px;"> <b> Date : </b> <?php echo date("Y-m-d"); ?>  <?php echo date("h:i:sa"); ?></span>
											</th>
	</tr>
	</thead>
</table>
<table cellpadding="3" id="printTable">
	
	<tbody>
	<tr style="border: 2px solid black;">
		<td nowrap><b>S. No.</b></td>
		<td nowrap><b>Product</b></td>
		<td style="text-align:center;"><b>Quantity</b></td>		
		<td style="text-align:center;" nowrap><b>Unit Price</b></td>
		<td style="text-align:right;" nowrap><b>Sub Total</b></td>
	</tr>
	  
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
                                    <td><?=$i;?></td>
                                    <td><?=$db->get_title('products','product_name','product_id',$row['product_id']);?></td>
                                    <td style="text-align:center;"><?=$row['qty'];?></td>
                                    <td style="text-align:center;" nowrap><?=number_format($price,2);?> USD</td>
                                    <td style="text-align:right;" nowrap><?=number_format($sub_total,2);?> USD</td>
                                </tr>
								<?php } ?>
	<tr>
		<td><b>Total</b></td>		
		<td style="text-align:center;border-top: 2px solid black;"><b><?php //echo $qty; ?></b></td>		
		<td> &nbsp; </td>		
		<td> &nbsp; </td>		
		<td nowrap style="text-align:right;border-top: 2px solid black;"><b><?php echo number_format($grand_total,2); ?> USD</b></td>		
	</tr>
	
	
	
	<tr>
		<td colspan="4"><b>Tax:</b></td>		
		<td style="text-align:right;"><b>0.00 USD</b></td>		
	</tr>
	  
	<tr>
		<td colspan="4"><b>Discount:</b></td>		
		<td style="text-align:right;"><b>0.00 USD</b></td>		
	</tr> 
	
	<tr>
		<td colspan="4" style="border-top: 2px solid black;"><b>Net Total Rs:</b></td>		
		<td style="text-align:right;border-top: 2px solid black;"><b><?php echo number_format($grand_total,2); ?></b></td>		
	</tr>
	
	
	
	<tr>
		<td colspan="5" style="text-align:center;"><p>Hope to see you Soon <br> Thank You for your visit </p></td>		
	</tr>
	
	<tr>
		<td><b>Customer</b></td>		
		<td><?php if($cust_name<>""){ echo strtoupper($cust_name); } else { echo "Generic Customer"; } ?></td>		
		<td>&nbsp;</td>		
		<td><b>Contact</b></td>		
		<td><?php if($cust_contact<>""){ echo $cust_contact; } else { echo '---'; } ?></td>		
	</tr>
	
	 
	
</tbody>
</table>
</div>
</body>
</html>