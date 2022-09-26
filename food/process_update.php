<?php

require_once("db_connect.php");


if(isset($_POST["update"])){
	$userID=$_POST["userID"];
	$FirstName=$_POST["FirstName"];
	$SecondName=$_POST["SecondName"];
	$Location=$_POST["Location"];
	$PhoneNumber=$_POST["PhoneNumber"];
	$EmailAddress=$_POST["EmailAddress"];
	$Password=$_POST["Password"];

	$sql="UPDATE register SET FirstName='$FirstName',SecondName='$SecondName',Location='$Location',PhoneNumber='$PhoneNumber',EmailAddress='$EmailAddress',Password='$Password' WHERE userID='$userID'";
if(mysqli_query($conn,$sql)){
		echo'<script type="text/javascript">alert("Data Updated")</script>';
		         header('Location:table.php');

	}
	else{
		echo'<script type="text/javascript">alert("Data Not Updated")</script>';
	}
}

?>