<?php
require_once("db_connect.php");
if(isset($_POST["submitImage"])){
	$food_name=$_POST["food_item"];
	$file=addslashes(file_get_contents($_FILES["food_image"]["tmp_name"]));
	$food_price=$_POST["food_price"];

	
	$query="INSERT INTO fooditems(food,imagename,foodprice) VALUES ('$food_name','$file','$food_price')";
	if(mysqli_query($conn,$query))
	{
		echo'<script>alert("images inserted to database")</script>'
		;}
	}
	?>