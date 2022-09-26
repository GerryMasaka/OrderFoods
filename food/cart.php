<?php
session_start();
require_once("db_connect.php");
if(isset($_POST["order"])){

  $EmailAddress=$_POST["EmailAddress"];
  $food=$_POST["food"];



//save new order
$sql= "INSERT INTO cart(food,date,EmailAddress) Values ('$food',now(),'$EmailAddress')";

if(mysqli_query($conn,$sql)){
	echo '<script>alert("order completed")</script>';
	echo '<script>window.location="HomePage.php"</script>';  
}

else{
  echo "error!!!!!!!!".mysqli_error($conn);
}

}
?>
