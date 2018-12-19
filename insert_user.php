<?php include('db.php'); 
$name 		= mysqli_real_escape_string($db->connection, $_POST['name']);
$password	= mysqli_real_escape_string($db->connection, $_POST['password']);
$role_id	= mysqli_real_escape_string($db->connection, $_POST['role_id']);

	if($_POST["user_id"] != '') {
		$db->query("update user set name='$name', password='$password', role_id = '$role_id' where user_id = '".$_POST["user_id"]."'");
	} else {
	if ($db->query("insert into user(name,password) values('$name','$password')")) {
		echo "<br><font color=green size=+1 > [ $name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>