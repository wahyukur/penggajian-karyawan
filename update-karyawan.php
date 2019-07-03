<?php 
 
include 'koneksi.php';

$kd_karyawan   = $_POST['kd_karyawan'];
$nama          = $_POST['nama'];
$kd_jabatan    = $_POST['kd_jabatan'];
$dump          = mysqli_query($koneksi, "SELECT * from jabatan where kd_jabatan = '$kd_jabatan'");
$w             = mysqli_fetch_array($dump);
$nama_jabatan  = $w['nama_jabatan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tgl_lahir     = $_POST['tgl_lahir'];
$agama         = $_POST['agama'];
$pendidikan    = $_POST['pendidikan'];
$alamat        = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE karyawan set 
	nama          ='$nama',
	kd_jabatan    ='$kd_jabatan',
	nama_jabatan = '$nama_jabatan',
	jenis_kelamin ='$jenis_kelamin',
	tempat_lahir  ='$tempat_lahir',
	tgl_lahir     ='$tgl_lahir',
	agama         ='$agama',
	pendidikan    ='$pendidikan',
	alamat        ='$alamat' 
	where kd_karyawan='$kd_karyawan'");

header("location:dashboard.php?page=karyawan");
?>