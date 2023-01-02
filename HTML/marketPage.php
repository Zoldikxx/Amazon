<?php
$con=new mysqli("127.0.0.1","root","","webproject");
$query = "select * from user where UserTyp = '1'";
$markets = $con -> query($query);

session_start();
$USERID = $_SESSION['user_id'];
$sqlstm = "select * from cart where user_id='$USERID'";
$res12 = $con->query($sqlstm);
// $row = mysqli_fetch_array($res);

$row_count = mysqli_num_rows($res12);
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
      <a href='./homepage.php'>Home</a>
      <a href='./brandPage.php'>Brands</a>
      <a class='active' href='./marketPage.php'>Markets</a>
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
				<a href="../HTML/cart.php"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
				<div id="cartNum">(<?php echo $row_count ?>)</div>
        <?php
      $sqlstm="select *  from user where Id='$USERID'";
$res=$con->query($sqlstm);
$row=mysqli_fetch_array($res);
  if($row['UserTyp']== 1)
{

   $profilelink="Marketprofile.php";

 }else if($row['UserTyp'] == 0)
 {

   
    $profilelink="Userprofile.php";
 }

  echo"   <a href='../HTML/$profilelink'><i class='fa fa-user fa-2x' aria-hidden='true'></i></a>";
  echo" </div>";

  ?>
			</div>
  </div>
			<div class="body">
				<!-- <h2>Products</h2> -->
				<div class="grid-container">
        <?php
          while($data2 = mysqli_fetch_array($markets)){
            $market = $data2["Username"];
            $id = $data2["Id"];
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
