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

    //busca un cliente por rut
    public function BuscarCliente($rut_cliente){;
        $stm = Conexion::conector()->prepare("SELECT * FROM cliente WHERE rut_cliente = :rut_cliente");
        $stm->bindParam(":rut_cliente",$rut_cliente);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
