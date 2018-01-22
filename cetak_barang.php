<?php
require('assets/lib/fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
	    $this->SetFont('Arial','B',30);
	    $this->Cell(30,10,'JUALO');

	    $this->Ln(10);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Jl mojoroto Gang 5 kediri Jawa Timur');


	    $this->Ln(5);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Telp/Fax : 0812-345-432-123');
	    $this->Line(10,40,200,40);


	    $this->Ln(5);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Data Barang');

	    $this->cell(130);
	    $this->SetFont('Arial','',10);
	    $this->cell(30,10,'Kediri, '.date("d-m-Y").'');

	    $this->Line(10,40,200,40);
	}
	function data_barang(){
		mysql_connect("localhost","root","");
		mysql_select_db("imk");
		$data=mysql_query("SELECT barang.id_barang,barang.nama_barang,kategori.nama_kategori,barang.stok,barang.harga_beli,barang.harga_jual,barang.date_added FROM barang INNER JOIN kategori on barang.id_kategori=kategori.id_kategori ORDER BY barang.id_barang DESC");
		while ($r=  mysql_fetch_array($data))
		        {
		            $hasil[]=$r;
		        }
		        return $hasil;
		        
	}
	function set_table($header,$data){
		$this->SetFont('Arial','B',9);
        $this->Cell(10,7,"No",1);
        $this->Cell(60,7,$header[1],1);
        $this->Cell(12,7,$header[0],1);
        $this->Cell(24,7,$header[2],1);
        $this->Cell(27,7,$header[3],1);
        $this->Cell(27,7,$header[4],1);
        $this->Cell(30,7,$header[5],1);
    	$this->Ln();

    	$this->SetFont('Arial','',9);
    	$no=1;
	    foreach($data as $row)
	    {
	        $this->Cell(10,7,$no++,1);
	        $this->Cell(60,7,$row['nama_barang'],1);
	        $this->Cell(12,7,$row['stok'],1);
	        $this->Cell(24,7,$row['nama_kategori'],1);
	        $this->Cell(27,7,"Rp. ".number_format($row['harga_beli']),1);
	        $this->Cell(27,7,"Rp. ".number_format($row['harga_jual']),1);
	        $this->Cell(30,7,date("d-m-Y",strtotime($row['date_added'])),1);
	        $this->Ln();
	    }
	}
}

$pdf = new PDF();
$pdf->SetTitle('Cetak Data Barang');

$header = array('Stock', 'Nama Barang','kategori' ,'Harga Beli','Harga Jual','Tgl Ditambahkan');
$data = $pdf->data_barang();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->set_table($header,$data);
$pdf->Output('','JUALO/Barang/'.date("d-m-Y").'.pdf');
?>