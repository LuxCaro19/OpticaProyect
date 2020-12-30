<?php

namespace controllers;

use models\Cliente as Cliente;


/*header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');*/

require_once("../models/Cliente.php");

class BusquedaCliente{
    public $rut;

    public function __construct()
    {
        $this->rut    = $_POST['rutCliente'];
    }

    public function buscar(){

        if ($this->rut == "") {
            $mensaje = ["msg"=>"ingrese rut cliente"];
            echo json_encode($mensaje);
            return;
        }

        $model = new Cliente();
        $arreglo = $model-> BuscarCliente($this->rut);
        

        if (count($arreglo)) {
            $arr = $arreglo[0];
            $arr["msg"] = "Usuario encontrado!";
            echo json_encode($arr); 

        } else {
            $mensaje = ["msg"=>"Cliente no existe"];
            echo json_encode($mensaje);
        }
        
    }

}

$obj = new BusquedaCliente();
$obj->buscar();