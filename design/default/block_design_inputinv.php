<?php
$orderid = $_GET['id'];
$invcur = $_GET['inv'];
$invid = $_GET['idv'];
$stat_code = $_GET['stpnc'];
$stat_name = $_GET['stpn'];
?>
<a href="index.php?view=datapemesanan" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Masukkan Nomor Invoice</a>
<form action="index.php?view=inputinvedit" method="post">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="orderid">Order ID:</label>
			<input type="hidden" name="orderid" id="orderid" value="<?=$orderid;?>" data-clear-btn="true">
			<?=$orderid;?>
		</li>
		<li class="ui-field-contain">
			<label for="select-choice-a" class="select">Status Penjualan:</label>
			<select name="stat_penj" id="select-choice-a" data-native-menu="false">
				<option value="<?=$stat_code?>"><?=$stat_name?></option>
<?php
    $sqlstpn = "SELECT * FROM lh_penjualan_stat ORDER BY stat_code ASC";
	$stpnlist = $db->Execute($sqlstpn);
	while($data_stpnlist = $stpnlist->FetchRow()) {
?>
				<option value="<?=$data_stpnlist['stat_code']?>"><?=$data_stpnlist['stat_name']?></option>
<?php
	} //EOF while($data_stpnlist = $stpnlist->FetchRow())
?>
			</select>
		</li>
		<li class="ui-field-contain">
			<label for="noinv">Nomor Invoice:</label>
			<select name="select-choice-a" id="noinv" data-native-menu="false">
				<option value="<?=$invid;?>"><?=$invcur;?></option>
				
<?php
    $sqlinv = "SELECT * FROM lh_invoice ORDER BY id_invoice DESC";
	$invlist = $db->Execute($sqlinv);
	while($data_invlist = $invlist->FetchRow()) {
?>
				<option value="<?=$data_invlist['id_invoice'];?>"><?=$data_invlist['invoice_number'];?></option>
<?php
	} //EOF while($data_invlist = $invlist->FetchRow())
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
