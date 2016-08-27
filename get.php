<?php
include "config.cfg"; 
include 'connect.php';

$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
pg_query($dbconn, $TZ);

$q = "SELECT * FROM ".$cfg['DB']['actions'].";";
//echo $q.'<br>';
$result = pg_query($dbconn, $q);
while ($actions = pg_fetch_assoc($result))
{
	echo $actions['id']." ".$actions['ip']." ".$actions['dt']." ".$actions['tm']." ".$actions['urli']." ".$actions['urlo']."<br>";
	//echo '<pre>';
	//print_r($actions);
	//echo '</pre>';
};
		
?>