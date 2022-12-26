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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> edit profile</title>
    <link href='Css.css' rel='stylesheet' type='text/css'>
    <link href='edit.css' rel='stylesheet' type='text/css'>
</head>
<body>
<form method="post" action="Editprocess.php" >
<div  class="edit-page">  
    
   <center>
      <div class="user-image">
        <div >
        <img class="image" src ="<?=$image;?>">
        </div>
        <br><br><br>
        <lable for ="fromfile"> click below to select an image</lable>
        <div>
        <input onchange="displayimage(this.files[0])" type="file"  name='image' id="fromfile">
        </div>
        <br>
       </div>
      <center>
<div class="user-info">
       <br> <br>
        <table class="table-info">
        <tr><th  colspan="2">Edit your profile</th></tr>
         <tr><th>Username</th>
         <td>
            <input class="textbox" type="text" name='Editusername' placeholder="<?=$name;?>">
        </td>
        </tr>
         <tr><th>Email</th>  
        <td><input  class="textbox" type="text" name='email' placeholder="<?=$email;?>"></td>
       </tr>        
         <tr><th>Phone</th> 
         <td><input class="textbox"   type="text" name='phone' placeholder="<?=$phone;?>"></td>
         </tr>     
         <tr><th>Address</th>
         <td><input  class="textbox"  type="text" name='address' placeholder="<?=$Address;?>"></td>
        </tr>

        <tr><th>password</th>
         <td>
         
            <input class="textbox"  type="text" name='pass' placeholder="Enter new password">
            
        </td>
        </tr><tr><th>Confirm Password</th>

         <td>
         
            <input  class="textbox" type="text" name='ConfirmPass' placeholder=" Confirm Password ">
            
        </td>
        </tr>
            </table>
           </div> 
                 <div>
                    <br>
                <input type="submit"  name='Savebtn' value="Save">
                  </div>
          </form>
</body>
</html>

<script>
    function displayimage(file)
    {
        var img =document.querySelector(".image");
        img.src=URL.createObjectURL(file);
    }
</script>
