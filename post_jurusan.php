
<!DOCTYPE html>
<html>
<head>
	<title>Validasi</title> 
</head>
<body>


<?php
include 'koneksi.php';

	$jurusan = @$_POST['jurusan'];
	$keterangan = @$_POST['keterangan'];
	

	// $nama_file =$_FILES['img']['name'];
	// $file_tmp=$_FILES['img']['tmp_name'];
	// $path ="../../asset/gambar/".$nama_file;
	// move_uploaded_file($file_tmp, $path);
	// $putaqi ="SELECT * from kelas where nama_jurusan='$program' and keterangan= 'keterangan'";
	// $syauqi = mysqli_query($koneksi, $putaqi);
	// $cek = mysqli_num_rows($syauqi);
	// if ($cek > 0) {
	// 	echo "<script>window.alert('Data yang anda masukan sudah ada!!!')
	// 		window.location='../datasiswa.php'
	// 	</script>";
	// }else{
	$e ="SELECT * from jurusan where jurusan='$jurusan'";
	$d = mysqli_query($koneksi, $e);
	$cek = mysqli_num_rows($d);
	if ($cek > 0) {
		echo "<script>window.alert('Data yang anda masukan sudah ada!!!')
			window.location='datajurusan.php'
		</script>";
	}else{
		$query="INSERT INTO jurusan SET jurusan='$jurusan',keterangan='$keterangan'";
mysqli_query($koneksi, $query) or die ('Sql Error:'.mysqli_error($koneksi));
	echo "<script>window.alert('Data Di Simpan')
			window.location='datajurusan.php'
		</script>";
}
?>
</body>
</html>