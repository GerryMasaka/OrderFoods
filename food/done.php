<?php

require_once("db_connect.php");

if(isset($_POST["Done"])){
	$ID=$_GET["ID"];

$sql="DELETE FROM cart WHERE ID=$ID";

if(mysqli_query($conn,$sql)){
	echo "registered successfully";
	header('foodsLogin.php');
}
else{
	echo "error!!!!!!!!".mysqli_error($conn);
}

}

?>

