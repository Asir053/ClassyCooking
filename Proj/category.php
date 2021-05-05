<?php
	if(!isset($_GET['categoryID'])){
		header("Location:index.php");
	}
	$stock_sql="SELECT stock1.stockId,stock1.name,stock1.price,stock1.thumbnail,category.name AS catname FROM stock1 JOIN category ON stock1.categoryID=category.categoryID  WHERE stock1.categoryID=".$_GET['categoryID'];
	if($stock_query=mysqli_query($dbconnect,$stock_sql)){
		$stock_rs=mysqli_fetch_assoc($stock_query);
	}
	
	if(mysqli_num_rows($stock_query)==0){
		echo "sorry we have no items currently in stock";
	}else{
		?>
		<h1><?php echo $stock_rs['catname']; ?></h1>
		<?php do{
			?>
			<div class name="item">
				<a href="index.php?page=item&stockID=<?php echo $stock_rs['stockId']; ?>">
				<p><img src="images/<?php echo $stock_rs['thumbnail']; ?>" /></p>
				<p class="cat-stock"><?php echo $stock_rs['name'] ?></p>
				<p class="cat-stock">$<?php echo $stock_rs['price'] ?></p>
				</a>
			</div>
		<?php	
		}while($stock_rs=mysqli_fetch_assoc($stock_query));
		?>
	<?php
	}
?>