<a href="index.php?view=datakolektor" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Edit Kolektor</a>
<?php
$id = $_POST['id'];
$nama = $_POST['name2'];
$telp = $_POST['telp2'];
$email = $_POST['email'];
$alamat = $_POST['textarea2'];

	$sqlupdate = "
		UPDATE lh_customer
		SET
			nama='$nama',
			email='$email',
			alamat='$alamat',
			no_telp='$telp'
		WHERE id_customer='$id'
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "
			nama: $nama<br />
			email: $email<br />
			alamat: $alamat<br />
			no_telp: $telp<br />
		";
	}
?>