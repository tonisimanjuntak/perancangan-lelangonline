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
		$this->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set image scale factor
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set default header data
		$cop = '
		<div></div>
			<table border="0">
			    <tr>
			       
			    	<td width="100%">
						<div style="text-align:left; font-size:20px; font-weight:bold; padding-top:10px;"></div>

						<i style="text-align:left; font-weight:bold; font-size:14px;">Cabang Pontianak </i>		
			        </td>
			        
			    </tr>
			</table>
			<hr>
			';

					
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

$pdf->AddPage('L');

$title = '
	<span style="text-align:center; font-size:20px; font-weight:bold; padding-top:10px;">FIF GROUP CABANG PONTIANAK</span><br>	
	<span style="text-align:center; font-size:14px; font-weight:bold; padding-top:10px;">BUKTI PEMBAYARAN</span><br>	
';
$pdf->SetFont('times', '', 16);
$pdf->writeHTML($title, true, false, false, false, '');
$pdf->SetTopMargin(15);
$table = '';

$table  .= '
	<style>
		  table th {
		    vertical-align: middle;
		  }
		  table tr {
		    vertical-align: middle;
		  }
	</style>

';

$table .= '<br><br>';
$table  .= '<table border="0" cellpadding="5">
              <tr>
                <td style="width: 15%;">Nama Usaha</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;"><strong>'.$rowpembayaran->namausaha.'</strong></td>
                <td style="width: 30%;"></td>
                <td style="width: 15%;">Id Pembayaran</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;"><strong>'.$rowpembayaran->idpembayaran.'</strong></td>
              </tr>
              <tr>
                <td style="width: 15%;">NIB Usaha</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;">'.$rowpembayaran->nibusaha.'</td>
                <td style="width: 30%;"></td>
                <td style="width: 15%;">Tgl Pembayaran</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;"><strong>'.tglindonesia($rowpembayaran->idpembayaran).'</strong></td>
              </tr>
              <tr>
                <td style="width: 15%;">Nama Pemilik</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;">'.$rowpembayaran->namapemilik.'</td>
                <td style="width: 30%;"></td>
                <td style="width: 15%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 15%;"></td>
              </tr>
              <tr>
                <td style="width: 15%;">NIK Pemilik</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;">'.$rowpembayaran->nikpemilik.'</td>
                <td style="width: 30%;"></td>
                <td style="width: 15%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 15%;"></td>
              </tr>
              <tr>
                <td style="width: 15%;">Jumlah Pembayaran</td>
                <td style="width: 5%;">:</td>
                <td style="width: 15%;">Rp. '.format_rupiah($rowpembayaran->nominalbayar).'</td>
                <td style="width: 30%;"></td>
                <td style="width: 15%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 15%;"></td>
              </tr>
              <tr>
                <td style="width: 15%;">Terbilang</td>
                <td style="width: 5%;">:</td>
                <td style="width: 80%;" colspan=5"">'.terbilang($rowpembayaran->nominalbayar,2).'</td>
              </tr>
            </table>
		
		';




$table  .= '<br><br><h1 style="text-align: center;">DETAIL ITEM YANG DI BID</h1>';


$table .= '
		<table border="1" cellpadding="5">
	        <thead>
	          <tr style="background-color: #DBDBDB;">
	            <th style="width: 5%; text-align: center;">No</th>
	            <th style="width: 40%; text-align: center;">TIPE/ MERK</th>
	            <th style="width: 25%; text-align: center;">NO MESIN<br>NO RANGKA<br>NO POLISI</th>
	            <th style="width: 15%; text-align: right;">HARGA DASAR</th>
	            <th style="width: 15%; text-align: right;">HARGA BID</th>
	          </tr>
	        </thead>
	        <tbody>';
                                      
if ($rspembayarandetail->num_rows()>0) {
	$no=1;
  foreach ($rspembayarandetail->result() as $row) {
    if (!empty($row->fotoitem)) {
      $fotoitem = base_url('uploads/itemlelang/'.$row->fotoitem);
    }else{
      $fotoitem = base_url('assets/images/sepedamotor.png');
    }
    $table .= '

        <tr>
          <td style="width: 5%; text-align: center;">'.$no++.'</td>
          <td style="width: 40%; text-align: center;">'.$row->tipe.'<br>'.$row->merk.'</td>
          <td style="width: 25%; text-align: center;">'.$row->nomesin.'<br>'.$row->norangka.'<br>'.$row->nopolisi.'</td>
          <td style="width: 15%; text-align: right;">'.format_rupiah($row->hargadasar).'</td>
          <td style="width: 15%; text-align: right;">'.format_rupiah($row->hargabid).'</td>
        </tr>
    ';
  }
}
                                      
$table .= '
	</tbody>
  </table>
';
                                    
		





$pdf->SetTopMargin(35);
$pdf->SetFont('times', '', 10);
$pdf->writeHTML($table, true, false, false, false, '');


$tglcetak = date('d-m-Y');



$pdf->Output();
?>
