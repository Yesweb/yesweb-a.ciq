<?php
$invid = $_GET['id'];
$inv = $_GET['inv'];
$kwi = $_GET['kwi'];

if ($kwi == add) {
	$showkwi = $kwitansitemplate;
} else {
	$showkwi = $kwi;
}
?>
<a href="index.php?view=datainvoice" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Buat Nomor Kwitansi</a>
<form action="index.php?view=editkwiinsert" method="post">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="invid">Invoice ID:</label>
			<input type="hidden" name="invid" id="invid" value="<?=$invid;?>" data-clear-btn="true">
			<?=$invid;?>
		</li>
		<li class="ui-field-contain">
			<label for="noinv">Nomor Invoice:</label>
			<?=$inv;?>
		</li>
		<li class="ui-field-contain">
			<label for="nokwi">Nomor Kwitansi:</label>
			<input type="text" name="nokwi" id="nokwi" value="<?=$showkwi;?>" data-clear-btn="true">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>