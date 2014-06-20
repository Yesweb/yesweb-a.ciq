<?php
    $sqlprod = "SELECT * FROM lh_produk ORDER BY `artist` ASC";
	$prodlist = $db->Execute($sqlprod);
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-shop ui-btn-icon-left">Data Produk</a>

	<div role="main">
		<ul data-role="listview" data-inset="true">
<?php
	while($data_prodlist = $prodlist->FetchRow()) {
?>
			<li class="listprod">
				<a href="#">
					<img src="uploads/thumb/<?=$data_prodlist['image'];?>" class="ui-li-thumb">
					<h2 style="line-height:40px; margin-bottom:0px;"><?=$data_prodlist['title'];?></h2>
					<p style="margin-top:0px;"><?=$data_prodlist['description'];?></p>
					<p class="ui-li-aside"><?=$data_prodlist['artist'];?></p>
				</a>
			</li>
<?php
	} //EOF while($data_prodlist = $prodlist->FetchRow())
?>
		</ul>
	</div><!-- /content -->
<!-- 
uploads/<?=$data_prodlist['image'];?>
design/<?= $_CONFIG['templ']['main']; ?>/images/album-ag.jpg
-->