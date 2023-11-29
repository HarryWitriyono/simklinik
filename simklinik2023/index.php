<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Klinik Versi 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="assets/js/web.webmanifest">
  <link rel="apple-touch-icon" href="assets/img/icon.png">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <style>
  .nav-item a{
	   float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  }
  .nav-item a:hover{
	  background-color: #ddd;
  color: black;
  }
  .nav-item a.split{
	  float: right;
  background-color: #04AA6D;
  color: white;
  }
  .dropdown-item {
	  background-color:black;
  }
  img.avatar {padding:0px;
  width: 10%;
  border-radius: 50%;
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="assets/img/img_avatar2.png" alt="Avatar" class="avatar">&nbsp;SIM Klinik V.2023 by Harry Witriyono</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
	   <?php if (!isset($_SESSION)) session_start();
	   if (isset($_SESSION['_login'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="formpendaftaran.php" target="frmmenu">Pendaftaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formpasien.php" target="frmmenu">Rekam Medik</a>
        </li>
		    <li class="nav-item">
          <a class="nav-link" href="formdokter.php" target="frmmenu">Dokter</a>
        </li>
		    <li class="nav-item">
          <a class="nav-link" href="formpetugas.php" target="frmmenu">Petugas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formtindakan.php" target="frmmenu">Tindakan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formobat.php" target="frmmenu">Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formrawattindakan.php" target="frmmenu">Rawat Tindakan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formrawatobat.php" target="frmmenu">Rawat Obat</a>
        </li> 		
		<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Laporan</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="daftarpasien.php" target="frmmenu">Daftar Pasien</a></li>
    <li><a class="dropdown-item" href="daftarobat.php" target="frmmenu">Daftar Obat</a></li>
    <li><a class="dropdown-item" href="daftardokter.php" target="frmmenu">Daftar Dokter</a></li>
	<li><a class="dropdown-item" href="daftartindakan.php" target="frmmenu">Daftar Tindakan</a></li>
  </ul>
</li>
        <li class="nav-item">
          <a class="split" href="logout.php">Logout</a>
        </li>  		
	   <?php } else { ?>
	    <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>  
	   <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid mt-3">
  <iframe name="frmmenu" width="100%" height="500px"></iframe>
</div>

</body>
</html>


