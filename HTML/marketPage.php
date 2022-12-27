<?php
$con=new mysqli("127.0.0.1","root","","webproject");
$query = "select * from markets";
$markets = $con -> query($query);
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
		<link rel="stylesheet" href="../CSS/marketBrandPage.css" />
	</head>
	<body>
		<div class="page">
			<div class="header">
				<img src="../Assets/580b57fcd9996e24bc43c518.png" alt="" />
				<div class="grid-item-h headerBar">
					<form action="" method="post">
						<input type="text" name="search" id="searchBar" placeholder="Search" />
						<button type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>
				<div class="grid-item-h profile">
					<a href=""><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </a>
					<a href=""><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="navBar">
				<a class="links" href="./homepage.php">Home</a>
				<a class="links" href="./brandPage.php">Brands</a>
				<a class="links" href="./marketPage.php">Markets</a>
			</div>
			<div class="body">
				<!-- <h2>Products</h2> -->
				<div class="grid-container">
        <?php
          while($data2 = mysqli_fetch_array($markets)){
            $market = $data2["market_name"];
            $id = $data2["market_id"];
            echo "<a href='../HTML/homepage.php?marketId=".$id."'>";
            echo "<div class='grid-item'>
						<div class='brands'>$market</div>
					  </div>";
            echo "</a>";
          }
          ?>
					<!-- <div class="grid-item">
						<div class="brands">Express</div>
					</div> -->
				</div>
			</div>
		</div>

		<!-- <script>
			function randomBackgroundColor() {
				var elements = document.getElementsByClassName("grid-item");
				for (i = 0; i < elements.length; i++) {
					var randomColor = Math.floor(Math.random() * 16777215).toString(16);
					elements[i].style.backgroundColor = "#" + randomColor;
				}
			}
			window.onload = randomBackgroundColor();
		</script> -->
	</body>
</html>
