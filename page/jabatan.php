<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Data Jabatan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Input Jabatan</a>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<form action="dashboard.php" method="get">
							<div class="input-group">
								<input type="hidden" class="form-control" name="page" value="jabatan">
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
							<th>Kode Jabatan</th>
							<th>Nama Jabatan</th>
							<th>Masa Kerja</th>
							<th>Gaji Pokok</th>
							<th>Gaji Lembur</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$halaman = 10;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM jabatan");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);

						if(isset($_GET['cari'])){
							$cari = $_GET['cari'];
							$view = mysqli_query($koneksi, "select * from jabatan where nama_jabatan like '%".$cari."%'") or die(mysqli_error());
						} else {
							$view = mysqli_query($koneksi, "select * from jabatan order by kd_jabatan") or die(mysqli_error());
						}
						while ($data = mysqli_fetch_assoc($view)) {
						?>
						<tr>
							<td><?php echo $data['kd_jabatan']; ?></td>
							<td><?php echo $data['nama_jabatan']; ?></td>
							<td><?php echo $data['masa_kerja']; ?> Tahun</td>
							<td>Rp. <?php echo number_format($data['gaji_pokok'], 2, ".", ","); ?></td>
							<td>Rp. <?php echo number_format($data['gaji_lembur'], 2, ".", ","); ?></td>
							<td style="text-align: center;">
								<div style="table-layout: auto;" class="btn-group btn-group-justified btn-group-sm">
									<a href="dashboard.php?page=edit-jabatan&kd_jabatan=<?php echo $data['kd_jabatan']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<a href="hapus-jabatan.php?kd_jabatan=<?php echo $data['kd_jabatan']; ?>" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus !!')" data-toggle="tooltip" title="Hapus">
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
							<a href="dashboard.php?page=jabatan&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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
							<h4 class="modal-title">Input Data Jabatan</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="input-jabatan.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama_jabatan">Nama Jabatan :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="masa_kerja">Masa Kerja :</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="form-control" id="masa_kerja" name="masa_kerja" required><span class="input-group-addon" required>Tahun</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="gaji_pokok">Gaji Pokok :</label>
									<div class="col-sm-9">
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
											<span class="input-group-addon">.00</span>
										</div>
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