<?php
ob_start(); 

$tanggal = date('d/m/Y');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pencairan</title>
	<style>
	table{
		border-collapse: collapse;
		width: 100%;
		margin: 0 auto;
	}
	table th{
		border:1px solid #000;
		padding: 3px;
		font-weight: bold;
		text-align: center;
	}
	table td{
		border:1px solid #000;
		padding: 3px;
		vertical-align: top;
	}
	</style>
</head>
<body style="width: 100%">
	<p style="text-align: right;">Cetak pada : <?php echo $tanggal; ?></p>
	<h2 style="text-align: center; margin-bottom: 0px">CV. Berkat Rahmat Jaya</h2>
	<h4 style="text-align: center; margin-top: 0px">Alamat : Perum Tas 2 Blok N-12/09 Kalisampurno – Tanggulangin Sidoarjo</h4>
	<HR WIDTH=100%>
	<br><br>
	<table style="width: 100%">
		<tr>
			<th style="font-size: 13.9px">Kode <br> Karyawan</th>
			<th style="font-size: 13.9px">Gaji Lembur</th>
			<th style="font-size: 13.9px">Gaji Pokok</th>
			<th style="font-size: 13.9px">JKK</th>
			<th style="font-size: 13.9px">Potongan <br> (Kehadiran)</th>
			<th style="font-size: 13.9px">Potongan <br> (Biaya Jabatan)</th>
			<th style="font-size: 13.9px">Total Gaji</th>
			<th style="font-size: 13.9px">Tanggal Ambil</th>
    	</tr>
    	<?php
    		if(isset($_GET['tgl'])){
    			$tgl = $_GET['tgl'];
    		} else {
    			$tgl = $tanggal;
    		}

			include 'koneksi.php';
			$view = mysqli_query($koneksi, "select * from pencairan where tgl_ambil = '$tgl'") or die(mysqli_error());
			while ($data = mysqli_fetch_array($view)) {
		?>
		<tr>
			<td style="font-size: 12px"><?php echo $data['kd_karyawan']; ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['gaji_lembur'], 2, ".", ","); ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['gaji_pokok'], 2, ".", ","); ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['jkk'], 2, ".", ","); ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['potongan'], 2, ".", ","); ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['biaya_jabatan'], 2, ".", ","); ?></td>
			<td style="font-size: 12px">Rp. <?php echo number_format($data['total_gaji'], 2, ".", ","); ?></td>
			<td style="font-size: 12px"><?php echo $data['tgl_ambil']; ?></td>
		</tr>
		<?php }?>
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
	$html2pdf->Output('Laporan Data Pencairan.pdf');
}
catch(HTML2PDF_exception $e) { echo $e; }
?>