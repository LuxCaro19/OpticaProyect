<?php 



namespace controllers;

use models\Receta as Receta;

require_once("../models/Receta.php");


class ControlBuscarRecetaRut{

    public $rut;

    public function __construct(){

        $this->rut = $_POST['rut'];
        
    }


    

    
    public function buscarRecetasPorRut(){

        session_start();
        if(isset($_SESSION['user'])){
            
            $modelo= new Receta();
            $array= $modelo->recetasPorRut($this->rut);

            echo json_encode($array);


        }else{

            echo json_encode(["msg"=>"false"]);


        }
        


    }



}

$obj = new ControlBuscarRecetaRut();
$obj->buscarRecetasPorRut();
