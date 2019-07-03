<?php
$kd_lembur = $_GET['kd_lembur'];

include 'koneksi.php';
$view = mysqli_query($koneksi, "select * from lembur where kd_lembur = '$kd_lembur'") or die(mysqli_error());
$data = mysqli_fetch_array($view);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edit Lembur</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="update-lembur.php" method="post">
			<input type="hidden" name="kd_lembur" value="<?php echo $data['kd_lembur']; ?>">
			<div class="form-group">
				<label class="control-label col-sm-3" for="kd_karyawan">Kode Karyawan :</label>
				<div class="col-sm-9">
				<?php
					include 'koneksi.php';
					echo "<select name='kd_karyawan' id='kd_karyawan' class='form-control'>";
					$tampil = mysqli_query($koneksi, "select * from karyawan order by kd_karyawan");
					echo "<option value=''>-Kode Karyawan-</option>";
					while ($w=mysqli_fetch_array($tampil)){
						echo "<option value='$w[kd_karyawan]'"
				?>
				<?php 
						if ($w['kd_karyawan']==$data['kd_karyawan']) { 
							echo "selected=\"selected\""; 
						}
						echo ">$w[kd_karyawan] | $w[nama]</option>";
					}
					echo "</select>";
				?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="nama">Nama :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="nama_jabatan">Nama Jabatan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?php echo $data['nama_jabatan']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="tgl_lembur">Tgl Lembur :</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="tgl_lembur" name="tgl_lembur" value="<?php echo $data['tgl_lembur']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="lama_lembur">Lama Lembur :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="number" class="form-control" id="lama_lembur" name="lama_lembur" value="<?php echo $data['lama_lembur']; ?>"><span class="input-group-addon">Jam</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="dashboard.php?page=lembur" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>