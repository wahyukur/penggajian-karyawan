<?php
$kd_presensi = $_GET['kd_presensi'];

include 'koneksi.php';
$view = mysqli_query($koneksi, "select * from presensi where kd_presensi = '$kd_presensi'") or die(mysqli_error());
$data = mysqli_fetch_array($view);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edit Presensi</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="update-presensi.php" method="post">
			<input type="hidden" class="form-control" name="kd_presensi" value="<?php echo $data['kd_presensi']; ?>">
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
				<label class="control-label col-sm-3" for="tgl_presensi">Tanggal Presensi :</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="tgl_presensi" name="tgl_presensi" value="<?php echo $data['tgl_presensi']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="keterangan">Keterangan :</label>
				<div class="col-sm-9">
					<div class="radio">
						<label><input type="radio" name="keterangan" value="A" <?php if($data['keterangan']=='A'){echo 'checked';}?>>A</label>
						<label><input type="radio" name="keterangan" value="I" <?php if($data['keterangan']=='I'){echo 'checked';}?>>I</label>
						<label><input type="radio" name="keterangan" value="S" <?php if($data['keterangan']=='S'){echo 'checked';}?>>S</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="potongan">Potongan :</label>
				<div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon">Rp</span>
						<input type="number" class="form-control" id="potongan" name="potongan" value="<?php echo $data['potongan']; ?>">
						<span class="input-group-addon">.00</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Edit</button>
					<a href="dashboard.php?page=presensi" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>