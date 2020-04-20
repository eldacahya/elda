
<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_jurusan = $_GET['id_jurusan'];


// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'")or die(mysqli_error());

// mengalihkan halaman kembali ke index.php
header("location:datajurusan.php");

?>