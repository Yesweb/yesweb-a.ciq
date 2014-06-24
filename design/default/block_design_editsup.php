<?php
$id = $_GET['id'];

    $sqlsup = "SELECT * FROM lh_supplier WHERE id_sup='$id'";
	$sup = $db->Execute($sqlsup);
	while($data_sup = $sup->FetchRow()) {
		$id_sup = $data_sup['id_sup'];
		$nama = $data_sup['nama'];
		$email = $data_sup['email'];
		$telp = $data_sup['telp'];
		$alamat = $data_sup['alamat'];
	}
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Input Artist</a>
<form action="index.php?view=editsupupdate" method="post">
	<input type="hidden" name="supid" id="supid" value="<?=$id_sup?>">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="name2">Nama:</label>
			<input type="text" name="name2" id="name2" value="<?=htmlspecialchars($nama, ENT_QUOTES)?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="<?=$email?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="telp2">Nomor telpon:</label>
			<input type="text" name="telp2" id="telp2" value="<?=$telp?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="textarea2">Alamat:</label>
			<textarea cols="40" rows="8" name="textarea2" id="textarea2"><?=$alamat?></textarea>
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>
			</fieldset>
		</li>
	</ul>
</form>