<a href="index.php?view=datasup" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-back ui-btn-icon-left">Edit Artist/Supplier</a>
<?php
$supid = $_POST['supid'];
$nama = $_POST['name2'];
$email = $_POST['email'];
$telp = $_POST['telp2'];
$alamat = $_POST['textarea2'];

	$sqlupdate = "
		UPDATE lh_supplier
		SET
			nama='$nama',
			email='$email',
			telp='$telp',
			alamat='$alamat'
		WHERE id_sup='$supid'
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error updating: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "
			id_sup: $supid<br />
			nama: $nama<br />
			email: $email<br />
			telp: $telp<br />
			alamat: $alamat<br />
		";
	}

?>