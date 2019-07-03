<?php 
session_start();

$_SESSION['login'] = false;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			body, html {
				height: 100%;
			}
			.container{
				background-image: url(img/konstruksi.jpg);
				height: 100%;
				width: 100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
			img{
				display: block;
				margin: auto;
				width: 50%;
				opacity: 1;
			}
			.thumbnail{
				margin-top: 20px;
				opacity: 0.9;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-offset-4 col-md-4 col-md-offset-4">
					<?php 
					if (isset($_GET['msg'])) {
						$msg = $_GET['msg'];

						switch ($msg) {
							case 'gagal':
								echo '<div class="alert alert-danger" style="margin-top: 10px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login Gagal, Periksa Username dan Password anda</div>';
								break;

							default:
								echo "<center><h2>Maaf Halaman Tidak Ditemukan</h2></center>";
								break;
						}
					}
					?>

					<div class="thumbnail">
						<img src="img/logo.png" alt="logo">
						<div class="caption">
							<form action="login.php" method="post">
								<div class="form-group">
									<label for="username">Username :</label>
									<input type="text" id="username" name="username" class="form-control">
								</div>
								<div class="form-group">
									<label for="password">Password :</label>
									<input type="password" id="password" name="password" class="form-control">
								</div>
								<input type="submit" name="login" value="Login" class="btn btn-primary">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
