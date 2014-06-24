<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-shop">Data Produk</a>
<div class="paging">
<?php
//untuk menampilkan URL utama
function baseurl() {
	$act = $_GET['view']; //setting disini
	$baseurl = "index.php?view=$act"; //setting disini
	return $baseurl;
}
include_once('lib/pagination.php');
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
    $page = (int)$_GET['page'];
 
// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 10 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 10;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
    $dataPerPage = (int)$_GET['perPage'];
 
// tabel yang akan dipaginasi
$table = 'lh_produk';

// query yang akan diambil datanya
$tableQuery = "
	SELECT * FROM lh_produk ORDER BY `artist` ASC
	";
 
// ambil data
$dataTable = getTableData($tableQuery, $page, $dataPerPage);
 
// menampilkan tombol paginasi
showPagination($table, $dataPerPage); 

?>
</div>
	<div role="main">
		<ul data-role="listview" data-inset="true">
<?php
foreach ($dataTable as $i => $data) {
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
?>
			<li class="listprod">
					<img src="uploads/thumb/<?=$data['image'];?>" class="ui-li-thumb">
					<h2 style="line-height:40px; margin-bottom:0px;"><?=$data['title'];?></h2>
					<p style="margin-top:0px;">
						<?=$data['description'];?>
						<div>
						<a href="index.php?view=deleteproduk01&id=<?=$data['id_produk'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-delete">Delete</a>
						<a href="index.php?view=editproduk&id=<?=$data['id_produk'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-edit">Edit</a>
						</div>
					</p>
					<p class="ui-li-aside"><?=$data['artist'];?></p>
			</li>
<?php
} //EOF foreach ($dataTable as $i => $data)
?>
		</ul>
	</div><!-- /content -->