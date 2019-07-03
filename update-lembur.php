<?php 
include 'koneksi.php';

$nama_jabatan = $_POST['nama_jabatan'];

$sql = mysqli_query($koneksi, "select * from jabatan where nama_jabatan = '$nama_jabatan'") or die(mysqli_error());
$data = mysqli_fetch_array($sql);

$kd_lembur   = $_POST['kd_lembur'];
$kd_karyawan = $_POST['kd_karyawan'];
$nama        = $_POST['nama'];
$tgl_lembur  = $_POST['tgl_lembur'];
$lama_lembur = $_POST['lama_lembur'];
$gaji_lembur = $data['gaji_lembur'] * $lama_lembur;

mysqli_query($koneksi, "UPDATE lembur set 
	kd_karyawan  ='$kd_karyawan',
	nama         ='$nama',
	nama_jabatan ='$nama_jabatan',
	tgl_lembur   ='$tgl_lembur',
	lama_lembur  ='$lama_lembur',
	gaji_lembur  ='$gaji_lembur' 
	where kd_lembur='$kd_lembur'");

header("location:dashboard.php?page=lembur");
?>