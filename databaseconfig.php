<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$name = "dblogin";

	try
		{
			$DB_con = new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
			$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	include_once 'class.user.php';
	$user = new USER($DB_con);
?>