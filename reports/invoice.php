<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}
	
if (isset($_GET['invnum']) && (int)$_GET['invnum'] >= 0) {
	$assetid= (int)$_GET['invnum'];
	$queryString = "&invnum=$assetid";
} else {
	$assetid = 0;
	$queryString = '';
}

$sql_invoice = "select * from tbl_invoice";
$result_invoice = dbQuery ($sql_invoice);

?>
<head>

<script> $(document).ready(function() {
    $('#rpt').DataTable();
} );	</script>

</head>

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


</style>

<body>
<title>Invoice</title>
	  <div class="container">
<?php include_once("include/navigation.php");?><br>

  	<p><img class="img-fluid" src="images/TSPI.png" height="60" width="300" align="left"/></p><br><br><br><br>
	<b><p>Lists of Registered Invoice</p></b>
	<b><p>As of: <?php echo date("Y-M-d");?></p></b>
	

	<hr class="line">
  <div class="table-responsive-sm">
    <table id="rpt">
	  <thead>
      <tr>
		
		<th><center>Invoice Number</center></th>
		<th><center>Invoice Date</center></th>
		<th><center>Description</center></th>

      </tr>
	  </thead>
	  </div>
	  
		<?php
	while($row = dbFetchAssoc($result_invoice)) {
	extract($row);
	?>
	
	<td><center><?php echo $invnum; ?></center></td>
	<td><center><?php echo $invdate; ?></center></td>
      <td><center><?php echo $description; ?></center></td>
  
     </tr>
	 
	 <?php
	}
	?>

  </table><br>
  
<center><button class="btn btn-success"onclick="myFunction()">Print this page</button>
<script>
function myFunction() {
    window.print();
}
</script>
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="btn btn-danger"  value="Exit" onClick="window.location.href='index.php?chez=reports/userassetsummary.php&tamsSummary';"></input></center>
  </div>

      </div>
    </div>
  </div>
 
</div>
	
</body>
