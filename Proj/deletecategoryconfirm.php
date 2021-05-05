<?php
	session_start();	
?>
<h1>Confirm category to delete</h1>
<?php
$delcat_sql="SELECT * FROM category WHERE categoryID=".$_GET['categoryID'];
$delcat_query=mysqli_query($dbconnect,$delcat_sql);
$delcat_rs=mysqli_fetch_assoc($delcat_query);

//check if there are stock items in this category 
$check_sql="SELECT * FROM stock1 WHERE categoryID=".$_GET['categoryID'];
$check_query=mysqli_query($dbconnect,$check_sql);
$count=mysqli_num_rows($check_query);
?>
<p><?php if($count>0){
	echo "Warning! There are ".$count." stock item(s) in this category. If you delete the category, they will also be removed from the database";
}?></p>

<p><?php echo "Do you really wish to delete ".$delcat_rs['name']."?";?></p>
<p><a href="index.php?page=deletecategory&categoryID=<?php echo $_GET['categoryID']; ?>">Yes Delete it! </a>|<a href="index.php?page=deletecategoryselect"> No,go back. </a>|<a href="index.php?page=cpanel"> Back to admin panel </a> </p>