<?php
$invoice = $_GET['invoiceformat'].$_GET['invoicenum'];
$tahun = $_GET['select-custom-2'];

	$sqlinsert = "
		INSERT INTO `lh_invoice` (`invoice_number`, `tahun`)
		VALUES ('$invoice', '$tahun')
	";
	if ($db->Execute($sqlinsert) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Input berhasil</h3>";
		echo "invoice_number: $invoice<br />tahun: $tahun<br />";
	}
?>