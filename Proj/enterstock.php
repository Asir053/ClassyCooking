<?php
	session_start();
	
	$enter_sql="INSERT INTO stock1 (name,categoryID,price,thumbnail,topline,description) VALUES ('".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['name'])."','".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['categoryID'])."','".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['price'])."','".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['thumbnail'])."','".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['topline'])."','".mysqli_real_escape_string($dbconnect,$_SESSION['addstock']['description'])."')";
	
	$enter_qry=mysqli_query($dbconnect,$enter_sql);
	
	unset($_SESSION['addstock']);
?>
<p>New stock item has been entered</p>
<p><a href="index.php?page=cpanel">Back to admin panel</a></p>