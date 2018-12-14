<?php include('db.php'); 
$category_name = mysqli_real_escape_string($db->connection, $_POST['category_name']);
$category_description		  = mysqli_real_escape_string($db->connection, $_POST['category_description']);

	if($_POST["cat_id"] != '') {
		$db->query("update category_details set category_name='$category_name', category_description='$category_description' where cat_id = '".$_POST["cat_id"]."'");
	} else {
	if ($db->query("insert into category_details(category_name,category_description) values('$category_name','$category_description')")) {
		echo "<br><font color=green size=+1 > [ $category_name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>