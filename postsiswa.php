
<!DOCTYPE html>
<html>
<head>
	<title>Validasi</title>
</head>
<body>


<?php
include 'koneksi.php';

$nisn            = $_POST['nisn'];
$nama           = $_POST['nama'];  
$alamat         = $_POST['alamat'];
$id_kelas         = $_POST['id_kelas']; 

$nama_file=$_FILES['foto']['name'];
$file_tmp=$_FILES['foto']['tmp_name'];
$pach="gambar/".$nama_file;
move_uploaded_file($file_tmp, $pach);



	$e ="SELECT * from siswa where nisn='$nisn'";
	$d = mysqli_query($koneksi, $e);
	$cek = mysqli_num_rows($d);
	if ($cek > 0) {
		echo "<script>window.alert('Nis yang anda masukan sudah ada!!!')
			window.location='datasiswa.php' 
		</script>";
	} else{
		$query="INSERT INTO siswa SET nisn='$nisn',nama='$nama',alamat='$alamat',id_kelas='$id_kelas',foto='$nama_file'";
mysqli_query($koneksi, $query) or die .mysqli_error($koneksi);  
	echo "<script>window.alert('Data Di Simpan')
			window.location='datasiswa.php'
		</script>";
}



?>
</body>
</html>
