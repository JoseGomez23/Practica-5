<!DOCTYPE html>
<!--Jose Gomez-->
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
        <a href="#">MiLogo</a>
    </div>
    <ul class="navbar-links">
       
    </ul>
    <div class="navbar-buttons">
        <a href="../vista/vistaLogin.php" class="btn login-btn">Log In</a>
        <a href="../vista/vistaRegistre.php" class="btn register-btn">Registrarse</a>
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
    <form method="get" action="">
        
    <select name="ordre">
        <option value="Ascendent" <?php echo (isset($_GET['ordre']) && $_GET['ordre'] === 'Ascendent') ? 'selected' : ''; ?>>Ascendent</option>
        <option value="Descendent" <?php echo (isset($_GET['ordre']) && $_GET['ordre'] === 'Descendent') ? 'selected' : ''; ?>>Descendent</option>
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