<?php
session_start();
if(!isset($_SESSION["admin"]))
	{
	header("Location:login_signup.php");
	}

include('connection.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script src="modernizr.js" type="text/javascript"></script>


  	<link rel="stylesheet" href="normalize.min.css"/>
	<link rel="stylesheet" href="css/table_style.css"/>
	<link rel="stylesheet" href="search_css_js/demo.css?v=2"/>

	<script language="javascript" src="functions.js"></script>
	
	
	
	<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <script type = "text/javascript" >
 $(document).ready(function(){
	var req = null;
	$('#keysearch').on('keyup', function(){
		var key = $('#keysearch').val();
		if (key && key.length > 2)
		{
			$('#loading').css('display', 'block');
			if (req)
				req.abort();
			req = $.ajax({
				url : 'search_record.php',
				type : 'POST',
				cache : false,
				data : {
					keysearch : key,
				},
				success : function(data)
				{
					console.log(data)
					if (data)
					{
						$('#loading').css('display', 'none');
						$("#result").html(data).show();
					}
				}
			});
		}
		else
		{
			$('#loading').css('display', 'none');
			$('#result').css('display', 'none');
		}
 
	});
});

</script>	
<style type="text/css">
#loading{display: none;}
#searchid
{
    width:500px;
    border:solid 1px #000;
    padding:10px;
    font-size:14px;
}
#result
{
    position:absolute;
    padding:10px;
    display:none;
    margin-top:10px;
    border-top:0px;
    overflow:hidden;
    border:1px #CCC solid;
    background-color: white;
}

 
</style>	  


</head>

<body>

<div id="demo">

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin.php">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_search.php">SEARCH</a>&nbsp;&nbsp;<a href="logout.php">LOGOUT</a></h1>
<div id="example2">		
	
	<div class="wrapper2">
		<div class="content-wrapper2">
			<div class="search-button2" style="height:50px">
				<span><img src="img/images/search-icon-big.png" /></span>
			</div>
			<div class="search-box2">
				<input type="text" name="keysearch" id="keysearch" placeholder="Search By name..." />
				<img src="img/images/close.png" />
			</div>
		</div>
	</div>
	<div class="arrow"><img src="img/images/arrow.png" /> make a click to search........</div>
</div>
</div>
<span id="loading">Loading...</span>
<div id="result" align="center"></div>
<script>!window.jQuery && document.write(unescape('%3Cscript src="search_css_js/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="search_css_js/modernizr.js"></script>
	<script type="text/javascript" src="search_css_js/demo.js"></script>

</body>

</html>
