<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$sql = "SELECT DISTINCT type FROM tbl_invcat where not type = 'Software'";
$sql = "SELECT DISTINCT classcode,classdesc from tbl_assetclass";
$result = dbQuery($sql); 
?>
<head>

<style>
body { margin-top:15px; margin-left:15px; margin-right:15px;background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#rpt {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#rpt td, #rpt th {
    border: 1px solid #090a0a;
    padding: 5px;
}

#rpt tr:nth-child(even){background-color: #d4d6d8;}

#rpt tr:hover {background-color: #e8a4ce;}

#rpt th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: left;
    background-color: #0099cc;
	color: white; }	
	
.line {
	border: 1px solid #090a0a;
}

.bodyfont {
	 font-size: 12px; text-align: center;
}

.my-container{
  width:300px;
	
}
#cat{
  width: 100%;
}

#assetdesc{
	width: 100%;
	}

#specs{
	width: 100%;
	}

	#acqdate{
	width: 100%;
	}
	#depr{
	width: 35%;
	}
	#qty{
	width: 25%;
	}
	#acqcost{
	width: 25%;
	}
	#acqdate{
	width: 30%;
	}
	#ctrlnum{
	width: 35%;
	}
	#invnum{
		width: 30%;
	}

}


</style>

<?php include_once("include/addstyle.php");?>
<?php include_once("include/moneyform.php");?>
<!-- <script src="javascripts/clock.js"></script>
<script src="javascripts/intgeronly.js"></script>
 Isotope JS
    <script src="javascripts/imagesloaded.pkgd.min.js"></script>
    <script src="javascripts/isotope.pkgd.min.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script> -->
</head>

<body>

<title>TAMS Add New Item</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

	
<div class="container">
<fieldset class="container">
<legend><center>Add New Item</center></legend>
<!-- <form action="process/assetadd.php?action=add" method="post" name="frmAddasset" id="frmAddasset" enctype="multipart/form-data"> -->
<table width="100%" border="0" align="center">

	<tr> 
	<td>
	 <?php 
	 
	  $sqlacode = "select max(ctrlnum) as ctrlnum from tbl_hwinfo"; 
	  $resultacode = dbQuery($sqlacode); 
	  
	  while($row = dbFetchAssoc($resultacode)) {
		extract($row);
		?>
	<b>Control Number:</b> <input name="ctrlnum" type="text" id="ctrlnum" maxlength="10" value = "<?php echo str_pad ($ctrlnum+1,6,0, STR_PAD_LEFT);?>" readonly></input><br>
	
	<?php
	}
	?>
	
 <td>
    <b>Invoice Number</b>&nbsp;<input name="invnum" type="text" id="invnum" maxlength="50">&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date</b>&nbsp;<input name="acqdate" type="date" id="acqdate" required>
</td>
 

	<hr class="line">
  <div class="table-responsive-sm">
    <table id="rpt">
	  <thead>
      <tr>
			<th>Description</th>
			<th>Brand and Model</th>
			<th>Specifications</th>
			<th>Quantity</th>	
			<th>Total Amount</th>
			<th>Options</th>
      </tr>
	  </thead>
	  </div>
	  
  </table><br>
  
 </table><br>

  <p align="center"> 
 
 <script>
 var myWindow;
function openWin() {
 myWindow = window.open("index.php?chez=add_hw.php", "width=500, height=500");
}

function closeWin() {
  myWindow.close();
}
</script>

  <!-- <input name="btnAddItem" type="submit" class="button" id="btnAddasset" value="Add Item" onClick="openWin()"> -->
	<!-- <input name="btnAddItem" type="button" class="button" id="btnAddasset" value="Add Item" onClick="openWin()"> modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_item_modal">
      Add Item
    </button>
	
	<input name="btnAddSubmit" type="submit" class="btn btn-primary" id="btnAddasset" value="Submit" disabled>
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="btn btn-danger"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';">  
 </p>

</div>

<!-- modal -->

<div class="modal" tabindex="-1" role="dialog" id="add_item_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
				<?php 
					$sql = "SELECT DISTINCT type FROM tbl_invcat where not type = 'Software'";
					$sql = "SELECT DISTINCT classcode,classdesc from tbl_assetclass";
					$result = dbQuery($sql); 
					?>
					<head>
				<?php //include_once("include/addstyle.php");?>
					<?php include_once("include/moneyform.php");?>

					</head>

					<body>

					<title>TAMS Add New Asset</title>
					<p>&nbsp;</p>
						
					<div class="container">
					<!-- <legend><center>Add New Item</center></legend> -->
					<form action="process/assetadd.php?action=add" method="post" name="frmAddasset" id="frmAddasset" enctype="multipart/form-data">
					<table width="100%" border="0" align="center">

						<b>Description:</b>
						<div class = "my-container">
						<select name="cat" id="cat" required>
						<option value="">Select Category</option>
						<?php
						$sql = "SELECT DISTINCT assetcat FROM tbl_invcat where not type = 'Software'";
						$result = dbQuery($sql); 
						
						while($row = dbFetchAssoc($result)) {
							extract($row);
						?>
						<option value="<?php echo $assetcat; ?>"><?php echo $assetcat; ?></option>
						<?php
						}
						?>
						</select>
						
						<input size="50" name="assetdesc" type="text" id="assetdesc" maxlength="50" placeholder="Brand And Model" required>&nbsp;<br>
						</div>
				
						<label for="prodimg"><b>Add Image</b></label>
						<div class="uploadBtn"><input type="file" id="prodimg" class="img-responsive" name="prodimg" accept="image/*"></div><br>

						<b>Specifications:</b>
						<textarea class="txtarea" name= "specs" id="specs" maxlength= "1000"></textarea><br>
						
							<?php
						$sql1 = "select * from tbl_swinfo where swassigned = '0' and swassettype ='Operating System'";
						$result1 = dbQuery($sql1); 
					?>	
						
						&nbsp;&nbsp;<b>Quantity</b>&nbsp;<input name="qty" type="number" id="qty" maxlength="10" required>&nbsp;
						<b>Amount</b></b>&nbsp;<input type="text" class="numberOnly" autocomplete="on" maxlength="10" name="acqcost" id="acqcost" required />
						 		<script src="javascripts/moneyformat.js"></script>
								 
						
						<!-- <td><b>Acquisition Date</b></td>
						<td> <input name="acqdate" type="date" id="acqdate" required>&nbsp; -->
						
						<td><b>Depreciation</b>
						<select class="formdrop2"  name="depr" type="number" id="depr" required> 
						<option value="">(In Years)</option>
						<option value="0">1</option>
						<option value="3">3</option>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						</td>
						<!-- </tr>
						
					<tr> 
						<td><b>Acquisition Cost</b></td>
							<td> <div class="money">
							<div>₱</div><input type="text" class="numberOnly" autocomplete="on" maxlength="10" name="acqcost" id="acqcost" required />
						</div> <script src="javascripts/moneyformat.js"></script>
						</td>
						</tr>
						<br> -->
					</table>


						<!--<p align="center"> 
						<input name="btnAddasset" type="submit" class="button" id="btnAddasset" value="Add Hardware"> -->
					
					</p>

					</div>


      </div>
      <div class="modal-footer">
			
			<p align="center"> 
				<!-- <input name="btnAddasset" type="button" class="button" id="btnAddasset" value="Add Hardware"> -->
        <button type="button" class="btn btn-primary add-hardware" >Add Hardware</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>