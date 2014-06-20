<?php
$groupid = $_GET['id'];

	$sqldelete = "
		DELETE FROM user_menu
		WHERE id = $groupid
	";
	if ($db->Execute($sqldelete) === false) { 
        echo '<h4 style="text-align:center;">Error deleting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>$groupid<br />$code110<br />[ $back ]</h4>";
		echo "</center>";
	}
?>