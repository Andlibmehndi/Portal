<?php 
session_start();
//f(!isset($_SESSION["user"]))
	//{
	//header("Location:login_signup.php");
	//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

.info-msg,
.success-msg,
.warning-msg,
.error-msg {
  margin: 10px 0;
  padding: 10px;
  border-radius: 3px 3px 3px 3px;
}
.info-msg {
  
}
.success-msg {
  color: #270;
  background-color: #DFF2BF;
}
.warning-msg {
  color: #9F6000;
  background-color: #FEEFB3;
}
.error-msg {
  color: #D8000C;
  background-color: #FFBABA;
}

/* Just for CodePen styling - don't include if you copy paste */
html {
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
  font-weight: 300;
  margin: 25px;
}
body {
  
  text-align:center;
  
}
</style>
</head>

<body>

<div class="info-msg" align="center">
  <img src=img/58b5a18f31ff7d2c2c83205e047f8aec.jpg height="150px" width="150px"/>
</div>

<div class="success-msg" align="center">
  <!--<i class="fa fa-check"></i>-->
  <img src=img/Rcd6B4j7i.png height="50px" width="50px"/>
     THANK YOU,You've sucessfully Signed UP.<br/>Click Here to Login
     <a href="login_signup.php"><img src="img/lock.png" height="50px" width="50px"/></a>
</div>

<div class="info-msg" align="center">
  <img src=img/icons/tenor.gif height="150px" width="150px"/>
  <!--<img src=img/icons/giphy.gif height="150px" width="150px"/>
	<img src=img/icons/84697c50f009a5c1d3108c78340eea91.gif height="150px" width="150px"/>-->
</div>

</body>

</html>
