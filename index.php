<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="icon" href="img/icon_page.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">



</head>

<body>




    <div class="container">

        <div class="row login">

            <div class="col l4 m6 s12 offset-l4 offset-m3">

                <div class="card">

                    <div class="card-action grey lighten-3 center">

                        <img src="img/logoOptica.png" alt="">


                    </div>








                    <form action="controllers/ControlLogin.php" method="POST">





                        <div class="card-content">

                            <h4 class="center">Acceso Usuarios</h4>

                            <div class="card-errors">

                                <?php
                                session_start();
                                if (isset($_SESSION['error'])) { ?>

                                    <h6 class="center red-text text-darken"> <?php echo $_SESSION['error'];  ?></h6>

                                <?php unset($_SESSION['error']);
                                }

                                ?>


                            </div>



                            <div class="input-field">

                                <input type="text" name="rutUsuario" id="nombre">
                                <label for="nombre">rut</label>

                            </div>

                            <div class="input-field">

                                <input type="password" name="claveUsuario" id="clave">
                                <label for="clave">Contraseña</label>


                            </div>

                            <div class="input-field center-align back-field-desactived">

                                <button class="btn-large">Iniciar Sesión</button>

                            </div>




                        </div>






                    </form>

                </div>

            </div>


        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>




</body>

</html>