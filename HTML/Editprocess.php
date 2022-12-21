
<?php
$USERNAME=$_POST['Editusername'];
$USERPHONE=$_POST['phone'];
$USERIMAGE=$_POST['image'];
$USEREMAIL=$_POST['email'];
$addres=$_POST['address'];
$newpass=$_POST['pass'];

$confirmpass=$_POST['ConfirmPass'];
$con=new mysqli("127.0.0.1","root","","webproject");
session_start();
$USERID=$_SESSION["user_id"];

if(isset($_POST['Savebtn']))
{

if(!$newpass==NULL && !$confirmpass==NULL && $confirmpass==$newpass)
{
    $sqlstm1="UPDATE user SET  UserPassword= '$newpass' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);

    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }

    else 
    {
        header("Location:MarketProfile.php");
    }

}

if(!$USERIMAGE==NULL)
{
    $sqlstm1="UPDATE user SET  UImage='$USERIMAGE' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);
    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }
    else 
    {
        header("Location:MarketProfile.php");
    }
}


if(!$USERNAME==NULL)
{
    $sqlstm1="UPDATE user SET  Username = '$USERNAME' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);
    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }
    else 
    {
        header("Location:MarketProfile.php");
    }
}

if(!$USERPHONE==NULL)
{
    $sqlstm1="UPDATE user SET  Phone='$USERPHONE' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);
    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }
    else 
    {
        header("Location:MarketProfile.php");
    }
}

if(!$addres==NULL)
{
    $sqlstm1="UPDATE user SET  UserAddress='$addres' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);
    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }
    else 
    {
        header("Location:MarketProfile.php");
    }
}

if(!$USEREMAIL==NULL)
{
    $sqlstm1="UPDATE user SET  Email='$USEREMAIL' WHERE user.Id ='$USERID';"; 
    $con->query($sqlstm1);
    $sqlstm="select * from user where Id='$USERID'";
    $res=$con->query($sqlstm);
    $row=mysqli_fetch_array($res);
    if($row["UserTyp"]==0)
    {
    header("Location:UserProfile.php");
    
    }
    else 
    {
        header("Location:MarketProfile.php");
    }
}

}
?>
