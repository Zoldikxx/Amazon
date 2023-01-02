<?php

$con=new mysqli("127.0.0.1","root","","webproject");
session_start();
$USERID=$_SESSION["user_id"];
if(isset($_POST['del']))
{  
	$v=$_POST['productid'];
	$sqlstm2= "DELETE FROM  likesmarket WHERE userid= $USERID AND Marketid='$v' ";
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
		<title>liked markets</title>
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
      <a class='active' href='../HTML/Likedmarkets.php'>&#10084;Market</a>
      <a href='../HTML/Favoriteproducts.php'>&#10084;Prodect</a>
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
$res3=$con->query($sqlstm);
$row=mysqli_fetch_array($res3);
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
echo"<div style='font-weight: bold'><?$name?></div>";
echo"<div>$Address</div>";
echo"<div>$phone</div>";
echo"<div>$email</div>";
				
echo"  </div>";
			 ?>
			 
            <div class="container">
				<h2>Favorites</h2>
				<div class="grid-container">
					<?php
          $sqlstm = "SELECT * FROM likedmarkets WHERE user_id= $USERID" ;
          $res = $con->query($sqlstm);
        while ($row = mysqli_fetch_assoc($res)) 
        {  
           $marketid = $row['Marketid'];
           $sqlstm1 = "select *  from user  where Id='$marketid' ";
			      $res1 = $con->query($sqlstm1);
			     $row1 = mysqli_fetch_assoc($res1);
                 $marketimage=$row1['UImage'];
			     $marketemail= $row1['Email'];
			     $marketphone = $row1['Phone'];
			     $marketadress = $row1['UserAddress'];

					echo" <div  class='grid-item'>";
					echo"<img class='image'src='$marketimage' />";
					echo"<br />";
                    echo"<br />";
					echo"<div id='title'>$marketemail</div>";
                    echo"<div id='brand'>$marketphone</div>";
					echo"	<br />";
					echo"	<div id='price'>";
					echo"		<strong></strong>";
					echo"	</div>";
					echo"	<div id='description'> $marketadress</div>";
					?>
				<form method="post" action="#">
				<?php
				echo"<input type='hidden' name='productid' value='$marketid'>";
				?>
				<input type="submit" name="del" value="&#10084;">
		         </form>
				<?php

					echo"</div> ";
        }

          ?> 


				</div>
			</div>
		</div>
	</body>
</html>
