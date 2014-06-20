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
<div class="container">

	<div class="left" style="padding: 0px 5px 0px 5px;">

<?php
	include ("switching.php");
?>	

	</div>

	<div class="right">
		<?include ("menu.php");?>
	</div>

</div>
</body>
</html>