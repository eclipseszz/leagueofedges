<?php
	$host = "localhost";
	$data = "localhost";
	$user = "localhost";
	$pass = "";
	$mysqli = new mysqli($host, $user, $pass, $data);
	if ($mysqli->connect_error) {
		printf("ERRO MySQLi: %s\n", $mysqli->connect_error);
		exit();
	}
?>