<!DOCTYPE html>
<!--Jose Gomez-->
<html lang="en">
<head>
    <link rel="stylesheet" href="../estils/pruebas.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="submit" value="Tancar Sessió">
     
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
        require_once "../controlador/controladorTancar.php";
        tancarSessio(); // Crida de la funcio

    }

    ?>
    </form>
    <form action="../index.php">
        <input type="submit" value="Tornar">

    </form>
    <form action="../vista/vistaCanviarPswd.php">
        <input type="submit" value="Cambiar contrasenya">

    </form>
</body>
</html>