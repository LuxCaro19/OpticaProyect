<?php

namespace controllers;

use models\Receta as Receta;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once("../models/Receta.php");

class BusquedaMaterial
{

    public function __construct()
    {
    }

    public function buscar()
    {


        $model = new Receta();
        $arr = $model->getAllMaterialCristal();
        if (count($arr)) {
            echo json_encode($arr);
        } else {
            $mensaje = ["msg" => "error"];
            echo json_encode($mensaje);
        }
    }
}

$obj = new BusquedaMaterial();
$obj->buscar();
