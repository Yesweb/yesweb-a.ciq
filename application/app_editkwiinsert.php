<a href="index.php?view=kwitansi&id=<?=$invid?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Buat Nomor Kwitansi</a>
<?php
$invid = $_POST['invid'];
$terbilang = $_POST['terbilang'];
$tgl_bayar = $_POST['tgl_bayar'];
$nokwi = $_POST['nokwi'];

	$sqlupdate = "
		UPDATE lh_invoice
		SET terbilang='$terbilang', tgl_bayar='$tgl_bayar', kwitansi='$nokwi'
		WHERE id_invoice=$invid
	";
	if ($db->Execute($sqlupdate) === false) {
       echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "id_invoice: $invid<br />terbilang: $terbilang<br />tgl_bayar: $tgl_bayar<br />kwitansi: $nokwi";
	}

?>