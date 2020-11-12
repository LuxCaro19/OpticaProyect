<?php

namespace models;

require_once("Conexion.php");

class Cliente{


    public function insert($data){

        $stm = Conexion::conector()->prepare("INSERT INTO cliente VALUES(:rut,:nombre,:direccion,:telefono,:fecha,:email)");
        $stm->bindParam(":rut",$data['rut']);
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":direccion", $data['direccion']);
        $stm->bindParam(":telefono",$data['telefono']);
        $stm->bindParam(":fecha",$data['fecha']);
        $stm->bindParam(":email",$data['email']);
        return $stm->execute();
        

    }

    public function login($email, $clave){

        $stm = Conexion::conector()->prepare("SELECT * FROM cliente WHERE email=:email AND clave=:clave ");
        $stm->bindParam(":email",$email);
        $stm->bindParam(":clave",$clave);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }



}
