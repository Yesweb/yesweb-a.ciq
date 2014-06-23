<a href="index.php?view=datasup" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Hapus Data</a>

<?php
$supid = $_GET['id'];

	$sqldelete = "
		DELETE FROM lh_supplier
		WHERE id_sup = $supid
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$supid<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>