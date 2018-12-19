<?php include('db.php'); 
$role_name = mysqli_real_escape_string($db->connection, $_POST['role_name']);

	if($_POST["role_id"] != '') {
		$db->query("update roles set role_name='$role_name' where role_id = '".$_POST["role_id"]."'");
	} else {
	if ($db->query("insert into roles(role_name) values('$role_name')")) {
		echo "<br><font color=green size=+1 > [ $role_name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>