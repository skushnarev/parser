<?php
function rt($log, $reg)
{
	$file = fopen($log, 'rt');
	if ($file)
	{	
		$n = 0; $err = 0;
		while (!feof($file)) 
		{
			$n++;
			$string = fgets($file);
			if (preg_match ($reg, $string, $arrLog1))
			{
				//print_r($arrLog1);
			}
			else
			{
				echo '<br>Файл <b>'.$log.'</b> содержит неверный формат в строке <b>'.$n.'</b>: <b>'.$string.'</b><br>';
				$err++;
			};
		};
		echo '<br>Загружено '.($n-$err).' из '.$n.' строк в базу из файла '.$log.'.<br>Ошибок '.$err.'.<br>';
	};
};
rt("log/log1.txt", '~^([0-9\.]{0,15})\|([0-9\.]{0,14})\|([0-9\:]{0,5})\|([\S]*)\|([\S]*)$~im');
rt('log/log2.txt', '~^([0-9\.]{0,15})\|([\S\ ]*.)\|([\S\ ]*)$~im');


?>