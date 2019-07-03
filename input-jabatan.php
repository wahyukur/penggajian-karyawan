<?php
include 'koneksi.php';

$nama_jabatan = $_POST['nama_jabatan'];
$masa_kerja   = $_POST['masa_kerja'];
$gaji_pokok   = $_POST['gaji_pokok'];
$gaji_lembur  = $gaji_pokok/173;

mysqli_query($koneksi, "insert into jabatan values(default,'$nama_jabatan',$masa_kerja,$gaji_pokok,$gaji_lembur)");

header("location:dashboard.php?page=jabatan");
?>