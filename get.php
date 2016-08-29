<?php
include "config.cfg"; 
include 'connect.php';

$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
pg_query($dbconn, $TZ);

$q = "SELECT
	DISTINCT b.ip,
	(SELECT c.br FROM ".$cfg['DB']['system']." c WHERE c.ip=b.ip ORDER BY id DESC LIMIT 1) AS br,
    (SELECT d.os FROM ".$cfg['DB']['system']." d WHERE d.ip=b.ip ORDER BY id DESC LIMIT 1) AS os,
	(SELECT a.urli FROM ".$cfg['DB']['actions']." a WHERE a.ip = b.ip ORDER BY dt+tm DESC LIMIT 1) AS urli, 
	(SELECT COUNT(*) AS co FROM ".$cfg['DB']['actions']." a WHERE a.ip = b.ip GROUP BY a.urli ORDER BY co DESC LIMIT 1) AS urli_c, 
	(SELECT a.urlo FROM ".$cfg['DB']['actions']." a WHERE a.ip = b.ip ORDER BY dt+tm ASC LIMIT 1) AS urlo 
FROM ".$cfg['DB']['system']." b ";


$result = pg_query($dbconn, $q);
$n=0;
while ($actions = pg_fetch_assoc($result))
{
	$actions['id'] = ++$n;
	$A[] = $actions; 
};
	
if ($_GET['get'] == 0) echo json_encode(array('sucess'=>true,'total'=>count($A),'log'=>$A));

if ($_GET['get'] == 1) 
{
	echo '<pre>';
	print_r($cfg);
	echo '</pre>';
};

if ($_GET['get'] == 2) 
{
	echo 'SQL запрос на выборку данных с заявленными требованиями:<br><br>';
	echo $q;
};
?>