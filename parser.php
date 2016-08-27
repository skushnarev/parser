<?php
//include 'connect.php';

//pg_query("COPY actions_to FROM 'D:\\xampp\\htdocs\\parser\\log1';");

//$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
//pg_query($dbconn, $TZ);

function rt($log, $reg)
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
				//print_r($arrLog);
				//$ip = $arrLog[1];
				//$dt = date('Y-m-d H:i:s', strtotime($arrLog[2].' '.$arrLog[3]));
				////echo $dt = date('c', strtotime($arrLog[2].' '.$arrLog[3]));
				//$urli = htmlspecialchars($arrLog[4]);
				//$urlo = mysql_real_escape_string($arrLog[5]);
				
				//$q = "INSERT INTO actions (ip, dt, urli, urlo) VALUES ('$ip', '$dt', '$urli', '$urlo');";
				//echo $q;
				//echo '<br>';
				//pg_query($q);
				
				$A[$n] = $arrLog[1].'	';
				$A[$n] .= date('Y-m-d H:i:s', strtotime($arrLog[2].' '.$arrLog[3])).'	';
				$A[$n] .= htmlspecialchars($arrLog[4]).'	';
				$A[$n] .= mysql_real_escape_string($arrLog[5]);
			}
			else
			{
				echo '<br>Файл <b>'.$log.'</b> содержит неверный формат в строке <b>'.$n.'</b>: <b>'.$string.'</b><br>';
				$err++;
			};
		};
		//print_r($A);
		include 'connect.php';
		$TZ= "SET TIME ZONE '".date_default_timezone_get()."'";
		pg_query($dbconn, $TZ);
		pg_copy_from($dbconn, 'actions', $A);
		echo '<br>Загружено '.($n-$err).' из '.$n.' строк в базу из файла '.$log.'.<br>Ошибок '.$err.'.<br>';
	};
};
rt("log/log1.txt", '~^([0-9\.]{0,15})\|([0-9\.]{0,14})\|([0-9\:]{0,5})\|([\S]*)\|([\S]*)$~im');
//rt('log/log2.txt', '~^([0-9\.]{0,15})\|([\S\ ]*.)\|([\S\ ]*)$~im');


?>