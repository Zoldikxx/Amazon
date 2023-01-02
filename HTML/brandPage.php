<?php

$con=new mysqli("127.0.0.1","root","","webproject");
$query3 = "select * from brands";
$brands = $con -> query($query3);
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
    <link rel="stylesheet" href="../CSS/footer.css" />

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
      <br>
      <div class="footer">
        <div class="contain">
        <div class="col">
          <h1>TOP Market</h1>
          <ul>
            <?php
          $sqlstm="select * from user where UserTyp=1";
        $res1=$con->query($sqlstm);
        $arrp[0]=$row = mysqli_fetch_assoc($res1);
        $arrp[1]=$row = mysqli_fetch_assoc($res1);
        $arrp[2]=$row = mysqli_fetch_assoc($res1);
        $arrp[3]=$row = mysqli_fetch_assoc($res1);
          for($i=0;$i<2;$i++){
            $marketname = $arrp[$i];
            $nn=$marketname['Username'];
            echo "<li>$nn</li>";
          }
        ?>
          </ul>
        </div>


        <div class="col">
          <h1> TOP Products</h1>
          <ul>
          <?pHP
          $sqlstm1="select * from products";
        $res2=$con->query($sqlstm1);
        $arr[0]=$row1 = mysqli_fetch_assoc($res2);
        $arr[1]=$row1= mysqli_fetch_assoc($res2);
        $arr[2]=$row1= mysqli_fetch_assoc($res2);
        $arr[3]=$row1 = mysqli_fetch_assoc($res2);
          for($i=0;$i<4;$i++){
            $productname=$arr[$i];
            $pn=$productname['product_name'];
            echo "<li>$pn</li>";
          }
        ?>
          </ul>
        </div>
        <div class="col">
          <h1>TOP Brand</h1>
          <ul>
          <?pHP
          $sqlstm2="select * from brands";
        $res3=$con->query($sqlstm2);
        $arr2[0]=$row2 = mysqli_fetch_assoc($res3);
        $arr2[1]=$row2= mysqli_fetch_assoc($res3);
        $arr2[2]=$row2= mysqli_fetch_assoc($res3);
        $arr2[3]=$row2 = mysqli_fetch_assoc($res3);
          for($i=0;$i<4;$i++){
            $brandame=$arr2[$i];
            $bn=$brandame['brand_name'];
            echo "<li>$bn</li>";
          }
        ?>
          </ul>
        </div>
          <div class="col">
            <h1>Support</h1>
            <ul>
              <li>facebook</li>
              <li>instagram</li>
              <li>whatsApp</li>
            </ul>
          </div>
      <div class="clearfix"></div>
      </div>
      </div>
		</div>
	</body>
</html>
