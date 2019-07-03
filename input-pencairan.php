<?php
include 'koneksi.php';

$kd_karyawan = $_POST['kd_karyawan'];

$krywn = mysqli_query($koneksi, "SELECT * from karyawan where kd_karyawan = '$kd_karyawan'");
$data = mysqli_fetch_array($krywn);
$kdjbtn = $data['kd_jabatan'];

$lmbr = mysqli_query($koneksi, "SELECT SUM(gaji_lembur) as total_lembur
					from lembur 
					where kd_karyawan = '$kd_karyawan' 
					AND month(tgl_lembur) = month(now()) 
					AND year(tgl_lembur) = year(now())");
$gjlmbr = mysqli_fetch_array($lmbr);

$pkk = mysqli_query($koneksi, "SELECT * from jabatan where kd_jabatan = '$kdjbtn'");
$gjpkk = mysqli_fetch_array($pkk);

$prsns = mysqli_query($koneksi, "SELECT SUM(potongan) as pemotongan 
					 from presensi 
					 where kd_karyawan = '$kd_karyawan' 
					 AND month(tgl_presensi) = month(now()) 
					 AND year(tgl_presensi) = year(now())");
$ptng = mysqli_fetch_array($prsns);

// die(var_dump($prsns));

//jumlah
$gaji_lembur   = $gjlmbr['total_lembur'];
$gaji_pokok    = $gjpkk['gaji_pokok'];
$jkk           = $gjpkk['gaji_pokok']*0.0024;
//kurang
$potongan      = $ptng['pemotongan'];
if ($gjpkk['masa_kerja'] > 0) {
	$biaya_jabatan = 0;
} else {
	$biaya_jabatan = ($gaji_lembur+$gaji_pokok+$jkk)*0.05;
}
//total
$total_gaji    = ($gaji_lembur + $gaji_pokok + $jkk) - ($potongan + $biaya_jabatan);
$tgl_ambil     = $_POST['tgl_ambil'];

// die(var_dump($total_gaji));

mysqli_query($koneksi, "insert into pencairan values(DEFAULT,'$kd_karyawan',$gaji_lembur,$gaji_pokok,$jkk,$potongan,$biaya_jabatan,$total_gaji,'$tgl_ambil')");

header("location:dashboard.php?page=pencairan");
?>