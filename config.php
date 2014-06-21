<?php
//db set
$_CONFIG['db']['host']		= "localhost";
$_CONFIG['db']['user']		= "root";
$_CONFIG['db']['pass']		= "bandung";
$_CONFIG['db']['dbname']	= "hpam_penjualan";

//Set Template
$_CONFIG['templ']['main']	= "default";
//$_CONFIG['templ']['welcome']= "default/des_block_welcome";
//$_CONFIG['templ']['etalase']= "default/des_block_etalase";

//db connect
$db = ADONewConnection('mysql');
$db->debug = false;
$db->Connect($_CONFIG['db']['host'], $_CONFIG['db']['user'], $_CONFIG['db']['pass'], $_CONFIG['db']['dbname']);

?>
