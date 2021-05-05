<?php
	session_start();

	$newcategory_sql="INSERT INTO Category (name) VALUES('".mysqli_real_escape_string($dbconnect,$_POST['name'])."')";
	$newcategory_qry=mysqli_query($dbconnect,$newcategory_sql);
?>
<p>New category has been entered</p>
<p><a href="index.php?page=cpanel">Return to admin panel</a></p>