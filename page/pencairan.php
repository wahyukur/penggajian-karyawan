<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3>Data Pencairan</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Input Pencairan</a>
						<a href="print.php" target="_blank" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>  Print PDF</a>
					</div>
					<div class="col-md-4">
						<form action="print.php" method="get">
							<div class="input-group">
								<input type="date" class="form-control" name="tgl" placeholder="Print Berdasarkan Tanggal Ambil">
								<div class="input-group-btn">
									<button class="btn btn-info" type="submit">
										<i class="glyphicon glyphicon-print"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-4">
						<form action="dashboard.php" method="get">
							<div class="input-group">
								<input type="hidden" class="form-control" name="page" value="pencairan">
								<input type="text" class="form-control" name="cari" placeholder="Cari Berdasarkan Kode Karyawan">
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
							<th style="font-size: 14px">Kode <br> Karyawan</th>
							<th style="font-size: 14px">Gaji Lembur</th>
							<th style="font-size: 14px">Gaji Pokok</th>
							<th style="font-size: 14px">JKK</th>
							<th style="font-size: 14px">Potongan <br> (Kehadiran)</th>
							<th style="font-size: 14px">Potongan <br> (Biaya Jabatan)</th>
							<th style="font-size: 14px">Total Gaji</th>
							<th style="font-size: 14px">Tanggal Ambil</th>
							<th style="text-align: center; font-size: 14px;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$halaman = 10;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM pencairan");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);

						if(isset($_GET['cari'])){
							$cari = $_GET['cari'];
							$view = mysqli_query($koneksi, "select * from pencairan where kd_karyawan like '%".$cari."%'") or die(mysqli_error());
						} else {
							$view = mysqli_query($koneksi, "select * from pencairan order by kd_cair") or die(mysqli_error());
						}
						while ($data = mysqli_fetch_assoc($view)) {
						?>
						<tr>
							<td style="font-size: 13px"><?php echo $data['kd_karyawan']; ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['gaji_lembur'], 2, ".", ","); ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['gaji_pokok'], 2, ".", ","); ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['jkk'], 2, ".", ","); ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['potongan'], 2, ".", ","); ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['biaya_jabatan'], 2, ".", ","); ?></td>
							<td style="font-size: 13px">Rp. <?php echo number_format($data['total_gaji'], 2, ".", ","); ?></td>
							<td style="font-size: 13px"><?php echo date("d-m-Y", strtotime($data['tgl_ambil'])); ?></td>
							<td style="text-align: center;">
								<div style="table-layout: auto;" class="btn-group btn-group-justified btn-group-sm" >
									<a href="dashboard.php?page=edit-pencairan&kd_cair=<?php echo $data['kd_cair']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</a>
									<a href="hapus-pencairan.php?kd_cair=<?php echo $data['kd_cair']; ?>" class="btn btn-danger" onclick="return confirm('Konfirmasi Hapus !!')" data-toggle="tooltip" title="Hapus">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</a>
									<a href="print_slipgaji.php?kd_karyawan=<?php echo $data['kd_karyawan']; ?>" class="btn btn-info" target="_blank" data-toggle="tooltip" title="Print Slip">
										<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
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
							<a href="dashboard.php?page=pencairan&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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
							<h4 class="modal-title">Input Data Pencairan</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="input-pencairan.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="kd_karyawan">Kode Karyawan :</label>
									<div class="col-sm-9">
										<?php
										include 'koneksi.php';

										echo "<select name='kd_karyawan' id='kd_karyawan' class='form-control' required>";
										$tampil = mysqli_query($koneksi, "select * from karyawan order by kd_karyawan");
										echo "<option value=''>-Kode Karyawan-</option>";
										while ($w=mysqli_fetch_array($tampil)){
											echo "<option value='$w[kd_karyawan]'>$w[kd_karyawan] | $w[nama]</option>";
										}
										echo "</select>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="tgl_ambil">Tanggal Ambil :</label>
									<div class="col-sm-9">
										<input type="date" class="form-control" id="tgl_ambil" name="tgl_ambil" required>
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