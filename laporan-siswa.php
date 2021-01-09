<?php
date_default_timezone_set('Asia/Jakarta');
require_once('assets/plugins/tcpdf/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Salsa');
$pdf->SetTitle('Laporan Siswa');
$pdf->SetSubject('Siswa');
$pdf->SetKeywords('TCPDF, PDF, Siswa, laporan');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Laporan Siswa', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 15);
$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

function fetch_data() {
	include 'koneksi.php';
	$output = '';
	$sql = "SELECT * FROM tb_siswa ORDER BY nama_siswa ASC";
	$result = $conn->prepare($sql);
	$result->execute();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {   

		$output .= '<tr style="font-size:12px;">
		<td align="center">'.$row['nis'].'</td>
		<td align="center">'.$row['nama_siswa'].'</td>
		<td align="center">'.$row['jurusan'].'</td>
		<td align="center">'.$row['jenis_kelamin'].'</td>
		<td align="center">'.$row['alamat'].'</td>
		</tr>';
	}
	return $output;
}
$content  = '';  
$content .= ' 
<br><br><table border="1">  
<tr style="background-color:#FFFF00;font-size:12px;">
<th align="center"><b>NIS</b></th>
<th align="center"><b>Nama</b></th>
<th align="center"><b>Jurusan</b></th>
<th align="center"><b>Jenis Kelamin</b></th>
<th align="center"><b>Alamat</b></th>
</tr>';     

$content .= fetch_data(); 
$content .= '
</table>';

$pdf->writeHTML($content, true, false, false, false, '');

$tbl2 = '<br><br><table border="0px" cellpadding="2" cellspacing="0">
<tr style="text-align:center;" nobr="true">
<td style="width:60%;"></td>
<td style="width:40%;">
Malang, '.date('d F Y').'<br><br><br><br><u><b>Admin</b></u>
</td>
</tr>
</table>';

$pdf->writeHTML($tbl2, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan_siswa.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>