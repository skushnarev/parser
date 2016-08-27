<?php

include 'connect.php';

pg_query($dbconn, "CREATE TABLE IF NOT EXISTS actions (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					dt TIMESTAMPTZ,
					urli CHARACTER VARYING(255),
					urlo CHARACTER VARYING(255))");
					
pg_query($dbconn, "CREATE TABLE IF NOT EXISTS actions_to (
					id SERIAL PRIMARY KEY,
					ip CHARACTER VARYING(15),
					dt DATE,
					tm TIME,
					urli CHARACTER VARYING(255),
					urlo CHARACTER VARYING(255))");

?>