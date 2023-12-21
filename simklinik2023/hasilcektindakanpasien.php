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
<body onload="IdDaftar.focus()">
<div class="container">
<?php //if (isset($_POST['submit'])) {
    $NomorRekamMedik=filter_var($_POST['NomorRekamMedik'],FILTER_SANITIZE_STRING);
    include_once('koneksi.db.php');
    $sql="SELECT p.*,pd.*,d.NamaDokter FROM pasien p INNER JOIN pendaftaran pd ON p.NomorRekamMedik=pd.NomorRekamMedik INNER JOIN dokter d ON d.KodeDokter=pd.KodeDokter WHERE pd.NomorRekamMedik='".$NomorRekamMedik."' ORDER BY pd.WaktuDaftar DESC";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    if (empty($r)) {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick=""></button>
        <strong>Record tidak ditemukan!</strong> Record pendaftaran tidak ditemukan, <a href="formpendaftaran.php" target="frmmenu" class="btn btn-info">Silahkan daftar terlebih dulu</a>.
      </div>';
        exit();
    }
//}
?>
<div class="row">
  <h2>Daftar Histori Tindakan Pasien</h2>
  <div class="col -">
    <h4>Nomor Rekam Medik : <?php echo $r['NomorRekamMedik'];?></h4>
    <h4>Nama Pasien : <?php echo $r['NamaPasien'];?></h4>
    <h5>Tempat, Tgl.Lahir : <?php echo $r['TempatLahir'].','.$r['TanggalLahir'];?></h5>
    <h5>Jenis Kelamin : <?php echo $r['JenisKelamin'];?></h5>
  </div>
  <div class="col -">
    <h5>Agama : <?php echo $r['Agama'];?></h5>
    <h5>Waktu Daftar : <?php echo $r['WaktuDaftar'].'('.$r['IdDaftar'].')';?></h5>
    <h5>Status Nikah : <?php echo $r['StatusNikah'];?></h5>
    <h5>Gol.Darah : <?php echo $r['GolonganDarah'];?></h5>
  </div>
<h5>Keluhan : <?php echo $r['Keluhan'];?></h5>

<table class="table table-striped">
    <thead>
      <tr>
        <th width="10%">Waktu Kunjungan</th>
        <th width="30%">Keluhan</th>
        <th>Diagnosa</th>
        <th width="10%">Dokter</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if (isset($_POST['bSimpanDiagnosa'])) {
        $IdDaftar=filter_var($_POST['IdDaftar'],FILTER_SANITIZE_STRING);
        $NomorRekamMedik=filter_var($_POST['NomorRekamMedik'],FILTER_SANITIZE_STRING);
        $Diagnosa=filter_var($_POST['Diagnosa'],FILTER_SANITIZE_STRING);
        $sqlup="update pendaftaran set Diagnosa='".$Diagnosa."' where IdDaftar='".$IdDaftar."' and NomorRekamMedik='".$NomorRekamMedik."'";
        $qup=mysqli_query($koneksi,$sqlup);
        if ($qup) {
          echo "<h2>Diagnosa ".$IdDaftar." tersimpan !</h2>";
        }
      }
      $sqlrt="select * from pendaftaran where NomorRekamMedik='".$r['NomorRekamMedik']."' order by IdDaftar DESC";
      $qrt=mysqli_query($koneksi,$sqlrt);
      $rrt=mysqli_fetch_array($qrt);
      do {
      ?>
      <tr>
        <td><?php echo $rrt['WaktuDaftar'];?></td>
        <td><?php echo $rrt['Keluhan'];?></td>
        <td><form method="post"><input type="hidden" name="NomorRekamMedik" value="<?php echo $rrt['NomorRekamMedik'];?>"><input type="hidden" name="IdDaftar" value="<?php echo $rrt['IdDaftar'];?>">
          <?php if (!empty($rrt['Diagnosa'])) { echo '<textarea name="Diagnosa" class="form-control">'.$rrt['Diagnosa'].'</textarea>';?>
          <button type="submit" name="bSimpanDiagnosa" class="btn btn-primary" title="Simpan Diagnosa" onclick="return confirm('Apakah yakin sudah benar ?');">💾</button>
        <?php } else {?>
          <textarea name="Diagnosa" class="form-control"></textarea><button type="submit" name="bSimpanDiagnosa" class="btn btn-primary" title="Simpan Diagnosa" onclick="return confirm('Apakah yakin sudah benar ?');">💾</button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Tambah Tindakan
  </button>
          <?php }
          $sqltindakan="select * from tindakan where IdDaftar='".$rrt['IdDaftar']."'";
          $qtindakan=mysqli_query($koneksi,$sqltindakan);
          $rtindakan=mysqli_fetch_array($qtindakan);
          ?>
         </form>
        </td>
        <td><?php $sqld="select * from dokter where KodeDokter='".$rrt['KodeDokter']."'";
        $qd=mysqli_query($koneksi,$sqld);
        $rd=mysqli_fetch_array($qd);
        if (!empty($rd)) echo $rd['NamaDokter']; else echo "Unknown Doctor !";
        ?></td>
      </tr>
      <?php }while($rrt=mysqli_fetch_array($qrt));
      ?>
    </tbody>
  </table>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
</html>