<?php include('db.php'); 
$product_name = mysqli_real_escape_string($db->connection, $_POST['product_name']);
$cat_id		  = mysqli_real_escape_string($db->connection, $_POST['cat_id']);
$o_price	  = mysqli_real_escape_string($db->connection, $_POST['o_price']);
$price		  = mysqli_real_escape_string($db->connection, $_POST['price']);
	if($_POST["product_id"] != '') {
		$name = $_FILES['file']['name'];
		 $target_dir = "uploads/";
		 $target_file = $target_dir . basename($_FILES["file"]["name"]);

		 // Select file type
		 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		 // Valid file extensions
		 $extensions_arr = array("jpg","jpeg","png","gif");

		 // Check extension
		 if( in_array($imageFileType,$extensions_arr) ){		  
		  // Upload file
		  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

		 }
		$db->query("update products set product_name='$product_name', cat_id='$cat_id', o_price='$o_price',price= '$price',image = '$name' where product_id = '".$_POST["product_id"]."'");
	} else {
		 $name = $_FILES['file']['name'];
		 $target_dir = "uploads/";
		 $target_file = $target_dir . basename($_FILES["file"]["name"]);

		 // Select file type
		 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		 // Valid file extensions
		 $extensions_arr = array("jpg","jpeg","png","gif");

		 // Check extension
		 if( in_array($imageFileType,$extensions_arr) ){		  
		  // Upload file
		  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

		 }
		 
	if ($db->query("insert into products(product_name,cat_id,o_price,price,image) values('$product_name','$cat_id','$o_price','$price','$name')")) {
		echo "<br><font color=green size=+1 > [ $product_name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>