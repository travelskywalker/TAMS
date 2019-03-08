<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch ($action) {
	
	case 'add' :
		addasset();
		break;
		
	case 'edit':
		updateasset();
		break;

	case 'delete' :
		deleteasset();
		break;
		
    case 'restore' :
		restoreasset();
		break;
	
	case 'update' :
		updateassetstatus();
		break;
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}
function addasset()
{

$ctrlnum = $_POST ["ctrlnum"];
$cat = $_POST ["cat"];
$assetdesc = $_POST ["assetdesc"];
$depr = $_POST ["depr"];
$acqdate = $_POST ["acqdate"];
$acqcost = $_POST ["acqcost"];
$specs = $_POST ["specs"];
$specs = ucwords ($specs);
$prodimg = $_FILES["prodimg"]["name"];
$temp = $_FILES["prodimg"]["tmp_name"];
$local_image = "../prodimg/";
$invnum = $_POST ["invnum"];
$qty = $_POST ["qty"];

//query to get the type from asset category
$sqlnum = "SELECT type from tbl_invcat where assetcat = '$cat'";
$resultnum = dbQuery($sqlnum);

$datanum = array();
while($rownum = dbFetchAssoc($resultnum)) {
extract($rownum);
$datanum = $rownum;
}
if($prodimg == NULL){

$sql = "INSERT INTO tbl_hwinfo (ctrlnum, assetdesc, type, assetcat, depr, acqdate, acqcost, status, specs, prodimg, invnum, qty)
		VALUES ('$ctrlnum','$assetdesc', '$type', '$cat', '$depr', '$acqdate', '$acqcost', 'FOR ASSIGNING', '$specs', 'prodimg/noimg.jpeg','$invnum', '$qty')";
		$result = dbQuery($sql) or die('Cannot add asset' . mysql_error());
		
header('Location:../index.php?chez=add_hw.php');

} else {
		
$sql = "INSERT INTO tbl_hwinfo (ctrlnum,assetdesc, type, assetcat, depr, acqdate, acqcost, status, specs, prodimg, invnum, qty)
		VALUES ('$ctrlnum','$assetdesc', '$type', '$cat','$depr', '$acqdate', '$acqcost', 'FOR ASSIGNING', '$specs', 'prodimg/$prodimg','$invnum', '$qty')";
		
		$result = dbQuery($sql) or die('Cannot add asset' . mysql_error());
		move_uploaded_file($temp,$local_image.$prodimg);
		
header('Location:../index.php?chez=add_hw.php');
}
}

/* Edit Asset*/

function updateasset()
{
$assetid = $_POST["assetid"];
$assetdesc = 	$_POST ['assetdesc'];
$status = $_POST ['status'];
$prodimg = $_FILES["prodimg"]["name"];
$temp = $_FILES["prodimg"]["tmp_name"];
$local_image = "../prodimg/";

$sql = "UPDATE tbl_hwinfo SET 
		assetdesc = ('$assetdesc'),
		prodimg = ('prodimg/$prodimg')
		where assetid = $assetid";
		
$result = dbQuery($sql);
move_uploaded_file($temp,$local_image.$prodimg);
header('Location:../index.php?chez=reports/HardwareAssets.php');
}

	
/*Delete Assets*/

function deleteasset()
{
	
	if (isset($_GET['assetid']) && (int)$_GET['assetid'] > 0) {
		$assetid = (int)$_GET['assetid'];
	} else {
		header('index.php?chez=reports/HardwareAssets.php');
	}
	
	$sql = "UPDATE tbl_hwinfo SET 
		status = UPPER('DELETED'),
		assigned = '2'
		where assetid = $assetid";	
	$result = dbQuery($sql);
	 
	header('Location:../index.php?chez=reports/HardwareAssets.php');

}

/*Restore Assets*/

function restoreasset()
{
	
	if (isset($_GET['assetid']) && (int)$_GET['assetid'] > 0) {
		$assetid = (int)$_GET['assetid'];
	} else {
		header('index.php?chez=reports/HardwareAssets.php');
	}
	
	$sql = "UPDATE tbl_hwinfo SET 
		status = UPPER('FOR ASSIGNING'),
		assigned = '0'
		where assetid = $assetid";	
	$result = dbQuery($sql);
	 
	header('Location:../index.php?chez=reports/HardwareAssets.php');

}

/*Update Assets*/

function updateassetstatus()
{
	$assignid = $_POST["assignid"];
	$remarks = $_POST["remarks"];

	$sql = "UPDATE tbl_assetassign SET 
		remarks = '$remarks'
		where assignid = '$assignid'";
	$result = dbQuery($sql);
	
	header('Location:../index.php?chez=reports/AssetStatus.php');

}


?>