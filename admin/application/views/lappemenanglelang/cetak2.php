<html>
	<body onload="window.print();">
		

<?php

$table = '
	<h1 style="text-align:center; font-weight: bold;">FIF GROUP</h1><br>
	<h3 style="text-align:center; font-weight: bold;">LAPORAN PEMENANG LELANG</h3><br>	
';

$table .= '';
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
	      <td style="width: 5%; text-align: center; border-top: 1px solid #cdd0d4;">1</td>
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



echo $table;

?>

	</body>
</html>