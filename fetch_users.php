<?php include('db.php'); 
if(isset($_POST["user_id"])) {
	 $s = mysqli_query($db->connection, "select * from user where user_id = '".$_POST["user_id"]."' and isactive = 1");
	 $row = mysqli_fetch_array($s);
	 echo json_encode($row);  
}
else
{
	$i=0;
	$s = mysqli_query($db->connection, "select * from user where isactive = 1");
	 while($row = mysqli_fetch_array($s)){
		 $i++; 
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['password']."</td>";
	echo "<td>".$db->get_title('roles','role_name','role_id',$row['role_id'])."</td>";
	?>
	<td> <a href="javascript:void(0)" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['user_id'];?>"><i class="fa fa-pencil-square-o"></i></a> &nbsp;  
	<a href="javascript:void(0)" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['user_id'];?>"><i class="fa fa-trash"></i></a></td>
	<?php echo "</tr>"; 
	 }
}
?>