<!DOCTYPE html>
<html>
<head>
	<titile>Add Food</titile>
</head>
<body>
	<form action="process_food.php" method="post" enctype="multipart/form-data">

		<label>Food Item</label>
		<input type="text" name="food_item" id="food_item"><br><br>

		<label>food price</label>
		<input type="number" name="food_price" id="food_price"><br><br>

		<label>upload image</label>
		<input type="file" name="food_image" id="food_image"><br><br>

		<input type="submit" value="Add Food" name="submitImage">
		<br><br>

		<li><a href="http://localhost/food/viewMenu.php">VIEW THE MENU</a></li>



	</form>
</body>
</html>