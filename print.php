 <?php
 session_start():
 //untuk mengecek apakah yang mengakses halaman ini sudah login /belum
 if ($_SESSION['level']--'') {
   header("location:index.php?pesan=gagal");
 }
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Crud Raihan</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	</style>
</head>
<body>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="datasiswa.php">Data Siswa</a></li>
        <li><a href="datakelas.php">Data Kelas</a></li> 
        <li><a href="datajurusan.php">Data Jurusan</a></li>
        <li><a href="tambahuser.php">Data User</a></li>
       
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>

      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">LOGOUT</a></li>
      
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
	
<div class="container">
	<div class ="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered table-hover">
		<tr>
		<th>NO</th>
		<th>Foto</th>
		<th>NISN</th>
		<th>Nama</th>
		<th>Gender</th>
		<th>Alamat</th>
		<th>Kelas</th>
</tr>
<?php
// Load file koneksi.php
include "koneksi.php";

$no =1; 
$query = "SELECT siswa.id_siswa,siswa.id_kelas,siswa.nisn,siswa.nama,siswa.,siswa.telp,siswa.alamat,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan "; // Query untuk menampilkan semua data siswa
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$no++;"</td>";
        echo "<td><img src ='gambar/".$data['foto']."' width='100' height='100' ?></td>";
		echo "<td>".$data['nisn']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['gender']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td>".$data['kelas']."</td>";
        echo "</tr>";
    }
}
?>
		 		</tbody>
			</table>
		</div> 
	</div>
	
</div>
  


    
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'D');
?>