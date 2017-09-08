<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
include('connection.php');
if(isset($_GET['id']))
{
		$id=$_GET['id'];
		$result=mysql_query("delete from rss where id='$id'");
		//$result=mysql_query("update user set isdelete='1' where fullname='$id'");
if($result)
{
header('location:home.php');
}
}
?>

</body>

</html>
