<?php 
ob_start(); 

include 'koneksi.php';

$kd_karyawan = $_GET['kd_karyawan'];

$sqlkr = mysqli_query($koneksi, "select * from karyawan where kd_karyawan = '$kd_karyawan'") or die(mysqli_error());
$kr = mysqli_fetch_array($sqlkr);
$sqljb = mysqli_query($koneksi, "select * from jabatan where kd_jabatan = '".$kr['kd_jabatan']."'") or die(mysqli_error());
$jb = mysqli_fetch_array($sqljb);
$sqlpc = mysqli_query($koneksi, "select * from pencairan where kd_karyawan = '".$kr['kd_karyawan']."'") or die(mysqli_error());
$pc = mysqli_fetch_array($sqlpc);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Slip Gaji Karyawan</title>
	<style>
	table{
		border-collapse: collapse;
		width: 100%;
		margin: 0 auto;
	}
	table td{
		border:0px solid #000;
		padding: 10px;
		vertical-align: top;
	}
	</style>
</head>
<body style="padding-top: 20px;">
	<table width="100%">
		<td width="35%">
			<h2 style="margin: 0px 0px 5px 0px;"><strong>CV. Berkat Rahmat Jaya</strong></h2>
			<p style="margin: 0px 0px 5px 0px;">Perum Tas 2 Blok N-12/09 Kalisampurno</p>
			<p style="margin: 0px 0px 5px 0px;">Tanggulangin Sidoarjo</p>
		</td>
		<td width="30%">
			<h1 style="margin: 0px 0px 20px 0px; text-align: center;"><strong>SLIP GAJI</strong></h1>
			<p style="margin: 0px 0px 0px 0px; text-align: center;"><?php echo date('F Y'); ?></p>
		</td>
		<td width="35%" style="padding-left: 30px">
			<p style="margin: 10px 0px 10px 50px;">Tanggal : <?php echo date('d/m/Y'); ?></p>
			<p style="margin: 10px 0px 0px 50px;">Kode Karyawan : <?php echo $kr['kd_karyawan']; ?></p>
		</td>
	</table>
	<br><br><br><br><br><br>
	<hr width="100%" style="margin-bottom: 0px; margin-top: 0px;">
	<table width="100%">
		<td width="40%">
			<p style="margin: 0px 0px 10px 10px;">Nama      : <?php echo $kr['nama']; ?></p>
			<p style="margin: 0px 0px 0px 10px;">Jabatan   : <?php echo $jb['nama_jabatan']; ?></p>
		</td>
		<td width="60%">
			<p style="margin: 0px 0px 10px 70px;">Alamat     : <?php echo $kr['alamat']; ?></p>
			<p style="margin: 0px 0px 0px 70px;">Pendidikan : <?php echo $kr['pendidikan']; ?></p>
		</td>
	</table>
	<br><br><br><br>
	<hr width="100%">
	<table>
		<td width="20%"><p style="margin: -10px 0px -10px 0px;">NO</p></td>
		<td width="50%"><p style="margin: -10px 0px -10px 50px;">KETERANGAN</p></td>
		<td width="30%"><p style="margin: -10px 0px -10px 350px;">JUMLAH</p></td>
	</table>
	<br>
	<hr width="100%" style="margin-bottom: 0px; margin-top: 0px;">
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;">1</p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 50px;">Gaji Pokok</p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 370px;">Rp. <?php echo number_format($pc['gaji_pokok'], 2, ".", ","); ?></p></td>
	</table>
	<br><br>
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;">2</p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 50px;">Gaji Lembur</p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 363px;">Rp. <?php echo number_format($pc['gaji_lembur'], 2, ".", ","); ?></p></td>
	</table>
	<br><br>
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;">3</p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 50px;">JKK(Jaminan Kecelakaan Kerja)</p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 243px;">Rp. <?php echo number_format($pc['jkk'], 2, ".", ","); ?></p></td>
	</table>
	<br><br>
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;">4</p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 50px;">Potongan (Kehadiran)</p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 306px;">Rp. <?php echo number_format($pc['potongan'], 2, ".", ","); ?></p></td>
	</table>
	<br><br>
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;">5</p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 50px;">Potongan (Biaya Jabatan)</p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 284px;">Rp. <?php echo number_format($pc['biaya_jabatan'], 2, ".", ","); ?></p></td>
	</table>
	<br><br><br><br><br>
	<hr width="100%" style="margin-bottom: 0px; margin-top: 0px;">
	<table>
		<td width="20%"><p style="margin: 0px 0px 0px 0px;"></p></td>
		<td width="50%"><p style="margin: 0px 0px 0px 390px;"><strong>Total Diterima : </strong></p></td>
		<td width="30%"><p style="margin: 0px 0px 0px 0px;">Rp. <?php echo number_format($pc['total_gaji'], 2, ".", ","); ?></p></td>
	</table>

	<table>
		<td width="50%">
			<p style="margin: 30px 0px 0px 95px;">Disetujui, </p>
			<p style="margin: 65px 0px 0px 80px;"><u>Lilis Sulistiowati</u></p>
			<p style="margin: 0px 0px 0px 40px;">Administrasi & Kepegawaian</p>
		</td>
		<td width="50%"><p style="text-align: center;"></p></td>
	</table>
</body>
</html>

<?php
$content = ob_get_clean();

require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
try {
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content);
	ob_end_clean();
	$html2pdf->Output('Slip Gaji '.$kd_karyawan.' Periode '.date('F Y').'.pdf', 'D');
}
catch(HTML2PDF_exception $e) { echo $e; }
?>