<?php

namespace controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlUsuario{
    public $rut;
    public $nombre;
    public $clave;
    public $estado;

    public function __construct()
    {
        $this->rut    = $_POST['crearRut'];
        $this->nombre = $_POST['crearNombre'];
        $this->clave  = $_POST['crearClave'];
        $this->estado = $_POST['crearEstado'];

    }

    //crea un usuario por defecto vendedor y por defecto activado, solo necesita
    public function nuevoUsuario(){
        session_start();
        if ($this->rut == "" || $this->nombre == "" || $this->clave == "") {
            $_SESSION['respuesta'] = "campos vacios";
            header("Location: ../view/gestionUsuario.php");
            return;
        }

        $model = new Usuario();
        $data = ["rut"=>$this->rut,"nombre"=>$this->nombre,"clave"=>$this->clave];
        
        //para ser mas preciso en el error en caso de que el rut del usuario ya exista
        $ishere = $model->BuscarUsuario($this->rut);
        $count = $model->CrearUsuairo($data);
        if ($count == 1) {
            $_SESSION['respuesta'] = "usuario creado";
        } else {
            if (count($ishere)== 1) {
                $_SESSION['respuesta'] = "rut ya existe";
            } else {
                $_SESSION['respuesta'] = "error database";
            }
        }



        header("Location: ../view/gestionUsuario.php");
    }
}

$obj = new ControlUsuario();
$obj->nuevoUsuario();