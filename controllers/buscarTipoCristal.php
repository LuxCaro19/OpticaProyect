<?php

namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");

class BusquedaTipo{

    public function __construct()
    {
    }

    public function buscar(){

        $model = new Receta();
        $arr = $model-> getAllTipoCristal();
        if (count($arr)) {
            echo json_encode($arr); 
        } else {
            $mensaje = ["msg"=>"error"];
            echo json_encode($mensaje);
        }
        
    }

}

$obj = new BusquedaTipo();
$obj->buscar();