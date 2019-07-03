<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Detail Data Karyawan</h3>
			</div>
			<div class="panel-body">
				<!-- Table -->
				<div class="table-responsive">
					<table class="table table-striped">
						<?php
							$kd_karyawan = $_GET['kd_karyawan'];
							include 'koneksi.php';
							$view = mysqli_query($koneksi, "select * from karyawan inner join jabatan on karyawan.kd_jabatan=jabatan.kd_jabatan where kd_karyawan = '$kd_karyawan'") or die(mysqli_error());
							while ($data = mysqli_fetch_array($view)) {
						?>
						<tr>
							<th width="20%">Kode Karyawan</th>
                        	<th width="3%">:</th>
	                        <td><?php echo $data['kd_karyawan']; ?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td><?php echo $data['nama']; ?></td>
						</tr>
						<tr>
							<th>Kode Jabatan</th>
							<th>:</th>
							<td><?php echo $data['kd_jabatan']." (".$data['nama_jabatan'].")"; ?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<th>:</th>
							<td><?php echo $data['jenis_kelamin']; ?></td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<th>:</th>
							<td><?php echo $data['tempat_lahir']; ?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<th>:</th>
							<td><?php echo $data['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<th>:</th>
							<td><?php echo $data['agama']; ?></td>
						</tr>
						<tr>
							<th>Pendidikan</th>
							<th>:</th>
							<td><?php echo $data['pendidikan']; ?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?php echo $data['alamat']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>