<?php
include "config.cfg"; 
include 'connect.php';

//pg_query($dbconn, "CREATE TABLE IF NOT EXISTS ".$cfg['DB']['actions']." (
//					id SERIAL PRIMARY KEY,
//					ip CHARACTER VARYING(15),
//					dt TIMESTAMPTZ,
//					urlo CHARACTER VARYING(255),
//					urli CHARACTER VARYING(255))");
					
pg_query($dbconn, "CREATE TABLE IF NOT EXISTS ".$cfg['DB']['actions']." (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					dt DATE,
					tm TIMETZ,
					urlo CHARACTER VARYING(255),
					urli CHARACTER VARYING(255))");
					
pg_query($dbconn, "CREATE TABLE IF NOT EXISTS ".$cfg['DB']['system']." (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					br CHARACTER VARYING(255),
					os CHARACTER VARYING(255))");
?>