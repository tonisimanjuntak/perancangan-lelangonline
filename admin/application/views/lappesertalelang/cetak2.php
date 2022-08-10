<html>
  <body onload="window.print();">
    


<?php  

$table = '
	<h1 style="text-align:center; font-weight: bold;">FIF GROUP</h1>
	<h3 style="text-align:center; font-weight: bold;">LAPORAN PESERTA LELANG</h3><br>
';

$table .= '';
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

echo $table;
?>

  </body>
</html>