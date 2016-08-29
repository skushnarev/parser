<?php
include "config.cfg"; 
include 'connect.php';

$aSQL = "CREATE TABLE IF NOT EXISTS ".$cfg['DB']['actions']." (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					dt DATE,
					tm TIMETZ,
					urlo CHARACTER VARYING(255),
					urli CHARACTER VARYING(255))";
	
$bSQL = "CREATE TABLE IF NOT EXISTS ".$cfg['DB']['system']." (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					br CHARACTER VARYING(255),
					os CHARACTER VARYING(255))";
					
$a = pg_query($dbconn, $aSQL);				
$b = pg_query($dbconn, $bSQL);

echo 'Запросы на создание таблиц:<br><br>';

echo $aSQL.'<br><br>';
echo $bSQL.'<br><br>';
					
if ($a <> false) echo "База <b>".$cfg['DB']['actions']."</b> создана успешно.<br>";
if ($b <> false) echo "База <b>".$cfg['DB']['system']."</b> создана успешно.<br>";
?>