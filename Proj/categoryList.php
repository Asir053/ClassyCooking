<?php
			$cat_sql = "SELECT * FROM Category";
			$cat_query = mysqli_query($dbconnect,$cat_sql);
			$cat_rs = mysqli_fetch_assoc($cat_query);

			do{?>
			<a href="index.php?page=category&categoryID=<?php echo $cat_rs['categoryID']; ?>" class="newlist primary-color"> <?php echo $cat_rs['name']; ?> </a>   
			&nbsp;<?php
			}while($cat_rs = mysqli_fetch_assoc($cat_query))
?>
