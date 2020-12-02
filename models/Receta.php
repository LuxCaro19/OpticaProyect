<?php


namespace models;

require_once("Conexion.php");


class Receta{


    public function insertarReceta($data){
        $stm = Conexion::conector()->prepare("INSERT INTO receta VALUES(NULL,:tipolente,:esferaoiz,:esferaode,:cilindrooiz,:cilindroode,:ejeoiz,:ejeode,:prisma,:base,
        :armazon,:materialcristal,:tipocristal,
        :distanciapupilar,:valorlente,:fechaentrega,:fecharetiro,:observacion,:rutcliente,:fechavimed,:rutmedico,:nombremedico,:rutusuario,1)");

        $stm->bindParam(":tipolente", $data['tipolente']);
        $stm->bindParam(":esferaoiz", $data['esferaoiz']);
        $stm->bindParam(":esferaode", $data['esferaode']);
        $stm->bindParam(":cilindrooiz", $data['cilindrooiz']);
        $stm->bindParam(":cilindroode", $data['cilindroode']);
        $stm->bindParam(":ejeoiz", $data['ejeoiz']);
        $stm->bindParam(":ejeode", $data['ejeode']);
        $stm->bindParam(":prisma", $data['prisma']);
        $stm->bindParam(":base", $data['base']);
        $stm->bindParam(":armazon", $data['armazon']);
        $stm->bindParam(":materialcristal", $data['materialcristal']);
        $stm->bindParam(":tipocristal", $data['tipocristal']);
        $stm->bindParam(":distanciapupilar", $data['distanciapupilar']);
        $stm->bindParam(":valorlente", $data['valorlente']);
        $stm->bindParam(":fechaentrega", $data['fechaentrega']);
        $stm->bindParam(":fecharetiro", $data['fecharetiro']);
        $stm->bindParam(":observacion", $data['observacion']);
        $stm->bindParam(":rutcliente", $data['rutcliente']);
        $stm->bindParam(":fechavimed", $data['fechavimed']);
        $stm->bindParam(":rutmedico", $data['rutmedico']);
        $stm->bindParam(":nombremedico", $data['nombremedico']);
        $stm->bindParam(":rutusuario", $data['rutusuario']);
        return $stm->execute();
    }

    public function getAllTipoCristal(){

        $stm = Conexion::conector()->prepare("SELECT * FROM tipo_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);        

    }

    public function getAllMaterialCristal(){
        $stm = Conexion::conector()->prepare("SELECT * FROM material_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllArmazones(){

        $stm = Conexion::conector()->prepare("SELECT * FROM armazon");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }

    public function recetasPorRut($rut){

        $sql = ' select id_receta "id", tipo_lente, esfera_oi, esfera_od, ';
        $sql .= ' cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base, ';
        $sql .= ' ar.nombre_armazon "armazon", mt.material_cristal, ';
        $sql .= ' tc.tipo_cristal, distancia_pupilar, valor_lente "precio", ';
        $sql .= ' fecha_entrega, fecha_retiro, observacion, cl.rut_cliente, ';
        $sql .= ' cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor", ';
        $sql .= ' receta.estado ';
        $sql .= ' from receta ';
        $sql .= ' inner join material_cristal mt ';
        $sql .= ' on mt.id_material_cristal=receta.material_cristal ';
        $sql .= ' inner join armazon ar ';
        $sql .= ' on ar.id_armazon = receta.armazon ';
        $sql .= ' inner join tipo_cristal tc ';
        $sql .= ' on tc.id_tipo_cristal = receta.tipo_cristal ';
        $sql .= ' inner join cliente cl ';
        $sql .= ' on cl.rut_cliente = receta.rut_cliente ';
        $sql .= ' inner join usuario us ';
        $sql .= ' on us.rut = receta.rut_usuario ';
        $sql .= ' where receta.rut_cliente = :rut ';
        $stm = Conexion::conector()->prepare($sql);

        $stm->bindParam(":rut", $rut['rut_cliente']);

        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);

        
    }

    public function recetasPorFechas($fecha){

        $sql = ' select id_receta "id", tipo_lente, esfera_oi, esfera_od, ';
        $sql .= ' cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base, ';
        $sql .= ' ar.nombre_armazon "armazon", mt.material_cristal, ';
        $sql .= ' tc.tipo_cristal, distancia_pupilar, valor_lente "precio", ';
        $sql .= ' fecha_entrega, fecha_retiro, observacion, cl.rut_cliente, ';
        $sql .= ' cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor", ';
        $sql .= ' receta.estado ';
        $sql .= ' from receta ';
        $sql .= ' inner join material_cristal mt ';
        $sql .= ' on mt.id_material_cristal=receta.material_cristal ';
        $sql .= ' inner join armazon ar ';
        $sql .= ' on ar.id_armazon = receta.armazon ';
        $sql .= ' inner join tipo_cristal tc ';
        $sql .= ' on tc.id_tipo_cristal = receta.tipo_cristal ';
        $sql .= ' inner join cliente cl ';
        $sql .= ' on cl.rut_cliente = receta.rut_cliente ';
        $sql .= ' inner join usuario us ';
        $sql .= ' on us.rut = receta.rut_usuario ';
        $sql .= ' where receta.fecha_entrega=:fecha ';
        $stm = Conexion::conector()->prepare($sql);

        $stm->bindParam(":fecha", $fecha['fecha_entrega']);

        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

   







}