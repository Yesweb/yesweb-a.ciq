<?php
$idperm = $_POST['idperm'];
$menu = $_POST['menu'];

if (empty($menu)) {
	echo "<h4 style='text-align:center;'>Menu harus di isi<br>[ $back ]</h4>";
} else {
	$sqladd = "
		INSERT INTO `user_menu` (`id_user_perm`, `id_menu`)
		VALUES ('$idperm', '$menu')
	";
	if ($db->Execute($sqladd) === false) { 
        echo '<h4 style="text-align:center;">Error inserting: '.$db->ErrorMsg().'<br /><br />[ '.$back.' ]</h4>'; 
    } else {
		echo "<center>";
		echo "<h4>id_menu: $menu<br />$code104<br />[ $back ]</h4>";
		echo "</center>";
	}
}
?>