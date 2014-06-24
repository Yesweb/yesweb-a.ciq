<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Input Produk</a>
<?php
$kategori = $_POST['select-custom-2'];
$artist = $_POST['name2'];
$title = addslashes($_POST['title']);
$desc = $_POST['description'];
$price = $_POST['price'];
$priceUS = $_POST['priceUS'];
$hpamprice = $_POST['hpamprice'];
$hpampriceUS = $_POST['hpampriceUS'];
$renimg = $artist.'_'.$title;

 if(isset($_POST['submit'])){

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);

	//import the class you have just downloaded
	require_once('lib/class.upload_0.32/class.upload.php');
	$message = '';

	if(isset($_FILES['file']) && !empty($_FILES['file'])){

		$handle = new upload($_FILES['file']);

		if ($handle->uploaded) {
			//Masthead
			$handle->file_new_name_body = $renimg;
			$handle->image_resize = true;
			$handle->image_x = 300;
			$handle->image_ratio_y = true;
			$handle->process('uploads/');

			if ($handle->processed) {
				$message .= 'image re-sized to masthead';
			} else {
				$message .= 'error : ' . $handle->error;
			}

			//Thumbnail
			$handle->file_new_name_body = $renimg;
			$handle->image_resize = true;
			$handle->image_ratio_crop = true;
			$handle->image_y = 51;
			$handle->image_x = 80;
			$handle->process('uploads/thumb/');

			if ($handle->processed) {
				$message .= '<br/>image re-sized to thumbnail';
			} else {
				$message .= 'error : ' . $handle->error;
			}
			$handle->clean();
			
			include ("application/app_inputproduk.php");
			
			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
			$message .= '<br/><br/><a href="'.$url.'">[ Back ]</a>';
		}

		die($message);

	} else {
		die('File post missing');
	}

}
?>