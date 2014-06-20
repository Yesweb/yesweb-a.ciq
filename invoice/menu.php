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
		<li><a href="index.php?idv=<?=$data_menu['invoice_id'];?>"><?=$data_menu['invoice'];?></a></li>
	<?php
		} //EOF while($data_menu = $menu->FetchRow())
	?>
	</ul>
	<?php
		if ($inv == 0) {
			echo "<a class='nonprint' href='#'>Print Preview</a>";
		} else {
			echo "<a class='print' href='print.php?idv=".$_GET['idv']."' target='_blank'>Print Preview</a>";
		}
	?>
</div>