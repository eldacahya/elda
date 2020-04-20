
<!DOCTYPE html>
<html>
<head>
	<title>Validasi</title>
</head>
<body>


<?php
include 'koneksi.php';

$nama            = $_POST['nama'];
$username           = $_POST['username'];
$password         = $_POST['password'];  
$level         = $_POST['level'];


	$e ="SELECT * from user where nama='$nama'";
	$d = mysqli_query($koneksi, $e);
	$cek = mysqli_num_rows($d);
	if ($cek > 0) {
		echo "<script>window.alert('user yang anda masukan sudah ada!!!')
			window.location='datauser.php' 
		</script>";
	} else{
		$query="INSERT INTO user SET nama='$nama',username='$username',password='$password',level='$level'";
mysqli_query($koneksi, $query) or die .mysqli_error($koneksi);  
	echo "<script>window.alert('Data Di Simpan')
			window.location='datauser.php'
		</script>";
}



?>
</body>
</html>
