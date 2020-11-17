

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>
<body>

    <?php 
    session_start();
    if(isset($_SESSION['user'])){?>

        <nav>

            <div class="nav-wrapper grey darken-1">


                <img src="../img/logoOptica.png" alt="">
        
            
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="crearCliente.php">Crear Cliente</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>

            <div class="container">
                
                <div class="row login">

                    <div class="col l4 m6 s12 offset-l4 offset-m3">

                        <div class="card">

                            <div class="card-content">

                                <h4 class="center">Crear Cliente</h4>

                                <div class="card-errors">

                                    <p class="red-text center">
                                        <?php
                                            if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            }
                                        ?>
                                    </p>

                                    <p class="green-text center">
                                        <?php
                                            if (isset($_SESSION['resp'])) {
                                                echo $_SESSION['resp'];
                                                unset($_SESSION['resp']);
                                            }
                                        ?>
                                    </p>



                                </div>

                                <form action="../controllers/ControlCliente.php" method="POST">

                                    <div class="input-field">

                                        <input type="text" name="rut" id="rut">
                                        <label for="rut">Rut</label>


                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="nombre" id="nombre">
                                        <label for="nombre">Nombre</label>


                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="direccion" id="direccion">
                                        <label for="direccion">Dirección</label>


                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="telefono" id="telefono">
                                        <label for="telefono">Teléfono</label>


                                    </div>

                                    <div class="input-field">

                                        <input type="text" class="datepicker" name="fecha" id="fecha">
                                        <label for="fecha">Fecha</label>


                                    </div>

                                    <div class="input-field">

                                        <input type="text" name="email" id="email">
                                        <label for="email">Email</label>


                                    </div>

                                    <div class="input-field center-align">

                                        <button class="btn-large">Crear</button>

                                    </div>


                                </form>



                            </div>

                        </div>

                    

                    

                                    








                    </div>
                
                    

                
                
                </div>
            
            </div>


        

        

    <?php }else{ ?>


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



    <?php }?>


    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems,{

                'format': 'yyyy/mm/dd',
                'i18n': {

                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekday: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D','L','M','M','J','V','S']

                }

            });
        });

    </script>

    
</body>
</html>