<?php
$dbserver="localhost";
$dbuser="root";
$password="";
$dbname="foods";

$cont=mysqli_connect($dbserver,$dbuser,$password,$dbname);

if($cont){
echo'<script>alert("You are now logged in")</script>'
		;}
else{
	echo "Did not connect".mysqli_connect_eror();
}

?>