<?php

namespace controllers;

use models\Cliente as Cliente;

require_once("../models/Cliente.php");


class ControlCliente
{


    public $rut;
    public $nombre;
    public $direccion;
    public $telefono;
    public $fecha;
    public $email;

    public function __construct()
    {

        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->direccion = $_POST['direccion'];
        $this->telefono = $_POST['telefono'];
        $this->fecha = $_POST['fecha'];
        $this->email = $_POST['email'];
    }


    public function crearCliente()
    {

        session_start();
        if (isset($_SESSION['user'])) {
            if ($this->rut == "" || $this->nombre == "" || $this->direccion == "" || $this->telefono == "" || $this->fecha == "" || $this->email == "") {

                $mensaje = ["msg" => "Hay campos vacíos en el formulario. Rellene los campos"];
            } else {

                $model = new Cliente();

                $data = [
                    "rut" => $this->rut, "nombre" => $this->nombre, "direccion" => $this->direccion,
                    "telefono" => $this->telefono, "fecha" => $this->fecha, "email" => $this->email
                ];

                $count = $model->insert($data);

                if ($count == 1) {

                    $mensaje = ["msg" => "Cliente creado exitosamente"];
                } else {

                    $mensaje = ["msg" => "Hubo un error en la base de datos, verifica los datos e intenta nuevamente"];
                }
            }

            echo json_encode($mensaje);

        }else{

            $mensaje = ["msg"=> "No tienes nada que hacer aqui muchachon"];
            echo json_encode($mensaje);

        }
    }
}

$obj = new ControlCliente();
$obj->crearCliente();
