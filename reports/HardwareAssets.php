<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}
	
if (isset($_GET['assetid']) && (int)$_GET['assetid'] >= 0) {
	$assetid= (int)$_GET['assetid'];
	$queryString = "&assetid=$assetid";
} else {
	$assetid = 0;
	$queryString = '';
}

$sqlsummary = "select * from tbl_hwinfo where status NOT IN ('DELETED','DISPOSED', 'ALL STOCKS OUT') order by qty desc";
$resultsummary = dbQuery ($sqlsummary);

?>
<head>
<?php include_once("include/addstyle.php");?>
<script src="javascripts/forasset.js"></script>
<script src="javascripts/clock.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

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
<title>Hardware Summary</title>
	  <div class="container">
<?php include_once("include/navigation.php");?><br>

  	<p><img class="img-fluid" src="images/TSPI.png" height="60" width="300" align="left"/></p><br><br><br><br>
	<b><p>Unassigned Registered Asset Report Summary</p></b>
	<b><p>As of: <?php echo date("Y-M-d");?></p></b>
	

	<hr class="line">
  <div class="table-responsive-sm">
    <table id="rpt">
	  <thead>
      <tr>
		
		<th><center>Quantity</center></th>
		<th><center>Description</center></th>
		<th><center>Specifications</center></th>
		<th><center>Acquisition Date</center></th>
		<th><center>Acquisition Cost</center></th>
        <th><center>Original Life</center></th>
		<th><center>Status</center></th>
		<th><center>Image</center></th>
		<th><center>Delete / Edit</center></th>
      </tr>
	  </thead>
	  </div>
	  
		<?php
	while($row = dbFetchAssoc($resultsummary)) {
	extract($row);
	?>
	
	<td><center><?php echo $qty; ?></center></td>
	<td><center><?php echo ucfirst($assetdesc); ?></center></td>
	<td><center><?php echo $specs; ?></center></td>
      <td><center><?php echo $acqdate; ?></center></td>
	  <td><center><?php echo $acqcost; ?></center></td>
	  <td><center><?php echo $depr; ?> years</center></td>
	  <td><center><?php echo $status; ?></center></td>
	  <td><center><img src="<?php echo $row['prodimg'] ?>" alt="" width="50" height="50" ></center></td>
	  
	  <td> <a  style="font-weight:normal;"  href="javascript:deleteasset(<?php echo $assetid; ?>);">	  
	  <center>Delete</a>/<a  style="font-weight:normal;" href="javascript:updateasset(<?php echo $assetid; ?>);">
	  Edit</center></a></td>
	  
     </tr>
	 
	 <?php
	}
	?>

  </table><br>
  
<center><button onclick="myFunction()">Print this page</button>
<script>
function myFunction() {
    window.print();
}
</script>
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Exit" onClick="window.location.href='index.php?chez=reports/assetsummary.php&tamsSummary';"></input></center>
  </div>

      </div>
    </div>
  </div>
 
</div>
	
</body>
