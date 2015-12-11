<?php 
require_once '../util/util.php';

class loginModel{

	private $pdo;

	public function __CONSTRUCT(){
		$conex = new DB_PHP();
		$this->pdo = $conex->getConexion();
	}

	public function Login($data){
		$stm = $this->pdo->prepare("call sp_login(?,?);");
		$stm->execute($data);
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}