<?php$kolektor = $_GET['name2'];$produk = $_GET['select-custom-1'];?><script>$.mobile.document	// "filter-menu-menu" is the ID generated for the listview when it is created	// by the custom selectmenu plugin. Upon creation of the listview widget we	// want to prepend an input field to the list to be used for a filter.	.on( "listviewcreate", "#filter-menu-menu", function( e ) {		var input,			listbox = $( "#filter-menu-listbox" ),			form = listbox.jqmData( "filter-form" ),			listview = $( e.target );		// We store the generated form in a variable attached to the popup so we		// avoid creating a second form/input field when the listview is		// destroyed/rebuilt during a refresh.		if ( !form ) {			input = $( "<input data-type='search'></input>" );			form = $( "<form></form>" ).append( input );			input.textinput();			$( "#filter-menu-listbox" )				.prepend( form )				.jqmData( "filter-form", form );		}		// Instantiate a filterable widget on the newly created listview and		// indicate that the generated input is to be used for the filtering.		listview.filterable({ input: input });	})	// The custom select list may show up as either a popup or a dialog,	// depending how much vertical room there is on the screen. If it shows up	// as a dialog, then the form containing the filter input field must be	// transferred to the dialog so that the user can continue to use it for	// filtering list items.	//	// After the dialog is closed, the form containing the filter input is	// transferred back into the popup.	.on( "pagebeforeshow pagehide", "#filter-menu-dialog", function( e ) {		var form = $( "#filter-menu-listbox" ).jqmData( "filter-form" ),			placeInDialog = ( e.type === "pagebeforeshow" ),			destination = placeInDialog ? $( e.target ).find( ".ui-content" ) : $( "#filter-menu-listbox" );		form			.find( "input" )			// Turn off the "inset" option when the filter input is inside a dialog			// and turn it back on when it is placed back inside the popup, because			// it looks better that way.			.textinput( "option", "inset", !placeInDialog )			.end()			.prependTo( destination );	});</script><style type="text/css">.ui-selectmenu.ui-popup .ui-input-search {    margin-left: .5em;    margin-right: .5em;}.ui-selectmenu.ui-dialog .ui-content {    padding-top: 0;}.ui-selectmenu.ui-dialog .ui-selectmenu-list {    margin-top: 0;}.ui-selectmenu.ui-popup .ui-selectmenu-list li.ui-first-child .ui-btn {    border-top-width: 1px;    -webkit-border-radius: 0;    border-radius: 0;}.ui-selectmenu.ui-dialog .ui-header {    border-bottom-width: 1px;}.controlgroup-textinput{    padding-top:.22em;    padding-bottom:.22em;}</style>		<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Input Pemesanan</a><form action="index.php?view=inputpemesananinsert">	<ul data-role="listview" data-inset="true">		<li class="ui-field-contain">			<label for="name2">Nama Kolektor:</label>			<select name="name2" id="filter-menu" data-native-menu="false"><?php    $sqlkolektor = "SELECT * FROM lh_customer WHERE id_customer='$kolektor'";	$kolektorlist = $db->Execute($sqlkolektor);	while($data_kolektorlist = $kolektorlist->FetchRow()) {?>				<option value="<?=$data_kolektorlist['id_customer'];?>"><?=$data_kolektorlist['nama'];?></option><?php	} //EOF while($data_kolektorlist = $kolektorlist->FetchRow())?>			</select>		</li>		<li class="ui-field-contain">			<label for="select-custom-1">Lukisan:</label>			<select name="select-custom-1" id="select-custom-1" data-native-menu="false"><?php    $sqlproduk = "SELECT * FROM lh_produk WHERE id_produk='$produk'";	$produklist = $db->Execute($sqlproduk);	while($data_produklist = $produklist->FetchRow()) {		$curr = $data_produklist['hpam_curr_price'];?>				<option value="<?=$data_produklist['id_produk'];?>"><?=$data_produklist['artist'];?>: <?=$data_produklist['title'];?></option><?php	} //EOF while($data_produklist = $produklist->FetchRow())?>			</select>		</li>		<li class="ui-field-contain">			<label for="kurs">Kurs:</label><?php    $sqlcurr = "SELECT * FROM `lh_currency` WHERE `id_currency`='$curr'";	$nominal = $db->Execute($sqlcurr);	while($data_nominal = $nominal->FetchRow()) {?>			<input name="kurs" type="text" readonly value="<?=$data_nominal['kurs']?>"><?php	} //EOF while($data_nominal = $nominal->FetchRow())?>		</li>		<li class="ui-field-contain">			<label for="tanggal_pesan">Tanggal Pesan:</label>			<input name="tanggal_pesan" type="text" data-role="date">		</li>		<li class="ui-field-contain">			<label for="due_date">Due Date:</label>			<input name="due_date" type="text" data-role="date">		</li>		<li class="ui-field-contain">			<label for="diskon">Diskon:</label>			<div data-role="controlgroup" data-type="horizontal">				<input name="diskon" id="currency-controlgroup" type="text" data-wrapper-class="controlgroup-textinput ui-btn">				<button>%</button>			</div>		</li>		<li class="ui-body ui-body-b">			<fieldset class="ui-grid-a">					<div class="ui-block-a"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>					<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Submit</button></div>			</fieldset>		</li>	</ul></form>