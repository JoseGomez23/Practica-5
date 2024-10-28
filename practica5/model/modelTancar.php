<?php
//JOSE GOMEZ

function tancarSessioUsuari(){

    //Funcio que tanca la sessio de l'usuari i el redirecciona a la pagina principal
    session_destroy();
    header("Location: ../index.php");

}


?>
