<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-body">
				<h1 style="margin-top: 3px; padding-bottom: 10px;">Ganti Password</h1>

				<div class="row">
					<div class="col-md-7 col-md-offset-3">
						<form class="form-horizontal" action="ganti-pswd.php" method="post">
							<div class="form-group">
								<label for="pswlama">Password Lama :</label>
								<input type="password" class="form-control input-lg" id="pswlama" name="pswlama">
							</div>
							<div class="form-group">
								<label for="pswbaru">Password Baru :</label>
								<input type="password" class="form-control input-lg" id="pswbaru" name="pswbaru">
							</div>
							<div class="form-group">
								<label for="kpswbaru">Konfirmasi Password Baru :</label>
								<input type="password" class="form-control input-lg" id="kpswbaru" name="kpswbaru">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="dashboard.php?page=home" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>