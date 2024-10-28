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
    
<form method="post">
        <div>
            <input type="password" placeholder="Contrasenya actual" name="contrasenya">
            <br>
            
            <input type="password" placeholder="Contrasenya nova" name="contrasenyanova">
            <br>

            <input type="password" placeholder="Confirmar contrasenya" name="contrasenyanovaconf">
            <br>
            <input type="submit" value="Canviar contrasenya">
            <?php

                //Resposta del servidor al click de canviar contrasenya
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    require_once "../controlador/controladorCanvi.php";
                    canviContrasenya(); // Crida de la funcio

                }

            ?>
        </div>

        <p></p>
        </form>
        <form action="../index.php" method="post">

            <input type="submit" value="Tornar">
    
</body>
</html>