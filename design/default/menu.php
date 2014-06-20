<ul data-role="listview" data-ajax="false" data-inset="true" data-theme="a">
	<li><a href="index.php">Home</a></li>
<?php
$usrmn = $_SESSION['username'];
$qrymenu = $db->Execute("
	SELECT * 
	FROM  `menu` 
	LEFT JOIN  `user_menu` ON menu.id = user_menu.id_menu
	WHERE id_user_perm =  '$cek_termstat'
	ORDER BY  `orderby` ASC
	");
while($data_qrymenu = $qrymenu->FetchRow()) {
?>
	<li><a href="<?=$data_qrymenu['url']?>" target="<?=$data_qrymenu['target']?>" title="<?=$data_qrymenu['keterangan']?>"><?=$data_qrymenu['title']?></a></li>
<?php
} //EOF while($data_qrymenu = $qrymenu->FetchRow())
?>

<?php
if ($cek_termstat == 3) {
?>
	<li data-role="list-divider">Administrator</li>
	<li><a href="index.php?view=user">Manage User</a></li>
	<li><a href="index.php?view=group">Manage Group</a></li>
<?php
} //EOF if ($cek_termstat == 3)
?>
	<li data-role="list-divider">&nbsp;</li>
	<li><a href="logout.php">Logout</a></li>
</ul>