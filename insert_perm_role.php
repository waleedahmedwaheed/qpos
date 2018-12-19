<?php include('db.php'); 
$perm_id = mysqli_real_escape_string($db->connection, $_POST['perm_id']);
$role_id = mysqli_real_escape_string($db->connection, $_POST['role_id']);

	if($_POST["pr_id"] != '') {
		$db->query("update assign_perm_to_roles set perm_id='$perm_id', role_id = '$role_id' where pr_id = '".$_POST["pr_id"]."'");
	} else {
		$s = mysqli_query($db->connection, "select * from assign_perm_to_roles where isactive = 1 and perm_id = '$perm_id' and role_id='$role_id'");
		if(mysqli_num_rows($s)>0) {
			echo "0";
		} else {
	if ($db->query("insert into assign_perm_to_roles(perm_id,role_id) values('$perm_id','$role_id')")) {
		echo "<br><font color=green size=+1 > Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
	}
?>