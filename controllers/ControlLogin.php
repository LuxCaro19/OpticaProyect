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
        $this->rut    = $_POST['rutUsuario'];
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

        
        //este codigo valida si el usuario es administrador, vendedor u otro y redirecciona respectivamente
        foreach($array as $a)
        {
            switch ($a["rol"]) {
                case "administrador":
                    //aqui hay que colocar el modulo administrador
                    $_SESSION['user'] = $array[0];
                    header("Location: ../view/crearCliente.php");
                    break;
                case "vendedor":
                    echo "soy un vendedor kawai";
                    break;
                default:
                    //no se que podria ir aqui, quizas un  error o algo
                    $_SESSION ['error'] = "Usuario no encontrado.";
                    header("Location: ../index.php");
                    break;
            } 
        }
        
    }

}

$obj = new ControlLogin();
$obj->inicioSesion();