<?php
$DB_host = 'localhost';
$DB_port = '5432';
$DB_dbname = 'parser';
$DB_user = 'postgres';
$DB_pass = 'pass';

$dbconn = pg_connect('host='.$DB_host.' port='.$DB_port.' dbname='.$DB_dbname.' user='.$DB_user.' password='.$DB_pass.'');
?>