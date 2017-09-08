<?php
$link=mysqli_connect("localhost", "root", "", "portal") or die(mysqli_error($link));
$fullname=$_POST['sfullname'];
$new=0;
$email=$_POST['semail'];
$password=$_POST['spassword'];
$enc=md5($password);
$path = "img/";
$path = $path . basename($_FILES['uploaded']['name']);
if($_FILES['uploaded']['type']=='image/png' || $_FILES['uploaded']['type']=='image/jpeg')   
{

	move_uploaded_file($_FILES['uploaded']['tmp_name'],$path);
}
else
{
	echo "<script>alert('please enter png or jpeg');</script>";

}
$image=($_FILES['uploaded']['name']);

$sql="INSERT INTO user (fullname,email,password,fileupload,isdelete) VALUES ('$fullname','$email','$enc','$image','$new')";
if(mysqli_query($link, $sql))
{
	header("Location:Sucess.php");

}
else
{
	header("Location:login_signup.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
