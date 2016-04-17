	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
/*--------------------BEGINNING OF THE CONNECTION PROCESS------------------*/
//define constants for db_host, db_user, db_pass, and db_database
//adjust the values below to match your database settings
define('DB_HOST', 'localhost');
define('DB_USER', 'usmall');
define('DB_PASS', 'Zrxs2wtf2988'); //set DB_PASS as 'root' if you're using mac
define('DB_DATABASE', 'usmall'); //make sure to set your database
//connect to database host
$connection = @mysql_connect(DB_HOST, DB_USER, DB_PASS);
@mysql_select_db("usmall") or die('unable to select'.mysql_error());

$set_charset = 'SET CHARACTER SET utf8'; 
mysql_query($set_charset);
mysql_query('SET NAMES "utf8"');


/*-------------------------END OF CONNECTION PROCESS!---------------------*/

//Make sure connection is good or die
if(mysqli_connect_errno())
{
	die("Failed to connect to MySQL: (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
}

/*----BELOW ARE THE CUSTOM FUNCTIONS YOU CAN USE IN QUERYING DATABASES!----*/

/**
 * Use when expecting multiple records.
 *
 * Returns an array of rows
 */
function fetch($query)
{
	global $connection;

	$result = mysql_query($query);
	$res_num = mysql_num_rows($result);
	$rows = array();

	for($i = 0; $i < $res_num; $i++){
		$rows[] = mysql_fetch_assoc($result);
	}
	return $rows;
	// var_dump($rows);
}

/**
 * Use when doing an INSERT/DELETE/UPDATE query
 *
 * Returns an int if insert, boolean if update/delete queries
 */
function run_mysql_query($query)
{
	global $connection;
	mysql_query('SET NAMES "utf8"');
	$result = mysql_query($query) or die(mysql_error());

	//Check if query is an 'insert' query
	if(preg_match("/insert/i", $query))
	{
		// Returns an id (int)
		return mysql_insert_id($connection);
	}

	// Returns boolean (true/false) if query is update or delete
	return $result;
}
?>