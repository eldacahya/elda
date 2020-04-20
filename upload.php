<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}

	p{
		color: green;
	}
</style>
<h2>IMPORT EXCEL</h2>





<br/><br/>
<?php 
include 'koneksi.php';
?>

<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	Pilih File: 
	<input name="filepegawai" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>
<a href="datasiswa.php">Kembali</a>

</body>
</html>