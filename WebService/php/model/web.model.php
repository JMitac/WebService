<?php 
require_once 'php/util/util.php';

class webModel
{

	private $cn;
	
	function __construct()
	{
		$db_cone = new util();
		$this->cn = $db_cone->getConexion();

	}
	/*mision*/
	function lista_mision(){
		$res = $this->cn->prepare('call mostMis()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	/*-------------------------------------------*/
	function lista_nosotros(){
		$res = $this->cn->prepare('call mostNos()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	/*-------------------------------------------*/
	function lista_producto(){
		$res = $this->cn->prepare('call mostProd()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_prod1(){
		$res = $this->cn->prepare('call mostCat1()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}

	function lista_prod2(){
		$res = $this->cn->prepare('call mostCat2()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_prod3(){
		$res = $this->cn->prepare('call mostCat3()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_prod4(){
		$res = $this->cn->prepare('call mostCat4()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_detalle(){
		$res = $this->cn->prepare('call mostDeta1()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_galeria(){
		$res = $this->cn->prepare('call mostGale()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_noticia(){
		$res = $this->cn->prepare('call mostNot()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_detalle_producto($cod){
		$res = $this->cn->prepare('call mostDetPro(?)');
		$res->execute(array($cod));
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
	function lista_marca(){
		$res = $this->cn->prepare('call mostMar()');
		$res->execute();
		return $res->fetchAll(PDO::FETCH_OBJ);
	}

	function ins_contacto($data){
		$res = $this->cn->prepare('call sp_graba_contacto(?,?,?)');
		$res->execute($data);
		return $res->fetchAll(PDO::FETCH_OBJ);
	}
}