<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$sqlsummary = "select * from tbl_swinfo order by swassetcode asc";
$resultsummary = dbQuery ($sqlsummary);
?>

<head>
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

<title>Software Summary</title>
<div class="container"
<?php include_once("include/usernavigation.php");?><br>
	  

  	<p><img class="img-fluid" src="images/TSPI.png" height="60" width="300" align="left"/></p><br><br><br><br>
	<b><p>Unassigned Registered Software Summary</p></b>
	<b><p>As of: <?php echo date("Y-M-d");?></p></b>
	<hr class="line">
  <div class="table-responsive-sm">
    <table id="rpt">
	  <thead>
      <tr>
		<th>Asset Code</th>
		<th>Description</th>
		<th>Product Key</th>
		<th>Quantity</th>
        <th>Acquisition Date</th>
		<th>Acquisition Cost</th>
        <th>Expiration Date</th>
		<th>Remarks</th>
      </tr>
	  </thead>
	  </div>
	  
		<?php
	while($row = dbFetchAssoc($resultsummary)) {
	extract($row);
	$swexpdatenone='none';
	
	?>
	
	<td><center><?php echo $swclass,$swassetcode; ?></center></td>
	<td><center><?php echo ucfirst($swassetdesc); ?></center></td>
	<td><center><?php echo $swprodkey; ?></center></td>
	<td><center><?php echo $swqty; ?></center></td>
      <td><center><?php echo $swacqdate; ?></center></td>
	  <td><center><?php echo $swacqcost; ?></center></td>
	  <td><center><?php echo $swexpdate; ?></center></td>
	  <td><center><?php echo $status; ?></center></td>
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
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=reports/userassetsummary.php&tamsSummary';"></input></center>
  </div>

  

        
      </div>
    </div>
  </div>
 
</div>
	
</body>
