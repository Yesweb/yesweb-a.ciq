<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Manage Group Menu</a>
<form>
	<input id="filterTable-input" data-type="search">
</form>
<table data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" class="ui-responsive">
	<thead>
		<tr>
			<th data-priority="1">Action</th>
			<th data-priority="persist">Menu</th>
		</tr>
	</thead>
	<tbody>

<?php
$group = $_GET['ig'];
$qrygm = $db->Execute("
	SELECT
		`user_menu`.`id` AS groupid,
		id_user_perm,
		id_menu,
		`menu`.`id` AS menuid,
		orderby,
		title,
		url
	FROM `user_menu`
	LEFT JOIN `menu`
	ON user_menu.id_menu=menu.id
	WHERE id_user_perm=$group
	ORDER BY  `menu`.`orderby` ASC
	");
while($data_qrygm = $qrygm->FetchRow()) {
?>
		<tr>
			<td><a href="index.php?view=deletegroupmenu&id=<?=$data_qrygm['groupid']?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a></td><td><?=$data_qrygm['title']?></td>
		</tr>
<?php
} //EOF while($data_qrygm = $qrygm->FetchRow())
?>
	<tbody>
</table>
<form name="menuadd" action="index.php?view=menuadd" method="post" data-ajax="false">
	<input type="hidden" name="idperm" value="<?=$group?>">
	<select name="menu">
		<option value="">Add Menu</option>
<?php
$qrymn = $db->Execute("
	SELECT * FROM `menu`
	ORDER BY `orderby` ASC
	");
while($data_qrymn = $qrymn->FetchRow()) {
?>
		<option value="<?=$data_qrymn['id']?>"><?=$data_qrymn['title']?></option>
<?php
} //EOF while($data_qrymn = $qrymn->FetchRow())
?>
	</select>
	<button type="submit">Submit</button>
</form>