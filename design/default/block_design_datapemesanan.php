<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Data Pemesanan</a>
<form>
	<input data-type="search" id="searchForCollapsibleSetChildren">
</form>
<div data-role="collapsible-set" data-filter="true" data-children="> div, > div div ul li" data-inset="true" id="collapsiblesetForFilterChildren" data-input="#searchForCollapsibleSetChildren">
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
$table = 'lh_penjualan';

// query yang akan diambil datanya
$tableQuery = "
		SELECT DISTINCT lh_penjualan.id_customer,
		lh_customer.nama AS nama
		FROM lh_penjualan
		LEFT JOIN lh_customer
		ON lh_penjualan.id_customer=lh_customer.id_customer
	";
 
// ambil data
$dataTable = getTableData($tableQuery, $page, $dataPerPage);
 
// menampilkan tombol paginasi
showPagination($table, $dataPerPage); 

?>
</div>
<?php
foreach ($dataTable as $i => $data) {
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
?>
	<div data-role="collapsible" data-filtertext="<?=$data['nama'];?>">
		<h3><?=$data['nama'];?></h3>

		<form>
			<input id="filterTable-input" data-type="search">
		</form>
		<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
			<thead>
				<tr>
					<th data-priority="1">Order ID</th>
					<th data-priority="persist">Produk</th>
					<th data-priority="2">Tanggal Pesan</th>
					<th data-priority="3"><abbr title="Due Date">Due Date</abbr></th>
					<th data-priority="4">Status</th>
					<th data-priority="5">Discount</th>
					<th data-priority="6">No. Invoice</th>
				</tr>
			</thead>
			<tbody>
<?php
		$customerid = $data['id_customer'];
		$sqlpesan2 = "
			SELECT *,
			lh_invoice.invoice_number AS noinv,
			lh_invoice.id_invoice AS idinv
			FROM lh_penjualan
			LEFT JOIN lh_invoice
			ON lh_penjualan.invoice_number=lh_invoice.id_invoice
			LEFT JOIN lh_produk
			ON lh_penjualan.id_produk=lh_produk.id_produk
			LEFT JOIN lh_penjualan_stat
			ON lh_penjualan.id_status=lh_penjualan_stat.stat_code
			WHERE id_customer=$customerid
		";
		$pesanlist2 = $db->Execute($sqlpesan2);
		while($data_pesanlist2 = $pesanlist2->FetchRow()) {
?>
				<tr>
					<th><?=$data_pesanlist2['id_penjualan'];?></th>
					<td><img style="max-width:50px; max-height:auto;" src="uploads/thumb/<?=$data_pesanlist2['image'];?>"></td>
					<td><?=$data_pesanlist2['tanggal_pesan'];?></td>
					<td><?=$data_pesanlist2['due_date'];?></td>
					<td><?=$data_pesanlist2['stat_name'];?></td>
					<td><?=$data_pesanlist2['discount'];?></td>
					<td><a href="index.php?view=inputinv&id=<?=$data_pesanlist2['id_penjualan'];?>&inv=<?=$data_pesanlist2['noinv'];?>&idv=<?=$data_pesanlist2['idinv'];?>&stpn=<?=$data_pesanlist2['stat_name'];?>&stpnc=<?=$data_pesanlist2['stat_code'];?>"><?=$data_pesanlist2['noinv'];?></a></td>
				</tr>
<?php
		} //EOF while($data_pesanlist2 = $pesanlist2->FetchRow())
?>
			</tbody>
		</table>

	</div>
<?php
} //EOF foreach ($dataTable as $i => $data)
?>
</div>