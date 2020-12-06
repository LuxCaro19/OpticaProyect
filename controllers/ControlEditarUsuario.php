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
        $this->original = $_POST['rut'];
        $this->rut      = $_POST['editarRut'];
        $this->nombre   = $_POST['editarNombre'];
        $this->clave    = $_POST['editarClave'];
        $this->estado   = $_POST['editarEstado'];

    }

    //edita las tablas de un usuario, segun la maqueta el rut tambien se puede modificar por eso quedo una copia del original llamado "original"
    public function actualizarUsuario(){
        
        session_start();
        if ($this->rut == "" || $this->nombre == "") {
            $mensaje = ["msg"=>"complete los campos vacios"];
            echo json_encode($mensaje);
            return;
        }

        $model = new Usuario();
        $id = $this->original;

        //COMPRUEBA SI LA CLAVE SE HA INGRESADO, SI NO SE HA ECHO recupera la original
        if ($this->clave == ""){
            $arr = $model->BuscarUsuario($id);
            $a = $arr[0];
            $this->clave = $a["clave"];
        } else {
            $this->clave = md5($this->clave);
        }
        $dataedit = ["rut"=>$this->rut,"nombre"=>$this->nombre,"clave"=>$this->clave,"estado"=>$this->estado];

        $count = $model->editarUsuario($id,$dataedit);

        if ($count == 1) {
            $mensaje = ["msg"=>"usuario modificado"];
            echo json_encode($mensaje); 
        } else {
            $mensaje = ["msg"=>"hubo un error"];
            echo json_encode($mensaje);
        }     
    }
}

$obj = new ControlEditarUsuario();
$obj->actualizarUsuario();