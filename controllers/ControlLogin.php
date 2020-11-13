<?php

namespace controllers;

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlLogin{
    public $name;
    public $clave;

    public function __construct()
    {
        $this->name    = $_POST['nombreUsuario'];
        $this->clave  = $_POST['claveUsuario'];
    }

    public function inicioSesion(){
        session_start();
        if($this->name == "" || $this->clave=="") {
            $_SESSION ['error'] ="No puedes iniciar sesión ¡si no tienes campos vacios!, llena los campos e intenta nuevamente";
            header("Location: ../index.php");
            return;
        }
        $usuario = new Usuario();
        $array = $usuario->login($this->name,$this->clave);

        if(count($array) == 0) {
            $_SESSION ['error'] ="Usuario o Contraseña no validas, comprueba los datos ingresados e intenta nuevamente";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['user'] = $array[0];
        header("Location: ../view/crearCliente.php");
    }

}

$obj = new ControlLogin();
$obj->inicioSesion();