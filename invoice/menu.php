<div class="menu">
	<b>INVOICE</b>
	<ul>
	<?php
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
		if ($inv == 0) {
			echo "<a class='nonprint' href='#'>Print Preview</a>";
		} else {
			echo "<a class='print' href='print.php?view=".$_GET['view']."&idv=".$_GET['idv']."' target='_blank'>Print Preview</a>";
		}
	?>
</div>