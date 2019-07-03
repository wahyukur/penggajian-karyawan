<?php
include 'koneksi.php';
$kd_karyawan = $_GET['kd_karyawan'];
$sql = mysqli_query($koneksi, "DELETE FROM karyawan WHERE kd_karyawan='$kd_karyawan'");

if ($sql) {
	header("location:dashboard.php?page=karyawan");
} else {
	// die(mysql_error());
	echo "<h2>Error Operation</h2>";
	echo "<br/>";
	echo "Error Massage : ".mysqli_error();
	echo "<br/>";
	echo "<button onclick='goBack()'><< Go Back</button>";
}
?>
<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>