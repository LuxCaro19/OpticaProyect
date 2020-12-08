<?php

namespace models;


class Conexion{

    /*public static $user="ugr8pymy0wpftuxm";
    public static $pass="7nLny56EmO3pdhXeeCRX";
    public static $URL="mysql:host=bl6rco3orvrkh3mcj0ka-mysql.services.clever-cloud.com;dbname=bl6rco3orvrkh3mcj0ka";*/

    public static $user="root";
    public static $pass="";
    public static $URL="mysql:host=localhost;dbname=optica_2020";



    public static function conector(){


        try{

            return new \PDO(Conexion::$URL,Conexion::$user, Conexion::$pass);

        }catch(\PDOException $ex){

            return null;
        }

    }






}
