<?php
class util {
    public function getConexion(){
        $cnx=new PDO("mysql:host=localhost;dbname=faregas","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  \"UTF8\""));
        return $cnx;
    }
    }
?>