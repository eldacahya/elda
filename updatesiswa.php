
<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = @$_POST['id'];
$nisn = @$_POST['nisn'];
$nama = @$_POST['nama'];
$alamat = @$_POST['alamat'];
$id_kelas = @$_POST['id_kelas'];

if (isset($_POST['ubah_foto'])) {
	# code...
	$img_name = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	//rename
	$fotobaru = date('dmYHis').$img_name;

	//pach
	$pach="gambar/".$fotobaru;

	//upload
	if (move_uploaded_file($tmp,$pach)) {
		# code...
		$query="SELECT*FROM siswa WHERE nisn='".$nisn."'";
		$sql=mysqli_query($koneksi,$query);
		$data=mysqli_fetch_array($sql);

		//cek foto sebelumnnya
		if (is_file("gambar/".$data['foto'])) 
			unlink("gambar/".$data['foto']);//hapus foto
		
		$query= "UPDATE siswa SET nisn='$nisn', nama='$nama',alamat='$alamat',id_kelas='$id_kelas',foto='$fotobaru' where nisn='$nisn'";

        $sql=mysqli_query($koneksi,$query); //execute query

        if ($sql) {//cek jikaproses masuk ke databsase
        	echo "<script>window.alert('Data Sudah Di Ubah')</script>";
        	echo "<script>window.location='../datasiswa.php'</script>";
        }else{
        	echo "<script>window.alert('Data Gagal Di Ubah')</script>";
        	echo "<script>window.location='../datasiswa.php'</script>";
        }
        }else{
        
        	echo "<script>window.alert('Gambar Gagal Di Ubah')</script>";
        	echo "<script>window.location='../datasiswa.php'</script>";
        }

	}else{
		//jika tidak di ceklis
		$query= "UPDATE siswa SET nisn='$nisn', nama='$nama',alamat='$alamat',id_kelas='$id_kelas' where nisn='$nisn'";
		$sql=mysqli_query($koneksi,$query); //execute query
 

	if ($sql) { //cek jika proses masuk ke database
		    echo "<script>window.alert('Data Sudah Di Ubah')</script>";
        	echo "<script>window.location='../datasiswa.php'</script>";
        }else{
        	echo "<script>window.alert('Data Gagal Di Ubah')</script>";
        	echo "<script>window.location='../datasiswa.php'</script>";

	}
}

// mengalihkan halaman kembali ke index.php
header("location:datasiswa.php");

?>