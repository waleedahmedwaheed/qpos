<?php include('db.php'); 
$perm_name = mysqli_real_escape_string($db->connection, $_POST['perm_name']);
$perm_url = mysqli_real_escape_string($db->connection, $_POST['perm_url']);

	if($_POST["perm_id"] != '') {
		$db->query("update permission set perm_name='$perm_name', perm_url = '$perm_url' where perm_id = '".$_POST["perm_id"]."'");
	} else {
	if ($db->query("insert into permission(perm_name,perm_url) values('$perm_name','$perm_url')")) {
		echo "<br><font color=green size=+1 > [ $perm_name ] Details Added !</font>";
	} else {
		echo "<br><font color=red size=+1 >Problem in Adding !</font>";
		}
	}
?>