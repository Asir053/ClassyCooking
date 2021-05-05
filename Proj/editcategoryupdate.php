<?php
	session_start();
	
	$editcat_sql="update category set name='".$_SESSION['editcategory']['name']."' where categoryID=".$_SESSION['editcategory']['categoryID'];
	$editcat_query=mysqli_query($dbconnect,$editcat_sql);
	
	
	unset($_SESSION['editcategory']);
?>
<h1>Edit category</h1>
<p>Category Successfully Updated</p>
<p><a href="index.php?page=cpanel">Back to admin panel</a></p>