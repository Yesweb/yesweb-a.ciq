<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-user ui-btn-icon-left">Data Kolektor</a>
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
$table = 'lh_customer';

// query yang akan diambil datanya
$tableQuery = "
	SELECT * FROM lh_customer ORDER BY `nama` ASC
	";
 
// ambil data
$dataTable = getTableData($tableQuery, $page, $dataPerPage);
 
// menampilkan tombol paginasi
showPagination($table, $dataPerPage); 

?>
</div>

<ul data-role="listview" data-inset="true" class="lineheight16">
<?php
foreach ($dataTable as $i => $data) {
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
?>
    <li>
        <img src="design/<?= $_CONFIG['templ']['main']; ?>/images/album-ag.jpg">
		<h2><?=$data['nama'];?></h2>
		<p>
			<?=$data['email'];?>, <?=$data['alamat'];?>, <?=$data['no_telp'];?>
			<div>
				<a href="index.php?view=deletecust01&id=<?=$data['id_customer'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-delete">Delete</a>
				<a href="index.php?view=editcust&id=<?=$data['id_customer'];?>" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-btn-icon-notext ui-shadow-icon ui-btn-a ui-icon-edit">Edit</a>
			</div>
		</p>
    </li>
<?php
} //EOF foreach ($dataTable as $i => $data)
?>
</ul>