<?php
class DB_PHP
{
	public function getConexion(){
		$pdo = new PDO("mysql:host=localhost;dbname=faregas","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  \"UTF8\""));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
	/*10200092*/
	
}
