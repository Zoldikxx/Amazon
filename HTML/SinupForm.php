<?php
$conn = mysqli_connect('localhost', 'root', '', 'webproject');

if (isset($_POST['SingnUp'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $phone = $_POST['phone'];
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);
    $user_type = $_POST['user_type'];
    if ($user_type == "user") {
        $usertype = 0;
    } else {
        $usertype = 1;
    }
    $balanceno = mysqli_real_escape_string($conn, $_POST['balanceno']);
    $select = " SELECT * FROM user  WHERE Email = '$email' &&  UserPassword= '$pass' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exist!';
    } else {
        $insert = "INSERT INTO user (Email, UserPassword, Username , UserAddress, ULocation, Phone, UImage, UserTyp) VALUES('$email','$pass','$username','$address','$location','$phone','$photo','$usertype')";
        mysqli_query($conn, $insert);
        header('location:LoginForm.php');
    }
};
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\ProjectPhase1\style1.css">
</head>

<body>
    <div class="form-container">
        <form action="#" method="post">
            <h3>Signup now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <label>Email: <input type="text" name="email" /></label><br>
            <label>Password: <input type="text" name="password" /></label><br>
            <label>Username: <input type="text" name="username" /></label><br>
            <label>address: <input type="text" name="address" /></label><br>
            <label>Location * <color:"red">optional: <input type="text" name="location" /></label><br>
            <label>Phone: <input type="text" name="phone" /></label><br>
            <label>Photo: <input type="file" name="photo" id="photo" /></label><br>
            <select name="user_type">
                <option value="user">user</option>
                <option value="market">market</option>
            </select><br>
            <label>if Market profile, add balance number: <input type="text" name="balanceno" id="photo" /></label><br>
            <input type="submit" value="SingnUp" name="SingnUp" />
            <p>already have an account? <a href="LoginForm.php">login now</a></p>
        </form>
    </div>

</body>

</html>