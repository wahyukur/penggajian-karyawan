<?php
include 'koneksi.php';

$kd_karyawan  = $_POST['kd_karyawan'];
$nama         = $_POST['nama'];
$tgl_presensi = $_POST['tgl_presensi'];
$keterangan   = $_POST['keterangan'];
$potongan     = $_POST['potongan'];

mysqli_query($koneksi, "insert into presensi values(default,'$kd_karyawan','$nama','$tgl_presensi','$keterangan','$potongan')");

header("location:dashboard.php?page=presensi");
?>