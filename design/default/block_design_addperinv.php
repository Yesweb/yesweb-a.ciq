<a href="index.php?view=perinv" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-carat-l ui-btn-icon-left">Periode Invoice / Kwitansi</a>
<form enctype="multipart/form-data" method="post" action="index.php?view=addperinvinsert" data-ajax="false">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="tahun">Tahun:</label>
			<input type="text" name="tahun" id="tahun" value="" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="file">logo:</label>
			<input type="file" name="file" id="file" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="header">Header:</label>
			<textarea cols="40" rows="8" name="header" id="header"></textarea>
		</li>
		<li class="ui-field-contain">
			<label for="footer">Footer:</label>
			<textarea cols="40" rows="8" name="footer" id="footer"></textarea>
		</li>
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="reset" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
				<div class="ui-block-b"><input type="submit" value="submit" name="submit"></div>
			</fieldset>
		</li>
	</ul>
</form>