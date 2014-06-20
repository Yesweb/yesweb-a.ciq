<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Periode Invoice / Kwitansi</a>
<form>
    <input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="persist">Tahun</th>
            <th data-priority="1">Logo</th>
            <th data-priority="2">Header</th>
            <th data-priority="3">Footer</th>
            <!--<th data-priority="4">Edit</th>-->
        </tr>
	</thead>
	<tbody>
<?php
    $sqlper = "
		SELECT * FROM lh_invoice_periode
		ORDER BY `tahun` DESC
	";
	$perlist = $db->Execute($sqlper);

	while($data_perlist = $perlist->FetchRow()) {
?>
		<tr>
			<td><?=$data_perlist['tahun'];?></td>
			<td><img src="uploads/thumb/<?=$data_perlist['logo'];?>"></td>
			<td><?=$data_perlist['header'];?></td>
			<td><?=$data_perlist['footer'];?></td>
			<!--<td><a href="index.php?view=<?=$data_perlist['id_inv_per'];?>">Edit</a></td>-->
		</tr>
<?php
	} // EOF while($data_perlist = $perlist->FetchRow())
?>
	</tbody>
</table>
<a href="index.php?view=addperinv" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Tambah Periode</a>