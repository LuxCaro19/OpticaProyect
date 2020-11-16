<?php

use models\Usuario;

require_once("../models/Usuario.php");

session_start();
$modelo = new Usuario();
$usuarios = $modelo->cargarUsuarios();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<body>

    <?php
    if(isset($_SESSION['user'])){?>

        <nav>

            <div class="nav-wrapper grey darken-1">


                <img src="../img/logoOptica.png" alt="">


                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="gestionUsuario.php">Gestion de usuarios</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>

    
            <div class="container">
                <div class="row">
                    <div class="col l4 m6 s12">
                        <?php if (isset($_SESSION['editar'])) { ?>

                        <!-------------- Editar Usuario---------------->
                            <form action="../controllers/controlEditarUsuario.php" method="POST">
                                <h3>Editar Usuario</h3>
                                <input type="hidden" name="originalRut"value="<?= $_SESSION['usuario']['rut']?>">
                                <input type="text" name="editarRut" placeholder="rut"       value="<?= $_SESSION['usuario']['rut']?>">
                                <input type="text" name="editarNombre" placeholder="nombre" value="<?= $_SESSION['usuario']['nombre']?>">
                                <input type="password" name="editarClave" placeholder="clave"   value="<?= $_SESSION['usuario']['clave']?>"> 
                                    <select name="editarEstado" class="browser-default">
                                        <option value="" disabled>Bloqueo de cuenta</option>
                                        <option value="1" 
                                        <?php if ($_SESSION['usuario']['estado']==1) {
                                            
                                            echo "selected";
                                            
                                            }?>
                                            >HABILITADO</option>
                                        <option value="0"  <?php if ($_SESSION['usuario']['estado']==0) {
                                            
                                            echo "selected";
                                            
                                            }?>
                                            >BLOQUEADO</option>
                                    </select> <br>

                                    
                                <button name="editarUsuario" class="btn">GUARDAR</button>
                            </form>

                        <?php } else {?>
                        <!-------------- Nuevo Usuario---------------->
                            <form action="../controllers/controlCrearUsuario.php" method="POST">
                                <h3>Crear Usuario</h3>
                                <input type="text" name="crearRut" placeholder="rut">
                                <input type="text" name="crearNombre" placeholder="nombre">
                                <input type="password" name="crearClave" placeholder="clave">
                                
                                <button name="crearUsuario" class="btn">CREAR</button>
                            </form>
                        
                        <?php } unset($_SESSION['editar']);?>
                        <p>
                            <?php 
                                if (isset($_SESSION['respuesta'])) {
                                    echo $_SESSION['respuesta'];
                                    unset ($_SESSION['respuesta']);
                                }
                            ?>

                        </p>
                        



                    </div>


                    <div class="col maginTop-130 l7 m6 s12">
                        <!-------------- Tabla de usuarios ---------------->
                        <form action="../controllers/ControlTablaU.php" method="post">
                            <table>
                                
                                <tr>
                                    <th>RUT</th>
                                    <th>NOMBRE</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                <?php foreach ($usuarios as $usr) { ?>
                                <tr>
                                    <?php if ($usr["estado"]==1) {
                                        //colorsito sera rojo si el usuario esta bloqueado
                                        //ademas en vez de mostrar estado 0 o 1 mostrara un texto
                                        $est ="HABILITADO";
                                        $colorsito = "black-text";
                                    } else {
                                        $est = "BLOQUEADO";
                                        $colorsito = "red-text";
                                    } ?>


                                    <td class="<?= $colorsito ?>"> <?= $usr["rut"]  ?> </td>
                                    <td class="<?= $colorsito ?>"> <?= $usr["nombre"]  ?> </td>
                                    <td class="<?= $colorsito ?>"> <?= $est  ?> </td>
                                    <td> <button name="bt_edit" value="<?= $usr["rut"]  ?>" class="btn">✎</button> </td>
                                </tr>
                                <?php } ?>



                            </table>
                        </form>
                    </div>
                </div>
            </div>
        
        <?php } else{ ?>


            <div class="container center">
                
                <div class="row error">

                    <div class="col l6 m6 s12 offset-l3 offset-m3">

                        <div class="card">

                            <div class="card-content">

                                <img src="../img/logoOptica.png" alt="">

                                <h2 class="red-text">Te has equivocado de camino amigo</h2>
                                <h4 class="black-text">no dispones de accesso para estar aquí</h4>
                                <p>Debes iniciar sesión, vuelve al <a href="../index.php">home</a> e inicia sesión.</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>






        <?php } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>