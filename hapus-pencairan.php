<?php
include 'koneksi.php';
$kd_cair = $_GET['kd_cair'];
$sql = mysqli_query($koneksi, "DELETE FROM pencairan WHERE kd_cair='$kd_cair'");

if ($sql) {
	header("location:dashboard.php?page=pencairan");
} else {
	// die(mysqli_error());
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