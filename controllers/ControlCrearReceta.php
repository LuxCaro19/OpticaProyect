<?php

namespace controllers;


use models\Receta;

require_once("../models/Receta.php");

class ControlCrearReceta{

    public $tipo_lente;
    public $esfera_oi;
    public $esfera_od;
    public $cilindro_oi;
    public $cilindro_od;
    public $eje_oi;
    public $eje_od;
    public $prisma;
    public $base;
    public $armazon;
    public $material_cristal;
    public $tipo_cristal;
    public $distancia_pupilar;
    public $valor_lente;
    public $fecha_entrega;
    public $fecha_retiro;
    public $observacion;
    public $rut_cliente;
    public $fecha_visita_medico;
    public $rut_medico;
    public $nombre_medico;
    public $rut_usuario;

    public function __construct()
    {
        $this->tipo_lente           = $_POST['tipo_lente'];
        $this->esfera_oi            = $_POST['esfera_oi'];
        $this->esfera_od            = $_POST['esfera_od'];
        $this->cilindro_oi          = $_POST['cilindro_oi'];
        $this->cilindro_od          = $_POST['cilindro_od'];
        $this->eje_oi               = $_POST['eje_oi'];
        $this->eje_od               = $_POST['eje_od'];
        $this->prisma               = $_POST['prisma'];
        $this->base                 = $_POST['base'];
        $this->armazon              = $_POST['armazon'];
        $this->material_cristal     = $_POST['material_cristal'];
        $this->tipo_cristal         = $_POST['tipo_cristal'];
        $this->distancia_pupilar    = $_POST['distancia_pupilar'];
        $this->valor_lente          = $_POST['valor_lente'];
        $this->fecha_entrega        = $_POST['fecha_entrega'];
        $this->fecha_retiro         = $_POST['fecha_retiro'];
        $this->observacion          = $_POST['observacion'];
        $this->rut_cliente          = $_POST['rut_cliente'];
        $this->rut_medico           = $_POST['rut_medico'];
        $this->nombre_medico        = $_POST['nombre_medico'];
    }

 public function nuevaReceta(){
    session_start();
    $usr = $_SESSION['user'];
    $this->rut_usuario = $usr['rut'];
    $this->fecha_visita_medico = date("Y/m/d");
    $model = new Receta();

    //ahora se viene la data mas larga de todo el proyecto
    $data =["tipolente"=>$this->tipo_lente,
            "esferaoiz"=>$this->esfera_oi,
            "esferaode"=>$this->esfera_od,
            "cilindrooiz"=>$this->cilindro_oi,
            "cilindroode"=>$this->cilindro_od,
            "ejeoiz"=>$this->eje_oi,
            "ejeode"=>$this->eje_od,
            "prisma"=>$this->prisma,
            "base"=>$this->base,
            "armazon"=>$this->armazon,
            "materialcristal"=>$this->material_cristal,
            "tipocristal"=>$this->tipo_cristal,
            "distanciapupilar"=>$this->distancia_pupilar,
            "valorlente"=>$this->valor_lente,
            "fechaentrega"=>$this->fecha_entrega,
            "fecharetiro"=>$this->fecha_retiro,
            "observacion"=>$this->observacion,
            "rutcliente"=>$this->rut_cliente,
            "fechavimed"=>$this->fecha_visita_medico,
            "rutmedico"=>$this->rut_medico,
            "nombremedico"=>$this->nombre_medico,
            "rutusuario"=>$this->rut_usuario];

    $count = $model->insertarReceta($data);

    if ($count == 1) {
        $mensaje = ["msg"=>"receta creada"];
        echo json_encode($mensaje); 
    } else {
        
        $mensaje = ["msg"=>"hubo un error"];
        echo json_encode($mensaje);
        
        
        
    }
}
}
$obj = new ControlCrearReceta();
$obj->nuevaReceta();