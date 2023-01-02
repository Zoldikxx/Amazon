<?php

$con=new mysqli("127.0.0.1","root","","webproject");
session_start();
$USERID=$_SESSION["user_id"];

if(isset($_POST['del']))

{  
	$v=$_POST['productid'];
	$sqlstm2= "DELETE FROM favoriteproduct  WHERE user_id= $USERID AND product_id='$v' ";
	$con->query($sqlstm2);
}

$USERID = $_SESSION['user_id'];
$sqlstm = "select * from cart where user_id='$USERID'";
$res12 = $con->query($sqlstm);
// $row = mysqli_fetch_array($res);

$row_count = mysqli_num_rows($res12);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>favorite products </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel='stylesheet' href='../CSS/CSS.css' >
		<link rel="stylesheet" href="../CSS/styles.css" />
		<link rel="stylesheet" href="../CSS/FavoriteProdects.CSS" />
	</head>
	<body>
  <div class='topnav'>
      <a href='./homepage.php'>Home</a>
      <a href='./brandPage.php'>Brands</a>
      <a href='./marketPage.php'>Markets</a>
      <a href='../HTML/Likedmarkets.php'>&#10084;Market</a>
      <a class='active' href='../HTML/Favoriteproducts.php'>&#10084;Prodect</a>
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

<?php
$sqlstm="select *  from user where Id='$USERID'";
$res=$con->query($sqlstm);
$row=mysqli_fetch_array($res);
$image=$row["UImage"];
$phone=$row["Phone"];
$Address=$row["UserAddress"];
$email=$row["Email"];
$name=$row["Username"];


echo"<div class='flex-container'>";
echo"<img class='image' src='../Assets/$image' />";
echo"<br >";
echo"<div>$name</div>";
echo"<div>$Address</div>";
echo"<div>$phone</div>";
echo"<div>$email</div>";	
echo"  </div>";
			 ?>
			 <form method="post">
            <div class="container">
				<h2>Favorites</h2>
				<div class="grid-container">
				
					<?php
          $sqlstm = "SELECT * FROM favoriteproduct WHERE user_id = $USERID" ;
          $res = $con->query($sqlstm);
        while ($row = mysqli_fetch_assoc($res)) 
        {  
           $product = $row['product_id'];
	
           $sqlstm1 = "select *  from products where product_id='$product' ";
		   $res1 = $con->query($sqlstm1);
		   $row1 = mysqli_fetch_assoc($res1);
           $productimage=$row1['product_image'];
			$productBrief = $row1['brief_description'];
			$productTitle = $row1['product_name'];
			 $productPrice = $row1['price'];
					echo" <div  class='grid-item'>";
					echo"<img src='$productimage' />";
					echo"<br />";
                    echo"<br />";
					echo"<div id='title'>$productTitle</div>";
                    echo"<div id='brand'></div>";
					echo"	<br />";
					echo"	<div id='price'>";
					echo"		<strong>$productPrice</strong>";
					echo"	</div>";
					echo"	<div id='description'>$productBrief</div>";
				?>
				<form method="post" action="#">
				<?php
				echo"<input type='hidden' name='productid' value='$product'>";
				?>
				<input type="submit" name="del" value="&#10084;">
		         </form>
				<?php

echo"</div> ";
	}
		
          ?> 
		
				</div>
			</div>
			</form>
		</div>
	</body>
</html>

