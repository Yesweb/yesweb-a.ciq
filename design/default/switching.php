<?php
include ("lib/back.php");
include ("application/app_set_param.php");

$stat = $db->Execute("SELECT permit FROM user WHERE username='$usern'");
while($data_termstat = $stat->FetchRow()) {
	$cek_termstat = $data_termstat['permit'];
}

switch($_GET['view']) {
	case "":
		echo "<h1 style='text-align:center;'>yesweb.co.id</h1>";
	break;
	
	case "inputpemesanan1":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputpemesanan_01.php");
	break;
	
	case "inputpemesanan2":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputpemesanan_02.php");
	break;
	
	case "inputpemesananinsert":
		include ("application/app_inputpemesanan.php");
	break;
	
	case "datapemesanan":
		include ("design/".$_CONFIG['templ']['main']."/block_design_datapemesanan.php");
	break;
	
	case "deletepemesanan01":
		include ("application/app_deletepemesanan01.php");
	break;
	
	case "inputinv":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputinv.php");
	break;
	
	case "inputinvedit":
		include ("application/app_inputinvedit.php");
	break;
	
	case "inputproduk":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputproduk.php");
	break;
	
	case "inputprodukinsert":
		include ("application/app_upload.php");
	break;
	
	case "dataproduk":
		include ("design/".$_CONFIG['templ']['main']."/block_design_dataproduk.php");
	break;
	
	case "editproduk":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editproduk.php");
	break;
	
	case "editprodukupdate":
		include ("application/app_editprodukupdate.php");
	break;
	
	case "deleteproduk01":
		include ("design/".$_CONFIG['templ']['main']."/block_design_deleteproduk01.php");
	break;
	
	case "deleteproduk02":
		include ("application/app_deleteproduk02.php");
	break;
	
	case "editfoto":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editfoto.php");
	break;
	
	case "editfotoupdate":
		include ("application/app_editfotoupdate.php");
	break;
	
	case "uploadimage":
		include ("design/".$_CONFIG['templ']['main']."/block_design_uploadimage.php");
	break;
	
	case "uploaded":
		include ("application/app_upload.php");
	break;
	
	case "perinv":
		include ("design/".$_CONFIG['templ']['main']."/block_design_perinv.php");
	break;
	
	case "addperinv":
		include ("design/".$_CONFIG['templ']['main']."/block_design_addperinv.php");
	break;
	
	case "addperinvinsert":
		include ("application/app_uploadper.php");
	break;
	
	case "datainvoice":
		include ("design/".$_CONFIG['templ']['main']."/block_design_datainvoice.php");
	break;
	
	case "addinvoice":
		include ("design/".$_CONFIG['templ']['main']."/block_design_addinvoice.php");
	break;
	
	case "addinvoiceinsert":
		include ("application/app_addinvoice.php");
	break;
	
	case "editinvstat":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editinvstat.php");
	break;
	
	case "editinvstatinset":
		include ("application/app_editinvstat.php");
	break;
	
	case "confdeleteinv":
		include ("design/".$_CONFIG['templ']['main']."/block_design_confdeleteinv.php");
	break;
	
	case "deleteinv":
		include ("application/app_deleteinv.php");
	break;
	
	case "kwitansi":
		include ("design/".$_CONFIG['templ']['main']."/block_design_kwitansi.php");
	break;
	
	case "editkwi":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editkwi.php");
	break;
	
	case "editkwiinsert":
		include ("application/app_editkwiinsert.php");
	break;
	
	case "kwitansidp":
		include ("design/".$_CONFIG['templ']['main']."/block_design_kwitansidp.php");
	break;
	
	case "addkwidp":
		include ("application/app_addkwidp.php");
	break;
	
	case "editkwidp":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editkwidp.php");
	break;
	
	case "kwidpupdate":
		include ("application/app_kwidpupdate.php");
	break;
	
	case "deletedp":
		include ("application/app_deletedp.php");
	break;
	
	case "inputkolektor":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputkolektor.php");
	break;
	
	case "inputkolektorinsert":
		include ("application/app_inputkolektor.php");
	break;
	
	case "datakolektor":
		include ("design/".$_CONFIG['templ']['main']."/block_design_datakolektor.php");
	break;
	
	case "editcust":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editcust.php");
	break;
	
	case "editcustupdate":
		include ("application/app_editcustupdate.php");
	break;
	
	case "deletecust01":
		include ("design/".$_CONFIG['templ']['main']."/block_design_deletecust01.php");
	break;
	
	case "deletecust02":
		include ("application/app_deletecust02.php");
	break;
	
	case "inputsup":
		include ("design/".$_CONFIG['templ']['main']."/block_design_inputsup.php");
	break;
	
	case "inputsupinsert":
		include ("application/app_inputsup.php");
	break;
	
	case "datasup":
		include ("design/".$_CONFIG['templ']['main']."/block_design_datasup.php");
	break;
	
	case "editsup":
		include ("design/".$_CONFIG['templ']['main']."/block_design_editsup.php");
	break;
	
	case "editsupupdate":
		include ("application/app_editsupupdate.php");
	break;
	
	case "deletesup01":
		include ("design/".$_CONFIG['templ']['main']."/block_design_deletesup01.php");
	break;
	
	case "deletesup02":
		include ("application/app_deletesup02.php");
	break;
	
	case "rekap01":
		include ("application/exportdata/app_rekap01.php");
	break;
	
	case "rekap02":
		include ("application/exportdata/app_rekap02.php");
	break;
	
	case "rekapsingle":
		include ("application/exportdata/app_rekapsingle.php");
	break;
	
	//Modul user manager
	case "user";
		include ("application/_usermanager/user.php");
	break;
	
	case "adduser":
		include ("application/_usermanager/adduser.php");
	break;
	
	case "adduserinsert":
		include ("application/_usermanager/adduserinsert.php");
	break;
	
	case "group":
		include ("application/_usermanager/group.php");
	break;
	
	case "addgroup":
		include ("application/_usermanager/addgroup.php");
	break;
	
	case "addgroupinsert":
		include ("application/_usermanager/addgroupinsert.php");
	break;
	
	case "groupmanage":
		include ("application/_usermanager/groupmanage.php");
	break;
	
	case "deletegroupmenu":
		include ("application/_usermanager/deletegroupmenu.php");
	break;
	
	case "menuadd":
		include ("application/_usermanager/menuadd.php");
	break;

}
?>