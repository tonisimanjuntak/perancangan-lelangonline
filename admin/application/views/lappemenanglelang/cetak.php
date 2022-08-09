<?php

class MYPDF extends TCPDF {
 
	//Page header
	public function Header() {
	
		$this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		// set margins
		//$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
		$this->SetHeaderMargin(PDF_MARGIN_HEADER);
		//$this->SetFooterMargin(PDF_MARGIN_FOOTER);
		$this->SetFooterMargin(22);
		
		// set image scale factor
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
	// 	$this->writeHTML($cop, true, false, false, false, '');
	// 	// set margins
	// 	//$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// 	$this->SetMargins(PDF_MARGIN_LEFT, 30, PDF_MARGIN_RIGHT);
	// 	$this->SetHeaderMargin(PDF_MARGIN_HEADER);
		// set default header data
					
	}

	

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		$fot ='<div>Tgl Cetak: '.date('d-m-Y').'</div>
			
		';

		$this->writeHTML($fot, true, false, false, false, '');
	}
}

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

$pdf->AddPage('L');


$title = '
	<span style="text-align:center; font-size: 30px; font-weight: bold;">FIF GROUP</span><br>
	<span style="text-align:center; font-size: 20px; font-weight: bold;">LAPORAN PEMENANG LELANG</span><br>	
';
$pdf->SetFont('times', '');
$pdf->writeHTML($title, true, false, false, false, '');
$pdf->SetTopMargin(15);

$table = '';
$table .= '<table border="0" width="100%" cellpadding="5">
			<thead>
                <tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">TANGGAL PERIODE</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">'.tglindonesia($tglawal).' S/D '.tglindonesia($tglakhir).'</th>
                </tr>
			</thead>
		   </table>
		';

$table .= '<br><br><br><table border="0" width="100%" cellpadding="5">';
$table .= ' 
			<thead>
				<tr style="font-size: 14px; font-weight: bold;">
                  <th style="width: 5%; text-align: center; border-top: 1px solid #cdd0d4;">NO</th>
                  <th style="width: 15%; text-align: left; border-top: 1px solid #cdd0d4;">TANGGAL MULAI</th>
                  <th style="width: 35%; text-align: left; border-top: 1px solid #cdd0d4;">URAIAN</th>
                  <th style="width: 15%; text-align: left; border-top: 1px solid #cdd0d4;">PEMENANG LELANG</th>
                  <th style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;">HARGA DASAR</th>
                  <th style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;">HARGA BID</th>
                </tr>
			</thead>
			<tbody>';


$table .= '
	    <tr style="font-weight: bold;">
	      <td style="width: 5%; text-align: center; border-top: 1px solid #cdd0d4;">'.$no++.'</td>
	      <td style="width: 15%; text-align: left; border-top: 1px solid #cdd0d4;">01-06-2022 <br>S/D 31-08-2022</td>
	      <td style="width: 35%; text-align: left; border-top: 1px solid #cdd0d4;">PAKET IDUL ADHA</td>
	      <td style="width: 15%; text-align: left; border-top: 1px solid #cdd0d4;">Sedawe Utama<br>458787</td>
	      <td style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;"></td>
	      <td style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;"></td>
	    </tr>
	  ';

$table .= '
				    <tr>
				      <td style="width: 5%; text-align: center;"></td>
				      <td style="width: 15%; text-align: left;"></td>
				      <td style="width: 50%; text-align: left;" colspan="2">Rincian item sbb:</td>
				      <td style="width: 15%; text-align: right;"></td>
				      <td style="width: 15%; text-align: right;"></td>
				    </tr>
				  ';

$table .= '
				    <tr>
				      <td style="width: 5%; text-align: center;"></td>
				      <td style="width: 15%; text-align: left;"></td>
				      <td style="width: 50%; text-align: left;" colspan="2">&nbsp;&nbsp;&nbsp;Honda Vario 110 eSP CBS</td>
				      <td style="width: 15%; text-align: right;">Rp. 10,000,000</td>
				      <td style="width: 15%; text-align: right;">Rp. 11.000.000</td>
				    </tr>
				  ';

$table .= '
				    <tr>
				      <td style="width: 5%; text-align: center;"></td>
				      <td style="width: 15%; text-align: left;"></td>
				      <td style="width: 50%; text-align: left;" colspan="2">&nbsp;&nbsp;&nbsp;Honda Vario 110 eSP CBS</td>
				      <td style="width: 15%; text-align: right;">Rp. 14,000,000</td>
				      <td style="width: 15%; text-align: right;">Rp. 14.000.000</td>
				    </tr>
				  ';


$table .= '
				    <tr style="font-weight: bold;">
				      <td style="width: 5%; text-align: center;"></td>
				      <td style="width: 15%; text-align: left;">&nbsp;</td>
				      <td style="width: 50%; text-align: right;" colspan="2">SUB TOTAL:</td>
				      <td style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;">Rp. 24.000.000</td>
				      <td style="width: 15%; text-align: right; border-top: 1px solid #cdd0d4;">Rp. 25.000.000</td>
				    </tr>
				  ';

$table .= ' </tbody>
			</table>';



$pdf->SetTopMargin(35);
$pdf->SetFont('times', '');
$pdf->writeHTML($table, true, false, false, false, '');


$tglcetak = date('d-m-Y');



$pdf->Output();
?>
