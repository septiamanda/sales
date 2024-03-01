<?php

include "vendor/fpdf.php";

$pdf = new FPDF ('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'Laporan Data Sales', 0, 0, 'C');

$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times', 'B', 9);

$pdf->Cell(10, 7, 'No.', 1,0,'C');
$pdf->Cell(20, 7, 'Tanggal Order', 1,0,'C');
$pdf->Cell(20, 7, 'Tanggal Update', 1,0,'C');
$pdf->Cell(20, 7, 'Nomor SC', 1,0,'C');
$pdf->Cell(30, 7, 'Nama Pengguna', 1,0,'C');
$pdf->Cell(30, 7, 'Alamat Instalasi', 1,0,'C');
$pdf->Cell(20, 7, 'Sektor', 1,0,'C');
$pdf->Cell(20, 7, 'STO', 1,0,'C');
$pdf->Cell(10, 7, 'Status', 1,0,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times', '', 10);

$no = 1;
$koneksi = mysqli_connect("localhost","root","","salesyak");
$data = mysqli_query($koneksi, "SELECT * FROM datasales");
while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6,$no++,1,0,'C');
    $pdf->Cell(20,6,$d['tanggal_order'],1,0,'C');
    $pdf->Cell(20,6,$d['tanggal_update'],1,0,'C');
    $pdf->Cell(20,6,$d['noSC'],1,0,'C');
    $pdf->Cell(30,6,$d['nama_pengguna'],1,0,'C');
    $pdf->Cell(30,6,$d['alamat_instl'],1,0,'C');
    $pdf->Cell(20,6,$d['sektor'],1,0,'C');
    $pdf->Cell(20,6,$d['sto'],1,0,'C');
    $pdf->Cell(10,6,$d['status'],1,0,'C');
}

$pdf->Output();

