<?php
$nav = $_GET['id'];
?>
<a href="index.php?view=kwitansi&id=<?=$nav?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Edit Kwitansi DP</a>
<?php
$kwiid = $_POST['kwiid'];
$dpUS = $_POST['dpUS'];
$dpIDR = $_POST['dpIDR'];
$terbilang = $_POST['terbilang'];
$tgl_bayar = $_POST['tgl_bayar'];
$nokwiDP = $_POST['nokwiDP'];

	$sqlupdate = "
		UPDATE `lh_invoice_kwitansidp`
		SET
			`dp`='$dpIDR',
			`dpUS`='$dpUS',
			`terbilang`='$terbilang',
			`no_kwitansi`='$nokwiDP',
			`tgl_bayar`='$tgl_bayar'
		WHERE `id`='$kwiid'
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error updating: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "
			id: $kwiid<br />
			dp: $dpIDR<br />
			dpUS: $dpUS<br />
			terbilang: $terbilang<br />
			no_kwitansi: $nokwiDP<br />
			tgl_bayar: $tgl_bayar<br />
		";
	}
?>
