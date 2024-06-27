<?php
require('fpdf.php');
include 'koneksi.php';

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Data Jual Barang', 0, 1, 'C');
        $this->Ln(5);
        $this->SetFillColor(200, 220, 255);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(60, 10, 'Nama Part', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Harga', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Jumlah', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Total', 1, 1, 'C', true);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Table body
    function TableBody($data)
    {
        $this->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            $this->Cell(20, 10, $row['id'], 1);
            $this->Cell(60, 10, $row['nama_part'], 1);
            $this->Cell(30, 10, $row['harga'], 1, 0, 'R');
            $this->Cell(20, 10, $row['jumlah'], 1, 0, 'C');
            $this->Cell(30, 10, $row['total'], 1, 1, 'R');
        }
    }
}

// Fetch data from database
$query = "SELECT * FROM jual_barang";
$result = $conn->query($query);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Create PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TableBody($data);

// Output the PDF directly to the browser
$pdf->Output('I', 'Data_Jual_Barang.pdf');
?>
