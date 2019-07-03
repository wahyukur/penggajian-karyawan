<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Data Lembur</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Input Lembur</a>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<form action="dashboard.php" method="get">
							<div class="input-group">
								<input type="hidden" class="form-control" name="page" value="lembur">
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
							<th>Kode Lembur</th>
							<th>Kode Karyawan</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Tgl Lembur</th>
							<th>Lama Lembur</th>
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
							$view = mysqli_query($koneksi, "select * from lembur where nama like '%".$cari."%'") or die(mysqli_error());
						} else {
							$view = mysqli_query($koneksi, "select * from lembur order by kd_lembur") or die(mysqli_error());
						}
						while ($data = mysqli_fetch_assoc($view)) {
						?>
						<tr>
							<td><?php echo $data['kd_lembur']; ?></td>
							<td><?php echo $data['kd_karyawan']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['nama_jabatan']; ?></td>
							<td><?php echo date("d-m-Y", strtotime($data['tgl_lembur'])); ?></td>
							<td><?php echo $data['lama_lembur']; ?> Jam</td>
							<td>Rp. <?php echo number_format($data['gaji_lembur'], 2, ".", ","); ?></td>
							<td style="text-align: center;">
								<div style="table-layout: auto;" class="btn-group btn-group-justified btn-group-sm">
									<a href="dashboard.php?page=edit-lembur&kd_lembur=<?php echo $data['kd_lembur']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<a href="hapus-lembur.php?kd_lembur=<?php echo $data['kd_lembur']; ?>" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus !!')" data-toggle="tooltip" title="Hapus">
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
							<a href="dashboard.php?page=lembur&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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
							<h4 class="modal-title">Input Data Lembur</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="input-lembur.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="kd_karyawan">Kode Karyawan :</label>
									<div class="col-sm-9">
										<?php
										include 'koneksi.php';
										$tampil = mysqli_query($koneksi, "SELECT karyawan.kd_karyawan, karyawan.nama, jabatan.nama_jabatan FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan=jabatan.kd_jabatan;");
										$jsArray = "var namaKar = new Array();\n";

										echo '<select name="kd_karyawan" onchange="changeValue(this.value)" id="kd_karyawan" class="form-control" required>';
										echo "<option value=''>-Kode Karyawan-</option>";
										while ($w=mysqli_fetch_array($tampil)){
											echo "<option value='$w[kd_karyawan]'>$w[kd_karyawan] | $w[nama]</option>";
											
											$jsArray .= "namaKar['" . $w['kd_karyawan'] . "'] = {
												name:'" . addslashes($w['nama']) . "',
												desc:'".addslashes($w['nama_jabatan'])."'
											};\n";
										}
										echo "</select>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama">Nama :</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text" class="form-control" id="nama" name="nama" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama_jabatan">Nama Jabatan :</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="tgl_lembur">Tgl Lembur :</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="tgl_lembur" name="tgl_lembur" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="lama_lembur">Lama Lembur :</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="form-control" id="lama_lembur" name="lama_lembur" required><span class="input-group-addon">Jam</span>
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
<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id){
		document.getElementById('nama').value = namaKar[id].name;
		document.getElementById('nama_jabatan').value = namaKar[id].desc;
	};
</script> 