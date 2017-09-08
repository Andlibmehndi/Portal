<?php
session_start();
if(!isset($_SESSION["user"]))
	{
	header("Location:login_signup.php");
	}
$link=mysqli_connect("localhost", "root", "", "portal") or die(mysqli_error($link));
$input=$_POST['input'];
$email=$_SESSION['user'];

$sql="INSERT INTO rss (email,rss_url) VALUES ('$email','$input')";

if(mysqli_query($link,$sql))
{
	header("Location:home.php");

}

?>