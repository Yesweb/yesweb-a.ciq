<?php
$id = $_GET['id'];

    $sqlcust = "SELECT * FROM lh_customer WHERE id_customer='$id'";
	$cust = $db->Execute($sqlcust);
	while($data_cust = $cust->FetchRow()) {
		$idprod = $data_cust['id_customer'];
		$nama = $data_cust['nama'];
		$alamat = $data_cust['alamat'];
		$email = $data_cust['email'];
	}
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-alert ui-btn-icon-left">Anda yakin menghapus data ini?</a>

	<div role="main">
		<ul data-role="listview" data-inset="true" class="lineheight16">
			<li>
				<img src="design/<?= $_CONFIG['templ']['main']; ?>/images/album-ag.jpg">
				<h2><?=$nama?></h2>
				<p>
					<?=$email;?>, <?=$alamat?>
				</p>
			</li>
		</ul>
	</div>
	<div role="main" class="ui-content">
		<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
		<a href="index.php?view=deletecust02&id=<?=$idprod?>" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow">Delete</a>
	</div>