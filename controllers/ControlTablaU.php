<?php

namespace controllers;

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlTablaU{
    public $btn_edit;

    public function __construct()
    {
        $this->btn_edit = $_POST['bt_edit'];
    }

    public function editarUsuario(){
        session_start();
        $_SESSION['editar']="ON";
        $modelo = new Usuario();
        $objeto = $modelo->BuscarUsuario($this->btn_edit);
        $_SESSION['usuario'] = $objeto[0];


        header("Location: ../view/gestionUsuario.php");
    }
}
$obj = new ControlTablaU();
$obj->editarUsuario();