<?php
$con=new mysqli("127.0.0.1","root","","webproject");
session_start();
$USERID=$_SESSION["user_id"];
$sqlstm="select *  from user where Id='$USERID'";
$res=$con->query($sqlstm);
$row=mysqli_fetch_array($res);
$image=$row["UImage"];
$phone=$row["Phone"];
$Address=$row["UserAddress"];
$email=$row["Email"];
$name=$row["Username"];
    echo" <!DOCTYPE html>";
    echo"<html lang='en'>";
         echo"<head>";
         echo"  <title>First Document</title>";
        echo"<link href='../CSS/CSS.css' rel='stylesheet' type='text/css'>";
        echo" <link href='../CSS/profilecss.css' rel='stylesheet'>";
        ECHO"<link rel='stylesheet' href='../CSS/C.css'>";
        echo" <link href='https://fonts.googleapis.com/css2?family=Oswald&display=swap' rel='stylesheet'>";
        echo"  <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet'>";
        echo"  <script src='https://kit.fontawesome.com/a076d05399.js'></script>";
          echo" </head>";
          echo"<body>";
        echo"  <div class='topnav'>";
        echo"<a class='active' href='../HTML/HOMEPAGE.html'>Home</a>";
        echo"<a href='../HTML/addProducts.html'>Add Prodect</a>";
        echo"<a href='../HTML/Likedmarkets.html'>&#10084;Market</a>";
        echo" <a href='../HTML/marketPage.html'>Market prodect</a>";
        echo" <a href='../HTML/Favoriteproducts.html'>&#10084;Prodect</a>";

    echo"<input type='checkbox' id='active'>";
    echo" <label for='active' class='menu-btn'><span></span></label>";
    echo" <label for='active' class='close'></label>";
    echo"<div class='wrapper'> <ul>";
      echo"<li><a href='Edit.php'>EDIT</a></li>";
      echo" <li><a href='#'>DELETE</a></li>";
      echo" <li><a  href='logout.php'>LOGOUT</a></li></ul></div>";
      echo"</div>";


          echo"</body>";
          echo"</html>";
    echo"<center>";
    echo"<div  class='profile-page'>";
    echo"<div>";
    echo" <img class='image' src ='$image'>";
    echo"</div>";
    echo"  <br>";
    echo"<h3>$name</h3>";
    echo" </div> ";
    echo"</center>";
          echo" <div class='user-info'>";
          echo"  <table class='table-info'>";
          echo" <tr class='table-header'><th  colspan='2'>User Details</th></tr>";
          echo"  <tr class='table-info'><th>Username</th><td>$name</td></tr>";
          echo" <tr class='table-info'><th>Email</th>    <td>$email</td></tr> ";       
          echo" <tr class='table-info'><th>Phone</th>     <td>$phone</td></tr>   ";  
          echo" <tr class='table-info'><th>Address</th><td>$Address</td></tr>";
          echo"  </table>";
          echo" </div>  ";
          echo"</div> ";

          
    ?>