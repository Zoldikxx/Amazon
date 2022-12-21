<?php
 $conn = mysqli_connect('localhost','root','','webproject');

 if(isset($_POST['SingnUp']))
 {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass=$_POST['password'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$phone = $_POST['phone'];
	$photo = mysqli_real_escape_string($conn, $_POST['photo']);
    $user_type = $_POST['user_type'];
    if($user_type=="user")
    { 
        $usertype=0;

    }
    else{
        $usertype=1;
    }
	$balanceno = mysqli_real_escape_string($conn, $_POST['balanceno']);
	$select = " SELECT * FROM user  WHERE Email = '$email' &&  UserPassword= '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
	{
      $error[] = 'user already exist!';
    }

	else
	{
	     $insert = "INSERT INTO user (Email, UserPassword, Username , UserAddress, ULocation, Phone, UImage, UserTyp) VALUES('$email','$pass','$username','$address','$location','$phone','$photo','$usertype')";
         mysqli_query($conn, $insert);
         header('location:LoginForm.php');
    }
	
	
 };
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../CSS/signup.css" />
		<title>Sign UP</title>
	</head>
	<body>
		<form>
			<div class="flex-container">
				<h2 class="flex-item">CREATE ACCOUNT</h2>
				<div class="flex-item">
					<input class="bar" type="text" name="username" placeholder="Username" />
				</div>
				<div class="flex-item">
					<input class="bar" type="text" name="email" placeholder="Email" />
				</div>
				<div class="flex-item">
					<input class="bar" type="password" name="password" placeholder="Password" />
				</div>
				<div class="flex-item">
					<input class="bar" type="text" name="address" placeholder="Address" />
				</div>
				<div class="flex-item">
					<input class="bar" type="text" name="location" placeholder="location* (optional)" />
				</div>
				<div class="flex-item">
					<input class="bar" type="tel" name="phone" placeholder="Phone" />
				</div>
				<div class="flex-item">
					<select class="bar" name="user_type">
						<option value="Select User Type" disabled selected>Select User Type</option>
						<option value="user">User</option>
						<option value="market">Market</option>
					</select>
				</div>
				<div class="flex-item">
					<input class="bar" type="text" name="balanceno" id="photo" placeholder="If Market profile, add balance number" />
				</div>
				<div class="flex-item photo">
					<label>Photo: </label>
					<input type="file" name="photo" id="photo" />
				</div>
				<div class="flex-item">
					<input class="button" type="submit" value="SingnUp" name="SingnUp" />
				</div>

				<div class="flex-item">
					<div>Already have an account? <a href="../HTML/LoginForm.php">login now</a></div>
				</div>
			</div>
		</form>
	</body>
</html>
