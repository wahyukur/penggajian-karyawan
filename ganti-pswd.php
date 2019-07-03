<?php
include 'koneksi.php';

$pswlama  = md5($_POST['pswlama']);
$pswbaru  = md5($_POST['pswbaru']);
$kpswbaru = md5($_POST['kpswbaru']);

$sql = mysql_query("select * from users where password = '$pswlama'");
$result = mysql_num_rows($sql);

if ($result > 0) {
	if ($pswbaru == $kpswbaru) {
		mysql_query("UPDATE users set 
			password  = '$pswbaru' 
			where id = 1 ");
		header("location:dashboard.php");
	} else {
		echo "password tidak sama";
	}
} else {
	header("location:index.php");
}

?>