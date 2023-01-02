<?php
$product1 = 13;
$product2 = 14;

$con = mysqli_connect('localhost', 'root', '', 'webproject');
session_start();
if(!isset($_SESSION['user_id'])){
  header('location:LoginForm.php');
}else{
  $USERID = $_SESSION['user_id'];
}
$counter = 0;
$sqlstm = "select * from cart where user_id='$USERID' ";
$res = $con->query($sqlstm);
// $row = mysqli_fetch_array($res);

$row_count = mysqli_num_rows($res);

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel='stylesheet' href='../CSS/CSS.css' >
	<link rel="stylesheet" href="../CSS/styles.css" />
	<link rel="stylesheet" href="../CSS/cart.css" />
	<title>Cart</title>
</head>

<body>
  <div class='topnav'>
      <a href='./homepage.php'>Home</a>
      <a href='./brandPage.php'>Brands</a>
      <a href='./marketPage.php'>Markets</a>
    </div>
		<div class="header">
			<div></div>
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
$res2=$con->query($sqlstm);
$row=mysqli_fetch_array($res2);
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
    <h1>Shopping Cart</h1>
    <div class="body-container">
      <div class="flex-container">
      <?php
        while ($row = mysqli_fetch_assoc($res)) 
        {
          $id= $row['product_id'];
          $quantity = $row['quantity'];
          $total = $row['total'];
          $sqlstm1 = "select * from products where product_Id='$id'";
          $res1 = $con->query($sqlstm1);
          $row1 = mysqli_fetch_assoc($res1);
          $productImage = $row1['product_image'];
          $productBrief = $row1['brief_description'];
          $productTitle = $row1['product_name'];
          $productPrice = $row1['price'];
          $items_available = $row1['items_available'];

          echo "<div class='flex-item'>";
          echo "<div class='product-image'>";
          echo "<img class='pic' src='$productImage' />";
          echo "</div>";
          echo "<div class='product-details'>";
          echo "<div class='product-title'>$productTitle</div>";
          echo "<p class='product-description'>$productBrief</p>";
          echo "</div>";
          echo "<div style='display: flex'>
          <div style='margin-right: 4px'>EGP</div>
          <div style='font-weight: bold' class='product-price' id='$productPrice'>$productPrice</div>
          </div>";
          echo "<div class='product-quantity'>";
          echo "<select class='select' name='quantity' id='$productTitle' onchange='calculateItemPrice$counter(this.id)'>";
          for($i=1; $i<=$items_available; $i++){
            if($i == $quantity){
              echo "<option value='$i' selected>$i</option>";
            }else{
              echo "<option value='$i'>$i</option>";
            }
          }
          echo "</select>";
          echo "</div>";
          echo "<div class='product-removal'>";
          echo "<a href=''><i class='clickable fa fa-minus-square-o fa-2x' aria-hidden='true'></i></a>";
          echo "</div>";
          echo "<div style='display: flex'>
          <div style='margin-right: 4px'>EGP</div>
          <div style='font-weight: bold' class='product-line-price' id='$id'>$total</div>
          </div>";
          echo "</div>";?>
          <script>
          function calculateItemPrice<?php echo $counter?>(id) {
            let totalprice = document.getElementById('<?php echo $id ?>');
            let value = document.getElementById(id).value;
            let total = document.getElementById('<?php echo $productPrice ?>').innerHTML;
            totalprice.innerHTML = '';
            let num = total * value;
            let text = document.createTextNode(num);
            totalprice.appendChild(text);
            calculateCartTotal();
          }
          </script>
          <?php
          $counter++;
        }
		  ?>
      </div>

      <?php
        if($row_count == 0){
          echo "<div id='noItems'> You have not added any items to the cart yet!</div>";
        }else{
          echo "<div class='totals'>
                <div class='totals-item'>
                  <label>Subtotal</label>
                  <div class='totals-value' id='cart-subtotal'></div>
                </div>
                <div class='totals-item'>
                  <label>Tax (5%)</label>
                  <div class='totals-value' id='cart-tax'></div>
                </div>
                <div class='totals-item'>
                  <label>Shipping</label>
                  <div class='totals-value' id='cart-shipping'>FREE</div>
                </div>
                <div class='totals-item totals-item-total'>
                  <label>Grand Total</label>
                  <div class='totals-value' id='cart-total'></div>
                </div>
                <button class='checkout'>Checkout</button>
              </div>";
          }
        ?>
    </div>
  </div>

  <script>
			//var value = 0;


			let cartItems = document.getElementsByClassName("product-line-price");
			let cartSubtotal = document.getElementById("cart-subtotal");
			let tax = document.getElementById("cart-tax");
			let grandTotal = document.getElementById("cart-total");

			function calculateCartTotal() {
        let sum = 0.00;
				cartSubtotal.innerHTML = "";
				for (let i = 0; i < cartItems.length; i++) {
					sum += parseFloat(cartItems[i].innerHTML);
          cartSubtotal.innerHTML = sum;
          console.log(cartSubtotal.innerHTML);
				}
				tax.innerHTML = (cartSubtotal.innerHTML * 0.05).toFixed(2);
				grandTotal.innerHTML = (parseFloat(tax.innerHTML) + parseFloat(cartSubtotal.innerHTML)).toFixed(2);
			}
      
        window.onload = calculateCartTotal();
		</script>

</body>

</html>