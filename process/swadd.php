<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch ($action) {
	
	case 'add' :
		addsoftware();
		break;

		default :
	    // if action is not defined or unknown
		// move to main user page`
		header('Location:../index.php?chez=main.php');
}
function addsoftware()
{
	
$swassetcode = 	$_POST ["swassetcode"];
$swcat = $_POST ["swcat"];
$swassetdesc = $_POST ["swassetdesc"];
$swprodkey = $_POST ["swprodkey"];
$swqty = $_POST ["swqty"];
$swacqdate = $_POST ["swacqdate"];
$swexpdate = $_POST ["swexpdate"];
$swacqcost = $_POST ["swacqcost"];

$swassetdesc = ucfirst ($swassetdesc);

$sql = "SELECT swassetcode FROM tbl_swinfo where swassetcode = '$swassetcode'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/eadd_sw.php&assetcode&error' . urlencode('Asset Code Already Taken'));
	
} 

else {
	
$sql = "SELECT swprodkey FROM tbl_swinfo where swprodkey = '$swprodkey'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/eadd_sw.php&assetcode&error' . urlencode('Product Key Already Taken'));
	
} 

else {

$sql = "INSERT INTO tbl_swinfo (swclass, swassetcode, swassettype, swassetdesc, swacqdate, swexpdate, swacqcost, assetcat, swprodkey, swqty)
		VALUES ('ME','$swassetcode', '$swcat','$swassetdesc', '$swacqdate', '$swexpdate', '$swacqcost', 'Software', '$swprodkey','$swqty')";
		
		$result = dbQuery($sql) or die('Cannot add area' . mysql_error());
	
header('Location:../index.php?chez=add_sw.php');

}
}
}

?> 