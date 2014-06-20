<?php
	include ("../cek_login.php");
	include ("config.php");
	$inv = $_GET['idv'];
?>
<html>
<head>
<title>Invoice</title>
<style type="text/css" media="all">
	@import "css/style.css";
</style>

</head>
<body>
<div class="containerprint">
<?php
	include ("switching.php");
?>	
</div>
</body>
</html>