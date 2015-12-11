<?php
include '../util/util2.php';
class dao {
  public function listNos(){/*PARA LISTAR LOS PRODUCTOS*/
         $cnx=new util();
         $cn=$cnx->getConexion();
         $res=$cn->prepare('call mostNos');/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: LISTAR TODOS LOS PRODUCTOS*/
         $res->execute();
         return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
     }
   /*public function nuevamisi($tit, $cuer)*/
   public function InserNos($cuer){/*PARA INSERTAR LOS PRODUCTOS*/
        $cnx=new util();
        $cn=$cnx->getConexion();/*(:titu, :cuer)*/
        $res=$cn->prepare("call editaNos(:cuer)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/
        /*$res->bindParam(":titu", $tit);*//*insertMis*/        
        $res->bindParam(":cuer", $cuer);
        $res->execute(); 
   }


}
?>