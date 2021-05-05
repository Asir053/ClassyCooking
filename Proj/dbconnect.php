<?php

	$dbconnect = mysqli_connect("localhost","root","","ProjectRestaurant");
	if(mysqli_connect_errno()){
		echo "Connection Failed:".mysqli_connect_error();
		exit;
	}

?>