<html>
	<body onload="window.print();">
		
		<?php


$table = '
	<h1 style="text-align:center; font-weight:bold;">FIF GROUP CABANG PONTIANAK</h1>
	<h3 style="text-align:center; font-weight:bold;">JADWAL DAN PAKET LELANG</h3><br>	
';

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
$table  .= '<table border="0" cellpadding="2">
				<thead>
	              <tr style="font-weight: bold; font-size: 14px;">
	                <th style="width: 25%; text-align: left;">ID PAKET</th>
	                <th style="width: 5%; text-align: center;">:</th>
	                <th style="width: 70%; text-align: left;">2207110001</th>
	              </tr>
	              <tr style="font-weight: bold; font-size: 14px;">
	                <th style="width: 25%; text-align: left;">TGL LELANG</th>
	                <th style="width: 5%; text-align: center;">:</th>
	                <th style="width: 70%; text-align: left;">01-06-2022 S/D 31-08-2022</th>
	              </tr>
	              <tr style="font-weight: bold; font-size: 14px;">
	                <th style="width: 25%; text-align: left;">TOTAL HARGA PAKET</th>
	                <th style="width: 5%; text-align: center;">:</th>
	                <th style="width: 70%; text-align: left;">Rp. 10.000.000 </th>
	              </tr>
	              <tr style="font-weight: bold; font-size: 14px;">
	                <th style="width: 25%; text-align: left;">PEMENANG LELANG</th>
	                <th style="width: 5%; text-align: center;">:</th>
	                <th style="width: 70%; text-align: left;">-</th>
	              </tr>
	            </thead>
	         </table>
		
		';




$table  .= '<br><br><h1 style="">DETAIL ITEM YANG DILELANG</h1>';
$table  .= '<br><br><table border="1" cellpadding="10">';

$table .= ' 
			<thead>
              <tr class="" style="background-color: #B4B1B1;">
                <th style="width: 5%; text-align: center;">NO</th>
                <th style="width: 20%; text-align: center;">GAMBAR</th>
                <th style="width: 20%; text-align: center;">URAIAN</th>
                <th style="width: 25%; text-align: center;" colspan="3">SPESIFIKASI</th>
                <th style="width: 15%; text-align: center;">HARGA</th>                
                <th style="width: 15%; text-align: center;">STATUS</th>
              </tr>
            </thead>
            <tbody>';



$foto = base_url('uploads/itemlelang/Honda_Scoopy.png');


$table .= '

			  <tr class="" style="">
	            <td style="width: 5%; text-align: center;" rowspan="8">1</td>
	            <td style="width: 20%; text-align: center;" rowspan="8"><img src="'.$foto.'" alt=""></td>
	            <td style="width: 20%; text-align: center;" rowspan="8">
	            	Vario 110 eSP CBS<br>
	            	Honda<br>
	            </td>
	            <td style="width: 10%; text-align: center;">Nomor Polisi</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">KB 4444</td>
	            <td style="width: 15%; text-align: center;" rowspan="8">Rp. 10.000.000</td>                
	            <td style="width: 15%; text-align: center;" rowspan="8">Belum Terjual</td>
	          </tr>
			  <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor Mesin</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">98726561</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor Rangka</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">029737267</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor BPKB</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">24678989</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Warna</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">Merah</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Tahun Pembuatan</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">2019</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Isi Silinder</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">110</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Grade</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">B</td>
	          </tr>



		';


$foto = base_url('uploads/itemlelang/Honda_SH150i.png');

$table .= '

			  <tr class="" style="">
	            <td style="width: 5%; text-align: center;" rowspan="8">2</td>
	            <td style="width: 20%; text-align: center;" rowspan="8"><img src="'.$foto.'" alt=""></td>
	            <td style="width: 20%; text-align: center;" rowspan="8">
	            	Vario 110 eSP CBS<br>
	            	Honda<br>
	            </td>
	            <td style="width: 10%; text-align: center;">Nomor Polisi</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">KB 2323</td>
	            <td style="width: 15%; text-align: center;" rowspan="8">Rp. 12.000.000</td>                
	            <td style="width: 15%; text-align: center;" rowspan="8">Belum Terjual</td>
	          </tr>
			  <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor Mesin</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">23432423</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor Rangka</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">4354363</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Nomor BPKB</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">53453453</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Warna</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">Hitam</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Tahun Pembuatan</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">2019</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Isi Silinder</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">110</td>
	          </tr>
	          <tr class="" style="">
			  	<td style="width: 10%; text-align: center;">Grade</td>
	            <td style="width: 5%; text-align: center;">:</td>
	            <td style="width: 10%; text-align: center;">B</td>
	          </tr>



		';




$table .= ' </tbody>
			</table>';


echo $table;

?>


	</body>
</html>
