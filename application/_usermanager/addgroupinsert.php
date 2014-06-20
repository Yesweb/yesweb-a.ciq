<?php
$addgroup = $_POST['addgroup'];

	$sqladd = "
		INSERT INTO `user_permission` (`name`)
		VALUES ('$addgroup')
	";
	if ($db->Execute($sqladd) === false) { 
        echo '<h4 style="text-align:center;">100: Group sudah terdaftar. Error inserting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$addgroup<br />$code105<br />[ $back ]</h4>";
		echo "</center>";
	}
?>