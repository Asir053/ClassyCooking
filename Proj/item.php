<?php
	include("dbconnect.php");
	if(!isset($_GET['stockID'])){
		header("Location: index.php");
	}
	$item_sql="SELECT stock1.*,category.name AS catname FROM stock1 JOIN category ON (stock1.categoryID=category.categoryID) WHERE stock1.stockID=".$_GET['stockID'];
	$item_query=mysqli_query($dbconnect,$item_sql);
	$item_rs=mysqli_fetch_assoc($item_query);
?>

		
		
		<p class="cat-stock"><?php echo $item_rs['name']; ?></p>
		<p class="cat-stock"><?php echo $item_rs['catname']; ?></p>
		<p class="cat-stock">Price: $<?php echo $item_rs['price']; ?></p>
		<p class="cat-stock"><?php echo $item_rs['topline']; ?></p>
		<p class="cat-stock"><?php echo $item_rs['Description']; ?></p>
        