<?php
    $sqlmem = "SELECT * FROM lh_supplier ORDER BY `nama` ASC";
	$memlist = $db->Execute($sqlmem);
?>
<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-user ui-btn-icon-left">Data Artist</a>
<ul data-role="listview" data-inset="true" class="lineheight16">
<?php
	while($data_memlist = $memlist->FetchRow()) {
?>
    <li>
        <img src="design/<?= $_CONFIG['templ']['main']; ?>/images/album-ag.jpg">
		<h2><?=$data_memlist['nama'];?></h2>
		<p>
			<?=$data_memlist['alamat'];?>, <?=$data_memlist['telp'];?>
			<div>
				<a href="index.php?view=deletesup01&id=<?=$data_memlist['id_sup'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-delete">Delete</a>
				<a href="index.php?view=editsup&id=<?=$data_memlist['id_sup'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-edit">Edit</a>
			</div>
		</p>
    </li>
<?php
	} //EOF while($data_memlist = $memlist->FetchRow())
?>
</ul>