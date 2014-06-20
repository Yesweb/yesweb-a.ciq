<a href="index.php?view=inputkolektor" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Input Kolektor</a>
<?php
$nama = $_GET['name2'];
$telp = $_GET['telp2'];
$email = $_GET['email'];
$alamat = $_GET['textarea2'];

	$sqlinsert = "
		INSERT INTO `lh_customer` (`nama`, `email`, `alamat`, `no_telp`)
		VALUES ('$nama', '$email', '$alamat', '$telp')
	";
	if ($db->Execute($sqlinsert) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Input berhasil</h3>";
		echo "Nama: $nama<br />Email: $email<br />Alamat: $alamat<br />Nomor Telpon: $telp";
	}
?>