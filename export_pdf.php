
<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SMK LUGINA RANCAEKEK',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR SISWA KELAS XII 2019/2020',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NISN',1,0);
$pdf->Cell(70,6,'NAMA',1,0);
$pdf->Cell(50,6,'Alamat',1,1);

$pdf->SetFont('Arial','',10);
$koneksi = mysqli_connect("localhost","root","","sekolah_elda");

$data = mysqli_query($koneksi,"select * from siswa");
while ($row = mysqli_fetch_array($data)){
    $pdf->Cell(20,6,$row['nisn'],1,0);
    $pdf->Cell(70,6,$row['nama'],1,0);
    $pdf->Cell(50,6,$row['alamat'],1,1); 
}

$pdf->Output();
?>