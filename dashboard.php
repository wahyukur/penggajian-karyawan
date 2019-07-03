<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:./index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<title>SISTEM PENGGAJIAN KARYAWAN</title>
</head>
<body style="background-color: #7f8c8d;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default sidebar" role="navigation">
				    <div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="dashboard.php?page=home" style="height: auto;">
								<img src="img/logono.png" style="width: 75%; margin: auto;">
							</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="dashboard.php?page=home">Home
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
								<li ><a href="dashboard.php?page=karyawan">Data Karyawan
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
								<li ><a href="dashboard.php?page=jabatan">Data Jabatan
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-education"></span></a></li>
								<li ><a href="dashboard.php?page=presensi">Data Presensi
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
								<li ><a href="dashboard.php?page=lembur">Data Lembur
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-eye-open"></span></a></li>
								<li ><a href="dashboard.php?page=pencairan">Data Pencairan
									<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-gift"></span></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
									<ul class="dropdown-menu forAnimate" role="menu">
										<li><a href="dashboard.php?page=ganti-password">Ganti Password</a></li>
										<li class="divider"></li>
										<li><a href="logout.php">LogOut</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="main">

					<?php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];

						switch ($page) {
							case 'home':
								include 'page/home.php';
								break;

							case 'karyawan':
								include 'page/karyawan.php';
								break;

							case 'edit-karyawan':
								include 'page/edit-karyawan.php';
								break;

							case 'detail-karyawan':
								include 'page/detail-karyawan.php';
								break;

							case 'jabatan':
								include 'page/jabatan.php';
								break;

							case 'edit-jabatan':
								include 'page/edit-jabatan.php';
								break;

							case 'presensi':
								include 'page/presensi.php';
								break;

							case 'edit-presensi':
								include 'page/edit-presensi.php';
								break;

							case 'lembur':
								include 'page/lembur.php';
								break;

							case 'edit-lembur':
								include 'page/edit-lembur.php';
								break;

							case 'pencairan':
								include 'page/pencairan.php';
								break;

							case 'edit-pencairan':
								include 'page/edit-pencairan.php';
								break;

							case 'ganti-password':
								include 'page/ganti-password.php';
								break;

							default:
								echo "<center><h2>Maaf Halaman Tidak Ditemukan</h2></center>";
								break;
						}
					}else{
						include 'page/home.php';
					}
					?>
				</div>
			</div>
		</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	function htmlbodyHeightUpdate(){
    		var height3 = $( window ).height()
    		var height1 = $('.nav').height()+50
    		height2 = $('.main').height()
    		if(height2 > height3){
    			$('html').height(Math.max(height1,height3,height2)+10);
    			$('body').height(Math.max(height1,height3,height2)+10);
    		}else {
    			$('html').height(Math.max(height1,height3,height2));
    			$('body').height(Math.max(height1,height3,height2));
    		}
    	}
    	$(document).ready(function () {
    		htmlbodyHeightUpdate()
    		$( window ).resize(function() {
    			htmlbodyHeightUpdate()
    		});
    		$( window ).scroll(function() {
    			height2 = $('.main').height()
    			htmlbodyHeightUpdate()
    		});
    	});
    </script>
</body>
</html>