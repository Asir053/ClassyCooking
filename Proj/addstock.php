<?php
	session_start();
	
	if(!isset($_SESSION['addstock'])){
		$_SESSION['addstock']['name']="";
		$_SESSION['addstock']['categoryID']="1";
		$_SESSION['addstock']['price']="";
		$_SESSION['addstock']['topline']="";
		$_SESSION['addstock']['description']="";
		$_SESSION['addstock']['thumbnail']="noimage.jpg";
	}else{
		if($_SESSION['addstock']['thumbnail']!="noimage.jpg"){
			unlink("images/".$_SESSION['addstock']['thumbnail']);
		}
	}
?>
<div class="maincontent">
<p><a href="index.php?page=cpanel">Back to admin</a></p>
<h1>Enter details for new stock item</h1>
<form action="index.php?page=confirmaddstock" method="post" enctype="multipart/form-data">
<p>Stock item name: <input type="text" name="name" value="<?php echo $_SESSION['addstock']['name']; ?>"/> </p>
<p>Thumbnail image: <input type="file" name="fileToUpload" id="fileToUpload" class="btn admin-btn  my-4 text-capitalize"/> </p>
<p>Category: <select name="categoryID" class="btn admin-btn my-4 text-capitalize">
	<?php $catlist_sql="select * from category";
	$catlist_qry=mysqli_query($dbconnect,$catlist_sql);
	$catlist_rs=mysqli_fetch_assoc($catlist_qry);
	do{ ?>
		<option value="<?php echo $catlist_rs['categoryID']; ?>" 
		<?php
			if($catlist_rs['categoryID']==$_SESSION['addstock']['categoryID']){
				echo "selected=selected";
			}
		?>
		><?php echo $catlist_rs['name']; ?></option>
	<?php }while($catlist_rs=mysqli_fetch_assoc($catlist_qry));	
	?></select>
 </p>
<p>Price: $ <input type="text" name="price" value="<?php echo $_SESSION['addstock']['price']; ?>"/> </p>
<p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['addstock']['topline']; ?>"/> </p>
<p>Description: <textarea name="description" cols=60 rows=5><?php echo $_SESSION['addstock']['description']; ?></textarea> </p>
<input type="submit" name="submit" value="Submit" class="btn admin-btn my-4 text-capitalize" />
</form>
</div>