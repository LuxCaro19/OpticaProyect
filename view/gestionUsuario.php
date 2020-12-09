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
    <link rel="icon" href="../img/icon_page.png">
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
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="../img/back_lentes.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="../img/user_icon.png"></a>



                    <a href="#name"><span class="black-text name"><?= $_SESSION['user']['nombre'] ?></span></a>
                    <a href="#email"><span class="black-text email"><?= $_SESSION['user']['rut'] ?></span></a>


                </div>
            </li>
            <li class="active"><a href="gestionUsuario.php"><i class="material-icons white-text">create</i>Gestion de usuarios</a></li>
            <li><a href="cerrarSesion.php"><i class="material-icons white-text">power_settings_new</i>Cerrar Sesión</a></li>
        </ul>
        <!--fin nav-->

        <div class="container" id="gestionusuario">
            <div class="row login">
                <div class="col l4 m6 s12">

                    <div class="card">


                        <div class="card-content">
                            <h4 v-if="formtype === 'add'" class="center">Crear Usuario</h4>
                            <h4 v-if="formtype === 'edit'" class="center">Editar Usuario</h4>
                            <p>{{alerta}}</p>

                            <div class="input-field"><input type="hidden" :value="orut">
                            </div>

                            <div class="input-field ">
                                <input type="text" v-model="vrut">
                                <label for="rut">Rut</label>
                            </div>


                            <div class="input-field">
                                <input type="text" v-model="vnombre">
                                <label for="nombre">Nombre</label>
                            </div>

                            <div class="input-field">
                                <input type="password" v-model="vclave">
                                <label for="clave">Contraseña</label>
                            </div>

                            <div v-if="formtype === 'edit'" class="input-field">
                                <select v-model="vestado" class="browser-default">
                                    <option value="" disabled>Bloqueo de cuenta</option>
                                    <option value="1">HABILITADO</option>
                                    <option value="0">BLOQUEADO</option>
                                </select>
                            </div>
                            <form action=#>
                                <div class="input-field center-align back-field-desactived">
                                    <button v-on:click="crear()" v-if="formtype === 'add'" class="btn-large">CREAR</button>
                                    <button v-on:click="guardar()" v-if="formtype === 'edit'" class="btn-large">GUARDAR</button>
                                </div>
                            </form>
                        </div>


                    </div>



                </div>


                <div class="col l7 m6 s12">
                    <!-------------- Tabla de usuarios ---------------->

                    <div class="card-panel">
                        <table class="striped centered">

                            <thead>
                                <tr>
                                    <th>RUT</th>
                                    <th>NOMBRE</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>

                            <tr v-for="usuario in usuarios">
                                <td :class=usuario.color>{{usuario.rut}}</td>
                                <td :class=usuario.color>{{usuario.nombre}}</td>
                                <td :class=usuario.color>{{usuario.estado}}</td>
                                <td><button v-on:click="editar(usuario.rut)" class="btn-small btn-floating back-field-desactived">✎</button></td>
                            </tr>
                        </table>
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

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/gestionUsuario.js"></script>
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