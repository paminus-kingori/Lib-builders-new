<?php
/* $server = the IP address or network name of the server
 * $userName = the user to log into the database with
 * $password = the database account password
 * $databaseName = the name of the database to pull data from
 */
$$con = mysqli_connect("localhost","root","","libbuilder") or die ("error" . mysqli_error($con));

// write your SQL query here (you may use parameters from $_GET or $_POST if you need them)
$query = mysql_query('SELECT status, raword_id, total_price FROM myorder');

$table = array();
$table['cols'] = array(
	/* define your DataTable columns here
	 * each column gets its own array
	 * syntax of the arrays is:
	 * label => column label
	 * type => data type of column (string, number, date, datetime, boolean)
	 */
    array('label' => 'Label of column 1', 'type' => 'string'),
	array('label' => 'Label of column 2', 'type' => 'number'),
	array('label' => 'Label of column 3', 'type' => 'number')
	// etc...
);

$rows = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
	// each column needs to have data inserted via the $temp array
	$temp[] = array('v' => $r['status']);
	$temp[] = array('v' => $r['raword_id']);
	$temp[] = array('v' => $r['total_price']);
	// etc...
	
	// insert the temp array into $rows
    $rows[] = array('c' => $temp);
}

// populate the table with rows of data
$table['rows'] = $rows;

// encode the table as JSON
$jsonTable = json_encode($table);

// set up header; first two prevent IE from caching queries
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

// return the JSON data
echo $jsonTable;
?>

