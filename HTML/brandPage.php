<?php
$con=new mysqli("127.0.0.1","root","","webproject");
$query3 = "select * from brands";
$brands = $con -> query($query3);
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
		<link rel="stylesheet" href="../CSS/marketBrandPage.css" />
	</head>
	<body>
		<div class="page">
    <div class='topnav'>
      <a  href='./homepage.php'>Home</a>
      <a class='active' href='./brandPage.php'>Brands</a>
      <a href='./marketPage.php'>Markets</a>
    </div>
    <div class="header">
    <img src="" alt="" />
    <div class="grid-item-h headerBar">
      <form action="" method="post">
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
				<!-- <h2>Products</h2> -->
				<div class="grid-container">
          <?php
          while($data2 = mysqli_fetch_array($brands)){
            $brand = $data2["brand_name"];
            $id = $data2["brand_id"];
            echo "<a href='../HTML/homepage.php?brandId=".$id."'>";
            echo "<div id='grid1' class='grid-item'>
						<div class='brands'>$brand</div>
					  </div>";
            echo "</a>";
          }
          ?>
					<!-- <div id="grid1" class="grid-item">
						<div class="brands">Sony</div>
					</div> -->
				</div>
			</div>
		</div>
	</body>
</html>
