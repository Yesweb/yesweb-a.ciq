<?php
$invid = $_GET['id'];
$inv = $_GET['inv'];
$invstat = $_GET['stat'];
?>
<a href="index.php?view=datainvoice" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Edit Status Invoice</a>
<form action="index.php?view=editinvstatinset" method="post">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="invid">Invoice ID:</label>
			<input type="hidden" name="invid" id="invid" value="<?=$invid;?>" data-clear-btn="true">
			<?=$invid;?>
		</li>
		<li class="ui-field-contain">
			<label for="inv">Invoice:</label>
			<?=$inv;?>
		</li>
		<li class="ui-field-contain">
			<label for="terbilang">Terbilang:</label>
<?php
    $sqlterb = "SELECT * FROM lh_invoice WHERE id_invoice=$invid";
	$terblist = $db->Execute($sqlterb);
	while($data_terblist = $terblist->FetchRow()) {
		$terbilang = $data_terblist['terbilang'];
		$statid = $data_terblist['invoice_status'];
	}
?>
			<textarea cols="40" rows="8" name="description" id="textarea2"><?=$terbilang?></textarea>
		</li>
		<li class="ui-field-contain">
			<label for="noinv">Status Invoice:</label>
			<select name="select-choice-a" id="select-choice-a" data-native-menu="false">
				<option value="<?=$statid;?>"><?=$invstat;?></option>
				
<?php
    $sqlinvstat = "SELECT * FROM lh_invoice_status ORDER BY id_inv_stat DESC";
	$invstatlist = $db->Execute($sqlinvstat);
	while($data_invstatlist = $invstatlist->FetchRow()) {
?>
				<option value="<?=$data_invstatlist['id_inv_stat'];?>"><?=$data_invstatlist['status'];?></option>
<?php
	} //EOF while($data_invstatlist = $invstatlist->FetchRow())
?>				

			</select>
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>