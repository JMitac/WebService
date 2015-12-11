<?php 
require_once 'php/model/web.model.php';

class webController 
{
	private $model;

	function __construct()
	{
		$this->model = new webModel();
	}
	function lista_mision(){
		return $this->model->lista_mision();
	}
	/*------------------------------*/
	function lista_nosotros(){
		return $this->model->lista_nosotros();
	}
	/*-----------------------------*/
	function lista_producto(){
		return $this->model->lista_producto();
	}
	function lista_prod1(){
		return $this->model->lista_prod1();
	}
	function lista_prod2(){
		return $this->model->lista_prod2();
	}
	function lista_prod3(){
		return $this->model->lista_prod3();
	}
	function lista_prod4(){
		return $this->model->lista_prod4();
	}
	function lista_galeria(){
		return $this->model->lista_galeria();
	}
	function lista_noticia(){
		return $this->model->lista_noticia();
	}
	function lista_detalle_producto($cod){
		return $this->model->lista_detalle_producto($cod);
	}
	function lista_marca(){
		return $this->model->lista_marca();
	}
}
