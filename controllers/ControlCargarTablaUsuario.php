<?php
namespace controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlCargarTablaUsuario{


    public function __construct()
    {
    }

    public function cargarTabla(){
        session_start();
        $modelo = new Usuario();
        $usuarios = $modelo->cargarUsuarios();
        echo json_encode($usuarios);
    }
}
$obj = new ControlCargarTablaUsuario();
$obj->cargarTabla();