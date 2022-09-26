<?php
require_once("db_connect.php");

if(isset($_POST["register"])){
	$FirstName=$_POST["FirstName"];
	$SecondName=$_POST["SecondName"];
	$Location=$_POST["Location"];
	$PhoneNumber=$_POST["PhoneNumber"];
	$EmailAddress=$_POST["EmailAddress"];
	$Password=$_POST["Password"];


$sql="INSERT INTO register(FirstName,SecondName,Location,PhoneNumber,EmailAddress,Password)Values('$FirstName','$SecondName','$Location','$PhoneNumber','$EmailAddress','$Password')";

if(mysqli_query($conn,$sql)){
echo'<script>alert("succesfully registered")</script>'
		;}
			header('foodsLogin.php');
}
else{
	echo "error!!!!!!!!".mysqli_error($conn);
}



?>

