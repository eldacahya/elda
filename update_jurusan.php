
<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_jurusan'];
$jurusan = $_POST['jurusan'];
$keterangan = $_POST['keterangan'];

// update data ke database
mysqli_query($koneksi,"UPDATE jurusan SET jurusan='$jurusan', keterangan='$keterangan' where id='$id'") or die (mysqli_error($koneksi));

// mengalihkan halaman kembali ke index.php
header("location:datajurusan.php");

?>