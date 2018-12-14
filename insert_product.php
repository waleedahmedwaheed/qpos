<?php include('db.php'); 
$product_name = mysqli_real_escape_string($db->connection, $_POST['product_name']);
$cat_id		  = mysqli_real_escape_string($db->connection, $_POST['cat_id']);
$o_price	  = mysqli_real_escape_string($db->connection, $_POST['o_price']);
$price		  = mysqli_real_escape_string($db->connection, $_POST['price']);
	if($_POST["product_id"] != '') {
		$db->query("update products set product_name='$product_name', cat_id='$cat_id', o_price='$o_price',price= '$price' where product_id = '".$_POST["product_id"]."'");
	} else {
	if ($db->query("insert into products(product_name,cat_id,o_price,price) values('$product_name','$cat_id','$o_price','$price')")) {
		echo "<br><font color=green size=+1 > [ $product_name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>