<?php
	session_start();	
?>
<h1>Delete category</h1>
<?php
$delcat_sql="SELECT * FROM category";
$delcat_query=mysqli_query($dbconnect,$delcat_sql);
$delcat_rs=mysqli_fetch_assoc($delcat_query);
do{?>
<p><a href="index.php?page=deletecategoryconfirm&categoryID=<?php echo $delcat_rs['categoryID']; ?>"><?php echo $delcat_rs['name']; ?></a></p>
	
<?php
}while($delcat_rs=mysqli_fetch_assoc($delcat_query));
?>