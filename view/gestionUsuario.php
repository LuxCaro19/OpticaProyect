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
    <title>Gestion de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php
    if (isset($_SESSION['user'])) { ?>

        <nav>

            <div class="nav-wrapper grey darken-1">


                <img src="../img/logoOptica.png" alt="">

                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>


                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="gestionUsuario.php">Gestion de usuarios</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>



                </ul>
            </div>



        </nav>

        <!--nav movil-->


        <ul id="slide-out" class="sidenav">
            <li class="active"><a href="gestionUsuario.php" class="white-text">Gestion de usuarios</a></li>
            <li><a href="cerrarSesion.php" class="white-text">Cerrar Sesión</a></li>
        </ul>


        <!--fin nav-->





        <div class="container">
            <div class="row login">
                <div class="col l4 m6 s12">

                    <div class="card">


                        <div class="card-content">




                            <?php if (isset($_SESSION['editar'])) { ?>

                                <!-------------- Editar Usuario---------------->
                                <form action="../controllers/ControlEditarUsuario.php" method="POST">
                                    <h4 class="center">Editar Usuario</h4>

                                    <div class="input-field">
                                        <input type="hidden" name="originalRut" value="<?= $_SESSION['usuario']['rut'] ?>">

                                    </div>

                                    <div class="input-field">
                                        <input type="text" name="editarRut" value="<?= $_SESSION['usuario']['rut'] ?>">
                                        <label for="rut">Rut</label>

                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="editarNombre" value="<?= $_SESSION['usuario']['nombre'] ?>">
                                        <label for="nombre">Nombre</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="password" name="editarClave" value="<?= $_SESSION['usuario']['clave'] ?>">
                                        <label for="clave">Contraseña</label>
                                    </div>

                                    <div class="input-field">

                                        <select name="editarEstado">
                                            <option value="" disabled>Bloqueo de cuenta</option>
                                            <option value="1" <?php if ($_SESSION['usuario']['estado'] == 1) {

                                                                    echo "selected";
                                                                } ?>>HABILITADO</option>
                                            <option value="0" <?php if ($_SESSION['usuario']['estado'] == 0) {

                                                                    echo "selected";
                                                                } ?>>BLOQUEADO</option>
                                        </select>

                                    </div>

                                    <div class="input-field center-align">

                                        <button name="editarUsuario" class="btn-large">GUARDAR</button>
                                    </div>
                                </form>



                            <?php } else { ?>
                                <!-------------- Nuevo Usuario---------------->
                                <form action="../controllers/ControlCrearUsuario.php" method="POST">
                                    <h4 class="center">Crear Usuario</h4>

                                    <div class="card-errors">


                                        <p class="green-text center">
                                            <?php
                                            if (isset($_SESSION['respuesta'])) {
                                                echo $_SESSION['respuesta'];
                                                unset($_SESSION['respuesta']);
                                            }
                                            ?>

                                        </p>

                                        <p class="red-text center">
                                            <?php
                                            if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            }
                                            ?>
                                        </p>


                                    </div>


                                    <div class="input-field">

                                        <input type="text" name="crearRut">
                                        <label for="rut">Rut</label>

                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="crearNombre">
                                        <label for="nombre">Nombre</label>

                                    </div>

                                    <div class="input-field">
                                        <input type="password" name="crearClave">
                                        <label for="clave">Clave</label>
                                    </div>

                                    <div class="input-field center-align">

                                        <button name="crearUsuario" class="btn-large">CREAR</button>

                                    </div>


                                </form>

                            <?php }
                            unset($_SESSION['editar']); ?>



                        </div>


                    </div>



                </div>


                <div class="col l7 m6 s12">
                    <!-------------- Tabla de usuarios ---------------->

                    <div class="card-panel">
                        <form action="../controllers/ControlTablaU.php" method="post">
                            <table class="striped centered">

                                <thead>
                                    <tr>
                                        <th>RUT</th>
                                        <th>NOMBRE</th>
                                        <th>ESTADO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <?php foreach ($usuarios as $usr) { ?>
                                    <tr>
                                        <?php if ($usr["estado"] == 1) {
                                            //colorsito sera rojo si el usuario esta bloqueado
                                            //ademas en vez de mostrar estado 0 o 1 mostrara un texto
                                            $est = "HABILITADO";
                                            $colorsito = "black-text";
                                        } else {
                                            $est = "BLOQUEADO";
                                            $colorsito = "red-text";
                                        } ?>


                                        <td class="<?= $colorsito ?>"> <?= $usr["rut"]  ?> </td>
                                        <td class="<?= $colorsito ?>"> <?= $usr["nombre"]  ?> </td>
                                        <td class="<?= $colorsito ?>"> <?= $est  ?> </td>
                                        <td>
                                            <div class="input-field center-align">

                                                <button name="bt_edit" value="<?= $usr["rut"]  ?>" class="btn-floating">✎</button>

                                            </div>

                                        </td>

                                    </tr>
                                <?php } ?>



                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>


        <div class="container center">

            <div class="row error">

                <div class="col l6 m6 s12 offset-l3 offset-m3">

                    <div class="card">

                        <div class="card-content">

                            <img src="../img/logoOptica.png" alt="">

                            <h2 class="red-text">Te has equivocado de camino amigo</h2>
                            <h4 class="black-text">no dispones de accesso para estar aquí</h4>
                            <p>Debes iniciar sesión, vuelve al <a href="../index.php">home</a> e inicia sesión.</p>
                            <p>Creadores de la pagina: <a href="../creadores.html">creadores</a></p>


                        </div>

                    </div>

                </div>

            </div>

        </div>






    <?php } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

</body>

</html>