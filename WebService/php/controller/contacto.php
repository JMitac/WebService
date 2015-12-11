<?php 
 require_once '../model/contacto.model.php';

if (isset($_REQUEST['ajx'])){
	$accion = $_REQUEST['ajx'];
	$controller = new contactoController();
	call_user_func(array($controller,$accion));
}

 class contactoController
 {
 	private $model;
 	
 	function __construct()
 	{
 		$this->model = new contactoModel();
 	}

 	public function inserta(){
 		$data = array();
 		$data[] = $_REQUEST['emp'];
 		$data[] = $_REQUEST['tel'];
 		$data[] = $_REQUEST['ema'];
 		$this->model->ins_contacto($data);
		echo json_encode('ok');
 	}
 }