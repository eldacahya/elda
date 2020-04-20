<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_kelas = $_GET['id_kelas'];


// menghapus data dari database

if ($cek > 0) {
		echo "<script>window.alert('Nis yang anda masukan sudah ada!!!')
			window.location='datakelas.php'
		</script>";
	}else{
		mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='".$id_kelas."'") or die ('Sql Error:'.mysqli_error($koneksi));
	echo "<script>window.alert('Data Di Simpan')
			window.location='datakelas.php'
		</script>";
	}

// mengalihkan halaman kembali ke index.php
header("location:datakelas.php");

?>