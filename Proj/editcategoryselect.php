<?php
	session_start();
	unset($_SESSION['editcategory']);
	$editcat_sql="select * from category";
	$editcat_query=mysqli_query($dbconnect,$editcat_sql);
	$editcat_rs=mysqli_fetch_assoc($editcat_query);
?>
<h1>Edit category</h1>
<?php
	do{?>
		<p><a href="index.php?page=editcategory&categoryID=<?php echo $editcat_rs['categoryID']; ?>"><?php echo $editcat_rs['name']; ?></a></p>
	<?php	
	}while($editcat_rs=mysqli_fetch_assoc($editcat_query))
?>
