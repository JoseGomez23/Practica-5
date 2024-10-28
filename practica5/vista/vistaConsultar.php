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
    <h1>Consultar Articles</h1>
    
    <form action="" method="post">
        <tr>
            <td>Titol de l'article a cercar</td>
            <input type="text" name="titol" placeholder="Titol" value="<?php echo $_POST["titol"] ?? '' ?>">
            <input type="submit" value="Consultar">
        </tr>
    </form>
    <form action="../index.php" method="get">
        <input type="submit" value="Tornar">
    </form>

    <div class="result-container">
    <?php 
        require_once "../controlador/controladorConsultar.php";
        // En cas d'haver enviat el formulari s'executara la comanda
        if ($_SERVER["REQUEST_METHOD"] == "POST" && trim(!empty($_POST["titol"]))) {

            consultarArticle(); // Crida de la funcio

        }
    ?>
</body>
</html>