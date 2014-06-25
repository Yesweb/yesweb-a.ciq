<a href="index.php?view=datapemesanan" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Hapus Data</a>

<?php
$id = $_GET['id'];

	$sqldelete = "
		DELETE FROM lh_penjualan
		WHERE id_penjualan = $id
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$id<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>