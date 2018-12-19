<?php include('db.php'); 

if(isset($_POST["product_id"])) {
	 $s = mysqli_query($db->connection, "select * from products where product_id = '".$_POST["product_id"]."' and isactive = 1");
	 $rows = array();
	 $row = mysqli_fetch_array($s);
	 echo json_encode($row, JSON_PRETTY_PRINT);  
}
else
{
	$i=0;
	$s = mysqli_query($db->connection, "select * from products where isactive = 1");
	 while($row = mysqli_fetch_array($s)){
		 $i++; 
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['product_name']."</td>";
	echo "<td>".$db->get_title('category_details','category_name','cat_id',$row['cat_id'])."</td>";
	echo "<td>".$row['o_price']."</td>";
	echo "<td>".$row['price']."</td>";
	?>
	<td> <a href="javascript:void(0)" data-toggle="modal" class="edit_data" data-target="#addModal" id="<?=$row['product_id'];?>"><i class="fa fa-pencil-square-o"></i></a> &nbsp; 
	<a href="javascript:void(0)" class="del_data" onclick="return confirm('Are you sure you want to delete?')" id="<?=$row['product_id'];?>"><i class="fa fa-trash"></i></a></td>
	<?php echo "</tr>"; 
	 }
}
?>