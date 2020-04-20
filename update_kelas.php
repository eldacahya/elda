
<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$tingkat = $_POST['tingkat'];
$id_jurusan = $_POST['id_jurusan'];

// update data ke database
mysqli_query($koneksi,"UPDATE kelas SET kelas='$kelas',tingkat='$tingkat',id_jurusan='$id_jurusan' where id_kelas='$id_kelas'") or die (mysqli_error($koneksi));

// mengalihkan halaman kembali ke index.php
header("location:datakelas.php");

?>