<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-body">
				<h1 style="margin-top: 3px; padding-bottom: 10px;">Dashboard</h1>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-user fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<?php
										include 'koneksi.php';
										$view = mysqli_query($koneksi, "SELECT COUNT(kd_karyawan) as jmlkar FROM karyawan") or die(mysqli_error());
										$w = mysqli_fetch_array($view);
									?>
									<p class="announcement-heading" style="font-size: 30px; margin: 0px 0px 0px 0px;"><?php echo $w['jmlkar']; ?></p>
									<strong><p class="announcement-text">Karyawan</p></strong>
								</div>
							</div>
						</div>
						<a href="dashboard.php?page=karyawan">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										View
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-graduation-cap fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<?php
										include 'koneksi.php';
										$view = mysqli_query($koneksi, "SELECT COUNT(kd_jabatan) as jmljab FROM jabatan") or die(mysqli_error());
										$w = mysqli_fetch_array($view);
									?>
									<p class="announcement-heading" style="font-size: 30px; margin: 0px 0px 0px 0px;"><?php echo $w['jmljab']; ?></p>
									<strong><p class="announcement-text">Jabatan</p></strong>
								</div>
							</div>
						</div>
						<a href="dashboard.php?page=jabatan">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										View
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-list-ul fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<?php
										include 'koneksi.php';
										$view = mysqli_query($koneksi, "SELECT COUNT(kd_presensi) as jmlpre FROM presensi") or die(mysqli_error());
										$w = mysqli_fetch_array($view);
									?>
									<p class="announcement-heading" style="font-size: 30px; margin: 0px 0px 0px 0px;"><?php echo $w['jmlpre']; ?></p>
									<strong><p class="announcement-text">Presensi</p></strong>
								</div>
							</div>
						</div>
						<a href="dashboard.php?page=presensi">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										View
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-eye fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<?php
										include 'koneksi.php';
										$view = mysqli_query($koneksi, "SELECT COUNT(kd_lembur) as jmllem FROM lembur") or die(mysqli_error());
										$w = mysqli_fetch_array($view);
									?>
									<p class="announcement-heading" style="font-size: 30px; margin: 0px 0px 0px 0px;"><?php echo $w['jmllem']; ?></p>
									<strong><p class="announcement-text">Lembur</p></strong>
								</div>
							</div>
						</div>
						<a href="dashboard.php?page=lembur">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										View
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="row" style="margin-top:10px; padding: 0 0px;">
					<div class="col-md-8">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<h3 class="panel-title">Presensi Periode <?php echo date('F Y'); ?>
										<a data-toggle="collapse" href="#collapse1" class="pull-right"><span style="cursor: pointer; font-size: 15px; margin-top: -20px;"><i class="glyphicon glyphicon-chevron-up"></i></span></a></h3>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapsed">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th width="20%" style="text-align: center;">Kode Presensi</th>
														<th width="20%" style="text-align: center;">Kode Karyawan</th>
														<th width="40%" style="text-align: center;">Nama</th>
														<th width="20%" style="text-align: center;">Keterangan</th>
													</tr>
												</thead>
												<tbody>
													<?php
													include 'koneksi.php';
													$view = mysqli_query($koneksi, "SELECT * from presensi where month(tgl_presensi) = month(now()) and year(tgl_presensi) = year(now())") or die(mysqli_error());
													while ($data = mysqli_fetch_array($view)) {
													?>
													<tr>
														<td style="text-align: center;"><?php echo $data['kd_presensi']; ?></td>
														<td style="text-align: center;"><?php echo $data['kd_karyawan']; ?></td>
														<td><?php echo $data['nama']; ?></td>
														<td style="text-align: center;"><?php echo $data['keterangan']; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<h3 class="panel-title">Lembur Periode <?php echo date('F Y'); ?>
										<a data-toggle="collapse" href="#collapse2" class="pull-right"><span style="cursor: pointer; font-size: 15px; margin-top: -20px;"><i class="glyphicon glyphicon-chevron-up"></i></span></a></h3>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapsed">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th width="20%" style="text-align: center;">Kode Karyawan</th>
														<th width="40%" style="text-align: center;">Tanggal</th>
														<th width="20%" style="text-align: center;">Lama Lembur</th>
													</tr>
												</thead>
												<tbody>
													<?php
													include 'koneksi.php';
													$view = mysqli_query($koneksi, "SELECT * from lembur where month(tgl_lembur) = month(now()) and year(tgl_lembur) = year(now())") or die(mysqli_error());
													while ($data = mysqli_fetch_array($view)) {
													?>
													<tr>
														<td style="text-align: center;"><?php echo $data['kd_karyawan']; ?></td>
														<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($data['tgl_lembur'])); ?></td>
														<td style="text-align: center;"><?php echo $data['lama_lembur']; ?> Jam</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>