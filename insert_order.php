<?php include('db.php'); 
$order_date = date("Y-m-d H:i:s"); 

	if(isset($_POST['order_id'])){
		$cust_name = mysqli_real_escape_string($db->connection, $_POST['cust_name']);
		$cust_contact = mysqli_real_escape_string($db->connection, $_POST['cust_contact']);
		$subtotal = mysqli_real_escape_string($db->connection, $_POST['subtotal']);
		$total = mysqli_real_escape_string($db->connection, $_POST['total']);
		if($db->query("update orders set cust_name='$cust_name', cust_contact = '$cust_contact', subtotal = '$subtotal',total = '$total', isactive = 2 where order_id = '".$_POST["order_id"]."' and isactive = 1")){
			echo "1";
		}
	} else {
	if (isset($_POST['query'])){ $query = mysqli_real_escape_string($db->connection, $_POST['query']); }
	$db->query("insert into orders(order_date) values('$order_date')");
	$order_id = mysqli_insert_id($db->connection);
	$arr_values = explode("&", http_build_query(array('products' => $_GET['products'])));
	foreach($arr_values as $key=>$value){
		  $product_id = explode('=', $value);
		  $db->query("insert into order_details(order_id,product_id) values($order_id,$product_id[1])");
	}
	echo "<script>window.location='orderdetail.php?order_id=$order_id'</script>"; 
	}

?>