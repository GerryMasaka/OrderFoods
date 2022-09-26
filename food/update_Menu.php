<?php

require_once("db_connect.php");


if(isset($_POST["update"])){
	$food_name=$_POST["food_item"];
	$file=addslashes(file_get_contents($_FILES["food_image"]["tmp_name"]));
	$food_price=$_POST["food_price"];

	
	$query="UPDATE fooditems SET food='$food_name',imagename='$file',foodprice='$food_price' WHERE food='$food_name'";

if(mysqli_query($conn,$query)){
		echo'<script type="text/javascript">alert("food Updated")</script>';
	}
	else{
		echo'<script type="text/javascript">alert("Data Not Updated")</script>';
	}
}

?>
