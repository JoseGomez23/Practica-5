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
    <h1>Eliminar articles</h1>
    
    <form action="" method="post">
        <tr>
            <td>Id de l'article a eliminar</td>
            <input type="text" name="titoleliminar" placeholder="Titol" value="<?php echo $_POST["titoleliminar"] ?? '' ?>">
            <input type="submit" name="eliminarseguretat" value="Eliminar article">
        </tr>
    </form>

    <?php

       

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(trim($_POST["titoleliminar"]))) {
            // Primer condicional, activara el boto una vegada hem premut el boto eliminar
            echo "<form method=\"post\">".
                 "Estàs segur que vols eliminar l'article: ".htmlspecialchars($_POST["titoleliminar"])."?".
                 "<input type=\"hidden\" name=\"titoleliminar\" value=\"".htmlspecialchars($_POST["titoleliminar"])."\">". 
                 "<input type=\"submit\" name=\"eliminarsegur\" value=\"Eliminar\">".
                 "</form>";
        }
        
        // Segon condicional, s'executara una vegada ha confirmat la eliminacio
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["eliminarsegur"])) {
            // Comprovem que el titol es valid
            if (!empty(trim($_POST["titoleliminar"]))) {
                require_once "../controlador/controladorEliminar.php";
                eliminarArticle(); // Crida de la funcio

            } else {
                echo "El titol a eliminar no es valid.";
            }
        }

        ?>

    <form action="../index.php" method="get">
        <input type="submit" value="Tornar">
    </form>
</body>
</html>