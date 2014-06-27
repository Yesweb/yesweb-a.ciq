<?php
$invid = $_GET['id'];

    $sqlinv = "SELECT * FROM `lh_invoice` WHERE `id_invoice`='$invid'";
	$inv = $db->Execute($sqlinv);
	while($data_inv = $inv->FetchRow()) {
		$invoice = $data_inv['invoice_number'];
	} //EOF while($data_inv = $inv->FetchRow())
?>
<a href="index.php?view=kwitansi&id=<?=$invid?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Buat Nomor Kwitansi DP</a>
<form action="index.php?view=addkwidp" method="post">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="invid">Invoice ID:</label>
			<input type="hidden" name="invid" id="invid" value="<?=$invid;?>" data-clear-btn="true">
			<?=$invid;?>
		</li>
		<li class="ui-field-contain">
			<label for="inv">Nomor Invoice:</label>
			<?=$invoice?>
		</li>
		<li class="ui-field-contain">
			<label for="dpUSD">DP USD:</label>
			<input type="text" name="dpUS" id="dpUS" value="" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="dpIDR">DP IDR:</label>
			<input type="text" name="dpIDR" id="dpIDR" value="" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="terbilang">Terbilang:</label>
			<textarea name="terbilang"></textarea>
		</li>
		<li class="ui-field-contain">
			<label for="tgl_bayar">Tanggal bayar:</label>
			<input type="text" name="tgl_bayar" id="tgl_bayar" value="" data-role="date">
		</li>
		<li class="ui-field-contain">
			<label for="nokwiDP">Nomor Kwitansi:</label>
			<input name="nokwiDP" type="text" value="<?=$kwitansitemplateDP?>">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>