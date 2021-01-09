<?php
date_default_timezone_set('Asia/Jakarta');
require_once('assets/plugins/tcpdf/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Salsa');
$pdf->SetTitle('Laporan Pengembalian');
$pdf->SetSubject('Penempatan');
$pdf->SetKeywords('TCPDF, PDF, Pengembalian, laporan');

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

$pdf->Write(0, 'Laporan Pengembalian', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 15);
$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

function fetch_data() {
	include 'koneksi.php';
	if($_POST['level'] == "0") {
		$output = '';
		$t = $_POST['tahun'];
		$b = $_POST['bulan'];
		$sql = "SELECT pn.*, si.*, pr.* FROM tb_pengembalian pn INNER JOIN tb_siswa si ON pn.fk_siswa = si.id_siswa INNER JOIN tb_perusahaan pr ON pn.fk_perusahaan = pr.id_perusahaan WHERE pn.created LIKE '$t-$b%'";
		$result = $conn->prepare($sql);
		$result->execute();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {   

			$output .= '<tr style="font-size:12px;">
			<td align="center">'.$row['nama_siswa'].'</td>
			<td align="center">'.$row['nama_perusahaan'].'</td>
			<td align="center">'.$row['lama_prakerin'].'</td>
			<td align="center">'.$row['alasan_pengembalian'].'</td>
			<td align="center">'.$row['evaluasi'].'</td>
			</tr>';
		}
		return $output;
	}else {
		$output = '';
		$da=$_POST['from'];
		$sa=$_POST['to'];
		$sql = "SELECT pn.*, si.*, pr.* FROM tb_pengembalian pn INNER JOIN tb_siswa si ON pn.fk_siswa = si.id_siswa INNER JOIN tb_perusahaan pr ON pn.fk_perusahaan = pr.id_perusahaan WHERE date(pn.created) between '$da' AND '$sa'";
		$result = $conn->prepare($sql);
		$result->execute();

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {   

			$output .= '<tr style="font-size:12px;">
			<td align="center">'.$row['nama_siswa'].'</td>
			<td align="center">'.$row['nama_perusahaan'].'</td>
			<td align="center">'.$row['lama_prakerin'].'</td>
			<td align="center">'.$row['alasan_pengembalian'].'</td>
			<td align="center">'.$row['evaluasi'].'</td>
			</tr>';
		}
		return $output;
	}
}
$content  = '';  
$content .= ' 
<br><br><table border="1">  
<tr style="background-color:#FFFF00;font-size:12px;">
<th align="center"><b>Nama Siswa</b></th>
<th align="center"><b>Perusahaan</b></th>
<th align="center"><b>Lama Prakerin</b></th>
<th align="center"><b>Alasan Pengembalian</b></th>
<th align="center"><b>Evaluasi</b></th>
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
$pdf->Output('laporan_pengembalian.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>