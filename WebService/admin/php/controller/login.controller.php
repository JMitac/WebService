<?php
session_start();
require_once '../model/login.model.php';

if (isset($_REQUEST['user']) and isset($_REQUEST['pass'])){
    $controller = new loginController();
    call_user_func(array( $controller, 'Login'),$_REQUEST["user"],$_REQUEST["pass"]);
}else if(isset($_REQUEST['salir'])){
    $controller = new loginController();
    call_user_func(array( $controller, 'Salir'));
}else{  header('Location: ../index.php.php'); }

class loginController
{    
        private $model;
        
        public function __CONSTRUCT(){
            $this->model = new loginModel();
        }

        public function __call($method, $args) 
        { 
            if(method_exists($this, $method)) { 
                return call_user_func_array(array($this, $method), $args); 
            }else{ 
                return call_user_func_array(array($this, 'Index'), $args); 
            } 
        } 

        public function Index($user,$pass){
            header('Location: ../../index.php.php');
        }

        public function Login($user,$pass){
            $resp = $this->model->Login(array($user,$pass));
            if ($resp[0]->rola == "A") {
                if ($resp[0]->res == "success") {
                    $_SESSION["access"] = true;
                    $_SESSION["nombre"] = $resp[0]->resul;    
                    $_SESSION["rol"] = $resp[0]->rola;   
                    $_SESSION["ingre"] = true;                   
                    header('Location: ../../index.php');
                }else{
                    $_SESSION["msg"] = 'Usuario y/o Contraseña incorrecta';
                    header('Location: ../../login.php');
                }
            }
            /*----------------*/            
            elseif ($resp[0]->rola == "S") {
                if ($resp[0]->res == "success") {
                    $_SESSION["access"] = true;
                    $_SESSION["nombre"] = $resp[0]->resul;    
                    $_SESSION["rol"] = $resp[0]->rola;   
                    $_SESSION["ingre"] = true;                   
                    header('Location: ../../asistente-index.php');
                }else{
                    $_SESSION["msg"] = 'Usuario y/o Contraseña incorrecta';
                    header('Location: ../../login.php');
                }
            }
            /*----------------*/
            elseif ($resp[0]->rola == "M") {
                if ($resp[0]->res == "success") {
                    $_SESSION["access"] = true;
                    $_SESSION["nombre"] = $resp[0]->resul;    
                    $_SESSION["rol"] = $resp[0]->rola;   
                    $_SESSION["ingre"] = true;                   
                    header('Location: ../../mecanico-index.php');
                }else{
                    $_SESSION["msg"] = 'Usuario y/o Contraseña incorrecta';
                    header('Location: ../../login.php');
                }
            }
            /*----------------*/
            else{
                $_SESSION["msg"] = 'Usuario no autorisado';
                    header('Location: ../../login.php');
            }
        }

        public function Salir(){
            unset($_SESSION["access"]);
            unset($_SESSION["nombre"]);
            unset($_SESSION["rol"]);
             unset($_SESSION["ingre"]);
            header('Location: ../../login.php');
        }
}