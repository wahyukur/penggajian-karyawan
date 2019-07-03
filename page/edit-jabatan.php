<?php
$kd_jabatan = $_GET['kd_jabatan'];

include 'koneksi.php';
$view = mysqli_query($koneksi, "select * from jabatan where kd_jabatan = '$kd_jabatan'") or die(mysqli_error());
$data = mysqli_fetch_array($view);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edit Jabatan</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="update-jabatan.php" method="post">
			<input type="hidden" name="kd_jabatan" value="<?php echo $data['kd_jabatan']; ?>">
			<div class="form-group">
				<label class="control-label col-sm-3" for="nama_jabatan">Nama Jabatan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?php echo $data['nama_jabatan']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="masa_kerja">Masa Kerja :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="number" class="form-control" id="masa_kerja" name="masa_kerja" value="<?php echo $data['masa_kerja']; ?>"><span class="input-group-addon">Tahun</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="gaji_pokok">Gaji Pokok :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?php echo $data['gaji_pokok']; ?>">
						<span class="input-group-addon">.00</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="dashboard.php?page=jabatan" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>