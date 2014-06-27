<div class="menu">
	<b><a href="index.php">HOME</a></b><br />
	<b>INVOICE</b>
	<ul>
	<?php
		//Menampilkan Invoice
		$menu = $db->Execute("
			SELECT DISTINCT lh_penjualan.invoice_number AS invoice_id,
				lh_invoice.invoice_number AS invoice
			FROM `lh_penjualan`
			LEFT JOIN `lh_invoice`
			ON lh_penjualan.invoice_number=lh_invoice.id_invoice
		");
		while($data_menu = $menu->FetchRow()) {
	?>
		<li><a href="index.php?view=invoice&idv=<?=$data_menu['invoice_id'];?>"><?=$data_menu['invoice'];?></a></li>
	<?php
		} //EOF while($data_menu = $menu->FetchRow())
	?>
	</ul>
	<b>RECEIPT</b>
	<ul>
	<?php
		//Menampilkan kwitansi pelunasan
		$menurec = $db->Execute("
			SELECT * FROM `lh_invoice`
			WHERE menu_stat=1
			ORDER BY id_invoice ASC
		");
		while($data_menurec = $menurec->FetchRow()) {
	?>
		<li><a href="index.php?view=receipt&idv=<?=$data_menurec['id_invoice'];?>"><?=$data_menurec['kwitansi']?></a></li>
	<?php
		}
	?>
	</ul>
	<?php
	if (isset($inv)) {
	?>
	<b>DOWN PAYMENT RECEIPT</b>
	<ul>
	<?php
		//Menampilkan kwitansi DP
		$menudp = $db->Execute("
			SELECT * FROM `lh_invoice_kwitansidp`
			WHERE id_invoice=$inv
			ORDER BY id ASC
		");
		while($data_menudp = $menudp->FetchRow()) {
	?>
		<li><a href="index.php?view=receiptdp&idv=<?=$data_menudp['id_invoice'];?>&idkw=<?=$data_menudp['id'];?>"><?=$data_menudp['no_kwitansi'];?></a></li>
	<?php
		} //EOF while($data_menudp = $menudp->FetchRow())
	?>
	</ul>
	<?php
	} //EOF if (isset($inv))
		if ($inv == 0) {
			echo "<a class='nonprint' href='#'>Print Preview</a>";
		} else {
			echo "<a class='print' href='print.php?view=".$_GET['view']."&idv=".$_GET['idv']."&idkw=".$_GET['idkw']."' target='_blank'>Print Preview</a>";
		}
	?>
</div>