<?php

namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");


class ControlBuscarRecetaFecha
{

    public $fecha;

    public function __construct()
    {

        $this->fecha = $_POST['fecha'];
    }

    public function buscarRecetasPorFecha()
    {

        session_start();
        if (isset($_SESSION['user'])) {

            //if ($this->fecha == "") {

                //$mensaje = ["msg" => "Ingresa una fecha"];
                //echo json_encode($mensaje);
            //} else {

                $modelo = new Receta();
                $array = $modelo->recetasPorFechas($this->fecha);
                //$mensaje=["msg"=>"Busqueda finalizada"];
                echo json_encode($array);
            //}
        } else {

            echo json_encode(["msg" => "No tienes permiso para estar aquí"]);
        }
    }
}

$obj = new ControlBuscarRecetaFecha();
$obj->buscarRecetasPorFecha();
