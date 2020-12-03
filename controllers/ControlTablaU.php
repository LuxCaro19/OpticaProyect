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
        echo json_encode($objeto);
    }
}
$obj = new ControlTablaU();
$obj->editarUsuario();