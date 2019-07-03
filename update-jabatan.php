<?php 
 
include 'koneksi.php';

$kd_jabatan   = $_POST['kd_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$masa_kerja   = $_POST['masa_kerja'];
$gaji_pokok   = $_POST['gaji_pokok'];
$gaji_lembur  = $gaji_pokok/173;

mysqli_query($koneksi, "UPDATE jabatan set 
	nama_jabatan ='$nama_jabatan',
	masa_kerja   ='$masa_kerja',
	gaji_pokok   ='$gaji_pokok',
	gaji_lembur  ='$gaji_lembur' 
	where kd_jabatan='$kd_jabatan'");

header("location:dashboard.php?page=jabatan");
?>