<?php
session_start();
if(!isset($_SESSION["admin"]))
	{
	header("Location:login_signup.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
 	<link rel="stylesheet" href="css/text.css"/>
 	<link rel="stylesheet" href="css/btn_style.css"/>
 	      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Nunito:300);

body { font-family: "Nunito", sans-serif; font-size: 24px; }
a    { text-decoration: none; }
p    { text-align: center; }
sup  { font-size: 36px; font-weight: 100; line-height: 55px; }

.button
{
  text-transform: uppercase;
  letter-spacing: 2px;
  text-align: center;
  color: #0C5;

  font-size: 24px;
  font-family: "Nunito", sans-serif;
  font-weight: 300;
  
  margin: 5em auto;
  
  position: absolute; 
  top:0; right:0; bottom:0; left:0;
  
  padding: 20px 0;
  width: 150px;
  height:70px;

  background: #0D6;
  border: 1px solid #0D6;
  color: #FFF;
  overflow: hidden;
  
  transition: all 0.5s;
}

.button:hover, .button:active 
{
  text-decoration: none;
  color: #0C5;
  border-color: #0C5;
  background: #FFF;
}

.button span 
{
  display: inline-block;
  position: relative;
  padding-right: 0;
  
  transition: padding-right 0.5s;
}

.button span:after 
{
  content: ' ';  
  position: absolute;
  top: 0;
  right: -18px;
  opacity: 0;
  width: 10px;
  height: 10px;
  margin-top: -10px;

  background: rgba(0, 0, 0, 0);
  border: 3px solid #FFF;
  border-top: none;
  border-right: none;

  transition: opacity 0.5s, top 0.5s, right 0.5s;
  transform: rotate(-45deg);
}

.button:hover span, .button:active span 
{
  padding-right: 30px;
}

.button:hover span:after, .button:active span:after 
{
  transition: opacity 0.5s, top 0.5s, right 0.5s;
  opacity: 1;
  border-color: #0C5;
  right: 0;
  top: 50%;
}
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body bgcolor="#F5F5F5" style="height: 443px">
<?php
include('connection.php');
if(isset($_GET['fullname']))
{
$id=$_GET['fullname'];
if(isset($_POST['submit']))
{

$fullname=$_POST['name'];
$email=$_POST['email'];
$query3=mysql_query("update user set fullname='$fullname', email='$email' where fullname='$id'");
if($query3)
{
header('location:admin.php');
}
}
$result=mysql_query("select * from user where fullname='$id'");
$row=mysql_fetch_array($result);
?>
<div class = "panel panel-primary">
	<div class = "panel-heading">
      <h3 class = "panel-title">Update the User Information</h3>
   </div>
     <div class = "panel-body" style="border-style:solid" align="center">  
<form method="post" action="">
<font style="font-family:Arial, Helvetica, sans-serif"><br />
	FullName:</font><input id="text1" type="text_fn" name="name" value="<?php echo $row['fullname']; ?>" /><br />
<font style="font-family:Arial, Helvetica, sans-serif">Email:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <input id="text1" type="text_email" name="email" value="<?php echo $row['email']; ?>" /><br />
	<br />
	<br />
	<br />
	<br />
 <br/>
	<button class="button" type="submit" name="submit" style="left: 496px; right: 989px; top: 111px; bottom: -88px">
 	<span>UPDATE</span>
 	</button>
</form>
</div>
</div>
<?php
}
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
