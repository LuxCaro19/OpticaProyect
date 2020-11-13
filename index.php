<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">


        <div class="col l4 m4 s12 offset-l4 offset-m3">
            <h1 class="center">LOGO</h1>
            <h2 class="center">Accesso Usuario</h2>

            <form action="controllers/ControlLogin.php" method="POST">
                <?php
                session_start(); 
                if (isset($_SESSION['error'])){?>
                    
                    <h6 class = "center red-text" > <?php echo $_SESSION['error'];  ?></h6>

                    <?php unset ($_SESSION['error']);
                }
                
                ?>
                <input type="text" name="nombreUsuario" placeholder="Nombre del usuario">
                <input type="password" name="claveUsuario" placeholder="Contraseña">
                <button class="btn ancho-100">Acceder</button>
            
            
            
            </form>
        </div>

    
    
    
    </div>


    
</body>
</html>