<?php
   
    $id=$_REQUEST["a"];
	require_once('db_connect.php');
    $con = get_db_connection();
	
	$r=mysqli_query($con,"delete from products where p_id=$id");
	if($r)
	  header("location:deleteproduct.php");
?>