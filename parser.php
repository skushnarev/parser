<?php
include "config.cfg"; 
include 'connect.php';

$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
pg_query($dbconn, $TZ);

$a = pg_query("COPY ".$cfg['DB']['actions']." (ip, dt, tm, urlo, urli) FROM '".$cfg['LF']['log1']."' (DELIMITER '".$cfg['LF']['DELIMITER']."');");
$b = pg_query("COPY ".$cfg['DB']['system']." (ip, br, os) FROM '".$cfg['LF']['log2']."' (DELIMITER '".$cfg['LF']['DELIMITER']."');");

if ($a <> false) echo "Файл <b>".$cfg['LF']['log1']."</b> pзагружен в базу <b>".$cfg['DB']['actions']."</b>.<br>";
if ($b <> false) echo "Файл <b>".$cfg['LF']['log2']."</b> pзагружен в базу <b>".$cfg['DB']['system']."</b>.<br>";

//------ не актуален ------\/---
function rt($log, $reg, $table)
{
	$file = fopen($log, 'rt');
	if ($file)
	{	
		$n = 0; $err = 0; $A[] = '';
		while (!feof($file)) 
		{
			$n++;
			$string = fgets($file);
			if (preg_match ($reg, $string, $arrLog))
			{				
				$A[$n] = $arrLog[1].'|';
				$A[$n] .= date('Y-m-d', strtotime($arrLog[2])).'|';
				$A[$n] .= date('H:i:s', strtotime($arrLog[3])).'|';
				$A[$n] .= pg_escape_string($arrLog[4]).'|';
				$A[$n] .= mysql_real_escape_string($arrLog[5]);
			}
			else
			{
				echo '<br>Файл <b>'.$log.'</b> содержит неверный формат в строке <b>'.$n.'</b>: <b>'.$string.'</b><br>';
				$err++;
			};
		};
		include 'connect.php';
		$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
		pg_query($dbconn, $TZ);
		if (pg_copy_from($dbconn, $table.' (ip, dt, urlo, urli)', $A, '|')) 
			echo '<br>Загружено '.($n-$err).' из '.$n.' строк в базу из файла '.$log.'.<br>Ошибок '.$err.'.<br>';
	};
};
//rt('log/log1.txt', '~^([0-9\.]{0,15})\|([0-9\.]{0,14})\|([0-9\:]{0,5})\|([\S]*)\|([\S]*)$~im', $cfg['DB']['actions']);
//rt('log/log2.txt', '~^([0-9\.]{0,15})\|([\S\ ]*.)\|([\S\ ]*)$~im', $cfg['DB']['actions']);

//------ не актуален ------/\---
?>