<?php
session_start();
include_once 'gpConfig.php';
if(isset($_SESSION["admin"]))
	{
	unset($_SESSION["admin"]);
	header("Location:login_signup.php");

	}
//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userData']);

//Reset OAuth access token
$gClient->revokeToken();

//Destroy entire session
session_destroy();
unset($_SESSION["user"]);
header("Location:login_signup.php");
?>