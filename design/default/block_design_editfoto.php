<?php
$prodid = $_GET['id'];

	$sqlfoto = "
		SELECT * FROM lh_produk WHERE id_produk='$prodid'
	";
	$foto = $db->Execute($sqlfoto);
	while($data_foto = $foto->FetchRow()) {
		$id = $data_foto['id_produk'];
		$artist = $data_foto['artist'];
		$title = $data_foto['title'];
		$image = $data_foto['image'];
	}
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-edit ui-btn-icon-left">Edit Foto</a>
<form enctype="multipart/form-data" method="post" action="index.php?view=editfotoupdate" data-ajax="false">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="id">ID:</label>
			<input type="text" name="id" id="id" value="<?=$id?>" readonly data-clear-btn="false">
		</li>
		<li class="ui-field-contain">
			<label for="name2">Artist:</label>
			<input type="text" name="name2" id="name2" value="<?=$artist?>" readonly data-clear-btn="false">
		</li>
		<li class="ui-field-contain">
			<label for="title">Judul:</label>
			<input type="text" name="title" id="title" value="<?=htmlspecialchars($title, ENT_QUOTES)?>" readonly data-clear-btn="false">
		</li>
		<li class="ui-field-contain" class="ui-field-contain">
			<label for="foto">&nbsp;</label>
			<img src="uploads/<?=$image?>">
		</li>
		<li class="ui-field-contain">
			<label for="file">Gambar baru:</label>
			<input type="file" name="file" id="file" data-clear-btn="true">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
					<div class="ui-block-b"><input type="submit" value="submit" name="submit"></div>
			</fieldset>
		</li>
	</ul>
</form>