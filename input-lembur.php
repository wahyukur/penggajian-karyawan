<?php
include 'koneksi.php';

$nama_jabatan = $_POST['nama_jabatan'];

$sql = mysqli_query($koneksi, "select * from jabatan where nama_jabatan = '$nama_jabatan'") or die(mysql_error());
$data = mysqli_fetch_array($sql);

$kd_karyawan  = $_POST['kd_karyawan'];
$nama         = $_POST['nama'];
$tgl_lembur   = $_POST['tgl_lembur'];
$lama_lembur  = $_POST['lama_lembur'];

if ($lama_lembur == 1) {
	$gj = $data['gaji_lembur'] * 1.5;//gaji lembur jam pertama
	$gaji_lembur = $gj;
} else {
	$gj = $data['gaji_lembur'] * 1.5;//gaji lembur jam pertama
	$gj2 = ($data['gaji_lembur'] * 2) * ($lama_lembur - 1);//gaji lembur jam jam selanjuntya
	$gaji_lembur  = $gj + $gj2;
}

mysqli_query($koneksi, "insert into lembur values(default,'$kd_karyawan','$nama','$nama_jabatan','$tgl_lembur','$lama_lembur','$gaji_lembur')");

header("location:dashboard.php?page=lembur");
?>