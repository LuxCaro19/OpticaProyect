<?php

namespace controllers;


use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlUsuario{
    public $rut;
    public $nombre;
    public $clave;

    public function __construct()
    {
        $this->rut    = $_POST['crearRut'];
        $this->nombre = $_POST['crearNombre'];
        $this->clave  = $_POST['crearClave'];

    }
 //crea un usuario por defecto vendedor y por defecto activado, solo necesita
 public function nuevoUsuario(){
    if ($this->rut == "" || $this->nombre == "" || $this->clave == "") {
        $mensaje = ["msg"=>"complete los campos vacios"];
        echo json_encode($mensaje);
        return;
    } 
    $model = new Usuario();
    $data = ["rut"=>$this->rut,"nombre"=>$this->nombre,"rol"=>"vendedor","clave"=>md5($this->clave),"estado"=>"1"];
    $count = $model->CrearUsuairo($data);
    if ($count == 1) {
        $mensaje = ["msg"=>"usuario creado"];
        echo json_encode($mensaje); 
    } else {
        $ishere = $model->BuscarUsuario($this->rut);
        if (count($ishere)== 1) {
            $mensaje = ["msg"=>"rut ya existe"];
            echo json_encode($mensaje);
        } else {
            $mensaje = ["msg"=>"hubo un error"];
        echo json_encode($mensaje);
        }
        
        
    }
}
}

$obj = new ControlUsuario();
$obj->nuevoUsuario();