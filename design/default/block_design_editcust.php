<?php
$idcust = $_GET['id'];

    $sqlmem = "SELECT * FROM lh_customer WHERE id_customer='$idcust'";
	$memlist = $db->Execute($sqlmem);
	while($data_memlist = $memlist->FetchRow()) {
		$nama = $data_memlist['nama'];
		$email = $data_memlist['email'];
		$alamat = $data_memlist['alamat'];
		$no_telp = $data_memlist['no_telp'];
	}
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Edit Kolektor</a>
<form action="index.php?view=editcustupdate" method="post">
	<input type="hidden" name="id" value="<?=$idcust?>">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="name2">Nama:</label>
			<input type="text" name="name2" id="name2" value="<?=$nama?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="<?=$email?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="telp2">Nomor telpon:</label>
			<input type="text" name="telp2" id="telp2" value="<?=$no_telp?>" data-clear-btn="true">
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