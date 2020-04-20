
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename= datasiswa.xls");
	?>

	<center>
		<h1>Data Siswa<br/></h1>
	</center>

	<table border="1">
		<tr>
			<th>NO</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kelas</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","sekolah_elda");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan on kelas.id_jurusan=jurusan.id_jurusan");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nisn']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
			<td><?php echo $d['tingkat'] .$d['kelas']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>