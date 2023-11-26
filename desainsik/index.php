<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Klinik Versi 2023</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-success text-left">
				Sistem Informasi Klinik Versi 2023 - Login System
			</h3>
			<div class="carousel slide" id="carousel-996517">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-996517" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-996517">
					</li>
					<li data-slide-to="2" data-target="#carousel-996517">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg">
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="https://www.layoutit.com/img/sports-q-c-1600-500-2.jpg">
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="https://www.layoutit.com/img/sports-q-c-1600-500-3.jpg">
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-996517" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-996517" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg">
			<p>
				Selamat datang di Sistem Informasi Klinik Versi 2023.  Silakan login pada form berikut ini untuk penggunaan aplikasinya.
			</p>
		</div>
		<div class="col-md-6">
			<form role="form" method="post">
				<div class="form-group">
					 
					<label for="Username">
						Username
					</label>
					<input type="text" class="form-control" id="Username" name="Username">
				</div>
				<div class="form-group">
					 
					<label for="Password">
						Password
					</label>
					<input type="password" class="form-control" id="Password" name="Password">
				</div>
				<button type="submit" class="btn btn-primary" name="bLogin">
					Submit
				</button>
			</form>
		</div>
	</div>
	<?php 
	if (isset($_POST['bLogin'])) {
		$Username=filter_var($_POST['Username'],FILTER_SANITIZE_STRING);
		$Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
		include('koneksi.db.php');
		$sql="select * from petugas where Username='".$Username."' and Password='".$Password."'";
	$q=mysqli_query($koneksi,$sql);
	$r=mysqli_fetch_array($q);
	if (empty($r)) {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
  <strong>Gagal Login</strong> Login Aplikasi anda gagal, hubungi Admin Aplikasi Anda !</div>';
		exit();
	} else {
		if (!isset($_SESSION)) session_start();
		$_SESSION['_login']=$r['KodePetugas'];
        $_SESSION['_level']=$r['Level'];
		echo '<script>window.location.replace("menuutama.php");</script>';
	}	
	}
	?>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>