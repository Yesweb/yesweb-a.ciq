<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Data Kwitansi Pelunasan</a>

<div class="paging">
<?php
$idinv = $_GET['id'];
//untuk menampilkan URL utama
function baseurl() {
	$act = $_GET['view']; //setting disini
	$id = $_GET['id'];
	$baseurl = "index.php?view=".$act."&id=".$id; //setting disini
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
		WHERE lh_invoice.id_invoice='$idinv'
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
            <th data-priority="1">Terbilang</th>
            <th data-priority="2">Tanggal Bayar</th>
            <th data-priority="3">Nomor Kwitansi</th>
            <th data-priority="4">Act</th>
        </tr>
	</thead>
	<tbody>
<?php
foreach ($dataTable as $i => $data) {
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
?>
		<tr>
			<td><?=$data['terbilang'];?></td>
			<td><?=$data['tgl_bayar'];?></td>
			<td>
<?php
		if ($data['invoice_status'] == 3) {
			echo "<a href='index.php?view=editkwi&id=".$data['id_invoice']."&inv=".$data['invoice_number']."&kwi=".$data['kwitansi']."&tgl=".$data['tgl_bayar']."'>".$data['kwitansi']."</a>";
		} else {
			echo $data['kwitansi'];
		}
?>
			</td>
			<td>
				<a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-icon-notext ui-btn-a ui-mini ui-icon-delete">Delete</a>
			</td>
		</tr>
<?php
} //EOF foreach ($dataTable as $i => $data)
?>
	</tbody>
</table>
<hr>

<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Data Kwitansi DP</a>
<form>
    <input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
    <thead>
        <tr>
            <th data-priority="1">DP USD</th>
            <th data-priority="2">DP IDR</th>
            <th data-priority="3">Terbilang</th>
            <th data-priority="4">Tanggal Bayar</th>
            <th data-priority="5">Nomor Kwitansi</th>
            <th data-priority="6">Act</th>
        </tr>
	</thead>
	<tbody>
<?php
    $sqldp = "SELECT * FROM `lh_invoice_kwitansidp` WHERE `id_invoice`='$idinv'";
	$dp = $db->Execute($sqldp);
	while($data_dp = $dp->FetchRow()) {
?>
        <tr>
            <td><?=number_format($data_dp['dpUS'], 0, '.', ',')?></td>
            <td><?=number_format($data_dp['dp'], 0, ',', '.')?></td>
            <td><?=$data_dp['terbilang']?></td>
            <td><?=$data_dp['tgl_bayar']?></td>
            <td><a href="index.php?view=editkwidp&id=<?=$data_dp['id']?>&nav=<?=$idinv?>"><?=$data_dp['no_kwitansi']?></a></td>
			<td>
				<a href="index.php?view=deletedp&id=<?=$idinv?>&dpid=<?=$data_dp['id']?>" class="ui-shadow ui-btn ui-corner-all ui-btn-icon-notext ui-btn-a ui-mini ui-icon-delete">Delete</a>
			</td>
        </tr>
<?php
	} //EOF while($data_dp = $dp->FetchRow())
?>
	</tbody>
</table>

<a href="index.php?view=kwitansidp&id=<?=$idinv?>" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Buat Kwitansi DP</a>