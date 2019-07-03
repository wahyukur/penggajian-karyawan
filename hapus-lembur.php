<?php
include 'koneksi.php';
$kd_lembur = $_GET['kd_lembur'];
$sql = mysqli_query($koneksi, "DELETE FROM lembur WHERE kd_lembur='$kd_lembur'");

if ($sql) {
	header("location:dashboard.php?page=lembur");
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