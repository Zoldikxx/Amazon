<?php
  $con = mysqli_connect('localhost','root','','webproject');
  $query = "select * from purchased where UId = 2";
  $purchased = $con -> query($query);
?>

<html>


    <head>
        <title>Purchased Products</title>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../CSS/styles.css" />
		<link rel="stylesheet" href="../CSS/homepage.css" />
    </head>
    <body>
        <h1 style="text-align: center;">Purshaed Products</h1>
        <div class="grid-container"> 
          <?php
            while($data = mysqli_fetch_array($purchased)){
              // if($purchased.IsNull()){
              //   echo "123";
              // }else{
                $product_id = $data["product_id"];
                $quantity = $data["quantity"];
                $query = "select * from products where product_id = $product_id";
                $product = $con -> query($query);
                $data2 = mysqli_fetch_array($product);
                $id = $data2["product_id"];
                $img = $data2["product_image"];
                $title = $data2["product_name"];
                $price = $data2["price"];
                $brief = $data2["brief_description"];
                echo "<div class='grid-item'>
                <img src='$img' alt='$title' name='photo'>
                <h2 name='name'>$title</h2>
                <p style='font-weight: bold' class='price' name='price'>EGP $price</p>
                <p name='description'>$brief</p>
                <div>Bought: $quantity</div> 
                </div>";
              }
          // }
        ?>
        </div>
    </body>
</html>