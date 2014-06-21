<?php
$id = $_GET['id'];

    $sqlprod = "SELECT * FROM lh_produk WHERE id_produk='$id'";
	$prod = $db->Execute($sqlprod);
	while($data_prod = $prod->FetchRow()) {
		$idprod = $data_prod['id_produk'];
		$artist = $data_prod['artist'];
		$title = $data_prod['title'];
		$image = $data_prod['image'];
	}
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-alert ui-btn-icon-left">Anda yakin menghapus data ini?</a>

	<div role="main">
		<ul data-role="listview" data-inset="true">
			<li class="listprod">
				<img src="uploads/thumb/<?=$image?>" class="ui-li-thumb">
				<h2 style="line-height:40px; margin-bottom:0px;"><?=$title?></h2>
				<p style="margin-top:0px;">&nbsp;</p>
				<p class="ui-li-aside"><?=$artist?></p>
			</li>
		</ul>
	</div>
	<div role="main" class="ui-content">
		<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
		<a href="index.php?view=deleteproduk02&id=<?=$idprod?>" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow">Delete</a>
	</div>