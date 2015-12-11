<?php 
require_once '../util/util.php';

class contactoModel
{

	private $cn;
	
	function __construct()
	{
		$db_cone = new util();
		$this->cn = $db_cone->getConexion();

	}
	function ins_contacto($data){
		$res = $this->cn->prepare('call sp_graba_contacto(?,?,?)');
		$res->execute($data);
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
}