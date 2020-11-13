<?php

namespace models;

require_once("Conexion.php");

class Usuario{

    public function login($rut, $clave){

        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:rut AND clave=:clave AND estado=1");
        $stm->bindParam(":rut",$rut);
        $stm->bindParam(":clave",$clave);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



}
 