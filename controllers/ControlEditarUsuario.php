<?php

namespace controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use models\Usuario as Usuario;

require_once("../models/Usuario.php");

class ControlEditarUsuario{
    public $original;
    public $rut;
    public $nombre;
    public $clave;
    public $estado;

    public function __construct()
    {
        $this->original = $_POST['originalRut'];
        $this->rut      = $_POST['editarRut'];
        $this->nombre   = $_POST['editarNombre'];
        $this->clave    = $_POST['editarClave'];
        $this->estado   = $_POST['editarEstado'];

    }

    //edita las tablas de un usuario, segun la maqueta el rut tambien se puede modificar por eso quedo una copia del original llamado "original"
    public function actualizarUsuario(){
        session_start();
        if ($this->rut == "" || $this->nombre == "" || $this->clave == "") {
            $_SESSION['respuesta'] = "campos vacios";
            header("Location: ../view/gestionUsuario.php");
            return;
        }

        $model = new Usuario();
        $dataedit = ["rut"=>$this->rut,"nombre"=>$this->nombre,"clave"=>md5($this->clave),"estado"=>$this->estado];
        $id = $this->original;
        
        //no modificar si el rut ya existe
        $ishere = $model->BuscarUsuario($this->rut);
        $count = $model->editarUsuario($id,$dataedit);
        if ($count == 1) {
            $_SESSION['respuesta'] = "usuario modificado";
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

$obj = new ControlEditarUsuario();
$obj->actualizarUsuario();