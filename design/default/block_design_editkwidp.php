<?php
$nav = $_GET['nav'];
$invid = $_GET['id'];

    $sqlkwi = "SELECT * FROM `lh_invoice_kwitansidp` WHERE `id`='$invid'";
	$kwi = $db->Execute($sqlkwi);
	while($data_kwi = $kwi->FetchRow()) {
		$idkwi = $data_kwi['id'];
		$idinv = $data_kwi['id_invoice'];
		$dp = $data_kwi['dp'];
		$dpus = $data_kwi['dpUS'];
		$terbilang = $data_kwi['terbilang'];
		$no_kwitansi = $data_kwi['no_kwitansi'];
		$tgl_bayar = $data_kwi['tgl_bayar'];
	} //EOF while($data_kwi = $kwi->FetchRow())
	
	$sqlinv = "SELECT * FROM `lh_invoice` WHERE `id_invoice`='$idinv'";
	$inv = $db->Execute($sqlinv);
	while($data_inv = $inv->FetchRow()) {
		$invoice_number = $data_inv['invoice_number'];
	} //EOF while($data_inv = $inv->FetchRow())
?>
<a href="index.php?view=kwitansi&id=<?=$nav?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Edit Kwitansi DP</a>
<form action="index.php?view=kwidpupdate&id=<?=$nav?>" method="post">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="kwiid">Kwitansi ID:</label>
			<input type="hidden" name="kwiid" id="kwiid" value="<?=$idkwi;?>" data-clear-btn="true">
			<?=$idkwi;?>
		</li>
		<li class="ui-field-contain">
			<label for="inv">U/ Nmr. Invoice:</label>
			<?=$invoice_number?>
		</li>
		<li class="ui-field-contain">
			<label for="dpUSD">DP USD:</label>
			<input type="text" name="dpUS" id="dpUS" value="<?=$dpus?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="dpIDR">DP IDR:</label>
			<input type="text" name="dpIDR" id="dpIDR" value="<?=$dp?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="terbilang">Terbilang:</label>
			<textarea name="terbilang"><?=$terbilang?></textarea>
		</li>
		<li class="ui-field-contain">
			<label for="tgl_bayar">Tanggal bayar:</label>
			<input type="text" name="tgl_bayar" id="tgl_bayar" value="<?=$tgl_bayar?>" data-role="date">
		</li>
		<li class="ui-field-contain">
			<label for="nokwiDP">Nomor Kwitansi:</label>
			<input type="text" name="nokwiDP" id="nokwiDP" value="<?=$no_kwitansi?>">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>