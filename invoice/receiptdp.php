<?php
$idkw = $_GET['idkw'];
	$perinv = $db->Execute("SELECT * FROM `lh_invoice` WHERE `id_invoice`= '$inv'");
	while ($tahunperinv = $perinv->FetchRow()) {
		$tahun = $tahunperinv['tahun'];
		$terbilang = $tahunperinv['terbilang'];
	}
			/*Menampilkan header*/
			$template = $db->Execute("SELECT * FROM  `lh_invoice_periode` WHERE `tahun`='$tahun'");
			while($head = $template->FetchRow()) {
				$hlogo = $head['logo'];
				$hheader = $head['header'];
				$hfooter = $head['footer'];
			} //EOF while($head = $template->FetchRow())
?>
		<table width="100%" border="0">
			<tr>
				<td align="left" class="default"><img class="logo" src="../uploads/<?=$hlogo?>"></td>
				<td align="right" class="default"><?=$hheader?></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><b>DOWN PAYMENT RECEIPT</b></td>
			</tr>
		</table>
		<?php
		/* Menampilkan data pemesan */
			$pemesan = $db->Execute("
				SELECT DISTINCT lh_penjualan.id_customer AS id,
					lh_customer.nama AS nama,
					lh_customer.alamat AS alamat,
					lh_penjualan.tanggal_pesan AS tanggal_pesan,
					lh_penjualan.invoice_number AS invoice_id,
					lh_penjualan.due_date AS due_date,
					lh_invoice_kwitansidp.no_kwitansi AS kwitansi,
					lh_invoice_kwitansidp.terbilang AS terbilang,
					lh_invoice_kwitansidp.tgl_bayar AS tgl_bayar
				FROM `lh_penjualan`
				JOIN `lh_customer` ON `lh_penjualan`.`id_customer`=`lh_customer`.`id_customer`
				JOIN `lh_invoice` ON `lh_penjualan`.`invoice_number`=`lh_invoice`.`id_invoice`
				JOIN `lh_invoice_kwitansidp` ON `lh_penjualan`.`invoice_number`=`lh_invoice_kwitansidp`.`id_invoice`
				WHERE lh_invoice_kwitansidp.id = '$idkw'
			");
			while($data = $pemesan->FetchRow()) {
				$terbilang = $data['terbilang'];
		?>
		<table width="100%" border="0">
			<tr>
				<td width="57%" rowspan="4" align="left" class="default">
					Buyer:<br />
					<b><?=$data['nama'];?></b><br />
					<?=$data['alamat'];?>
				</td>
			</tr>
			<tr>
				<td align="right" class="default">Date :</td><td align="left" class="default"><?=date('d F Y', strtotime($data['tgl_bayar']))?></td>
			</tr>
			<tr>
				<td align="right" class="default">Receipt No. :</td><td align="left" class="default"><?=$data['kwitansi'];?></td>
			</tr>
			<tr>
				<td align="right" class="default">&nbsp;</td><td align="left" class="default"></td>
			</tr>
		</table>
		<?php
			} //EOF while($template->FetchRow())
		?>
		<table width="100%" border="0" cellspacing="2" cellpadding="4">
			<tr class="tablehead">
				<td class="table">Artist</td><td class="table">Image</td><td class="table">Description</td><td class="table">DP<br />(USD)</td><td class="table">DP<br />(IDR)</td><!--<td class="table">Disc. (%)</td>--><td class="table">Total<br />(USD)</td><td class="table">Total<br />(IDR)</td>
			</tr>
		<?php
			/* Menampilkan data yang dipesan konsumen */
			$rs = $db->Execute("
				SELECT *
				FROM `lh_penjualan`
				LEFT JOIN `lh_produk`
				ON lh_penjualan.id_produk=lh_produk.id_produk
				LEFT JOIN `lh_currency`
				ON `lh_produk`.`hpam_curr_price`=`lh_currency`.`id_currency`
				LEFT JOIN `lh_invoice_kwitansidp`
				ON `lh_penjualan`.`invoice_number`=`lh_invoice_kwitansidp`.`id_invoice`
				WHERE lh_invoice_kwitansidp.id = '$idkw'
			");
			$sumtotal = 0;
			$sumtotalUS = 0;
			while($row = $rs->FetchRow()) {
				//Rp total
				$subtotal = $row['dp'];
				//$disctotal = ($subtotal / 100) * $row['discount'];
				$total = $subtotal;// - $disctotal;
				$sumtotal += $total;
				
				//$ total
				$subtotalUS = $row['dpUS'];
				//$disctotalUS = ($subtotalUS / 100) * $row['discount'];
				$totalUS = $subtotalUS;// - $disctotalUS;
				$sumtotalUS += $totalUS;
		?>
			<tr class="tablecont">
				<td class="table"><?=$row['artist'];?></td><td class="table"><img class="imgkarya" src="../uploads/thumb/<?=$row['image'];?>"></td><td class="table"><?=$row['title'];?><br /><?=$row['description'];?></td><td class="table"><?=number_format($row['dpUS'], 0, '.', ',');?></td><td align="right" class="table"><?=number_format($row['dp'], 0, ',', '.');?></td><!--<td class="table"><?=number_format($row['discount'], 2, ',', '.');?></td>--><td align="right" class="table"><?=number_format($totalUS, 0, '.', ',');?></td><td align="right" class="table"><?=number_format($total, 0, ',', '.');?></td>
			</tr>
		<?php
			} //EOF while($row = $rs->FetchRow())
		?>
			<tr class="tablecont">
				<td class="tablecont">&nbsp;</td><td class="tablecont">&nbsp;</td><td class="tablecont">Total</td><td class="tablecont">&nbsp;</td><td align="right" class="tablecont">&nbsp;</td><!--<td class="tablecont">&nbsp;</td>--><td align="right" class="table"><b><?=number_format($sumtotalUS, 0, '.', ',')?></b></td><td align="right" class="table"><b><?=number_format($sumtotal, 0, ',', '.')?></b></td>
			</tr>
		</table>
		
		<table width="100%" border="0">
			<tr>
				<td class="default">&nbsp;</td>
			<tr>
			<tr>
				<td class="default">
				<b>
				Say Total Paid:<br />
				<?=$terbilang?>
				</b>
				</td>
			<tr>
		</table>
		<table class="default" width="100%">
			<tr>
				<td width="25%"></td>
				<td width="25%"></td>
				<td width="25%"></td>
				<td width="25%">
					<center>
					Regards,<br />
					<img src="../uploads/ttd_seno.png"><br />
					<b>Putragama Hiangsena</b><br />
					Finance<br />
					ART|JOG|14
					</center>
				</td>
			</tr>
		</table>
