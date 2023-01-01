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
    <div class="grid-item-h profile">
      <a href="../HTML/cart.php"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </a>
      <a href="../HTML/Userprofile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
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
          $sqlstm = "SELECT * FROM likesmarket WHERE userid= $USERID" ;
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
