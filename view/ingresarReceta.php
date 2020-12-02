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
                <li class="active"><a href="ingresarReceta.php">Ingresar Receta</a></li>
                <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>

            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li class="active"><a href="crearCliente.php" class="white-text">Crear Cliente</a></li>
        <li><a href="cerrarSesion.php" class="white-text">Cerrar Sesión</a></li>
    </ul>






    <!-- Contenedor base-->
    <div class="container">



        <div class="card-panel letra-oscura">

            <div class="row">

                <div class="col l4 m6 s12">

                    <form>

                        <div class="card">

                            <div class="card-content back">


                                <h6 class="center">Buscar cliente</h6>



                                <div class="input-field">

                                    <input type="text" name="rutCliente" id="rut">
                                    <label for="rut">Rut</label>

                                </div>

                                <div class="input-field center-align">

                                    <button name="editarUsuario" class="btn-large">Buscar</button>
                                </div>






                            </div>





                        </div>

                    </form>



                </div>



                <div class="col l8 m6 s12 center">

                    <div class="card">


                        <div class="card-content back">

                            <h6 class="center">Datos del cliente</h6>



                            <ul class="collection">
                                <li class="collection-item">Alvin</li>
                                <li class="collection-item">Alvin</li>
                                <li class="collection-item">Alvin</li>
                                <li class="collection-item">Alvin</li>
                            </ul>

                        </div>



                    </div>

                </div>




            </div>



        </div>


        <div class="card-panel">

            <div class="row">

                <div class="col l3 m6 s12 border">

                    <p>texto tipo lente</p>
                    <p>Combobox 1</p>
                    <p>Combobox 2</p>

                </div>

                <div class="col l3 m6 s12 border">

                    <p>checkbox tipo lente</p>
                    <p>Combobox 1</p>
                    <p>Combobox 2</p>

                </div>

                <div class="col l3 m6 s12 center border">

                    <p>Ojo izq</p>
                    <p>Form 1</p>
                    <p>Form 2</p>

                </div>

                <div class="col l3 m6 s12 center border">

                    <p>Ojo der</p>
                    <p>Form 1</p>
                    <p>Form 2</p>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col l4 m6 s12 center border">


                    <p>Form 1</p>
                    <p>Form 2</p>
                    <p>Form 3</p>
                </div>
                <div class="col l4 m6 s12 center border">

                    <p>Form FECHA</p>
                    <p>Form 2</p>
                    <p>Form 3</p>
                    <p>Form 4</p>

                </div>

                <div class="col l4 m12 s12 center border">

                    <p>Form FECHA</p>
                    <p>Boton</p>

                </div>







            </div>




        </div>



    </div>

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