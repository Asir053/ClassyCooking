<?php
	session_start();
	if(isset($_GET['categoryID'])){
	$_SESSION['editcategory']['categoryID']=$_GET['categoryID'];
	}
	if(!isset($_SESSION['editcategory']['name'])){
	$editcat_sql="select * from category where categoryID=".$_GET['categoryID'];
	$editcat_query=mysqli_query($dbconnect,$editcat_sql);
	$editcat_rs=mysqli_fetch_assoc($editcat_query);
	$_SESSION['editcategory']['name']=$editcat_rs['name'];
	}
?>
<h1>Edit category</h1>
<form action="index.php?page=editcategoryconfirm" method="post">
<input name="name" value="<?php echo $_SESSION['editcategory']['name']; ?>" />
<input type="submit" name="update" value="Update" class="btn admin-btn my-4 text-capitalize" />
</form>