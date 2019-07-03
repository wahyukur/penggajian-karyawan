<?php
$kd_cair = $_GET['kd_cair'];

include 'koneksi.php';
$view = mysqli_query($koneksi, "select * from pencairan where kd_cair = '$kd_cair'") or die(mysqli_error());
$data = mysqli_fetch_array($view);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edit Pencairan</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="update-pencairan.php" method="post">
			<input type="hidden" name="kd_cair" value="<?php echo $data['kd_cair']; ?>">
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
			<!-- <div class="form-group">
				<label class="control-label col-sm-3" for="gaji_lembur">Gaji Lembur :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="gaji_lembur" name="gaji_lembur" value="<?php //echo $data['gaji_lembur']; ?>">
						<span class="input-group-addon">.00</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="gaji_pokok">Gaji Pokok :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?php //echo $data['gaji_pokok']; ?>">
						<span class="input-group-addon">.00</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="total_gaji">Total Gaji :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="total_gaji" name="total_gaji" value="<?php //echo $data['total_gaji']; ?>">
						<span class="input-group-addon">.00</span>
					</div>
				</div>
			</div> -->
			<div class="form-group">
				<label class="control-label col-sm-3" for="tgl_ambil">Tgl Ambil :</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="tgl_ambil" name="tgl_ambil" value="<?php echo $data['tgl_ambil']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="dashboard.php?page=pencairan" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>