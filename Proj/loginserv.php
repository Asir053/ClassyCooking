<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'projectrestaurant');

$name=$_POST['user'];
$pass=$_POST['password'];

$s="select * from users where username= '$name' && password= '$pass'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 1){
	header('Location:index.php?page=cpanel');
}else{
	?>	
	<p><span class="error">Incorrect username or passsword</span></p>
	<a href="index.php?page=login"> Back </a>
	<?php
}
?>