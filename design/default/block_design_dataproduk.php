<?php
    $sqlprod = "SELECT * FROM lh_produk ORDER BY `artist` ASC";
	$prodlist = $db->Execute($sqlprod);
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-shop">Data Produk</a>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-navigation ui-mini">
Data Produk
</a>

	<div role="main">
		<ul data-role="listview" data-inset="true">
<?php
	while($data_prodlist = $prodlist->FetchRow()) {
?>
			<li class="listprod">
					<img src="uploads/thumb/<?=$data_prodlist['image'];?>" class="ui-li-thumb">
					<h2 style="line-height:40px; margin-bottom:0px;"><?=$data_prodlist['title'];?></h2>
					<p style="margin-top:0px;">
						<?=$data_prodlist['description'];?>
						<div>
						<a href="index.php?view=deleteproduk01&id=<?=$data_prodlist['id_produk'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-delete">Delete</a>
						<a href="index.php?view=editproduk&id=<?=$data_prodlist['id_produk'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-edit">Edit</a>
						</div>
					</p>
					<p class="ui-li-aside"><?=$data_prodlist['artist'];?></p>
			</li>
<?php
	} //EOF while($data_prodlist = $prodlist->FetchRow())
?>
		</ul>
	</div><!-- /content -->