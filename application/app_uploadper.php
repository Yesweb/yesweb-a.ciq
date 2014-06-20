<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Input Periode Invoice</a>
<?php
$tahun = $_POST['tahun'];
$header = $_POST['header'];
$footer = $_POST['footer'];

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
			$handle->process('uploads/');

			if ($handle->processed) {
				$message .= 'image re-sized to masthead';
			} else {
				$message .= 'error : ' . $handle->error;
			}

			//Thumbnail
			$handle->image_resize = true;
			$handle->image_ratio_crop = true;
			$handle->image_y = 50;
			$handle->image_x = 50;
			$handle->process('uploads/thumb/');

			if ($handle->processed) {
				$message .= '<br/>image re-sized to thumbnail';
			} else {
				$message .= 'error : ' . $handle->error;
			}
			$handle->clean();
			
			include ("application/app_inputper.php");
			
			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
			$message .= '<br/><br/><a href="'.$url.'">[ Back ]</a>';
		}

		die($message);

	} else {
		die('File post missing');
	}

}
?>