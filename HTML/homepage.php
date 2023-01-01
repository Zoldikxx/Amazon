<?php
$con=new mysqli("127.0.0.1","root","","webproject");
if(isset($_GET["brandId"])){
  $getter = $_GET["brandId"];
  $query = "select * from products where brand_id = $getter";
  $res = $con -> query($query);
}else if(isset($_GET["marketId"])){
  $getter = $_GET["marketId"];
  $query = "select * from products where market_id = $getter";
  $res = $con -> query($query);
}else if(isset($_POST["search"])){
  $getter = $_POST["search"];
  $query = "select * from `products` where concat (`product_id`, `product_name`, `brief_description`, `full_description`, `extra_info`, `price`, `items_available`, `product_image`, `brand_id`, `brand_name`, `market_id`, `market_name`) like '%".$getter."%'";
  $res = $con -> query($query);
}else{
  $query = "select * from products";
  $res = $con -> query($query);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Online Shopping Site | High Quality Products</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel='stylesheet' href='../CSS/CSS.css' >
		<link rel="stylesheet" href="../CSS/styles.css" />
		<link rel="stylesheet" href="../CSS/homepage.css" />
	</head>
	<body>
		<div class="page">
    <div class='topnav'>
      <a class='active' href='./homePage.php'>Home</a>
      <a href='./brandPage.php'>Brands</a>
      <a href='./marketPage.php'>Markets</a>
    </div>
    <div class="header">
    <img src="" alt="" />
    <div class="grid-item-h headerBar">
      <form action="homepage.php" method="post">
        <input type="text" name="search" id="searchBar" placeholder="Search" />
        <button type="submit">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
    </div>
    <div class="grid-item-h profile">
      <a href="../HTML/cart.php"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </a>
      <a href="../HTML/Userprofile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
    </div>
  </div>
			<div class="body">
				<div class="grid-container">
        <?php
        while($data = mysqli_fetch_array($res))
        {
          $product_id = $data["product_id"];
          $brand_id = $data["brand_id"];
          $img = $data["product_image"];
          $title = $data["product_name"];
          $brand = $data["brand_name"];
          $market = $data["market_name"];
          $price = $data["price"];
          $brief = $data["brief_description"];

          echo "<div class='grid-item'>";
          echo "<a href='../HTML/productPage.php?id=".$product_id."'>";
          echo "<img src='$img' alt='PlayStation 5 Console (Disc Version) With Controller' class='img' />";
          echo "<div class='productInfo'>";
          echo "<div id='title'>$title</div>";
          echo "<div id='brand'>$brand</div>";
          echo "<em id='market'>$market</em>";
          echo "<br />";
          echo "<div id='price'>";
          echo "<strong>EGP $price</strong>";
          echo "</div>";
          echo "<p id='description'>$brief</p>";
          if($data['items_available'] > 0 )
            echo "<strong id='availability'>Available</strong>";
          else
            echo "<strong style='color: red' id='availability'>Unavailable</strong>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
        }
        mysqli_close($con);
        ?>
					<!-- <div class="grid-item">
						<a href="../HTML/productPage.html">
							<img src="../Assets/ps5.jpeg" alt="PlayStation 5 Console (Disc Version) With Controller" class="img" />
							<div class="productInfo">
								<div id="title">PlayStation 5 Console (Disc Version) With Controller</div>
								<div id="brand">Sony</div>
								<em id="market">EXPRESS</em>
								<br />
								<div id="price">
									<strong>EGP 22499.00</strong>
								</div>
								<p id="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nemo neque explicabo accusantium, minus beatae.</p>
								<strong id="availability">Available</strong>
							</div>
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</body>
</html>
