<?php

namespace models;

require_once("Conexion.php");

class Usuario{


    //inicia session con un usuario que este habilitado, osea con estado 1
    public function login($rut, $clave){

        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:rut AND clave=:clave AND estado='1'");
        $stm->bindParam(":rut",$rut);
        $stm->bindParam(":clave",$clave);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    //crea un usuario, por defecto de rol vendedor y por defecto habilitado con estado 1
    public function CrearUsuairo($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:rut,:nombre,'vendedor',:clave,'1')");
        $stm->bindParam(":rut",$data['rut']);
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":clave",$data['clave']);
        return $stm->execute();
    }

    //consulta todos los usuarios exepto los administradores, seria estupido borrar al administrador por accidente
    public function cargarUsuarios(){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE NOT rol='administrador'");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //busca un usuario por rut
    public function BuscarUsuario($rut){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:rut");
        $stm->bindParam(":rut",$rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //eliminar un usuario por rut
    public function BorrarUsuairo($rut){
        $stm = Conexion::conector()->prepare("DELETE FROM usuario WHERE rut=:rut");
        $stm->bindParam(":rut",$rut);
        return $stm->execute();
    }

    public function editarUsuario($id,$data){
        $stm = Conexion::conector()->prepare("UPDATE usuario SET rut=:rut, nombre=:nombre, clave=:clave, estado=:estado WHERE rut=:original");
        $stm->bindParam(":original",$id);
        $stm->bindParam(":rut",$data['rut']);
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":clave",$data['clave']);
        $stm->bindParam(":estado",$data['estado']);
        return $stm->execute();
    }

}

 