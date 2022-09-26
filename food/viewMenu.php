<html>
<head>
	<title>Display Images</title>
	<style>
		body{
			background-color: ;
		}
	</style>
</head>
<body>
	<center>
		<form action="" method="POST" enctype="multipart/form-data">
			<table width="50%" border="1" cellpadding="5" cellspacing="5">
				<thread>
					<tr>
						<th>food</th>
						<th>imagename</th>
						<th>foodprice</th>
					</tr>
				</thread>
				<?php
				$conn = mysqli_connect("localhost","root","");
				$db=mysqli_select_db($conn,'foods');

				$query="select * FROM `fooditems`";
				$query_run = mysqli_query($conn,$query);

				while($row=mysqli_fetch_array($query_run))
				{
					?>
					<tr>
						<td> <?php echo $row['food']; ?></td>
                        <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['imagename']).'"alt="image" style="width:100px;height:100px;">'; ?></td>
						<td> <?php echo $row['foodprice']; ?></td>

					</tr>
					<?php
				}
				?>
				</table>
				</form>

	</center>
</body>
</html>
<h1>
			Update MENU</h1>
			<form action="update_Menu.php" method="post"enctype="multipart/form-data">
				
		<label>Food Item</label>
		<input type="text" name="food_item" id="food_item"><br><br>

		<label>food price</label>
		<input type="number" name="food_price" id="food_price"><br><br>

		<label>upload image</label>
		<input type="file" name="food_image" id="food_image"><br><br>

		<input type="submit" value="Update Menu" name="update">
		<br><br>
	</form>