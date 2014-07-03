<?php
	include ("../../cek_login.php");
	include ("../../lib/adodb/adodb.inc.php");
	include ("../../config.php");

$tahun = $_POST['tahun'];

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "rekap_downpayment_artjog[tahun].xls"
header("Content-Disposition: attachment; filename=rekap_downpayment_artjog".$tahun.".xls");

?>
<html>
<head>
    <style>
        body {
            font-family: Calibri;
        }
        table {
            border-collapse: collapse;
        }
        th {
            background-color: #999999;
        }
        th, td {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <table>
        <thead>
			<tr>
				<th>Nomor Invoice</th>
				<th>Nomor Kwitansi Pelunasan</th>
				<th>Nomor Kwitansi DP</th>
				<th colspan="2">Down Payment</th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>IDR</th>
				<th>USD</th>
			</tr>
        </thead>
        <tbody>
<?php

	$sqlexp ="
		SELECT
			`lh_invoice`.`invoice_number` AS invoice_number,
			`lh_invoice`.`kwitansi` AS kwitansi,
			`lh_invoice_kwitansidp`.`no_kwitansi` AS kwitansi_dp,
			`lh_invoice_kwitansidp`.`dp` AS idr_dp,
			`lh_invoice_kwitansidp`.`dpUS` AS usd_dp
		FROM `lh_invoice_kwitansidp`
		JOIN `lh_invoice`
			ON `lh_invoice_kwitansidp`.`id_invoice`=`lh_invoice`.`id_invoice`
		WHERE `lh_invoice`.`tahun`=$tahun
	";
	
	$exp = $db->Execute($sqlexp);
	while($data_exp = $exp->FetchRow()) {
?>
			<tr>
				<td><?=$data_exp['invoice_number']?></td>
				<td><?=$data_exp['kwitansi']?></td>
				<td><?=$data_exp['kwitansi_dp']?></td>
				<td><?=number_format($data_exp['idr_dp'], 0, ',', '')?></td>
				<td><?=number_format($data_exp['usd_dp'], 0, ',', '')?></td>
			</tr>
<?php
	} //EOF while($data_exp = $exp->FetchRow())
?>
        </tbody>
    </table>
</body>
</html>