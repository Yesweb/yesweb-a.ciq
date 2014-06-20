<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Input Invoice</a>
<form action="index.php?view=addinvoiceinsert">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="tahun">Periode Invoice:</label>
			<select name="select-custom-2" id="select-custom-2" data-native-menu="false">
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
		<li class="ui-field-contain">
			<label for="invoice">Nomor Invoice:</label>
			<div data-role="controlgroup" data-type="horizontal">
				<input name="invoiceformat" id="currency-controlgroup" type="text" data-wrapper-class="controlgroup-textinput ui-btn" value="<?=$invoicetemplate?>" size="25" readonly>
				<input name="invoicenum" id="currency-controlgroup" type="text" data-wrapper-class="controlgroup-textinput ui-btn" value="" size="3">
			</div>
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>