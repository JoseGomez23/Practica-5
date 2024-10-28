<?php
ini_set('session.gc_maxlifetime', 20); 
session_set_cookie_params(20); 

session_start();
if(isset($_SESSION['usuari'])){
    header("Location: ./vista/vistaUsuariArticles.php");
} else {
    header("Location: ./vista/vistaArticles.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./estils/estilsIndex.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <form action="./vista/vistaConsultar.php" method="get">
    <input type="submit" value="Consultar">
    </form>

    <form action="./vista/vistaInserir.php" method="get">
        <input type="submit" value="Inserir">
    </form>

    <form action="./vista/vistaModificar.php"> 
        <input type="submit" value="Modificar">
    </form>

    <form action="./vista/vistaEliminar.php">
        <input type="submit" value="Eliminar">
    </form>

    <form action="./vista/vistaArticles.php">
        <input type="submit" value="Mirar Articles">
    </form>

    <form action="./vista/vistaLogin.php">
        <input type="submit" value="Logar-se">
    </form>

</body>
</html>