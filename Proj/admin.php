<?php
	session_start();
	
	if(isset($_GET['action'])) {
		if($_GET['action']=="logout"){
			unset($_SESSION['admin']);
		}
	}
	if(isset($_SESSION['admin'])){
		include("cpanel.php");
	}else{
		include("login.php");
	}
	
?>