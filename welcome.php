<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
/*session_start();

	if(isset($_SESSION["user"]))
	{
	echo "<div align='right'>";
	echo " <font style='color:green' face='Arial'>Welcome ".$_SESSION["user"]."</font>";
	echo " </div>";
	}
	else
	{
	header("Location:login_signup.php");
	}*/
session_start();
$sess=$_SESSION["user"];
?>
<h1 align="center"><font color="green"></br></br></br></br></br> Congratulations<?php echo "$sess"; ?> you have successfully linked up with Google+ </font></h1>
<div>
<h2 align="center"><a href="log_out.php"><font color="red">Logout!</font></a></h2>
</div>

</body>

</html>
