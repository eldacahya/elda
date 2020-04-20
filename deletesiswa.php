
<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database

if ($cek > 0) {
		echo "<script>window.alert('Nis yang anda masukan sudah ada!!!')
			window.location='datasiswa.php'
		</script>";
	}else{
		mysqli_query($koneksi,"DELETE FROM siswa WHERE id='".$id."'") or die ('Sql Error:'.mysqli_error($koneksi));
	echo "<script>window.alert('Data Di Simpan')
			window.location='datasiswa.php'
		</script>";
	}

// mengalihkan halaman kembali ke index.php
header("location:datasiswa.php");

?>