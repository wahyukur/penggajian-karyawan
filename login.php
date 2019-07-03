<?php 
session_start();
require_once("koneksi.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$login = mysqli_query($koneksi, $sql);
$result = mysqli_num_rows($login);


if ($result > 0) {
	$user = mysqli_fetch_array($login);
	
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dashboard.php");
} else {
	header("location:index.php?msg=gagal");
}

?>