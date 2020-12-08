<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Receta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
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
                    <li><a href="crearCliente.php">Crear Cliente</a></li>
                    <li class="active"><a href="buscarReceta.php">Buscar Receta</a></li>
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
            <li><a href="crearCliente.php" class="white-text"><i class="material-icons white-text">create</i>Crear Cliente</a></li>
            <li class="active"><a href="buscarReceta.php"><i class="material-icons white-text">search</i>Buscar Receta</a></li>
            <li><a href="ingresarReceta.php"><i class="material-icons white-text">save</i>Ingresar Receta</a></li>
            <li><a href="cerrarSesion.php"><i class="material-icons white-text">power_settings_new</i>Cerrar Sesión</a></li>
        </ul>





        <div class="container">


            <div id="buscarRut" class="card-panel letra-oscura">



                <div class="margin-top-container">

                    <div class="row">


                        <div class="col l4 m5 s12">

                            <form @submit.prevent="buscarPorRut">
                                <div class="col l8">

                                    <div class="input-field back-field-desactived">
                                        <input type="text" v-model="rut">
                                        <label for="rut">Rut</label>


                                    </div>




                                </div>

                                <div class="col l4">


                                    <div class="input-field back-field-desactived">

                                        <button class="btn-small">Buscar</button>

                                    </div>




                                </div>
                            </form>

                        </div>

                        <div class="col l4 m5 s6">



                        </div>

                        <div class="col l4 m5 s12">

                            <form @submit.prevent="buscarPorFecha">
                                <div class="col l8">

                                    <div class="input-field back-field-desactived">

                                        <input type="text" class="datepicker" name="fecha" id="buscar_fecha">
                                        <label for="fecha">Fecha</label>


                                    </div>


                                </div>

                                <div class="col l4">

                                    <div class="input-field back-field-desactived">

                                        <button class="btn-small">Buscar</button>

                                    </div>


                                </div>
                            </form>

                        </div>


                    </div>





                </div>

                <div class="card-panel">
                    <table class="striped centered">

                        <thead>
                            <tr>
                                <th>RUT</th>
                                <th>NOMBRE</th>
                                <th>MATERIAL DE CRISTAL</th>
                                <th>TIPO DE CRISTAL</th>
                                <th>FECHA DE ENTREGA</th>
                                <th>VER DETALLES</th>
                                <th>GENERAR PDF</th>
                            </tr>
                        </thead>

                        <tr v-for="rec in recetas">
                            <td>{{rec.rut_cliente}}</td>
                            <td>{{rec.nombre_cliente}}</td>
                            <td>{{rec.material_cristal}}</td>
                            <td>{{rec.tipo_cristal}}</td>
                            <td>{{rec.fecha_entrega}}</td>

                            <td>

                                <button class="btn-small btn-floating back-field-desactived" @click="abrirModal(rec)"><i class="material-icons">remove_red_eye</i></button>

                            </td>
                            <td>

                                <button class="button-icon"><img src="../img/pdf_icon.png" alt="" class="icon-img"></button>

                            </td>
                        </tr>
                    </table>
                </div>




                <!-- Modal Structure -->
                <div id="detalle_receta" class="modal">
                    <div class="modal-content font-JetBrains">

                        <p>CDR:{{receta.id}}</p>

                        <h4 class="center margin-informe">Receta medica</h4>

                        <div class="row">

                            <div class="col l6 m6 s6">

                                <p>Nombre del cliente : {{receta.nombre_cliente}}</p>
                                <p>Numero del cliente : {{receta.telefono_cliente}}</p>
                                <p>Fecha de entrega : {{receta.fecha_entrega}}</p>
                                <p>Nombre del vendedor: {{receta.nombre_vendedor}}</p>


                            </div>

                        </div>

                        <hr>

                        <div class="row">


                            <div class="col l6 m6 s12">



                                <p>Tipo de lente:{{receta.tipo_lente}}</p>
                                <p>Tipo de cristal:{{receta.tipo_cristal}}</p>
                                <p>Material de cristal:{{receta.material_cristal}}</p>
                                <p>Armazon:{{receta.armazon}}</p>


                            </div>

                            <div class="col l3 m3 s12">


                                <h6>Ojo izquierdo</h6>

                                <p>Esfera:{{receta.esfera_oi}}</p>
                                <p>Cilindro:{{receta.cilindro_oi}}</p>
                                <p>Eje:{{receta.eje_oi}}</p>


                            </div>

                            <div class="col l3 m3 s12">


                                <h6>Ojo derecho</h6>

                                <p>Esfera:{{receta.esfera_od}}</p>
                                <p>Cilindro:{{receta.cilindro_od}}</p>
                                <p>Eje:{{receta.eje_od}}</p>


                            </div>




                        </div>

                        <hr>

                        <div class="row">

                            <div class="col l4 m4 s12">
                                <p>Prisma:{{receta.prisma}}</p>
                                <p>Base:{{receta.base}}</p>
                                <p>Distancia pupilar:{{receta.distancia_pupilar}}</p>
                            </div>

                            <div class="col l8 m8 s12 center">
                                <h6>Observacion</h6>
                                <p>{{receta.observacion}}</p>
                            </div>




                        </div>

                        <hr>

                        <div class="row">


                            <div class="col l4 m4 s12 offset-l8 offset-m4">

                                <h6>Precio: {{receta.precio}}</h6>

                            </div>


                        </div>

                        <hr>

                        <div class="row">


                            <div class="col l12 m12 s12 center foot-information">


                                <img src="../img/logoOptica.png" alt="">
                                <h6>queremos lo mejor para tus ojos</h6>
                                <p>Avenida 20 Norte #2434</p>
                                <p>contactos:</p>
                                <p>99 909 909</p>
                                <p>88 808 808</p>

                            </div>

                        </div>




                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
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



    <script src="../js/buscarReceta.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
            var elems = document.querySelectorAll('select');
            var instances = M.Sidenav.init(elems);
            var instances = M.FormSelect.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>



</body>

</html>