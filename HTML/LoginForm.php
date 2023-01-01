<?php

session_start();
$conn = mysqli_connect('localhost','root','','webproject');

if(isset($_POST['LogIn']))
{
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
   $select = " SELECT * FROM user WHERE  Email='$email' && UserPassword = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['UserTyp']== "1"){

         $_SESSION["user_id"]=$row["Id"];
         header('location:homepage.php');

      }else if($row['UserTyp'] == "0"){

         $_SESSION["user_id"]=$row["Id"];
         header('location:homepage.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html>
    <head>
			<meta charset="UTF-8">
		   <meta http-equiv="X-UA-Compatible" content="IE=edge">
		   <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../CSS/login.css">
         <link rel="stylesheet" href="../CSS/C.css">
		   <title>LogIn</title>
    </head>
    <body> 
        <center>
      
        <div class="form-container">
            <form action="" method="post">
            <h3>Login now</h3>
            <br><br>	
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <label>Email: <input type="text" name="email" /></label><br>
            <br><br>			
		    <label>Password: <input type="text" name="password" /></label><br>	
          <br><br>				
            <input type="submit" value="LogIn" name="LogIn" class="form-btn"/> 
            <br><br><br>	 
            <p>don't have an account? <a href="Signup.php">SignUp now</a></p>
           </form>    
        </div>
         </center>
    </body>
</html>