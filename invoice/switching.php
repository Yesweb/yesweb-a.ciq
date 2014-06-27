<?php
switch($_GET['view']) {
	case "":
		echo "<h1 style='text-align:center;'>Sistem Print Dokumen</h1>";
	break;
	
	case "invoice":
		include ("invoice.php");
	break;
	
	case "receipt":
		include ("receipt.php");
	break;
	
	case "receiptdp":
		include ("receiptdp.php");
	break;
}
?>