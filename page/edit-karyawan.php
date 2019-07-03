<?php
$kd_karyawan = $_GET['kd_karyawan'];

include 'koneksi.php';
$view = mysqli_query($koneksi, "select * from karyawan where kd_karyawan = '$kd_karyawan'") or die(mysqli_error());
$data = mysqli_fetch_array($view);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edit Karyawan</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="update-karyawan.php" method="post">
			<input type="hidden" class="form-control" name="kd_karyawan" value="<?php echo $data['kd_karyawan']; ?>">
			<div class="form-group">
				<label class="control-label col-sm-3" for="nama">Nama :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="kd_jabatan">Kode Jabatan :</label>
				<div class="col-sm-9">
				<?php
					include 'koneksi.php';
					echo "<select name='kd_jabatan' id='kd_jabatan' class='form-control'>";
					$tampil = mysqli_query($koneksi, "select * from jabatan order by kd_jabatan");
					echo "<option value=''>-Kode Jabatan-</option>";
					while ($w=mysqli_fetch_array($tampil)){
						echo "<option value='$w[kd_jabatan]'"
				?>
				<?php 
						if ($w['kd_jabatan']==$data['kd_jabatan']) { 
							echo "selected=\"selected\""; 
						}
						echo ">$w[kd_jabatan] | $w[nama_jabatan]</option>";
					}
					echo "</select>";
				?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="jenis_kelamin">Jenis Kelamin :</label>
				<div class="col-sm-9">
					<div class="radio">
						<label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($data['jenis_kelamin']=='Laki-laki'){echo 'checked';}?>>Laki - Laki</label>
						<label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan'){echo 'checked';}?>>Perempuan</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="tempat_lahir">Tempat Lahir :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="tgl_lahir">Tanggal Lahir :</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="agama">Agama :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data['agama']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="pendidikan">Pendidikan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?php echo $data['pendidikan']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="alamat">Alamat :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3"></label>
				<div class="col-sm-9">
					<button type="submit" class="btn btn-primary">Edit</button>
					<a href="dashboard.php?page=karyawan" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>