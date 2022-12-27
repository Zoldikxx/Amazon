<?php
$product1 = 13;
$product2 = 14;

$conn = mysqli_connect('localhost', 'root', '', 'webproject');
session_start();
$USERID = $_SESSION["user_id"];

// $query = "INSERT INTO cart (user_id, product_id) 
// VALUES ('$USERID', '$product1'), ('$USERID', '$product2')";
// $conn->query($query);

$sqlstm = "select *  from cart where user_id='$USERID' ";
$res = $conn->query($sqlstm);
$row = mysqli_fetch_array($res);

$row_count = mysqli_num_rows($res);
?>








<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="../CSS/styles.css" />
	<link rel="stylesheet" href="../CSS/cart.css" />
	<title>Cart</title>
</head>

<body>
	<div class="header">
		<img src="../Assets/580b57fcd9996e24bc43c518.png" alt="" />
		<div class="grid-item-h headerBar">
			<form action="">
				<input type="text" name="search" id="searchBar" placeholder="Search" />
				<button type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<div class="grid-item-h profile">
			<a href="../HTML/cart.html"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </a>
			<a href="../HTML/Userprofile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
		</div>
	</div>
	<div class="navBar">
		<a class="links" href="./homePage.html">Home</a>
		<a class="links" href="./brandPage.html">Brands</a>
		<a class="links" href="./marketPage.html">Markets</a>
	</div>
	<h1>Shopping Cart</h1>

	<div class="shopping-cart">
		<div class="column-labels">
			<label class="product-image">Image</label>
			<br />
			<label class="product-details">Product</label>
			<br />
			<label class="product-price">Price</label>
			<br />
			<label class="product-quantity">Quantity</label>
			<br />
			<label class="product-removal">Remove</label>
			<br />
			<label class="product-line-price">Total</label>
		</div>

		<!-- It will be inside a for loop iterating on the selected products in DB 
             rather than being that static -->
		<?php
		$sqlstm = "select *  from cart where user_id='$USERID' ";
		$res = $conn->query($sqlstm);
		$row_count = mysqli_num_rows($res);

		while ($row = mysqli_fetch_assoc($res)) {
			$product = $row['product_id'];

			$sqlstm1 = "select *  from marketproduct where product_Id='$product' ";
			$res1 = $conn->query($sqlstm1);
			$row1 = mysqli_fetch_assoc($res1);
			$productImage = $row1['product_image'];
			$productBrief = $row1['brief_description'];
			$productTitle = $row1['product_name'];
			$productPrice = $row1['price'];

			echo "<div class='product'>";
			echo "<div class='product-image'>";
			echo "<img src='$productImage' />";
			echo "</div>";
			echo "<div class='product-details'>";
			echo "<div class='product-title'>$productTitle</div>";
			echo "<p class='product-description'>$productBrief</p>";
			echo "</div>";
			echo "<div class='product-price'>$productPrice</div>";
			echo "<div class='product-quantity'>";
			//TAKE QUANTITY FROM DATABASE 
			echo "</div>";
			echo "<div class='product-removal'>";
			echo "<button class='remove-product'>Remove</button>";
			echo "</div>";
			echo "<div class='product-line-price'>25.98</div>";
			echo "</div>";
		}
		?>
		<?php



		?>
		<hr />

		<div class="totals">
			<div class="totals-item">
				<label>Subtotal</label>
				<div class="totals-value" id="cart-subtotal">71.97</div>
			</div>
			<div class="totals-item">
				<label>Tax (5%)</label>
				<div class="totals-value" id="cart-tax">3.60</div>
			</div>
			<div class="totals-item">
				<label>Shipping</label>
				<div class="totals-value" id="cart-shipping">15.00</div>
			</div>
			<div class="totals-item totals-item-total">
				<label>Grand Total</label>
				<div class="totals-value" id="cart-total">90.57</div>
			</div>
		</div>

		<button class="checkout">Checkout</button>
	</div>
</body>

</html>