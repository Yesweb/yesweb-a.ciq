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
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-alert ui-btn-icon-left">Anda yakin menghapus data ini?</a>
<div role="main">
	<ul data-role="listview" data-inset="true" class="lineheight16">
		<li>
			<img src="design/<?= $_CONFIG['templ']['main']; ?>/images/album-ag.jpg">
			<h2><?=$nama?></h2>
			<p><?=$alamat?>, <?=telp?></p>
		</li>
	</ul>
</div>
<div role="main" class="ui-content">
	<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
	<a href="index.php?view=deletesup02&id=<?=$id_sup?>" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow">Delete</a>
</div>