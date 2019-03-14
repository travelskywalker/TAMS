<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch ($action) {
	case 'tempImgUpload' : //temporary upload image
		tempImgUpload();
		break;
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
		// move to main user page`
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
// $prodimg = $_FILES["prodimg"]["name"];
// $temp = $_FILES["prodimg"]["tmp_name"];
$local_image = "../prodimg/";
$invnum = $_POST ["invnum"];
$qty = $_POST ["qty"];
$img = $_POST["image"];

/*//query to check the duplicate invoice number
$sqlinvnum = "SELECT invnum from tbl_hwinfo where invnum = '$invnum'";
$resultinv = dbQuery($sqlinvnum);

if (dbNumRows($resultinv) == 1) {
	
	header ('Location:../index.php?chez=error/eadd_hw.php&Invno&error' . urlencode('Invoice No. Already Taken'));
}

else {
*/

//query to get the type from asset category
$sqlnum = "SELECT type from tbl_invcat where assetcat = '$cat'";
$resultnum = dbQuery($sqlnum);

$datanum = array();
while($rownum = dbFetchAssoc($resultnum)) {
extract($rownum);
$datanum = $rownum;
}

$itemImage = ($img != '' ? 'prodimg/'.$img : 'prodimg/noimg.jpeg');

//posting item details

$sql = "INSERT INTO tbl_hwinfo (ctrlnum,assetdesc, type, assetcat, depr, acqdate, acqcost, status, specs, prodimg, invnum, qty)
 		VALUES ('$ctrlnum','$assetdesc', '$type', '$cat','$depr', '$acqdate', '$acqcost', 'FOR ASSIGNING', '$specs', '$itemImage','$invnum', '$qty')";
		
		$result = dbQuery($sql) or die('Cannot add item' . mysql_error());
		// move_uploaded_file($temp,$local_image.$prodimg);
		
		// move file from temp to prodimg folder
		rename('../temp_img/'.$img, '../prodimg/'.$img);
	
//posting invoice details

$sql_invoice = "INSERT INTO tbl_invoice (invnum,acqdate)
 		VALUES ('$invnum','$invdate')";

$result_invoice = dbQuery($sql_invoice) or die('Cannot add invoice' . mysql_error());

header('Location:../index.php?chez=reports/invoice.php');


// if($prodimg == NULL){

// $sql = "INSERT INTO tbl_hwinfo (ctrlnum, assetdesc, type, assetcat, depr, acqdate, acqcost, status, specs, prodimg, invnum, qty)
// 		VALUES ('$ctrlnum','$assetdesc', '$type', '$cat', '$depr', '$acqdate', '$acqcost', 'FOR ASSIGNING', '$specs', 'prodimg/noimg.jpeg','$invnum', '$qty')";
// 		$result = dbQuery($sql) or die('Cannot add asset' . mysql_error());
		
// header('Location:../index.php?chez=add_hw.php');

// } else {
		
// $sql = "INSERT INTO tbl_hwinfo (ctrlnum,assetdesc, type, assetcat, depr, acqdate, acqcost, status, specs, prodimg, invnum, qty)
// 		VALUES ('$ctrlnum','$assetdesc', '$type', '$cat','$depr', '$acqdate', '$acqcost', 'FOR ASSIGNING', '$specs', 'prodimg/$prodimg','$invnum', '$qty')";
		
// 		$result = dbQuery($sql) or die('Cannot add asset' . mysql_error());
// 		// move_uploaded_file($temp,$local_image.$prodimg);
		
// 		// move file from temp to prodimg folder
// 		rename('../temp_img/'.$img, '../prodimg/'.$img);
		
// header('Location:../index.php?chez=add_hw.php');
// }
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
$specs = $_POST['specs'];

$sql = "UPDATE tbl_hwinfo SET 
		assetdesc = ('$assetdesc'),
		prodimg = ('prodimg/$prodimg'),
		specs = ('specs')
		
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

/*Temporary Image Upload */
function tempImgUpload()
{
	// $tempFolder = "../temp_img/";
	$tempFolder = "../temp_img/";
	$img = $_FILES["prodimg"]["name"];
	$temp =  $_FILES["prodimg"]["tmp_name"];

	// save file to temporary folder
	try{
		if($img !== ''){
		move_uploaded_file($temp,$tempFolder.$img);
		echo $img;
		}
	}catch(Exception $error){
		echo json_encode(array("error"=>e));
	}
	
}


?>