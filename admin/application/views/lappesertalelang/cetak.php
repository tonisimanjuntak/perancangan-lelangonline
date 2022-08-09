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

$pdf->AddPage('P');


$title = '
	<span style="text-align:center; font-size: 30px; font-weight: bold;">FIF GROUP</span><br>
	<span style="text-align:center; font-size: 20px; font-weight: bold;">LAPORAN PESERTA LELANG</span><br>	
';
$pdf->SetFont('times', '');
$pdf->writeHTML($title, true, false, false, false, '');
$pdf->SetTopMargin(15);

$table = '';
$table .= '<table border="0" width="100%" cellpadding="5">
			<thead>
                <tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">NAMA PAKET</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">PROMO HAJI RAYA</th>
                </tr>
				<tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">ID PAKET</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">12121112</th>
                </tr>
                <tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">TANGGAL PAKET</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">01-06-2022 S/D 31-08-2022</th>
                </tr>
                <tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">HARGA DASAR PAKET</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">Rp. 10.0000.000</th>
                </tr>
                <tr style="font-size: 14px;">
                  <th style="width: 25%; text-align: left;">JUMLAH PESERTA</th>
                  <th style="width: 5%; text-align: center;">:</th>
                  <th style="width: 70%; text-align: left;">3 Peserta</th>
                </tr>
			</thead>
		   </table>
		';

$table .= '<br><br><br><table border="1" width="100%" cellpadding="5">';
$table .= ' 
			<thead>
				<tr style="font-size: 14px; font-weight: bold;">
                  <th style="width: 5%; text-align: center;">No</th>
                  <th style="width: 20%; text-align: center;">Tgl Bid<br>ID</th>
                  <th style="width: 30%; text-align: center;">Nama Usaha<br>NIB Usaha</th>
                  <th style="width: 30%; text-align: center;">Nama Pemilik<br>NIK Pemilik</th>
                  <th style="width: 15%; text-align: center;">Total Bid</th>
                </tr>
			</thead>
			<tbody>';


$table .= '
<tr style="font-size: 12px;">
  <td style="width: 5%; text-align: center;">1</td>
  <td style="width: 20%; text-align: center;">19-07-2022<br>220101012</td>
  <td style="width: 30%; text-align: center;">UD Mitra Bumi Perkasa<br>4578878</td>
  <td style="width: 30%; text-align: center;">Budi Sulistiyo<br>48785450025001</td>
  <td style="width: 15%; text-align: right;">Rp. 10.000.000</td>
</tr>
';

$table .= '
<tr style="font-size: 12px;">
  <td style="width: 5%; text-align: center;">2</td>
  <td style="width: 20%; text-align: center;">20-07-2022<br>220101013</td>
  <td style="width: 30%; text-align: center;">Sedawe Utama<br>458787</td>
  <td style="width: 30%; text-align: center;">Trihardoyo<br>659898975454001</td>
  <td style="width: 15%; text-align: right;">Rp. 10.000.000</td>
</tr>
';


$table .= '
<tr style="font-size: 12px;">
  <td style="width: 5%; text-align: center;">3</td>
  <td style="width: 20%; text-align: center;">20-07-2022<br>220101014</td>
  <td style="width: 30%; text-align: center;">CV. Agung Perkasa<br>4578955</td>
  <td style="width: 30%; text-align: center;">Susi Susanti<br>5658445154001</td>
  <td style="width: 15%; text-align: right;">Rp. 11.000.000</td>
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
