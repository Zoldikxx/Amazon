<?php
$con=new mysqli("127.0.0.1","root","","webproject");
$getter = $_GET["id"];
$query = "select * from imgs where product_id = $getter";
$query2 = "select * from products where product_id = $getter";
// $query3 = "select * from brands where product_id = $getter";
$imgs = $con -> query($query);
$products = $con -> query($query2);
// $brands = $con -> query($query3);
$data = mysqli_fetch_array($products);
$id = $data["product_id"];
$brand_id = $data["brand_id"];
$query3 = "select * from brands where brand_id = $brand_id";
$brands = $con -> query($query3);
$data2 = mysqli_fetch_array($brands);
$img = $data["product_image"];
$title = $data["product_name"];
$brand = $data2["brand_name"];
$price = $data["price"];
$brief = $data["brief_description"];
$full = $data["full_description"];
$info = $data["extra_info"];
$items = $data['items_available']
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Online Shopping Site | High Quality Products</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		<link rel="stylesheet" href="../CSS/styles.css" />
		<link rel="stylesheet" href="..\CSS\productPage.css" />
	</head>
	<body>
		<div class="page">
			<div class="header">
				<img src="../Assets/580b57fcd9996e24bc43c518.png" alt="" />
				<div class="grid-item headerBar">
					<form action="" method="post">
						<input type="text" name="search" id="searchBar" placeholder="Search" />
						<button type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>
				<div class="grid-item profile">
					<a href=""><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </a>
					<a href=""><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="navBar">
				<a class="links" href="./homePage.php">Home</a>
				<a class="links" href="./brandPage.php">Brands</a>
				<a class="links" href="./marketPage.php">Markets</a>
			</div>
			<div class="body">
				<div class="grid-container">
					<div class="grid-item item-1">
            <?php
            while($data = mysqli_fetch_array($imgs))
            {
              $img = $data["img_name"];
              $img_id = $data["img_id"];
              echo "<img class='small' id='$img_id' src='$img' onclick='changeImg(this.id)'/>";
            }
            ?>
					</div>
					<div class="grid-item item-2">
            <?php
						echo "<img src=$img alt=$title class='img' id='imgHolder' />";
            ?>
					</div>
					<div class="grid-item item-3">
            <?php
						echo "<div id='brand'>$brand</div>
						<div id='title'>$title</div>
						<div><p id='model'>$info</p></div>"
            ?>
						<div>EGP</div>
            <?php
						echo "<div style='font-weight: bold' id='price'>$price</div>"
            ?>
              <?php
              if($items == 0)
              echo "<div style='color: red'>Item not in stock</div>";
              else{
                echo "<div>";
                  echo "<select name='quantity' id='quantity' onchange='displayValue(this.id)'>
                    <option value='selected' disabled selected>Qunatity</option>";
                  for($i = 1; $i <= $items; $i++){
                    echo "<option value=$i>$i</option>";
                  }
                  echo "<input type='button' value='Add To Cart' />
                  </div>
                  <div id='cart'><p>Amount of items to be added in cart</p></div>";
                  echo "</select>";
                }

              ?>

					</div>
					<div class="grid-item item-4">
						<div>No warranty</div>
						<div>sold by <a href="">market</a></div>
						<div id="ids">
							<p>Free Return</p>
							<p>Trusted Shipping</p>
							<p id="third">Secure Shopping</p>
						</div>
					</div>
					<div class="grid-item item-5">
						<div class="productInfo">
							<?php
              echo $full;
              mysqli_close($con);
              ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script>
		let _id = "";
		function changeImg(_id) {
			this._id = _id;
			document.getElementById("imgHolder").style.opacity = "0";
			document.getElementById("imgHolder").style.transition = "0.3s ease-in-out";
			setTimeout(showImg, 300);
		}

		function showImg() {
			document.getElementById("imgHolder").src = document.getElementById(this._id).src;
			document.getElementById("imgHolder").style.opacity = "1";
			document.getElementById("imgHolder").style.transition = "0.3s ease-in-out";
		}

		let value = 0;
		var txt;
		var sentence;
		var cart = document.getElementById("cart");
		function displayValue(_id) {
			cart.innerHTML = "";
			var text = document.createElement("p");
			value = document.getElementById(_id).value;
			txt = value + " " + document.getElementById("title").textContent + " will be added to cart of total " + value * document.getElementById("price").innerHTML + " EGP";
			sentence = document.createTextNode(txt);
			text.appendChild(sentence);
			cart.appendChild(text);
		}
	</script>
</html>
