<?php
session_start();

require_once("loginDB_connect.php");

if(isset($_POST["in"])){
	$EmailAddress=$_POST['EmailAddress'];
    $Password = $_POST['Password'];

 //to prevent from mysqli injection  
        $EmailAddress = stripcslashes($EmailAddress);  
        $Password = stripcslashes($Password);  
        $EmailAddress = mysqli_real_escape_string($cont, $EmailAddress);  
        $Password = mysqli_real_escape_string($cont, $Password);  

        $sql = "select *from register where EmailAddress = '$EmailAddress' and Password = '$Password'";
  
        $result = mysqli_query($cont, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count==1){

$_SESSION['UserID']=$EmailAddress;


                        header('location: welcome.php');


        }
        
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";
                  
}



}
?>