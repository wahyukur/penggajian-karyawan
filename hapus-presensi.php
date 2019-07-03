<?php
include 'koneksi.php';
$kd_presensi = $_GET['kd_presensi'];
$sql = mysqli_query($koneksi, "DELETE FROM presensi WHERE kd_presensi='$kd_presensi'");

if ($sql) {
	header("location:dashboard.php?page=presensi");
} else {
	// die(mysql_error());
	echo "<h2>Error Operation</h2>";
	echo "<br/>";
	echo "Error Massage : ".mysql_error();
	echo "<br/>";
	echo "<button onclick='goBack()'><< Go Back</button>";
}
?>
<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>