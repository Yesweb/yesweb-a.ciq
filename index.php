<?php
	include ("cek_login.php");
	include ("lib/adodb/adodb.inc.php");
	include ("lang/indonesia.php");
	include ("config.php");
	include ("design/".$_CONFIG['templ']['main']."/layout.php");

	/* Test connection
	$rs = $db->Execute("SELECT * FROM att_log WHERE pin = '22'");
	print "<pre>";
	print_r($rs->GetRows());
	print "</pre>";
	*/

	//print "<pre>"; 
	//print_r($_CONFIG); 
	//print "</pre>";

?>