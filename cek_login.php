<?php 
include 'controllers/topsis.php';
$db = new topsis();
 
$username = $_POST['username'];
$password = md5($_POST['password']);
 
$login = mysql_query("select * from user where username='$username' and password='$password'");
$cek = mysql_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:views/admin/index.php");
}else{
	header("location:index.php");	
}
 
?>