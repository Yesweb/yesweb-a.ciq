<a href="index.php?view=dataproduk" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Hapus Data</a>

<?php
$prodid = $_GET['id'];

    $filedelete = "SELECT * FROM lh_produk WHERE id_produk='$id'";
	$myfiledelete = $db->Execute($filedelete);
	while($data_myfiledelete = $myfiledelete->FetchRow()) {
		$delete = $data_myfiledelete['image'];
	}
	
		$img = "uploads/".$delete;
		$imgthumb = "uploads/thumb/".$delete;

		unlink($img);
		unlink($imgthumb);

	$sqldelete = "
		DELETE FROM lh_produk
		WHERE id_produk = $prodid
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$prodid<br />Data berhasil dihapus</h4>";
		echo "</center>";
	}
?>