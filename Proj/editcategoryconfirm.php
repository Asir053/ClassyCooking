<?php
	session_start();
	
	$_SESSION['editcategory']['name']=$_POST['name'];
?>
<h1>Edit category</h1>
<p>Updated Category Name: <?php echo $_SESSION['editcategory']['name']; ?></p>
<p> <a href="index.php?page=editcategoryupdate">Confirm </a>| <a href="index.php?page=editcategory"> Oops,go back </a>| <a href="index.php?page=cpanel">Back to admin panel</a></p>
