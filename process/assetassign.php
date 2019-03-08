<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();


$mrno = $_POST ["mrno"];
$assetclass = $_POST ["assetclass"];
$assetcode = $_POST ["assetcode"];
$hwctrlnum = $_POST ["hwctrlnum"];
$empnum = $_POST ["empnum"];
$serialnum = $_POST ["serialnum"];
$OS = $_POST ["OS"];
$AV = $_POST ["AV"];
$OF = $_POST ["OF"];

//query for duplicate of mrnumber
$sql = "SELECT mrno FROM tbl_assetassign where mrno = '$mrno'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/euserassign.php&MRno&error' . urlencode('MR No. Already Taken'));

} 

else {
	
$sql = "SELECT serialnum FROM tbl_assetassign where serialnum = '$serialnum'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/euserassign.php&MRno&error' . urlencode('Serial No. Already Taken'));

} 

else {

$sqlerr = "SELECT assetclass, assetcode FROM tbl_assetassign where assetclass = '$assetclass' and assetcode = '$assetcode'";
$resulterr = dbQuery($sqlerr);

if (dbNumRows($resulterr) == 1) {
	
	header ('Location:../index.php?chez=error/euserassign.php&MRno&error' . urlencode('MR No. Already Taken'));
	
} else {
	
//query to get the array of users
$sqlemp = "SELECT asgn_lname, asgn_fname, branchname,deptname from tbl_assignuser where empnum = '$empnum'";
$resultemp = dbQuery($sqlemp);

$dataemp = array();
while($rowemp = dbFetchAssoc($resultemp)) {
extract($rowemp);
$dataemp = $rowemp;

//query to get the asset description from tblhwinfo
$sqlnum = "SELECT assetdesc from tbl_hwinfo where ctrlnum = '$hwctrlnum'";
$resultnum = dbQuery($sqlnum);

$datanum = array();
while($rownum = dbFetchAssoc($resultnum)) {
extract($rownum);
$datanum = $rownum;
	
//if no duplicate, inserting of data to DB
$sql1 = "INSERT INTO tbl_assetassign (mrno, empnum, fname, lname, assetclass, assetcode,branchname, deptname, hwasset, hwctrlnum, serialnum,remarks,os,av,office)
		VALUES ('$mrno', '$empnum', '$asgn_fname', '$asgn_lname', '$assetclass','$assetcode','$branchname', '$deptname', '$assetdesc','$hwctrlnum',
		'$serialnum','FOR DELIVERY','$OS','$AV','$OF')";		
$result = dbQuery($sql1);


//query to deduct the quantity of hardware asset in DB
$sqlqty = "SELECT qty from tbl_hwinfo where ctrlnum = '$hwctrlnum'";
$resultqty = dbQuery($sqlqty);

while ($dataqty = dbFetchAssoc($resultqty)) {
extract ($dataqty);
$total = $qty-1;

$sql2 = "UPDATE TBL_HWINFO SET qty = '$total' WHERE ctrlnum = '$hwctrlnum'"; 
$result2 = dbQuery($sql2);

//and update the status if reach to zero
$sql = "UPDATE TBL_HWINFO SET ASSIGNED = '1', STATUS = 'ALL STOCKS OUT' WHERE ctrlnum = '$hwctrlnum' and qty = '0'"; 
$result = dbQuery($sql) or die('Cannot Assign Asset' . mysql_error());

if($OS == NULL){
header('Location:../index.php?chez=userassign.php');
}else{
//query to deduct quantity of OS Software in DB
$sqlqtyos = "SELECT swqty from tbl_swinfo where swassetcode = '$OS'";
$resultqtyos = dbQuery($sqlqtyos);

while ($dataqtyos = dbFetchAssoc($resultqtyos)) {
extract ($dataqtyos);
$totalos = $swqty-1;

$sqlos = "UPDATE TBL_SWINFO SET swqty = '$totalos' WHERE swassetcode = '$OS'"; 
$resultos = dbQuery($sqlos);

//and update the status if reach to zero
$sql = "UPDATE TBL_SWINFO SET SWASSIGNED = '1', STATUS = 'ALL STOCKS OUT' WHERE swassetcode = '$OS' and swqty = '0'"; 
$result = dbQuery($sql) or die('Cannot Assign Asset' . mysql_error());

header('Location:../index.php?chez=userassign.php');
}
}

if($AV == NULL){
header('Location:../index.php?chez=userassign.php');
}else{
//query to deduct quantity of AV Software in DB
$sqlqtyav = "SELECT swqty from tbl_swinfo where swassetcode = '$AV'";
$resultqtyav = dbQuery($sqlqtyav);

while ($dataqtyav = dbFetchAssoc($resultqtyav)) {
extract ($dataqtyav);
$totalav = $swqty-1;

$sqlav = "UPDATE TBL_SWINFO SET swqty = '$totalav' WHERE swassetcode = '$AV'"; 
$resultav = dbQuery($sqlav);

//and update the status if reach to zero
$sql = "UPDATE TBL_SWINFO SET SWASSIGNED = '1', STATUS = 'ALL STOCKS OUT' WHERE swassetcode = '$AV' and swqty = '0'"; 
$result = dbQuery($sql) or die('Cannot Assign Asset' . mysql_error());

header('Location:../index.php?chez=userassign.php');
}
}

if($OF == NULL){
header('Location:../index.php?chez=userassign.php');
}else{

//query to deduct quantity of OFFICE Software in DB
$sqlqtyof = "SELECT swqty from tbl_swinfo where swassetcode = '$OF'";
$resultqtyof = dbQuery($sqlqtyof);

while ($dataqtyof = dbFetchAssoc($resultqtyof)) {
extract ($dataqtyof);
$totalof = $swqty-1;

$sqlof = "UPDATE TBL_SWINFO SET swqty = '$totalof' WHERE swassetcode = '$OF'"; 
$resultof = dbQuery($sqlof);

//and update the status if reach to zero

$sql = "UPDATE TBL_SWINFO SET SWASSIGNED = '1', STATUS = 'ALL STOCKS OUT' WHERE swassetcode = '$OF' and swqty = '0'"; 
$result = dbQuery($sql) or die('Cannot Assign Asset' . mysql_error());

header('Location:../index.php?chez=userassign.php');
}
}
}
}
}
}
}
}
?>