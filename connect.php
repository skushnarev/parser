<?php
include "config.cfg"; 

$connect = "host=".$cfg['DB']['host']." port=".$cfg['DB']['port']." dbname=".$cfg['DB']['dbname']." user=".$cfg['DB']['user']." password=".$cfg['DB']['pass']."";
$dbconn = pg_connect($connect);
?>