<!DOCTYPE html>
<html>
<head>


  <form action="done.php" method="post">
    </form>


<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>


<?php


$dbserver = "localhost";
$dbuser = "root";
$password = "";
$dbname = "foods";

// Create connection
$conn=mysqli_connect($dbserver,$dbuser,$password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID,food,date,EmailAddress FROM cart";
$result = $conn->query($sql);


{if ($result->num_rows > 0) {
    echo "<table><tr> <th>order ID</th> <th>ORDER</th> <th>Date</th> <th>customer</th>
      " ;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]."</td><td>" . $row["food"]."</td><td>" . $row["date"]."</td><td>" . $row["EmailAddress"] ;

    } 
    echo "</table>";
} else {
    echo "0 results";
}
}

$conn->close();

?>

        
        <li><a href="http://localhost/food/table.php">View User Data</a></li>
