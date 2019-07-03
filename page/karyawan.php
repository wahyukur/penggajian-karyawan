<?php
	require_once("koneksi.php");
	$sql = "SELECT kd_karyawan FROM karyawan ORDER BY kd_karyawan DESC LIMIT 1";
	$query = mysqli_query($koneksi, $sql);
	list ($no_temp) = mysqli_fetch_row($query);
 
	if ($no_temp == '') {
		$kd_karyawan = 'K00001';
	} else {
		$jum = substr($no_temp,1,6);
		$jum++;
		if($jum <= 9) {
			$kd_karyawan = 'K0000' . $jum;
		} elseif ($jum <= 99) {
			$kd_karyawan = 'K000' . $jum;
		} elseif ($jum <= 999) {
			$kd_karyawan = 'K00' . $jum;
		} elseif ($jum <= 9999) {
			$kd_karyawan = 'K0' . $jum;
		} elseif ($jum <= 99999) {
			$kd_karyawan = 'K' . $jum; 	
		} else {
			die("Nomor urut melebihi batas");		
		}
	}
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Data Karyawan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Input Karyawan</a>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<form action="dashboard.php" method="get">
							<div class="input-group">
								<input type="hidden" class="form-control" name="page" value="karyawan">
								<input type="text" class="form-control" name="cari" placeholder="Cari Berdasarkan Nama">
								<div class="input-group-btn">
									<button class="btn" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Table -->
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Kode Karyawan</th>
							<th>Nama</th>
							<th>Nama Jabatan</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Pendidikan</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$halaman = 10;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM karyawan");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);

						if(isset($_GET['cari'])){
							$cari = $_GET['cari'];
							$view = mysqli_query($koneksi, "select * from karyawan where nama like '%".$cari."%' LIMIT $mulai, $halaman") or die(mysqli_error());
						} else {
							$view = mysqli_query($koneksi, "select * from karyawan order by kd_karyawan LIMIT $mulai, $halaman") or die(mysqli_error());
						}

						while ($data = mysqli_fetch_assoc($view)) {
						?>
						<tr>
							<td><?php echo $data['kd_karyawan']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['nama_jabatan']; ?></td>
							<td><?php echo $data['tempat_lahir']; ?></td>
							<td><?php echo date("d-m-Y", strtotime($data['tgl_lahir'])); ?></td>
							<td><?php echo $data['pendidikan']; ?></td>
							<td style="text-align: center;">
								<div style="table-layout: auto;" class="btn-group btn-group-justified btn-group-sm">
									<a href="dashboard.php?page=edit-karyawan&kd_karyawan=<?php echo $data['kd_karyawan']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<a href="dashboard.php?page=detail-karyawan&kd_karyawan=<?php echo $data['kd_karyawan']; ?>" class="btn btn-warning" data-toggle="tooltip" title="Detail">
										<span class="glyphicon glyphicon-check" aria-hidden="true"></span>
									</a>
									<a href="hapus-karyawan.php?kd_karyawan=<?php echo $data['kd_karyawan']; ?>" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus !!')" data-toggle="tooltip" title="Hapus">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<ul class="pagination" style="margin-left: 30px">
					<?php for ($i=1; $i<=$pages ; $i++){ ?>
						<li>
							<a href="dashboard.php?page=karyawan&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
						</li>
					<?php } ?>
				</ul>
			</div>

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content -->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Input Data Karyawan</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="input-karyawan.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama">ID Karyawan :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama" name="kd_karyawan" value="<?php echo $kd_karyawan ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama">Nama :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama" name="nama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="kd_jabatan">Kode Jabatan :</label>
									<div class="col-sm-9">
										<?php
										include 'koneksi.php';

										echo "<select name='kd_jabatan' id='kd_jabatan' class='form-control' required>";
										$tampil = mysqli_query($koneksi, "select * from jabatan order by kd_jabatan");
										echo "<option value=''>-Kode Jabatan-</option>";
										while ($w=mysqli_fetch_array($tampil)){
											echo "<option value='$w[kd_jabatan]'>$w[kd_jabatan] | $w[nama_jabatan]</option>";
										}
										echo "</select>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="jenis_kelamin">Jenis Kelamin :</label>
									<div class="col-sm-9">
										<div class="radio">
											<label><input type="radio" name="jenis_kelamin" value="Laki-laki" required>Laki - Laki</label>
											<label><input type="radio" name="jenis_kelamin" value="Perempuan" required>Perempuan</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="tempat_lahir">Tempat Lahir :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="tgl_lahir">Tanggal Lahir :</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="agama">Agama :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="agama" name="agama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="pendidikan">Pendidikan :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="alamat">Alamat :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="alamat" name="alamat" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3"></label>
									<div class="col-sm-9">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>