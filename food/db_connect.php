<?php
$dbserver="localhost";
$dbuser="root";
$password="";
$dbname="foods";

$conn=mysqli_connect($dbserver,$dbuser,$password,$dbname);

if($conn){
	echo " connected succesfully ";
}
else{
	echo "Did not connect".mysqli_connect_eror();
}

?>