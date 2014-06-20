<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Add User</a>
<?php
$addusername = $_POST['addusername'];
$addgroup = $_POST['addgroup'];
$addpassword = $_POST['addpassword'];

	$sqladd = "
		INSERT INTO `user` (`username`, `password`, `permit`)
		VALUES ('$addusername', '$addpassword', '$addgroup')
	";
	if ($db->Execute($sqladd) === false) { 
        echo '<h4 style="text-align:center;">100: No. ID sudah terdaftar. Error inserting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$addusername<br />$code106<br />[ $back ]</h4>";
		echo "</center>";
	}
?>