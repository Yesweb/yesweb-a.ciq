<a href="index.php?view=datapemesanan" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Masukkan Nomor Invoice</a>
<?php
$orderid = $_POST['orderid'];
$stat_penj = $_POST['stat_penj'];
$noinv = $_POST['select-choice-a'];

	$sqlupdate = "
		UPDATE lh_penjualan
		SET invoice_number=$noinv, id_status=$stat_penj
		WHERE id_penjualan=$orderid
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "Order ID: $orderid<br />Invoice ID: $noinv<br />id_status: $stat_penj";
	}

?>