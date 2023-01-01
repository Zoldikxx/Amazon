<?php

$con=new mysqli("127.0.0.1","root","","webproject");
session_start();
$USERID=$_SESSION["user_id"];

if(isset($_POST['del']))

{  
	$v=$_POST['productid'];
	$sqlstm2= "DELETE FROM products WHERE market_id = $USERID and product_id=$v";
	$con->query($sqlstm2);
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PROUDECT</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel='stylesheet' href='../CSS/CSS.css' >
		<link rel="stylesheet" href="../CSS/styles.css" />
		<link rel="stylesheet" href="../CSS/FavoriteProdects.CSS" />
	</head>
	<body>
  <div class='topnav'>
      <a href='./homepage.php'>Home</a>
      <a href='./brandPage.php'>Brands</a>
      <a class='active' href='./marketPage.php'>Markets</a>
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
   <?php
  echo"  <div class='grid-item-h profile'>";
  echo"  <a href='../HTML/cart.php'><i class='fa fa-shopping-cart fa-2x' aria-hidden='true'></i> </a>";
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
				<h2> products</h2>
				<div class="grid-container">
				<?php
           $sqlstm = "SELECT * FROM products WHERE market_id = $USERID" ;
           $res = $con->query($sqlstm);
          while ($row = mysqli_fetch_assoc($res)) 
              {  
           $product = $row['product_id'];
           $productimage=$row['product_image'];
			$productBrief = $row['brief_description'];
			$productTitle = $row['product_name'];
            $items = $row['items_available'];
			 $productPrice = $row['price'];
					echo" <div  class='grid-item'>";
					echo"<img src='$productimage' />";
					echo"<br />";
                    echo"<br />";
					echo"<div id='price'> ProductName: <br>$productTitle</div>";
                    echo"<div id='brand'></div>";
					echo"	<div id='price'>";
					echo"	ProductPrice:<strong> $productPrice</strong>";
					echo"	</div>";
                    echo"	<div id='price'>";
					echo"		 items avaliable:<strong>$items</strong>";
					echo"	</div>";
					echo"	<div id='description'>Brief description: <br>$productBrief</div>";

				?>
				<form method="post" action="#">
				<?php
				echo"<input type='hidden' name='productid' value='$product'>";
				?>
              <br/>
				<input type="submit" style='background-color: red; color: #ddd; border-radius:10%;
	              border-color: red;' class="del" name="del" value="DELETE">
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

