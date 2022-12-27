<?php
session_start();
// $USERID = $_SESSION["user_id"];
$conn = mysqli_connect('localhost', 'root', '', 'webproject');

if (isset($_POST['addProduct'])) {
	$productName = $_POST['productName'];
	$brandName = $_POST['brandName'];
	$productBriefDescription = $_POST['productBriefDescription'];
	$productFullDescription = $_POST['productFullDescription'];
	$productPrice = $_POST['productPrice'];
	$numofItems = $_POST['numofItems'];
	$avatar = $_POST['avatar'];

	$insert = "INSERT INTO marketproduct (product_name, brand_name, brief_description , 
full_description, price, items_available, product_image) 
VALUES('$productName','$brandName','$productBriefDescription',
'$productFullDescription','$productPrice','$numofItems','$avatar')";
	$conn->query($insert);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../CSS/addProduct.css" />
	<title>Add Product</title>
</head>

<body>
	<form action="#" method="POST">
		<div class="flex-container">
			<h2 class="flex-item">ADD PRODUCT</h2>
			<div class="flex-item">
				<input class="bar" type="text" id="productName" name="productName" placeholder="Product Name" />
			</div>

			<div class="flex-item">
				<input class="bar" type="text" id="brandName" name="brandName" placeholder="Brand" />
			</div>

			<div class="flex-item">
				<input class="bar" type="text" name="productBriefDescription" id="productBriefDescription" placeholder="Brief Description" />
			</div>

			<div class="flex-item">
				<textarea class="bar bars" name="productFullDescription" id="productFullDescription" cols="30" rows="4" placeholder="Full Description"></textarea>
			</div>

			<div class="flex-item">
				<input class="bar" type="number" id="productPrice" name="productPrice" placeholder="Price" />
			</div>

			<div class="flex-item">
				<input class="bar" type="number" id="numofItems" name="numofItems" placeholder="Items available" />
			</div>

			<div class="flex-item photo">
				<label for="avatar">Image: </label>
				<input type="file" id="avatar" name="avatar" accept="image/*" />
			</div>

			<div class="flex-item">
				<input class="button" type="submit" value="ADD PRODUCT" name="addProduct" />
			</div>
		</div>
	</form>
</body>

</html>