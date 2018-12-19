<?php
include('db.php');  
session_start(); 
$password		= $_REQUEST["password"];

		$qry = mysqli_query($db->connection, "SELECT * FROM user WHERE password='$password' and isactive = 1");
	    if(mysqli_num_rows($qry)>0){ 
			$rows = mysqli_fetch_assoc($qry);
			$_SESSION['name'] = $rows['name'];
			$_SESSION['role_id'] = $rows['role_id'];
			session_write_close();
			echo "<script type='text/javascript'>window.location='index.php';</script>";
		}
		else{
			echo "0";
		}
		 
?>