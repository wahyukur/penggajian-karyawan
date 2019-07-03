<?php 
$koneksi = mysqli_connect("localhost", "root", "");
$db      = mysqli_select_db($koneksi,"penggajian");

if (!$koneksi) {
    die("Database connection failed");
}
if (!$db) {
    die("Database selection failed: " . mysqli_error($koneksi));
}
?>