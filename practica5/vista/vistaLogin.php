<!DOCTYPE html>
<!--Jose Gómez-->
<html lang="en">
<head>
    <link rel="stylesheet" href="../estils/pruebas.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form method="post">
        <div>
            <input type="email" placeholder="EMAIL" name="email" value="<?php echo $_POST["email"] ?? '' ?>">
            <br>
            
            <input type="password" placeholder="Contrasenya" name="contrasenya">
            <br>
            <input type="submit" value="Iniciar sessió">
            <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty(trim($_POST["email"])))) {
                    
                    require_once "../controlador/controladorLogin.php";
                    introduccioDadesLogin(); // Crida de la funcio

                }

            ?>
        </div>

        <p></p>
        </form>
        <form action="../index.php" method="post">

            <input type="submit" value="Tornar">
            <p>Reestableix la teva contrasenya<a href=""> aqui</a>
            <p>No tens cap compte?: <a href="../vista/vistaRegistre.php">Registra't</a></p>

        

    </form>
    </div>
</body>
</html>