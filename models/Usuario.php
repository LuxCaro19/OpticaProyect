<?php

namespace models;

require_once("Conexion.php");

class Usuario{

    public function login($nombre, $clave){

        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE nombre=:nombre AND clave=:clave");
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":clave",$clave);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



}
 