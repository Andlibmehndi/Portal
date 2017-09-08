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

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

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
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thank you For contact.</h1>
			</div>
		</div><!--/.row-->
		</div>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
</body>

</html>
