
<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>



    <div class="container">
    
        <div class="row">

            <div class="col l4 m6 s12 offset-l4 offset-m3">


                <h1 class="center">Crear Cliente</h1>

                <div class="center">
                    <p class="red-text">
                        <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>

                    <p class="green-text">
                        <?php
                            if (isset($_SESSION['resp'])) {
                                echo $_SESSION['resp'];
                                unset($_SESSION['resp']);
                            }
                        ?>
                    </p>

                </div>
               

                <form action="../controllers/ControlCliente.php" method="POST">


                    <input type="text" name="rut" placeholder="Rut">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="direccion" placeholder="Dirección">
                    <input type="text" name="telefono" placeholder="Teléfono">
                    <input type="text" name="fecha" placeholder="Fecha">
                    <input type="text" name="email" placeholder="Email">

                    <button class="btn ancho-100">Crear</button>            




                </form>




            </div>
        
            

        
        
        </div>
    
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    
</body>
</html>