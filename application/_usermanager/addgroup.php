<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-grid ui-btn-icon-left">Add Group</a>
<form name="addgroup" action="index.php?view=addgroupinsert" method="post" data-ajax="false">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="groupname">Group Name:</label>
			<input type="text" name="addgroup" id="title" value="" data-clear-btn="true">
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><input type="submit" value="submit" name="submit"></div>
			</fieldset>
		</li>
	</ul>
</form>