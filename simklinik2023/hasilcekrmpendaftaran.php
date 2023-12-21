<?php if (!isset($_SESSION)) session_start(); 
if (empty($_SESSION['_login'])) {
  header('location:index.php');
  exit();
}
?>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
<body>
<div class="container">
<h2>Pendaftaran Pasien</h2>
<?php if (isset($_POST['submit'])) {
    $NomorRekamMedik=filter_var($_POST['NomorRekamMedik'],FILTER_SANITIZE_STRING);
    $Keluhan=filter_var($_POST['Keluhan'],FILTER_SANITIZE_STRING);
    $KodeDokter=filter_var($_POST['KodeDokter'],FILTER_SANITIZE_STRING);
    include_once('koneksi.db.php');
    $sqlcekrm="SELECT * FROM `pasien` WHERE `NomorRekamMedik`='".$NomorRekamMedik."'";
    $qcekrm=mysqli_query($koneksi,$sqlcekrm);
    $rcekrm=mysqli_fetch_array($qcekrm);
    if (empty($rcekrm)) {
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclose=window.replace("formpasien.php")></button>
        <strong>Gagal!</strong> Rekord Rekam Medik Pasien tidak ditemukan ! <a href="formpasien.php" class="btn btn-info">Daftarkan Pasien Baru</a>.
      </div>';
    } else {
        $sqlcekdaftar="select p.*,d.NamaDokter from pendaftaran p inner join dokter d on p.KodeDokter=d.KodeDokter where p.NomorRekamMedik='".$NomorRekamMedik."' and p.KodeDokter='".$KodeDokter."' and Diagnosa =''";
        $qcekdaftar=mysqli_query($koneksi,$sqlcekdaftar);
        $rcekdaftar=mysqli_fetch_array($qcekdaftar);
        if (!empty($rcekdaftar)) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert" onclose=window.replace("formrawattindakan.php")></button>
          <strong>Anda sudah terdaftar!</strong> Anda tercatat sudah terdaftar pada waktu : '.$rcekdaftar['WaktuDaftar'].' silahkan ke Poli '.$rcekdaftar['NamaDokter'].' dengan Nomor Antri : '.$rcekdaftar['NomorAntri'].'! <a href="formrawattindakan.php" class="btn btn-info" target="frmmenu">Proses Rawat Tindakan</a>.
        </div>';
          exit();
        }
        $sqlmaxdaftar="select MAX(IdDaftar) as IdDaftarTerakhir from pendaftaran";
        $qmaxdaftar=mysqli_query($koneksi,$sqlmaxdaftar);
        $rmaxdaftar=mysqli_fetch_array($qmaxdaftar);
        $nomorantribaru=$rmaxdaftar['IdDaftarTerakhir']+1;

        if ($nomorantribaru<10) {
          $NomorAntri="P-00".$nomorantribaru;
        } else if (($nomorantribaru>=10) and ($nomorantribaru<99)) {
          $NomorAntri="P-0".$nomorantribaru;
        } else {
          $NomorAntri="P-".$nomorantribaru;
        }
        $sqldaftar="INSERT INTO `pendaftaran`(`NomorRekamMedik`,`Keluhan`, `KodePetugas`, `KodeDokter`,`NomorAntri`) VALUES ('".$NomorRekamMedik."','".$Keluhan."','".$_SESSION['_login']."','".$KodeDokter."','".$NomorAntri."')";
        $qdaftar=mysqli_query($koneksi,$sqldaftar);
        if ($qdaftar) {
            $sqlceknomorantri="select p.*, ps.NamaPasien, d.NamaDokter from pendaftaran p INNER JOIN pasien ps ON ps.NomorRekamMedik=p.NomorRekamMedik INNER JOIN dokter d ON d.KodeDokter=p.KodeDokter where p.NomorRekamMedik='".$NomorRekamMedik."' and p.Keluhan='".$Keluhan."' and p.KodeDokter='".$KodeDokter."' order by IdDaftar desc limit 1";
            $qcekantri=mysqli_query($koneksi,$sqlceknomorantri);
            $rcekantri=mysqli_fetch_array($qcekantri);
            if (empty($rcekantri)) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" onclose=window.replace("formpasien.php")></button>
                <strong>Gagal!</strong> Rekord Pendaftaran Pasien tidak ditemukan !.
              </div>';
            } else {
                echo "<p><h2>Selamat Datang Pasien ".$rcekantri['NamaPasien']." silahkan ke Poli ".$rcekantri['NamaDokter']."! Nomor Daftar Anda ".$rcekantri['NomorAntri']."</h2></p>";
            }
        } else {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" onclose=window.replace("formpasien.php")></button>
            <strong>Gagal!</strong> Rekord Pendaftaran Pasien gagal disimpan !
          </div>';
        }
    }
}
?>
</div>
</body>
</html>