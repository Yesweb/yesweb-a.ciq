<a href="index.php?view=datakolektor" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Hapus Data</a>

<?php
$custid = $_GET['id'];

	$sqldelete = "
		DELETE FROM lh_customer
		WHERE id_customer = $custid
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$custid<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>