<?php
	session_start();	
?>
<h1>Add new category</h1>
<p><a href="index.php?page=cpanel">Back to admin panel</a></p>
<form action="index.php?page=entercategory" method="post">
<p><input type="text" name="name" size="40" maxlength="50" /></p>
<p><input type="submit" name="submit" value="Add category" class="btn admin-btn my-4 text-capitalize" /></p>
</form>
