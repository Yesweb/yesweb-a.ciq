<?php
$nav = $_GET['id'];
?>
<a href="index.php?view=kwitansi&id=<?=$nav?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Hapus Data</a>
<?php
	$sqldelete = "
		DELETE FROM lh_invoice
		WHERE id_invoice = $nav
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$nav<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>