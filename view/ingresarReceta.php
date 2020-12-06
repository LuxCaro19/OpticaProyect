<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Receta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <nav>

        <div class="nav-wrapper grey darken-1">


            <img src="../img/logoOptica.png" alt="">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="crearCliente.php">Crear Cliente</a></li>
                <li><a href="buscarReceta.php">Buscar Receta</a></li>
                <li class="active"><a href="ingresarReceta.php">Ingresar Receta</a></li>
                <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>

            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li><a href="crearCliente.php" class="white-text">Crear Cliente</a></li>
        <li><a href="buscarReceta.php">Buscar Receta</a></li>
        <li class="active"><a href="ingresarReceta.php">Ingresar Receta</a></li>
        <li><a href="cerrarSesion.php" class="white-text">Cerrar Sesión</a></li>
    </ul>






    <!-- Contenedor base-->
    <div class="container">

        <div id="formularioreceta">

            <div class="card-panel letra-oscura">

                <div class="row">

                    <div class="col l4 m6 s12">

                        <form @submit.prevent="buscar">

                            <div class="card">

                                <div class="card-content back">


                                    <h6 class="center">Buscar</h6>



                                    <div class="input-field">

                                        <input type="text" v-model="rutCliente">
                                        <label for="rut">Rut</label>

                                    </div>

                                    <div class="input-field center-align back-field-desactived">

                                        <button class="btn-large">Buscar Cliente</button>
                                    </div>






                                </div>





                            </div>

                        </form>



                    </div>



                    <div class="col l8 m8 s12 center">

                        <div class="card">


                            <div class="card-content back">

                                <h6 class="center">Datos del cliente</h6>



                                <ul class="collection">
                                    <ol>
                                        <li v-for="(datos, index) of cliente">
                                            {{ index }}: {{ datos }}
                                        </li>
                                    </ol>

                                </ul>

                            </div>



                        </div>

                    </div>




                </div>



            </div>


            <div class="card-panel letra-oscura color-letras-formulario selects-adaptados">

                <div class="row ">
                    <div class="col l12 m12 s12 center">
                        <h4>Receta</h4>
                        <br>
                    </div>
                    <div class="col l6 m12 s12 weas">

                        <div class="col l12 m12 s12">

                            <span>tipo lente : </span>
                            <label>
                                <input type="radio" id="lejos" value="lejos" v-model="tipo_lentes">
                                <span>lejos</span>
                            </label>
                            <label>
                                <input type="radio" id="cerca" value="cerca" v-model="tipo_lentes">
                                <span>cerca</span>
                            </label>
                            <br></br>
                        </div>

                        <div class="col l6 m6 s12">

                            <span>tipo cristal </span>



                            <select v-model="tipo_sel" class="browser-default">
                                <option v-for="option in tipos" v-bind:value="option.id_tipo_cristal">
                                    {{ option.tipo_cristal }}
                                </option>
                            </select>
                            <br>

                            <span>material de cristal</span>

                            <select v-model="material_sel" class="browser-default">
                                <option v-for="option in materiales" v-bind:value="option.id_material_cristal">
                                    {{ option.material_cristal }}
                                </option>
                            </select>
                            <br>

                            <span>armazon</span>

                            <select v-model="armazon_sel" class="browser-default">
                                <option v-for="option in armazones" v-bind:value="option.id_armazon">
                                    {{ option.nombre_armazon }}
                                </option>
                            </select>
                            <br>

                        </div>




                        <div class="col l6 m6 s12">

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="prisma">
                                <label for="prisma">Prisma</label>

                            </div>



                            <span>base</span>
                            <select v-model="base_sel" class="browser-default">
                                <option value="" disabled selected hidden></option>
                                <option value="1">superior</option>
                                <option value="2">inferior</option>
                                <option value="3">interna</option>
                                <option value="4">externa</option>
                            </select>
                            <br>

                            <div class="input-field margin-inputs back-field">

                                <input type="text" v-model="distancia_p">
                                <label for="esfera">Distancia pupilar</label>

                            </div>

                        </div>

                    </div>



                    <div class="col l3 m6 s12 ">

                        <h5 class="center">Ojo izquierdo</h5>
                        <div class="input-field margin-inputs back-field">

                            <input type="text" v-model="i_esfera">
                            <label for="esfera">Esfera</label>

                        </div>


                        <div class="input-field margin-inputs back-field">
                            <input type="text" v-model="i_cilindro">
                            <label for="esfera">Cilindro</label>

                        </div>

                        <div class="input-field margin-inputs back-field">

                            <input type="text" v-model="i_eje">
                            <label for="esfera">Eje</label>

                        </div>



                    </div>

                    <div class="col l3 m6 s12 center ">

                        <h5 class="center">Ojo derecho</h5>

                        <div class="input-field margin-inputs back-field">

                            <input type="text" v-model="d_esfera">
                            <label for="esfera">Esfera</label>

                        </div>

                        <div class="input-field margin-inputs back-field">

                            <input type="text" v-model="d_cilindro">
                            <label for="esfera">Cilindro</label>

                        </div>

                        <div class="input-field margin-inputs back-field">

                            <input type="text" v-model="d_eje">
                            <label for="esfera">Eje</label>

                        </div>


                    </div>

                </div>

                <hr>

                <div class="row margin-top-row">


                    <div class="col l6 m12 s12 center">

                        <div class="input-field back-field col l6 m12 s12">

                            <input type="text" v-model="rut_med">
                            <label for="valor">Rut del medico</label>

                        </div>


                        <div class="input-field back-field col l6 m12 s12">

                            <input type="text" v-model="nom_med">
                            <label for="valor">Nombre del medico</label>

                        </div>

                        <div class="input-field back-field col M12 s12">
                            <textarea v-model="observacion" class="materialize-textarea" rows="10"></textarea>
                            <label for="textarea1">Observacion</label>
                        </div>


                    </div>


                    <div class="col l6 m6 s12 center">


                        <div class="input-field back-field col l6">
                            <input type="text" class="datepicker" name="fecha" id="fecha_entrega">
                            <label for="fecha">Fecha de entrega</label>
                        </div>

                        <div class="input-field back-field col l6">
                            <input type="text" class="datepicker" name="fecha" id="fecha_retiro">
                            <label for="fecha">Fecha de retiro</label>
                        </div>

                    </div>



                    <div class="col l6 m6 s12 center">



                        <div class="input-field back-field">
                            <input type="text" v-model="valor">
                            <label for="valor">Valor del lente</label>
                        </div>



                        <div class="input-field back-field-desactived right-align">
                            <button v-on:click="crearReceta()" class="btn-large margin-top-button">Crear</button>

                        </div>



                    </div>






                </div>




            </div>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="../js/ingresarReceta.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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
    </script>



</body>

</html>