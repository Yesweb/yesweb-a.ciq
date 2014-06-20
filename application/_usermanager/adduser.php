<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Add User</a>
<form name="adduser" action="index.php?view=adduserinsert" method="post" data-ajax="false">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="username">Username:</label>
			<input type="text" name="addusername" id="title" value="" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="usergroup">User Group:</label>
			<select name="addgroup" id="select-custom-2" data-native-menu="false">
<?php
$qrygroup = $db->Execute("
	SELECT *
	FROM `user_permission`
	ORDER BY `id_perm` ASC
	");
while($data_qrygroup = $qrygroup->FetchRow()) {
?>
				<option value="<?=$data_qrygroup['id_perm']?>"><?=$data_qrygroup['name']?></option>
<?php
} //EOF while($data_qrygroup = $qrygroup->FetchRow())
?>
			</select>
		</li>
		<li class="ui-field-contain">
			<label for="password">Password:</label>
			<input type="password" name="addpassword" id="title" value="" data-clear-btn="true">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><input type="submit" value="submit" name="submit"></div>
			</fieldset>
		</li>
	</ul>
</form>