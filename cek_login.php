<?php
//mengaktifkan session pada php

//menghubungkan php dengan koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form login
$username=$_POST['username'];
$password=$_POST['password'];

//menyeleksi data user dengan userame dan password
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
//menghitung jumlah data yang ditemukan
$cek=mysqli_num_rows($login);

//cek apakah usrename dan password di temukan pada database
if ($cek>0) {
	
	$data=mysqli_fetch_assoc($login);

	//cek jik user login sebagai admin
	if ($data['level']=="admin") {

		//buat ssion login dan ussername
		$_SESSION['username']=$username;
		$_SESSION['level']="admin";

		//alihkan ke halaman dashboard admin
		header("location:datasiswa.php");

	//cek jika user login sebagai guru
	}else if ($data['level']=="guru") {
		//buat session login dan username
		$_SESSION['username']=$username;
		$_SESSION['level']="guru";

		//alihkan ke halaman dashboard guru
		header("location:halaman_guru.php");

	//cek jika user login sebagai siswa
	}else if ($data['level']=="siswa") {
		//buat session login dan username
		$_SESSION['username']=$username;
		$_SESSION['level']="siswa";

		//alihkan ke halaman dashboard guru
		header("location:halaman_guru.php");


	//cek jika user login sebagai siswa
	}else if ($data['level']=="walikelas") {
		//buat session login dan username
		$_SESSION['username']=$username;
		$_SESSION['level']="wali kelas";

		//alihkan ke halaman dashboard guru
		header("location:halaman_guru.php");
	}else{
		//alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
}else{
	header("location:login.php?pesan=gagal");
}
?>
