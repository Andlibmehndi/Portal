<?php
session_start();
if(!isset($_SESSION["user"]))
	{
	header("Location:login_signup.php");
	}
include("connection.php");
$user=$_SESSION["user"];
$sql="select * from user where email='$user'";
$result=mysql_query($sql) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB PORTAL</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/styles.css" rel="stylesheet">

<link href="css/txtstyle.css" rel="stylesheet">
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script language="javascript" src="rssdelete.js"></script>


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"><span>WEB</span>PORTAL</a>
				<a class="navbar-brand" href="contact_us.php">contact</a>
				<ul class="user-menu">				
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $_SESSION["user"]; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<?php 
						while($data=mysql_fetch_assoc($result)) { ?>
			<center><li><img width="50%" height="50%" src="img/<?php echo $data['fileupload']; ?>"></li>
			<li><label id="Label1" style="color:green"><?php echo $data['fullname']; ?></label></li>
			</center>
				<?php } ?>
				<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid  -->
		</nav>
		
	<form class="form-wrapper" method="post" action="addrss.php">
    <input type="text" name="input" id="search" placeholder="Add Your Rss Url...." required>
    <input type="submit" name="btn_rss" value="Add RSS" id="submit">
</form>
<?php
include_once("connection.php");
$sql="select * from rss where email='$user'";
$rss=mysql_query($sql);
if(mysql_num_rows($rss) > 0)
{
	while($row=mysql_fetch_array($rss))
	{
	$rss_data=$row['rss_url'];
	//$request= implode($rss_data);
	$request=$rss_data;
	$response=file_get_contents($request);
	$xml=simplexml_load_string($response);

?>
<div id="<?php echo $row['id']; ?>" style="width:200px;height:350px;overflow:scroll;border:medium black solid;margin:20px;float:left">
<img src="<?php echo"{$xml->channel->image->url}";?>" />
<table  align="center">
	<tr bgcolor="gray"><th>TITLE</th><th>Description</th></tr>
	<?php
	foreach($xml->channel->item AS $story)
  		{
  	?>
	<tr>
	<?php 
	echo "<td style='color:green'><a href=\"$story->link\" title=\"\">$story->title</a><br></td>";
	?>
	<td><?php echo "$story->description"; ?></td>
	</tr>
	<?php
	}
	?>
	</table>
<a href="delete_rss.php?id=<?php echo $row['id']; ?>" onclick="return myrss_delete(<?php $row['id']; ?>)"><img src="img/icons/3.png" width="35px" height="25px"/>Delete</a>
</div>
<?php } ?>
<?php } ?>
  
  
  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
</body>

</html>
