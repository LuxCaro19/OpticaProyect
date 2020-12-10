<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="icon" href="../img/icon_page.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital@1&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['user'])) { ?>

        <nav>

            <div class="nav-wrapper grey darken-1">


                <img src="../img/logoOptica.png" alt="">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="crearCliente.php">Crear Cliente</a></li>

                    <li><a href="buscarReceta.php">Buscar Receta</a></li>
                    <li><a href="ingresarReceta.php">Ingresar Receta</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>

                </ul>
            </div>
        </nav>

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
            
            <li class="active"><a href="crearCliente.php" class="white-text"><i class="material-icons white-text">create</i>Crear Cliente</a></li>
            <li><a href="buscarReceta.php"><i class="material-icons white-text">search</i>Buscar Receta</a></li>
            <li><a href="ingresarReceta.php"><i class="material-icons white-text">save</i>Ingresar Receta</a></li>
            <li><a href="cerrarSesion.php"><i class="material-icons white-text">power_settings_new</i>Cerrar Sesión</a></li>
        </ul>


        <div class="container">

            <div class="row login">

                <div class="col l4 m6 s12 offset-l4 offset-m3">

                    <div class="card">

                        <div class="card-content" id="creacionDeClientes">

                            <h4 class="center">Crear Cliente</h4>


                            <form @submit.prevent="crearCliente">

                                <div class="input-field">

                                    <input type="text" name="rut_c" id="rut_c" v-model="rut">
                                    <label for="rut">Rut</label>


                                </div>

                                <div class="input-field">

                                    <input type="text" name="nombre_c" id="nombre_c" v-model="nombre">
                                    <label for="nombre">Nombre</label>


                                </div>

                                <div class="input-field">

                                    <input type="text" name="direccion_c" id="direccion_C" v-model="direccion">
                                    <label for="direccion">Dirección</label>


                                </div>

                                <div class="input-field">

                                    <input type="text" name="telefono_c" id="telefono_c" v-model="telefono">
                                    <label for="telefono">Teléfono</label>


                                </div>

                                <div class="input-field">

                                    <input type="text" class="datepicker" name="fecha" id="fecha_client">
                                    <label for="fecha">Fecha</label>


                                </div>

                                <div class="input-field">

                                    <input type="text" name="email_c" id="email_C" v-model="email">
                                    <label for="email">Email</label>


                                </div>

                                <div class="input-field center-align back-field-desactived">

                                    <button class="btn-large">Crear</button>

                                </div>


                            </form>



                        </div>

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




    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/crearClientes.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {

                'format': 'yyyy/mm/dd',
                'i18n': {

                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekday: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']

                }

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>


</body>

</html>