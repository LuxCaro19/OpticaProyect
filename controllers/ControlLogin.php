<?php

namespace controllers;

use models\Usuario;

require_once("../models/Usuario.php");

class ControlLogin{
    public $rut;
    public $nombre;
    public $rol;
    public $clave;
    public $estado;

    public function __construct()
    {
        $this->rut    = $_POST['nombreUsuario'];
        $this->clave  = $_POST['claveUsuario'];
    }

    public function inicioSesion(){
        session_start();
        if($this->rut == "" || $this->clave=="") {
            $_SESSION ['error'] ="Datos no ingresados";
            header("Location: ../index.php");
            return;
        }
        $usuario = new Usuario();
        $array = $usuario->login($this->rut, $this->clave);
        if(count($array) == 0) {
            $_SESSION ['error'] ="Usuario o contraseña invalida";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];
        header("Location: ../view/crearCliente.php");
    }

}

$obj = new ControlLogin();
$obj->inicioSesion();