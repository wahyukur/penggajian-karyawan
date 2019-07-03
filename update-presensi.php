<?php 
 
include 'koneksi.php';

$kd_presensi  = $_POST['kd_presensi'];
$kd_karyawan  = $_POST['kd_karyawan'];
$tgl_presensi = $_POST['tgl_presensi'];
$nama         = $_POST['nama'];
$keterangan   = $_POST['keterangan'];
$potongan     = $_POST['potongan'];

mysqli_query($koneksi, "UPDATE presensi set 
	kd_karyawan  = '$kd_karyawan',
	tgl_presensi = '$tgl_presensi',
	nama         = '$nama',
	keterangan   = '$keterangan',
	potongan     = '$potongan'
	where kd_presensi='$kd_presensi'");

header("location:dashboard.php?page=presensi");
?>