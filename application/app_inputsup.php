<a href="index.php?view=inputsup" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Input Artist</a>
<?php
$nama = $_GET['name2'];
$email = $_GET['email'];
$telp = $_GET['telp2'];
$alamat = $_GET['textarea2'];

	$sqlinsert = "
		INSERT INTO `lh_supplier` (`nama`, `email`, `telp`, `alamat`)
		VALUES ('$nama', '$email', '$telp', '$alamat')
	";
	if ($db->Execute($sqlinsert) === false) {
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Input berhasil</h3>";
		echo "nama: $nama<br />Email: $email<br />telp: $telp<br />alamat: $alamat";
	}
?>