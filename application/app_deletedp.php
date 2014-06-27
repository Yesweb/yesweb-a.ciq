<?php
$dpid = $_GET['dpid'];
$invid = $_GET['id'];
?>
<a href="index.php?view=kwitansi&id=<?=$invid?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Hapus Data</a>
<?php

	$sqldelete = "
		DELETE FROM lh_invoice_kwitansidp
		WHERE id = $dpid
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$dpid<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>