<?php 
include("connection.php");
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$enc=md5($password);
if($email=="admin@gmail.com" && $password=="admin")
{
	$_SESSION["admin"]="Admin";
	header("Location: admin.php");
}
else{
if(!($email=="admin@gmail.com" && $passsword=="admin"))
{
$result=mysql_query("SELECT * FROM user where email='$email' and password='$enc'");
if(mysql_num_rows($result) > 0)
{
	$_SESSION["user"]=$email;
	
	header("Location:home.php");
}
else
{
	//echo "username or password is wrong";
	//echo "<script>alert('username or password is wrong');</script>";
	header("Location:login_signup.php");
	//echo "<a href ='login_signup.php' onclick='return myfun()'></a>";
	
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script language="javascript" src="functions.js"></script>
</head>

<body>

</body>

</html>
