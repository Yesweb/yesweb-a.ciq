<a href="index.php?view=kwitansi&id=<?=$invid?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Buat Nomor Kwitansi DP</a>
<?php
$invid = $_POST['invid'];
$dpUS = $_POST['dpUS'];
$dpIDR = $_POST['dpIDR'];
$terbilang = $_POST['terbilang'];
$tgl_bayar = $_POST['tgl_bayar'];
$nokwiDP = $_POST['nokwiDP'];

	$sqlinsert = "
		INSERT INTO `lh_invoice_kwitansidp` (`id_invoice`, `dp`, `dpUS`, `terbilang`, `no_kwitansi`, `tgl_bayar`)
		VALUES ('$invid', '$dpIDR', '$dpUS', '$terbilang', '$nokwiDP', '$tgl_bayar')
	";
	if ($db->Execute($sqlinsert) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Input berhasil</h3>";
		echo "
			id_invoice: $invid<br />
			dpUS: $dpUS<br />
			dp: $dpIDR<br />
			terbilang: $terbilang<br />
			tgl_bayar: $tgl_bayar<br />
			no_kwitansi: $nokwiDP<br />
		";
	}
?>