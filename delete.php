<?php include('db.php'); 
$id = mysqli_real_escape_string($db->connection, $_POST['id']);
$cond = mysqli_real_escape_string($db->connection, $_POST['cond']);

switch($cond)
{
	case 1:
	$db->query("update products set isactive='0' where product_id = '".$id."'");
	break;
	case 2:
	$db->query("update category_details set isactive='0' where cat_id = '".$id."'");
	break;
	case 3:
	$db->query("update user set isactive='0' where user_id = '".$id."'");
	break;
	
}
	
?>