<!DOCTYPE html>
<!--Jose Gomez-->
<?php 
ini_set('session.gc_maxlifetime', 40*60); 
session_start();

if (isset($_SESSION['usuari'])) {
    
} else {
    header("Location: ../index.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estils/estilsArticles.css">

</head>
<body>
<header>
<nav class="navbar">
    <div class="navbar-logo">
        <a href="#">Benvingut, <?php
        
if (isset($_SESSION['usuari'])) {
    echo  htmlspecialchars($_SESSION['usuari']);
} else {
    echo "Cap sessio en actiu.";
}

?></a>
    </div>
    <ul class="navbar-links">
        <li><a href="../vista/vistaInserir.php">Inserir</a></li>
        <li><a href="../vista/vistaModificar.php">Modificar</a></li>
        <li><a href="../vista/vistaConsultar.php">Consultar</a></li>
        <li><a href="../vista/vistaEliminar.php">Eliminar</a></li>
    </ul>
    <div class="navbar-buttons">
        <a href="../vista/vistaTancar.php" class="btn register-btn">Tancar sessio</a>
    </div>
</nav>
</header>
<main>
</main>
 

<br>
<br>
<br>
<br>
<br>

    <h1>TOTS ELS ARTICLES</h1>
    
    <form method="get">
    <p>Articles per pagina<p>
    <input type="number" name="articlesperpag" value="<?php echo $_POST["articlesperpag"] ?? $_GET["articlesperpag"] ?? $_COOKIE['articlespag'] ?? '2'; ?>">
    <input type="submit" value="Executar">
    <select name="ordre">
			<option>Ascendent</option>
			<option>Descendent</option>
			</select>
    </form>
    <?php
    
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            require_once "../controlador/controladorArticles.php";
            require_once "../conexio.php";
            mostrarElsArticles();//Crida de la funcio
    
        }
    ?>

    
</body>
</html>