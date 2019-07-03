<?php
include 'koneksi.php';

$sql = "SELECT kd_karyawan FROM karyawan ORDER BY kd_karyawan DESC LIMIT 1";
$query = mysqli_query($koneksi, $sql);
list ($no_temp) = mysqli_fetch_row($query);
if ($no_temp == '') {
	$kd_karyawan = 'K00001';
} else {
	$jum = substr($no_temp,1,6);
	$jum++;
	if($jum <= 9) {
		$kd_karyawan = 'K0000' . $jum;
	} elseif ($jum <= 99) {
		$kd_karyawan = 'K000' . $jum;
	} elseif ($jum <= 999) {
		$kd_karyawan = 'K00' . $jum;
	} elseif ($jum <= 9999) {
		$kd_karyawan = 'K0' . $jum;
	} elseif ($jum <= 99999) {
		$kd_karyawan = 'K' . $jum; 	
	} else {
		die("Nomor urut melebih batas");		
	}
}

$kd_karyawan   = $kd_karyawan;
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

mysqli_query($koneksi, "insert into karyawan values('$kd_karyawan','$kd_jabatan','$nama_jabatan','$nama','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$agama','$pendidikan','$alamat')");

header("location:dashboard.php?page=karyawan");
?>