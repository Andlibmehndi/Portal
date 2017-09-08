<?php
session_start();
if(!isset($_SESSION["admin"]))
	{
	header("Location:login_signup.php");
	}

include('connection.php');
$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$result=mysql_query("select * from user where isdelete='0' LIMIT $start_from, $num_rec_per_page");
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
<form method="post" action="admin.php">

<div id="demo">
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WELCOME ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_search.php">SEARCH</a>&nbsp;&nbsp;<a href="logout.php">LOGOUT</a></h1>
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
      while($row=mysql_fetch_array($result,MYSQL_ASSOC))
		{
		?>
      <tbody>
        <tr>
          <td data-title="FULLNAME"><?php echo $row['fullname']; ?></td>
          <td data-title="EMAIL"><?php echo $row['email']; ?></td>
          <td >
            <a href="edit.php?fullname=<?php echo $row['fullname']; ?>"><img src=img/icons/2.png width="35px" height="25px"/>Edit</a>
          </td>
          <td data-title="DELETE">
            <a href="delete.php?fullname=<?php echo $row['fullname']; ?>" onclick="return myfun(<?php $row['fullname']; ?>)"><img src="img/icons/3.png" width="35px" height="25px"/>Delete</a>

          </td>
        </tr>
        
      </tbody>
      <?php
      } 
      ?>
    </table>
    <?php 
   echo "<center>";
$sql = "SELECT * FROM user where isdelete='0'"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='admin.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='admin.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='admin.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
echo "</center>";
?>

  </div>
  
  
 
</div>
  <script src='jquery.min.js'></script>

    <script src="js/table_index.js"></script>

</form>
</body>

</html>
