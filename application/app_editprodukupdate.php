<a href="index.php?view=datainvoice" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Edit Produk</a>
<?php
$idproduk = $_POST['idproduk'];
$kategori = $_POST['select-custom-2'];
$artist = $_POST['name2'];
$title = $_POST['title'];
$desc = $_POST['description'];
$price = $_POST['price'];
$priceUS = $_POST['priceUS'];
$hpamprice = $_POST['hpamprice'];
$hpampriceUS = $_POST['hpampriceUS'];

	$sqlupdate = "
		UPDATE lh_produk
		SET
			id_kategori='$kategori',
			artist='$artist',
			title='$title',
			description='$desc',
			price='$price',
			priceUS='$priceUS',
			hpam_price='$hpamprice',
			hpam_priceUS='$hpampriceUS'
		WHERE id_produk='$idproduk'
	";
	if ($db->Execute($sqlupdate) === false) { 
        echo 'error inserting: '.$db->ErrorMsg().'<BR>'; 
    } else {
		echo "<h3>Update berhasil</h3>";
		echo "
			id_kategori: $kategori<br />
			artist: $artist<br />
			title: $title<br />
			description: $desc<br />
			price: $price<br />
			priceUS: $priceUS<br />
			hpam_price: $hpamprice<br />
			hpam_priceUS: $hpampriceUS<br />
		";
	}

?>