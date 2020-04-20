
<!DOCTYPE html>
<html>
<head>
	<title>Validasi</title>
</head>
<body>


<?php
include 'koneksi.php';

$kelas            = $_POST['kelas'];
$tingkat         = $_POST['tingkat'];  
$id_jurusan         = $_POST['id_jurusan'];  

	// $nama_file =$_FILES['img']['name'];
	// $file_tmp=$_FILES['img']['tmp_name'];
	// $path ="../../asset/gambar/".$nama_file;
	// move_uploaded_file($file_tmp, $path);
	$e ="SELECT * from kelas where kelas='$kelas'";
	$d = mysqli_query($koneksi, $e);
	$cek = mysqli_num_rows($d);
	if ($cek > 0) {
		echo "<script>window.alert('Data yang anda masukan sudah ada!!!')
			window.location='datakelas.php'
		</script>";
	}else{ 
		$query="INSERT INTO kelas SET kelas='$kelas ',tingkat='$tingkat',id_jurusan='$id_jurusan '";
mysqli_query($koneksi, $query) or die ('Sql Error:'.mysqli_error($koneksi));
	echo "<script>window.alert('Data Di Simpan')
			window.location='datakelas.php'
		</script>";

}



?>
</body>
</html>
