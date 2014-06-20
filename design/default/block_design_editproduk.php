<?php
$id = $_GET['id'];
    $sqlprod = "
		SELECT * FROM lh_produk
		WHERE id_produk='$id'
	";
	$prod = $db->Execute($sqlprod);
	while($data_prod = $prod->FetchRow()) {
		$idprod = $data_prod['id_produk'];
		$artist = $data_prod['artist'];
		$judul = $data_prod['title'];
		$description = $data_prod['description'];
		$price = $data_prod['price'];
		$priceus = $data_prod['priceUS'];
		$hpamprice = $data_prod['hpam_price'];
		$hpampriceus = $data_prod['hpam_priceUS'];
	}
?>
<script>

$.mobile.document
	// "filter-menu-menu" is the ID generated for the listview when it is created
	// by the custom selectmenu plugin. Upon creation of the listview widget we
	// want to prepend an input field to the list to be used for a filter.
	.on( "listviewcreate", "#filter-menu-menu", function( e ) {
		var input,
			listbox = $( "#filter-menu-listbox" ),
			form = listbox.jqmData( "filter-form" ),
			listview = $( e.target );
		// We store the generated form in a variable attached to the popup so we
		// avoid creating a second form/input field when the listview is
		// destroyed/rebuilt during a refresh.
		if ( !form ) {
			input = $( "<input data-type='search'></input>" );
			form = $( "<form></form>" ).append( input );
			input.textinput();
			$( "#filter-menu-listbox" )
				.prepend( form )
				.jqmData( "filter-form", form );
		}
		// Instantiate a filterable widget on the newly created listview and
		// indicate that the generated input is to be used for the filtering.
		listview.filterable({ input: input });
	})
	// The custom select list may show up as either a popup or a dialog,
	// depending how much vertical room there is on the screen. If it shows up
	// as a dialog, then the form containing the filter input field must be
	// transferred to the dialog so that the user can continue to use it for
	// filtering list items.
	//
	// After the dialog is closed, the form containing the filter input is
	// transferred back into the popup.
	.on( "pagebeforeshow pagehide", "#filter-menu-dialog", function( e ) {
		var form = $( "#filter-menu-listbox" ).jqmData( "filter-form" ),
			placeInDialog = ( e.type === "pagebeforeshow" ),
			destination = placeInDialog ? $( e.target ).find( ".ui-content" ) : $( "#filter-menu-listbox" );
		form
			.find( "input" )
			// Turn off the "inset" option when the filter input is inside a dialog
			// and turn it back on when it is placed back inside the popup, because
			// it looks better that way.
			.textinput( "option", "inset", !placeInDialog )
			.end()
			.prependTo( destination );
	});

</script>
<style type="text/css">
.ui-selectmenu.ui-popup .ui-input-search {
    margin-left: .5em;
    margin-right: .5em;
}
.ui-selectmenu.ui-dialog .ui-content {
    padding-top: 0;
}
.ui-selectmenu.ui-dialog .ui-selectmenu-list {
    margin-top: 0;
}
.ui-selectmenu.ui-popup .ui-selectmenu-list li.ui-first-child .ui-btn {
    border-top-width: 1px;
    -webkit-border-radius: 0;
    border-radius: 0;
}
.ui-selectmenu.ui-dialog .ui-header {
    border-bottom-width: 1px;
}
.controlgroup-textinput{
    padding-top:.22em;
    padding-bottom:.22em;
}
</style>

<a href="#" class="ui-shadow-icon ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-left">Input Produk</a>
<form enctype="multipart/form-data" method="post" action="index.php?view=editprodukupdate" data-ajax="false">
	<ul data-role="listview" data-inset="true">
		<li class="ui-field-contain">
			<label for="idproduk">ID Produk:</label>
			<input type="text" name="idproduk" id="idproduk" readonly value="<?=$idprod?>" data-clear-btn="false">
		</li>
		<li class="ui-field-contain">
			<label for="select-custom-2">Kategori:</label>
			<select name="select-custom-2" id="select-custom-2" data-native-menu="false">
<?php
    $sqlprodukkat = "SELECT * FROM lh_produkkategori";
	$produkkatlist = $db->Execute($sqlprodukkat);
	while($data_produkkatlist = $produkkatlist->FetchRow()) {
?>
				<option value="<?=$data_produkkatlist['id_kategori'];?>"><?=$data_produkkatlist['kategori'];?></option>
<?php
	} //EOF while($data_produkkatlist = $produkkatlist->FetchRow())
?>
			</select>
		</li>
		<li class="ui-field-contain">
			<label for="name2">Artist/Name:</label>

			<select name="name2" id="filter-menu" data-native-menu="false">
				<option selected value="<?=$artist?>"><?=$artist?></option>
<?php
    $sqlsup = "SELECT * FROM lh_supplier";
	$suplist = $db->Execute($sqlsup);
	while($data_suplist = $suplist->FetchRow()) {
?>
				<option value="<?=$data_suplist['nama'];?>"><?=$data_suplist['nama'];?></option>
<?php
	} //EOF while($data_suplist = $suplist->FetchRow())
?>
			</select>

		</li>
		<li class="ui-field-contain">
			<label for="title">Judul:</label>
			<input type="text" name="title" id="title" value="<?=$judul?>" data-clear-btn="true">
		</li>
		<li class="ui-field-contain">
			<label for="description">Description:</label>
			<textarea cols="40" rows="8" name="description" id="textarea2"><?=$description?></textarea>
		</li>
		<li class="ui-field-contain">
			<label for="price">Price:</label>
			<div data-role="controlgroup" data-type="horizontal">
				<select name="curprice">
					<option>Rp</option>
				</select>
				<input name="price" id="currency-controlgroup" type="text" value="<?=$price?>" data-wrapper-class="controlgroup-textinput ui-btn">
				<button>,00</button>
			</div>
			<label for="priceUS">&nbsp;</label>
			<div data-role="controlgroup" data-type="horizontal">
				<select name="curpriceUS">
					<option>$&nbsp;&nbsp;&nbsp;</option>
				</select>
				<input name="priceUS" id="currency-controlgroup" type="text" value="<?=$priceus?>" data-wrapper-class="controlgroup-textinput ui-btn">
				<button>,00</button>
			</div>
		</li>
		<li class="ui-field-contain">
			<label for="hpam_price">HPAM Price:</label>
			<div data-role="controlgroup" data-type="horizontal">
				<select name="hpamcurprice">
					<option>Rp</option>
				</select>
				<input name="hpamprice" id="currency-controlgroup" type="text" value="<?=$hpamprice?>" data-wrapper-class="controlgroup-textinput ui-btn">
				<button>,00</button>
			</div>
			<label for="hpam_price">&nbsp;</label>
			<div data-role="controlgroup" data-type="horizontal">
				<select name="hpamcurpriceUS">
					<option>$&nbsp;&nbsp;&nbsp;</option>
				</select>
				<input name="hpampriceUS" id="currency-controlgroup" type="text" value="<?=$hpampriceus?>" data-wrapper-class="controlgroup-textinput ui-btn">
				<button>,00</button>
			</div>
		</li>
		<!--
		<li class="ui-field-contain">
			<label for="file">File:</label>
			<input type="file" name="file" id="file" data-clear-btn="true">
		</li>
		-->
		<li class="ui-body ui-body-b">
			<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Cancel</button></div>
					<div class="ui-block-b"><input type="submit" value="submit" name="submit"></div>
			</fieldset>
		</li>
	</ul>
</form>