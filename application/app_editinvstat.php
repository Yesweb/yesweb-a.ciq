<a href="index.php?view=datainvoice" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Edit Status Invoice</a>
<?php
$invid = $_POST['invid'];
$terbilang = $_POST['terbilang'];
$invstat = $_POST['select-choice-a'];

	$sqlupdate = "
		UPDATE lh_invoice
		SET invoice_status=$invstat, terbilang='$terbilang'
		WHERE id_invoice=$invid
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "id_invoice: $invid<br />terbilang: $terbilang<br />invoice_status: $invstat";
	}

?>