<?php
//include('db.php');
 $conn = mysql_connect('localhost','root','') or die(mysql_error());
  $dbname = mysql_select_db('portal') or die(mysql_error());
 
//if($_GET['keyword'] && !empty($_GET['keyword']))

//echo $_POST['keyword'];  

if(isset($_POST['keysearch']))
{

    $search = $_POST['keysearch'];
	
	//echo "SELECT * FROM `phonecommet` WHERE `namep` like '%$search%' order by id LIMIT 5";
	
    $data = mysql_query("SELECT * FROM user WHERE fullname like '%$search%'");
	if(mysql_num_rows($data) > 0)
	{   
		
 		
?>
		

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>

<script src="modernizr.js" type="text/javascript"></script>


  	<link rel="stylesheet" href="normalize.min.css"/>
	<link rel="stylesheet" href="css/table_style.css"/>
	<script language="javascript" src="functions.js"></script>

</head>

<body>
<center>
<div id="demo">
<div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>FULLNAME</th>
          <th>EMAIL</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <?php
      while($row1=mysql_fetch_array($data,MYSQL_ASSOC))
		{
		?>
      <tbody>
        <tr>
          <td data-title="FULLNAME"><?php echo $row1['fullname']; ?></td>
          <td data-title="EMAIL"><?php echo $row1['email']; ?></td>
          <td >
            <a href="edit.php?fullname=<?php echo $row1['fullname']; ?>"><img src=img/icons/2.png width="35px" height="25px"/>Edit</a>
          </td>
          <td data-title="DELETE">
            <a href="delete.php?fullname=<?php echo $row1['fullname']; ?>" onclick="return myfun(<?php $row1['fullname']; ?>)"><img src="img/icons/3.png" width="35px" height="25px"/>Delete</a>
          </td>
        </tr>
        
      </tbody>
      <?php
      } 
      ?>
    </table>
    <?php 
   }
}
    ?>
</div>
</div>
</center>
<script src='jquery.min.js'></script>
<script src="js/table_index.js"></script>

</body>

</html>

