<?php include('db.php'); 
$name 		= mysqli_real_escape_string($db->connection, $_POST['name']);
$password	= mysqli_real_escape_string($db->connection, $_POST['password']);
$role_id	= mysqli_real_escape_string($db->connection, $_POST['role_id']);

	if($_POST["user_id"] != '') {
		$s = mysqli_query($db->connection, "select * from user where isactive = 1 and user_id = '".$_POST["user_id"]."'");
		$row = mysqli_fetch_assoc($s);
		$user_password = $row['password'];
		if($user_password==$password){  		//if password not update
			$db->query("update user set name='$name', role_id = '$role_id' where user_id = '".$_POST["user_id"]."'");
			echo "<br><font color=green size=+1 > [ $name ] Details Updated !</font>";
		} else { 				//if password update
			$s = mysqli_query($db->connection, "select * from user where isactive = 1 and password = '$password'");
			if(mysqli_num_rows($s)>0) {
				echo "0";
			}else{
			$db->query("update user set name='$name', password='$password', role_id = '$role_id' where user_id = '".$_POST["user_id"]."'");
			echo "<br><font color=green size=+1 > [ $name ] Details Updated !</font>";
			}
		}
		 
	} else {
		$s = mysqli_query($db->connection, "select * from user where isactive = 1 and password = '$password'");
		if(mysqli_num_rows($s)>0) {
			echo "0";
		} else {
	if ($db->query("insert into user(name,password,role_id) values('$name','$password','$role_id')")) {
		echo "<br><font color=green size=+1 > [ $name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
	}
?>