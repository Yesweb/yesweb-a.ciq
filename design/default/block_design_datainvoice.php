<?php
    $sqlinv = "
		SELECT * FROM lh_invoice
		LEFT JOIN lh_invoice_status
		ON lh_invoice.invoice_status=lh_invoice_status.id_inv_stat
		ORDER BY `id_invoice` DESC
	";
	$invlist = $db->Execute($sqlinv);
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Data Invoice / Kwitansi</a>
<form>
    <input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="persist">Nomor Invoice</th>
            <th data-priority="2">Tahun Invoice</th>
            <th data-priority="3">Status Invoice</th>
            <th data-priority="4">Terbilang</th>
            <th data-priority="5">Nomor Kwitansi</th>
        </tr>
	</thead>
	<tbody>
<?php
	while($data_invlist = $invlist->FetchRow()) {
?>
		<tr>
			<td><a href="#" data-rel="external"><?=$data_invlist['invoice_number'];?></a></td>
			<td><?=$data_invlist['tahun'];?></td>
			<td><a href="index.php?view=editinvstat&id=<?=$data_invlist['id_invoice'];?>&inv=<?=$data_invlist['invoice_number'];?>&stat=<?=$data_invlist['status'];?>"><?=$data_invlist['status'];?></a></td>
			<td><?=$data_invlist['terbilang'];?></td>
			<td>
<?php
		if ($data_invlist['invoice_status'] == 3) {
			echo "<a href='index.php?view=editkwi&id=".$data_invlist['id_invoice']."&inv=".$data_invlist['invoice_number']."&kwi=".$data_invlist['kwitansi']."'>".$data_invlist['kwitansi']."</a>";
		} else {
			echo $data_invlist['kwitansi'];
		}
?>
			</td>
		</tr>
<?php
	} //while($data_invlist = $invlist->FetchRow())
?>
	</tbody>
</table>