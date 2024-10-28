<!DOCTYPE html>
<!--Jose Gomez-->
<html lang="en">
<head>
<link rel="stylesheet" href="../estils/estils.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modificar articles</h1>
    
    <form action="" method="post">
        <tr>
            
            <td>Titol de l'article</td>
            <br>
            <input type="text" name="titolmodificar" placeholder="Titol..." value="<?php echo $_POST["titolmodificar"] ?? '' ?>" required>
            <br>

            <td>Titol per reemplaçar</td>
            <br>
            <input type="text" name="titolmodificat" placeholder="Titol..." value="<?php echo $_POST["titolmodificat"] ?? '' ?>" required>
            <br>
        
            <td>Cos de l'article</td>
            <textarea id="cosmodificar" name="cosmodificar" placeholder="Introdueix el cos de l'article..." value="<?php echo $_POST["cosmodificar"] ?? '' ?>"></textarea>
            <input type="submit" value="Modificar">
        </tr>

        <?php

        require_once "../controlador/controladorModificar.php";
        // En cas d'haver enviat el formulari s'executara la comanda
        if ($_SERVER["REQUEST_METHOD"] == "POST" && trim(!empty($_POST["titolmodificar"]))) {

            modificarArticle(); // Crida de la funcio

        }

        ?>
    </form>
    <form action="../index.php" method="get">
        <input type="submit" value="Tornar">
    </form>
</body>
</html>