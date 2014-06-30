<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Rekap Down Payment</a>
<div class="ui-body ui-body-a ui-corner-all" style="margin-bottom: 10px;">
	<h3>Perhatian</h3>
	<p>Untuk memperoleh data yang lebih terperinci dan valid, diperlukan dua buah file yang bisa diperoleh melalui menu <a href="#">Rekap Penjualan</a> dan <a href="#">Rekap Down Payment</a>.</p>
</div>
<form action="application/exportdata/export_excel_part2.php" target="_blank" method="post"> 
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="tahun">Periode Tahun:</label>
			<select name="tahun" id="tahun" data-native-menu="false">
<?php
    $sqlthn = "SELECT * FROM lh_invoice_periode ORDER BY tahun DESC";
	$thnlist = $db->Execute($sqlthn);
	while($data_thnlist = $thnlist->FetchRow()) {
?>
				<option value="<?=$data_thnlist['tahun'];?>"><?=$data_thnlist['tahun'];?></option>
<?php
	} //EOF while($data_thnlist = $thnlist->FetchRow())
?>
			</select>
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Export</button></div>
			</fieldset>
		</li>
	</ul>
</form>