<?php
$id = $_GET['id'];

    $sqlinv = "SELECT * FROM lh_invoice WHERE id_invoice='$id'";
	$inv = $db->Execute($sqlinv);
	while($data_inv = $inv->FetchRow()) {
		$id_invoice = $data_inv['id_invoice'];
		$invoice_number = $data_inv['invoice_number'];
		$invoice_status = $data_inv['invoice_status'];
		$terbilang = $data_inv['terbilang'];
		$kwitansi = $data_inv['kwitansi'];
	}
?>
<a href="index.php?view=kwitansi&id=<?=$id?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-alert ui-btn-icon-left">Anda yakin menghapus data ini?</a>

<form>
    <input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="1">ID Data</th>
            <th data-priority="2">omor Invoice</th>
            <th data-priority="3">Nomor Kwitansi</th>
        </tr>
	</thead>
	<tbody>
		<tr>
            <td data-priority="1"><?=$id_invoice?></td>
            <td data-priority="2"><?=$invoice_number?></td>
            <td data-priority="3"><?=$kwitansi?></td>
		</tr>
	</tbody>
</table>
<div role="main" class="ui-content">
	<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
	<a href="index.php?view=deleteinv&id=<?=$id_invoice?>" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow">Delete</a>
</div>