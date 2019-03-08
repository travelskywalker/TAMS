<?php
require_once 'config.php';

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($dbName) or die('Database Not Found!. ' . mysql_error());


function dbQuery($sql)
{
	$result = mysql_query($sql) or die(mysql_error());
	
	return $result;
}


function dbFetchAssoc($result)
{
	return mysql_fetch_assoc($result);
}

function dbNumRows($result)
{
	return mysql_num_rows($result);
}


?>