<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Data Invoice / Kwitansi</a>
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
$table = 'lh_invoice';

// query yang akan diambil datanya
$tableQuery = "
		SELECT * FROM lh_invoice
		LEFT JOIN lh_invoice_status
		ON lh_invoice.invoice_status=lh_invoice_status.id_inv_stat
		ORDER BY `id_invoice` DESC
	";
 
// ambil data
$dataTable = getTableData($tableQuery, $page, $dataPerPage);
 
// menampilkan tombol paginasi
showPagination($table, $dataPerPage); 

?>
</div>

<form>
    <input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="persist">Nomor Invoice</th>
            <th data-priority="2">Tahun Invoice</th>
            <th data-priority="3">Status Invoice</th>
            <th data-priority="4">Kwitansi</th>
        </tr>
	</thead>
	<tbody>
<?php
foreach ($dataTable as $i => $data) {
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
?>
		<tr>
			<td><a href="#" data-rel="external"><?=$data['invoice_number'];?></a></td>
			<td><?=$data['tahun'];?></td>
			<td><a href="index.php?view=editinvstat&id=<?=$data['id_invoice'];?>&inv=<?=$data['invoice_number'];?>&stat=<?=$data['status'];?>"><?=$data['status'];?></a></td>
			<td>
<?php
		if ($data['invoice_status'] == 3) {
			echo "
			<a href='index.php?view=kwitansi&id=".$data['id_invoice']."' class='ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-inline ui-btn-icon-notext'>".$data['kwitansi']."</a>
			";
		} else {
			echo "<a href='#' class='ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-alert ui-btn-inline ui-btn-icon-notext'>No Kwitansi</a>";
		}
?>
			</td>
		</tr>
<?php
} //EOF foreach ($dataTable as $i => $data)
?>
	</tbody>
</table>