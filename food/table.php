<!DOCTYPE html>
<html>
<head>



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

$sql = "SELECT userID,FirstName,SecondName,Location,PhoneNumber,EmailAddress,Password FROM register";
$result = $conn->query($sql);


{if ($result->num_rows > 0) {
    echo "<table><tr> <th>userID</th> <th>FirstName</th> <th>SecondName</th> <th>Location</th> <th>PhoneNumber</th> <th>EmailAddress</th> <th>Password</th></tr>" ;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["userID"]."</td><td>" . $row["FirstName"]."</td><td>" . $row["SecondName"]."</td><td>" . $row["Location"]."</td><td>" . $row["PhoneNumber"]."</td><td>" . $row["EmailAddress"] ."</td><td>" . $row["Password"];
    }
    echo "</table>";
} else {
    echo "0 results";
}
}


$conn->close();
?>
		<html>	
<head>
	 <link rel="stylesheet" href="styleTable.css">
          </head>
						<h1>
Update User Information</h1>
			<form action="process_update.php" method="POST">

				<body>

				<input type="text" name="userID"	placeholder="Enter userID"><br>	<br>
				<input type="text" name="FirstName"	placeholder="Enter firstname"><br><br>
				<input type="text" name="SecondName"	placeholder="Enter secondname"><br><br>
				<input type="text" name="Location"	placeholder="Enter location"><br><br>
				<input type="text" name="PhoneNumber"	placeholder="Enter phonenumber"><br><br>
				<input type="text" name="EmailAddress"	placeholder="Enter email"><br><br>
				<input type="text" name="Password"	placeholder="Enter password"><br><br>
				</body>
				
				<input type="submit" name="update" style="margin-top:5px;
				    color: black;
				    background-color: orange; " class="btn btn-success" value="UPDATE" /> <br>
				
				<li><a href="http://localhost/food/delete.php">delete user</a></li>
				<li><a href="http://localhost/food/add_food.php">add food</a></li>
				<li><a href="http://localhost/food/order.php">orders</a></li>
			
			</form>
			</html>


