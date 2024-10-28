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
    <h1>Inserir Articles</h1>
    
    <form action="" method="post">
        <tr>
       
            <td>Titol de l'article</td>
            <br>
            <input type="text" name="titolinserir" placeholder="Titol..." value="<?php echo $_POST["titolinserir"] ?? '' ?>"required>
            <br>
        
            <td>Cos de l'article</td>
            <textarea id="cosinserir" name="cosinserir" placeholder="Introdueix el cos de l'article..." required><?php echo $_POST["cosinserir"] ?? '' ?></textarea>
            <input type="submit" value="Inserir">
        </tr>
    </form>
    <form action="../index.php" method="get">
        <input type="submit" value="Tornar">
    </form>
    <div class="result-container">
    <?php 
        require_once "../controlador/controladorInserir.php";
        // En cas d'haver enviat el formulari s'executara la comanda
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty(trim($_POST["titolinserir"])) && ($_POST["titolinserir"]))) {

            inserirArrticle(); // Crida de la funcio

        }
    ?>

</body>
</html>