<?php
include 'koneksi.php';
$kd_jabatan = $_GET['kd_jabatan'];
$sql = mysqli_query($koneksi, "DELETE FROM jabatan WHERE kd_jabatan='$kd_jabatan'");

if ($sql) {
	header("location:dashboard.php?page=jabatan");
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