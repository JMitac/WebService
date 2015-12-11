<?php
include '../util/util2.php';
class dao {
  public function lisSer(){/*PARA LISTAR LOS PRODUCTOS*/ /*lisprod*/
         $cnx=new util();
         $cn=$cnx->getConexion();
         $res=$cn->prepare('call mostServ');/*LLAMAMOS LA PROCEDIMIENTO*/
         $res->execute();
         /*
         foreach ($res as $row){
             $lclient[]=$row;
         }
         return $lclient;
         */
         return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
     }
    /*
     public function elimserv($id){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call borraServ(:cod)");
        $res->bindParam(":cod", $id);
        $res->execute();      
   }
   */

   public function insertServ($tit, $cuer, $img){/*PARA INSERTAR LOS PRODUCTOS*/ /*insertProd*/
        $cnx=new util();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("call editaServ(:titu, :cuer, :img)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/
        $res->bindParam(":titu", $tit);
        $res->bindParam(":cuer", $cuer);        
        $res->bindParam(":img", $img);
        $res->execute(); 
        /*
        foreach ($res as $row){
             $img=$row[1];
         }
         return $img;
        */
   }


}
?>