<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

if(!$_SESSION['tams_user_id']){
	header("location:../index.php");
	exit;
}

$mrno = $_POST ["mrno"];
?>

<style>
body { margin-top:10px; margin-left:100px; margin-right:50px; background-color:#EEEEEE; }
.txtindent1 { text-indent: 360px;}
.txtindent2 { font-size: 10px; text-indent: 650px;}
.sign { font-size: 10px;}
.form { width: 880px; margin: auto;	font-family: Times New Roman; font-size: 15px;}
.textf { font-size: 10px; text-indent: 450px;}

</style>

<body>
<title>MR Form</title>
<div class="container">

<h3 class="txtindent1">MR Number: 

<?php echo $mrno; ?> </h3> 
<p><center><img src="../images/TSPI.png" height="60" width="280"/></center></p> 
<h2><center>MEMORANDUM RECEIPT <?php echo date ("Y");?></center></h2>

<p class="form">This is to acknowledge the receipt of the following item/s for use of <b>

<?php  $sql = "SELECT * FROM tbl_assetassign JOIN tbl_assignuser ON tbl_assetassign.empnum=tbl_assignuser.empnum where mrno = '$mrno'";
	$result = dbQuery($sql); 
	while($row = dbFetchAssoc($result)) {
		extract($row);
		echo ($position."-".$asgn_fname." ".$asgn_lname); ?>.</b><br>
		 of <b><?php echo $deptname ?> Department</b> and assigned in <b><?php echo $branchname ?></b></p><br>
			<?php
	}
	?>
<p class="form"><b>Description:</b><br><?php $sqlhwinfo = "SELECT * FROM tbl_assetassign JOIN tbl_hwinfo ON tbl_assetassign.hwctrlnum=tbl_hwinfo.ctrlnum where mrno = '$mrno'"; 
$resulthwinfo = dbQuery($sqlhwinfo); 
	while($row = dbFetchAssoc($resulthwinfo)) {
		extract($row);
echo $assetdesc?></p><br>

<b><p class="form">Serial Number:</b><br> <?php echo $serialnum; ?></p><br>
<b><p class="form">Specifications and Accessories as follows:</p></b>

<div class="form">
<?php echo $specs; ?></p>
</div>

<p class="form"><b>Acquired Date:</b> <?php echo  $acqdate;?><br></p>
<p class="form"><b>Cost:</b> <?php echo $acqcost; ?></p>
<p class="form"><b>Asset Code:</b> <?php echo $assetclass,$assetcode; ?></p><br>
	<?php
	}
	?>
<br>
<b><p class="form">Software:</h3></b></p><br>
<p class="form"><b>Operating System:</b> <?php $sqlswinfo1 = "SELECT * FROM tbl_assetassign JOIN tbl_swinfo ON tbl_assetassign.os=tbl_swinfo.swassetcode where mrno = '$mrno'"; 
$resultswinfo1 = dbQuery($sqlswinfo1); 
	while($row = dbFetchAssoc($resultswinfo1)) {
		extract($row);
		 echo $swassetdesc; ?></p>
<p class="form"><b>Product Key: </b><?php echo $swprodkey; ?></p>
<p class="form"><b>Asset Code: </b><?php echo $swclass,$swassetcode; ?></p>
<p class="form"><b>Cost: </b> <?php echo $swacqcost; ?></p><br>
<?php
	}
	?>


<p class="form"><b>Antivirus:</b> <?php $sqlswinfo2 = "SELECT * FROM tbl_assetassign JOIN tbl_swinfo ON tbl_assetassign.av=tbl_swinfo.swassetcode where mrno = '$mrno'"; 
$resultswinfo2 = dbQuery($sqlswinfo2); 
	while($row = dbFetchAssoc($resultswinfo2)) {
		extract($row);
		 echo $swassetdesc; ?></p>
<p class="form"><b>Product Key: </b><?php echo $swprodkey; ?></p>
<p class="form"><b>Asset Code: </b><?php echo $swclass,$swassetcode; ?></p>
<p class="form"><b>Cost: </b> <?php echo $swacqcost; ?></p><br>
<?php
	}
	?>

<p class="form"><b>Office Software:</b> <?php $sqlswinfo3 = "SELECT * FROM tbl_assetassign JOIN tbl_swinfo ON tbl_assetassign.office=tbl_swinfo.swassetcode where mrno = '$mrno'"; 
$resultswinfo3 = dbQuery($sqlswinfo3); 
	while($row = dbFetchAssoc($resultswinfo3)) {
		extract($row);
		 echo $swassetdesc; ?></p>
<p class="form"><b>Product Key: </b><?php echo $swprodkey; ?></p>
<p class="form"><b>Asset Code: </b><?php echo $swclass,$swassetcode;  ?></p>
<p class="form"><b>Cost:</b> <?php echo $swacqcost; ?></p><br>
<?php
	}
	?>
<p></p>
<p class="form" style="text-indent: 80px;">I understand that the above item is assigned only for the duration of my employment and /or engagement with TSPI.</p><br>

<p class="form" style="text-indent: 80px;">In accepting custody of the property above described, I hereby undertake to use extra-ordinary care
and diligence in its safekeeping, proper usage and maintenance. I further undertake to return said property
in the condition it was received, normal wear and tear considered, upon my separation of my employment
with Tulay sa Pag-unlad, Inc. without need of demand.</p><br>

<p class="form" style="text-indent: 80px;">In the event Tulay sa Pag-unlad, Inc. finds that because of my carelessness or neglect of any kind, said property
has been lost, damaged, or destroyed, I accept full and absolute liability for the replacement of said property.</p><br>

<p class="form"><b>Recieved by:</b><br>
<br>
<p class="form"><b>Signature over Printed Name: ____________________________________</b><br>
<b>Position:</b> &nbsp;  &nbsp;  &nbsp;   &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;____________________________________<br>
<b>Date:</b> &nbsp;  &nbsp;  &nbsp;   &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;____________________________________<br>
<br>
<b>Technical Support InCharge:</b><br>
____________________________________________________<br>
<b>Signature over Printed name, Date</b><br>
<br>
<b>Noted By:</b><br>
<br>
<b>Leodegario Salubo<br>
MITS, Director</b>
<p class="textf">TSPI Asset Management System <?php echo date ("Y");?> &nbsp; Report Generated on: <?php echo date('Y-m-d');?></p>
</div>
</body>


<center><button onclick="myFunction()">Print this page</button>
<script>
function myFunction() {
    window.print();
}
</script>
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='../index.php?chez=rpttrans/userMRform.php&tamsMRForm';"></input></center>