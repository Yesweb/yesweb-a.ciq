<?php
	include ("../../cek_login.php");
	include ("../../lib/adodb/adodb.inc.php");
	include ("../../config.php");

$tahun = $_POST['tahun'];

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "rekap_penjualan_artjog[tahun].xls"
header("Content-Disposition: attachment; filename=rekap_penjualan_artjog".$tahun.".xls");

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
				<th>Artist</th>
				<th>Image</th>
				<th>Description</th>
				<th>Artwork Status</th>
				<th>Harga Seniman</th>
				<th>Harga Seniman</th>
				<th>Harga HPAM</th>
				<th>Harga HPAM</th>
				<th>Buyer</th>
				<th>Discount (%)</th>
				<th>Harga Invoice</th>
				<th>Harga Invoice</th>
				<th>No. Invoice</th>
				<th>No. Receipt</th>
				<th>Status Pembayaran</th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>IDR</th>
				<th>USD</th>
				<th>IDR</th>
				<th>USD</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>IDR</th>
				<th>USD</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
        </thead>
        <tbody>
<?php

	$sqlexp ="
		SELECT
			`lh_produk`.`artist` AS artist,
			`lh_produk`.`image` AS image,
			`lh_produk`.`title` AS title,
			`lh_produk`.`description` AS description,
			`lh_penjualan_stat`.`stat_name` AS stat_name,
			`lh_produk`.`price` AS idr_artist_price,
			`lh_produk`.`priceUS` AS usd_artist_price,
			`lh_produk`.`hpam_price` AS idr_hpam_price,
			`lh_produk`.`hpam_priceUS` AS usd_hpam_price,
			`lh_customer`.`nama` AS buyer,
			`lh_penjualan`.`discount` AS discount,
			(`lh_produk`.`hpam_price` - ((`lh_produk`.`hpam_price` / 100) * `lh_penjualan`.`discount`)) AS idr_invoice,
			(`lh_produk`.`hpam_priceUS` - ((`lh_produk`.`hpam_priceUS` / 100) * `lh_penjualan`.`discount`)) AS usd_invoice,
			`lh_invoice`.`invoice_number` AS invoice_number,
			`lh_invoice`.`kwitansi` AS kwitansi,
			`lh_invoice_status`.`status` AS status
		FROM `lh_penjualan`
		JOIN `lh_produk`
			ON `lh_penjualan`.`id_produk`=`lh_produk`.`id_produk`
		JOIN `lh_penjualan_stat`
			ON `lh_penjualan`.`id_status`=`lh_penjualan_stat`.`stat_code`
		JOIN `lh_customer`
			ON `lh_penjualan`.`id_customer`=`lh_customer`.`id_customer`
		JOIN `lh_invoice`
			ON `lh_penjualan`.`invoice_number`=`lh_invoice`.`id_invoice`
		JOIN `lh_invoice_status`
			ON `lh_invoice`.`invoice_status`=`lh_invoice_status`.`id_inv_stat`
		WHERE `lh_invoice`.`tahun`=$tahun
	";
	
	$exp = $db->Execute($sqlexp);
	while($data_exp = $exp->FetchRow()) {
?>
			<tr>
				<td><?=$data_exp['artist']?></td>
				<td><img src="http://173.45.230.176/yesweb-a.ciq/uploads/thumb/<?=$data_exp['image']?>"></td>
				<td><?=$data_exp['title']?>, <?=$data_exp['description']?></td>
				<td><?=$data_exp['stat_name']?></td>
				<td><?=number_format($data_exp['idr_artist_price'], 0, ',', '')?></td>
				<td><?=number_format($data_exp['usd_artist_price'], 0, ',', '')?></td>
				<td><?=number_format($data_exp['idr_hpam_price'], 0, ',', '')?></td>
				<td><?=number_format($data_exp['usd_hpam_price'], 0, ',', '')?></td>
				<td><?=$data_exp['buyer']?></td>
				<td><?=number_format($data_exp['discount'], 2, ',', '')?></td>
				<td><?=number_format($data_exp['idr_invoice'], 0, ',', '')?></td>
				<td><?=number_format($data_exp['usd_invoice'], 0, ',', '')?></td>
				<td><?=$data_exp['invoice_number']?></td>
				<td><?=$data_exp['kwitansi']?></td>
				<td><?=$data_exp['status']?></td>
			</tr>
<?php
	} //EOF while($data_exp = $exp->FetchRow())
?>
        </tbody>
    </table>
</body>
</html>